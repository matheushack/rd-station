<?php

namespace MatheusHack\RdStation;

use MatheusHack\RdStation\Requests\ConversionRequest;
use MatheusHack\RdStation\Services\ConversionService;

/**
 *
 */
class Conversion
{
    /**
     * @var ConversionService
     */
    private $service;

    /**
     *
     */
    public function __construct()
    {
        $this->service = new ConversionService();
    }

    /**
     * @param ConversionRequest $request
     * @return Responses\GenericResponse
     */
    public function create(ConversionRequest $request)
    {
        return $this->service->create($request);
    }
}
