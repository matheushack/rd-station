<?php
require_once '../vendor/autoload.php';

use MatheusHack\RdStation\Contact;
use MatheusHack\RdStation\Requests\ContactRequest;

$request = (new ContactRequest())
    ->setEmail('email@email.com');

$response = (new Contact())
    ->create($request);
