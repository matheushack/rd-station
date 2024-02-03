<?php

namespace MatheusHack\RdStation;

use MatheusHack\RdStation\Requests\ContactRequest;
use MatheusHack\RdStation\Services\ContactService;

/**
 *
 */
class Contact
{
    /**
     * @var ContactService
     */
    private $service;

    /**
     *
     */
    public function __construct()
    {
        $this->service = new ContactService();
    }

    /**
     * @param ContactRequest $request
     * @return Responses\GenericResponse
     */
    public function find(ContactRequest $request)
    {
        return $this->service->find($request);
    }

    /**
     * @param ContactRequest $request
     * @return Responses\GenericResponse
     */
    public function create(ContactRequest $request)
    {
        return $this->service->create($request);
    }

    /**
     * @param ContactRequest $request
     * @return Responses\GenericResponse
     */
    public function update(ContactRequest $request)
    {
        return $this->service->update($request);
    }
}
