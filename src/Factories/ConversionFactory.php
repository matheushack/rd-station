<?php

namespace MatheusHack\RdStation\Factories;

use MatheusHack\RdStation\Requests\ConversionRequest;

/**
 *
 */
class ConversionFactory
{
    /**
     * @param ConversionRequest $request
     * @return array
     */
    public function make(ConversionRequest $request)
    {
        return [
            'event_type' => $request->getEventType(),
            'event_family' => $request->getEventFamily(),
            'payload' => $this->makePayload($request->getPayload())
        ];
    }

    /**
     * @param $payload
     * @return array|mixed
     */
    private function makePayload($payload)
    {
        if (method_exists($payload, 'toArray')) {
            return $payload->toArray();
        }

        if (method_exists($payload, 'getEmail') && method_exists($payload, 'getConversionIdentifler')) {
            return [
                'conversion_identifier' => $payload->getConversionIdentifler(),
                'email' => $payload->getEmail()
            ];
        }

        return [];
    }
}
