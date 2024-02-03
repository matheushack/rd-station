<?php

namespace MatheusHack\RdStation\Requests;

/**
 *
 */
class ConversionRequest
{
    /**
     * @var string
     */
    private $eventType = "CONVERSION";

    /**
     * @var string
     */
    private $eventFamily = "CDP";

    /**
     * @var
     */
    private $payload;

    /**
     * @return string
     */
    public function getEventType(): string
    {
        return $this->eventType;
    }

    /**
     * @param string $eventType
     * @return $this
     */
    public function setEventType(string $eventType): ConversionRequest
    {
        $this->eventType = $eventType;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventFamily(): string
    {
        return $this->eventFamily;
    }

    /**
     * @param string $eventFamily
     * @return $this
     */
    public function setEventFamily(string $eventFamily): ConversionRequest
    {
        $this->eventFamily = $eventFamily;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param mixed $payload
     * @return ConversionRequest
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
        return $this;
    }
}
