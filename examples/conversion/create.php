<?php
require_once '../vendor/autoload.php';

use MatheusHack\RdStation\Conversion;
use MatheusHack\RdStation\Requests\ConversionRequest;
use MatheusHack\RdStation\Requests\ConversionPayloadRequest;

$payload = (new ConversionPayloadRequest())
    ->setEmail('email@email.com');

$request = (new ConversionRequest())
    ->setPayload($payload);

$response = (new Conversion())
    ->create($request);
