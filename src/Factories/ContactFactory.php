<?php

namespace MatheusHack\RdStation\Factories;

use MatheusHack\RdStation\Requests\ContactRequest;
use MatheusHack\RdStation\Requests\LegalBase;

/**
 *
 */
class ContactFactory
{
    /**
     * @param ContactRequest $request
     * @return array
     */
    public function make(ContactRequest $request)
    {
        return [
            'name' => $request->getName(),
            'email' => $request->getEmail(),
            'job_title' => $request->getJobTitle(),
            'birthdate' => $request->getBirthDate(),
            'bio' => $request->getBio(),
            'website' => $request->getWebsite(),
            'personal_phone' => $request->getPersonalPhone(),
            'mobile_phone' => $request->getMobilePhone(),
            'city' => $request->getCity(),
            'state' => $request->getState(),
            'country' => $request->getCountry(),
            'twitter' => $request->getTwitter(),
            'facebook' => $request->getFacebook(),
            'linkedin' => $request->getLinkedin(),
            'tags' => $request->getTags(),
            'legal_bases' => $this->makeLegalBases($request->getLegalBases()),
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    private function makeLegalBases(array $data)
    {
        $response = [];
        if (!empty($data)) {
            foreach ($data as $legalBase) {
                if ($legalBase instanceof LegalBase) {
                    $response[] = [
                        'category' => $legalBase->getCategory(),
                        'type' => $legalBase->getType(),
                        'status' => $legalBase->getStatus(),
                    ];
                }
            }
        }

        return $response;
    }
}
