<?php

namespace MessageBird\Wire\Model;

class WhatsAppContactAddress
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
     * @var string|null
     */
    protected $street;
    /**
     * @var string|null
     */
    protected $city;
    /**
     * @var string|null
     */
    protected $state;
    /**
     * @var string|null
     */
    protected $zip;
    /**
     * @var string|null
     */
    protected $country;
    /**
     * The country as the card holds it, left exactly as WhatsApp sent it: it describes a postal address rather than a routing destination.
     * 
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * The label the contact's device attached, for example `Home`. Free text passed through verbatim.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }
    /**
     * @param string|null $street
     *
     * @return self
     */
    public function setStreet(?string $street): self
    {
        $this->initialized['street'] = true;
        $this->street = $street;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }
    /**
     * @param string|null $city
     *
     * @return self
     */
    public function setCity(?string $city): self
    {
        $this->initialized['city'] = true;
        $this->city = $city;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * @param string|null $state
     *
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }
    /**
     * @param string|null $zip
     *
     * @return self
     */
    public function setZip(?string $zip): self
    {
        $this->initialized['zip'] = true;
        $this->zip = $zip;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }
    /**
     * @param string|null $country
     *
     * @return self
     */
    public function setCountry(?string $country): self
    {
        $this->initialized['country'] = true;
        $this->country = $country;
        return $this;
    }
    /**
     * The country as the card holds it, left exactly as WhatsApp sent it: it describes a postal address rather than a routing destination.
     * 
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * The country as the card holds it, left exactly as WhatsApp sent it: it describes a postal address rather than a routing destination.
     *
     * @param string|null $countryCode
     *
     * @return self
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;
        return $this;
    }
    /**
     * The label the contact's device attached, for example `Home`. Free text passed through verbatim.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The label the contact's device attached, for example `Home`. Free text passed through verbatim.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
}
