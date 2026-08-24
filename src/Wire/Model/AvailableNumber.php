<?php

namespace MessageBird\Wire\Model;

class AvailableNumber
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
     * Phone number in E.164 format.
     *
     * @var string|null
     */
    protected $number;
    /**
     * ISO 3166-1 alpha-2 country code.
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * Physical type of this phone number.
     *
     * @var string|null
     */
    protected $numberType;
    /**
     * Channel capabilities supported by this number.
     *
     * @var list<string>|null
     */
    protected $capabilities;
    /**
     * Phone number in E.164 format.
     *
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }
    /**
     * Phone number in E.164 format.
     *
     * @param string|null $number
     *
     * @return self
     */
    public function setNumber(?string $number): self
    {
        $this->initialized['number'] = true;
        $this->number = $number;
        return $this;
    }
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
     * Physical type of this phone number.
     *
     * @return string|null
     */
    public function getNumberType(): ?string
    {
        return $this->numberType;
    }
    /**
     * Physical type of this phone number.
     *
     * @param string|null $numberType
     *
     * @return self
     */
    public function setNumberType(?string $numberType): self
    {
        $this->initialized['numberType'] = true;
        $this->numberType = $numberType;
        return $this;
    }
    /**
     * Channel capabilities supported by this number.
     *
     * @return list<string>|null
     */
    public function getCapabilities(): ?array
    {
        return $this->capabilities;
    }
    /**
     * Channel capabilities supported by this number.
     *
     * @param list<string>|null $capabilities
     *
     * @return self
     */
    public function setCapabilities(?array $capabilities): self
    {
        $this->initialized['capabilities'] = true;
        $this->capabilities = $capabilities;
        return $this;
    }
}
