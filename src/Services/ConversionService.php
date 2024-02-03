<?php

namespace MatheusHack\RdStation\Services;

use MatheusHack\RdStation\Factories\ConversionFactory;
use MatheusHack\RdStation\Requests\ConversionRequest;
use MatheusHack\RdStation\Responses\GenericResponse;

/**
 *
 */
class ConversionService extends BaseService
{
    /**
     * @var string
     */
    protected $base = 'platform';

    /**
     * @param ConversionRequest $request
     * @return GenericResponse
     */
    public function create(ConversionRequest $request)
    {
        try {
            $endpoint = $this->endpointByKey($this->base, '/events?event_type=conversion');
            return $this->execute($endpoint, 'POST', (new ConversionFactory)->make($request));
        } catch (\Exception $e) {
            return (new GenericResponse)
                ->setSuccess(false)
                ->setMessage($e->getMessage());
        }
    }
}
