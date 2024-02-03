<?php
require_once '../vendor/autoload.php';

use MatheusHack\RdStation\Contact;
use MatheusHack\RdStation\Requests\ContactRequest;

$request = (new ContactRequest())
    ->setEmail('email@email.com')
    ->setName('Example')
    ->setJobTitle('Developer')
    ->setBirthDate('1992-12-14')
    ->setBio('Bio example')
    ->setWebsite('example.com.br')
    ->setCity('São Paulo')
    ->setState('SP')
    ->setCountry('Brasil')
    ->setTags([
        'teste',
    ]);

$response = (new Contact())
    ->create($request);
