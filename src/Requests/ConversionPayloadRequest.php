<?php

namespace MatheusHack\RdStation\Requests;

/**
 *
 */
class ConversionPayloadRequest
{
    /**
     * @var
     */
    private $conversionIdentifler;

    /**
     * @var
     */
    private $email;

    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $jobTitle;

    /**
     * @var
     */
    private $state;

    /**
     * @var
     */
    private $city;

    /**
     * @var
     */
    private $country;

    /**
     * @var
     */
    private $personalPhone;

    /**
     * @var
     */
    private $mobilePhone;

    /**
     * @var
     */
    private $twitter;

    /**
     * @var
     */
    private $facebook;

    /**
     * @var
     */
    private $linkedin;

    /**
     * @var
     */
    private $website;

    /**
     * @var
     */
    private $companyName;

    /**
     * @var
     */
    private $companySite;

    /**
     * @var
     */
    private $companyAddress;

    /**
     * @var
     */
    private $clientTrackingId;

    /**
     * @var
     */
    private $trafficSource;

    /**
     * @var
     */
    private $trafficMedium;

    /**
     * @var
     */
    private $trafficCampaign;

    /**
     * @var
     */
    private $trafficValue;

    /**
     * @var
     */
    private $availableForMailing;

    /**
     * @var array
     */
    private $tags = [];

    /**
     * @var
     */
    private $legalBases;

    /**
     * @return mixed
     */
    public function getConversionIdentifler()
    {
        return $this->conversionIdentifler;
    }

    /**
     * @param mixed $conversionIdentifler
     * @return ConversionPayloadRequest
     */
    public function setConversionIdentifler($conversionIdentifler)
    {
        $this->conversionIdentifler = $conversionIdentifler;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return ConversionPayloadRequest
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return ConversionPayloadRequest
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * @param mixed $jobTitle
     * @return ConversionPayloadRequest
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     * @return ConversionPayloadRequest
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return ConversionPayloadRequest
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     * @return ConversionPayloadRequest
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPersonalPhone()
    {
        return $this->personalPhone;
    }

    /**
     * @param mixed $personalPhone
     * @return ConversionPayloadRequest
     */
    public function setPersonalPhone($personalPhone)
    {
        $this->personalPhone = $personalPhone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * @param mixed $mobilePhone
     * @return ConversionPayloadRequest
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @param mixed $twitter
     * @return ConversionPayloadRequest
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param mixed $facebook
     * @return ConversionPayloadRequest
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * @param mixed $linkedin
     * @return ConversionPayloadRequest
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param mixed $website
     * @return ConversionPayloadRequest
     */
    public function setWebsite($website)
    {
        $this->website = $website;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $companyName
     * @return ConversionPayloadRequest
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompanySite()
    {
        return $this->companySite;
    }

    /**
     * @param mixed $companySite
     * @return ConversionPayloadRequest
     */
    public function setCompanySite($companySite)
    {
        $this->companySite = $companySite;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }

    /**
     * @param mixed $companyAddress
     * @return ConversionPayloadRequest
     */
    public function setCompanyAddress($companyAddress)
    {
        $this->companyAddress = $companyAddress;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientTrackingId()
    {
        return $this->clientTrackingId;
    }

    /**
     * @param mixed $clientTrackingId
     * @return ConversionPayloadRequest
     */
    public function setClientTrackingId($clientTrackingId)
    {
        $this->clientTrackingId = $clientTrackingId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrafficSource()
    {
        return $this->trafficSource;
    }

    /**
     * @param mixed $trafficSource
     * @return ConversionPayloadRequest
     */
    public function setTrafficSource($trafficSource)
    {
        $this->trafficSource = $trafficSource;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrafficMedium()
    {
        return $this->trafficMedium;
    }

    /**
     * @param mixed $trafficMedium
     * @return ConversionPayloadRequest
     */
    public function setTrafficMedium($trafficMedium)
    {
        $this->trafficMedium = $trafficMedium;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrafficCampaign()
    {
        return $this->trafficCampaign;
    }

    /**
     * @param mixed $trafficCampaign
     * @return ConversionPayloadRequest
     */
    public function setTrafficCampaign($trafficCampaign)
    {
        $this->trafficCampaign = $trafficCampaign;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrafficValue()
    {
        return $this->trafficValue;
    }

    /**
     * @param mixed $trafficValue
     * @return ConversionPayloadRequest
     */
    public function setTrafficValue($trafficValue)
    {
        $this->trafficValue = $trafficValue;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvailableForMailing()
    {
        return $this->availableForMailing;
    }

    /**
     * @param mixed $availableForMailing
     * @return ConversionPayloadRequest
     */
    public function setAvailableForMailing($availableForMailing)
    {
        $this->availableForMailing = $availableForMailing;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return $this
     */
    public function setTags(array $tags): ConversionPayloadRequest
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLegalBases()
    {
        return $this->legalBases;
    }

    /**
     * @param mixed $legalBases
     * @return ConversionPayloadRequest
     */
    public function setLegalBases($legalBases)
    {
        $this->legalBases = $legalBases;
        return $this;
    }
}
