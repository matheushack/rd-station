<?php

namespace MatheusHack\RdStation\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use MatheusHack\RdStation\Exceptions\AuthException;
use MatheusHack\RdStation\Responses\GenericResponse;

/**
 *
 */
class BaseService extends Client
{
    /**
     * @var array[]
     */
    private $endpoints = [
        'sandbox' => [
            'refresh_token' => 'https://api.rd.services/auth/token',
            'platform' => 'https://api.rd.services/platform',
        ],
        'production' => [
            'refresh_token' => 'https://api.rd.services/auth/token',
            'platform' => 'https://api.rd.services/platform',
        ],
    ];

    /**
     * Authentication constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $key
     * @param string $complement
     * @return mixed|string
     */
    public function endpointByKey($key, $complement = "")
    {
        if (Config::get('rd_station.sandbox', false)) {
            return $this->endpoints['sandbox'][$key];
        }

        return sprintf('%s%s',
            $this->endpoints['production'][$key],
            $complement
        );
    }

    /**
     * @param $endpoint
     * @param string $method
     * @param array $parameters
     * @param bool $isMultipart
     * @return GenericResponse
     */
    public function execute($endpoint, $method = 'GET', $parameters = [], $isMultipart = false)
    {
        try {
            $token = $this->authorize();

            if (!$token) {
                throw new AuthException('Token invalid');
            }

            $content = $this->makeContent($token, $parameters, $isMultipart);
            switch ($method) {
                default:
                    $response = $this->request('GET', $endpoint, $content);
                    break;
                case 'POST':
                case 'PUT':
                case 'PATCH':
                    $response = $this->request($method, $endpoint, $content);
                    break;
            }

            if ($response->getStatusCode() === 401) {
                Cache::forget('token_authorize_rd_station');
                return $this->execute($endpoint, $method, $parameters, $isMultipart);
            }

            $body = json_decode($response->getBody());
            return (new GenericResponse)
                ->setSuccess(true)
                ->setData($body);
        } catch (RequestException $e) {
            if ($e->getCode() == 401) {
                Cache::forget('token_authorize_rd_station');
                return $this->execute($endpoint, $method, $parameters, $isMultipart);
            }

            $message = $e->getMessage();
            if ($e->hasResponse()) {
                $body = json_decode($e->getResponse()->getBody());

                if (!empty($body->errors->error_message)) {
                    $message = $body->errors->error_message;
                }

                if (!empty($body->errors)) {
                    $message = json_encode($body->errors);
                }
            }

            return (new GenericResponse)
                ->setSuccess(false)
                ->setMessage($message);
        } catch (AuthException $e) {
            return (new GenericResponse)
                ->setSuccess(false)
                ->setMessage($e->getMessage());
        }
    }

    /**
     * @return bool|mixed
     */
    private function authorize()
    {
        $token = Cache::get('token_authorize_rd_station');

        if ($token) {
            return $token;
        }

        try {
            $response = $this->request('POST', $this->endpointByKey('refresh_token'), [
                'body' => json_encode([
                    'client_id' => Config::get('rd_station.auth.client_id'),
                    'client_secret' => Config::get('rd_station.auth.client_secret'),
                    'refresh_token' => Config::get('rd_station.auth.refresh_token'),
                ]),
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]);

            $body = json_decode($response->getBody());

            if ($response->getStatusCode() === 401) {
                throw new AuthException($body->error_message);
            }

            Cache::set('token_authorize_rd_station', $body->access_token, $body->expires_in);
            return $body->access_token;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param $token
     * @param $parameters
     * @param $isMultipart
     * @return array
     */
    private function makeContent($token, $parameters, $isMultipart)
    {
        if ($isMultipart) {
            return [
                "headers" => [
                    'Authorization' => sprintf("Bearer %s", $token)
                ],
                'multipart' => $this->hasStringKeys($parameters) ? [$parameters] : $parameters
            ];
        }

        $content = [
            "headers" => [
                'Content-Type' => 'application/json',
                'Authorization' => sprintf("Bearer %s", $token)
            ],
        ];

        if (!empty($parameters)) {
            $content['body'] = json_encode($parameters);
        }

        return $content;
    }

    /**
     * @param array $data
     * @return bool
     */
    private function hasStringKeys(array $data)
    {
        return count(array_filter(array_keys($data), 'is_string')) > 0;
    }
}
