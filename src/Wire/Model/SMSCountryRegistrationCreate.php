<?php

namespace MessageBird\Wire\Model;

class SMSCountryRegistrationCreate
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
     * ISO 3166-1 alpha-2 country code.
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * Message category to register the sender for. Omit to register the sender for all categories.
     * 
     *
     * @var string|null
     */
    protected $category;
    /**
     * ISO 3166-1 alpha-2 country code.
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * ISO 3166-1 alpha-2 country code.
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
     * Message category to register the sender for. Omit to register the sender for all categories.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Message category to register the sender for. Omit to register the sender for all categories.
     *
     * @param string|null $category
     *
     * @return self
     */
    public function setCategory(?string $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;
        return $this;
    }
}
