<?php

namespace MessageBird\Wire\Model;

/**
 * Identification guidance for the countries covered by the offer. You collect and validate the information; this response does not verify a person or authorize a purchase.
 */
class EsimOfferRequirements
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * @var list<EsimCountryRequirements>|null
     */
    protected $countries;
    /**
     * @return list<EsimCountryRequirements>|null
     */
    public function getCountries(): ?array
    {
        return $this->countries;
    }
    /**
     * @param list<EsimCountryRequirements>|null $countries
     *
     * @return self
     */
    public function setCountries(?array $countries): self
    {
        $this->initialized['countries'] = true;
        $this->countries = $countries;
        return $this;
    }
}
