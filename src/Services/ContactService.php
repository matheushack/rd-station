<?php

namespace MatheusHack\RdStation\Services;

use MatheusHack\RdStation\Factories\ContactFactory;
use MatheusHack\RdStation\Requests\ContactRequest;
use MatheusHack\RdStation\Responses\GenericResponse;

/**
 *
 */
class ContactService extends BaseService
{
    /**
     * @var string
     */
    protected $base = 'platform';

    /**
     * @param ContactRequest $request
     * @return GenericResponse
     */
    public function find(ContactRequest $request)
    {
        try {
            if (empty($request->getUuid()) && empty($request->getEmail())) {
                throw new \Exception("It is necessary to inform the customer's email or uuid");
            }

            if (!empty($request->getEmail())) {
                $endpoint = $this->endpointByKey($this->base, sprintf("/contacts/email:%s",
                    $request->getEmail()
                ));
            }

            if (!empty($request->getUuid())) {
                $endpoint = $this->endpointByKey($this->base, sprintf("/contacts/uuid:%s",
                    $request->getUuid()
                ));
            }

            return $this->execute($endpoint);
        } catch (\Exception $e) {
            return (new GenericResponse)
                ->setSuccess(false)
                ->setMessage($e->getMessage());
        }
    }

    /**
     * @param ContactRequest $request
     * @return GenericResponse
     */
    public function create(ContactRequest $request)
    {
        try {
            $endpoint = $this->endpointByKey($this->base, '/contacts');
            return $this->execute($endpoint, 'POST', (new ContactFactory())->make($request));
        } catch (\Exception $e) {
            return (new GenericResponse)
                ->setSuccess(false)
                ->setMessage($e->getMessage());
        }
    }

    /**
     * @param ContactRequest $request
     * @return GenericResponse
     */
    public function update(ContactRequest $request)
    {
        try {
            if (empty($request->getUuid()) && empty($request->getEmail())) {
                throw new \Exception("It is necessary to inform the customer's email or uuid");
            }

            if (!empty($request->getEmail())) {
                $endpoint = $this->endpointByKey($this->base, sprintf("/contacts/email:%s",
                    $request->getEmail()
                ));
            }

            if (!empty($request->getUuid())) {
                $endpoint = $this->endpointByKey($this->base, sprintf("/contacts/uuid:%s",
                    $request->getUuid()
                ));
            }

            $request->setUuid('')
                ->setEmail('');

            return $this->execute($endpoint, 'PATCH', (new ContactFactory())->make($request));
        } catch (\Exception $e) {
            return (new GenericResponse)
                ->setSuccess(false)
                ->setMessage($e->getMessage());
        }
    }
}
