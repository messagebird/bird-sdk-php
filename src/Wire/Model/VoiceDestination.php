<?php

namespace MessageBird\Wire\Model;

class VoiceDestination
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
    protected $countryCode;
    /**
     * Full English country name.
     *
     * @var string|null
     */
    protected $countryName;
    /**
     * International dialling prefix, without the leading plus. Absent for countries that have none.
     *
     * @var string|null
     */
    protected $dialCode;
    /**
     * @var string|null
     */
    protected $region;
    /**
     * @var string|null
     */
    protected $superRegion;
    /**
     * Whether your workspace has enabled calling to this country.
     *
     * @var bool|null
     */
    protected $enabled;
    /**
     * This country's Voice callability at the destination level, independent of your enabled setting. `available` means we place calls there; `not_supported` means we do not.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Whether we treat this country as a high-risk calling destination.
     *
     * @var bool|null
     */
    protected $highRiskDestination;
    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
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
     * Full English country name.
     *
     * @return string|null
     */
    public function getCountryName(): ?string
    {
        return $this->countryName;
    }
    /**
     * Full English country name.
     *
     * @param string|null $countryName
     *
     * @return self
     */
    public function setCountryName(?string $countryName): self
    {
        $this->initialized['countryName'] = true;
        $this->countryName = $countryName;
        return $this;
    }
    /**
     * International dialling prefix, without the leading plus. Absent for countries that have none.
     *
     * @return string|null
     */
    public function getDialCode(): ?string
    {
        return $this->dialCode;
    }
    /**
     * International dialling prefix, without the leading plus. Absent for countries that have none.
     *
     * @param string|null $dialCode
     *
     * @return self
     */
    public function setDialCode(?string $dialCode): self
    {
        $this->initialized['dialCode'] = true;
        $this->dialCode = $dialCode;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }
    /**
     * @param string|null $region
     *
     * @return self
     */
    public function setRegion(?string $region): self
    {
        $this->initialized['region'] = true;
        $this->region = $region;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getSuperRegion(): ?string
    {
        return $this->superRegion;
    }
    /**
     * @param string|null $superRegion
     *
     * @return self
     */
    public function setSuperRegion(?string $superRegion): self
    {
        $this->initialized['superRegion'] = true;
        $this->superRegion = $superRegion;
        return $this;
    }
    /**
     * Whether your workspace has enabled calling to this country.
     *
     * @return bool|null
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }
    /**
     * Whether your workspace has enabled calling to this country.
     *
     * @param bool|null $enabled
     *
     * @return self
     */
    public function setEnabled(?bool $enabled): self
    {
        $this->initialized['enabled'] = true;
        $this->enabled = $enabled;
        return $this;
    }
    /**
     * This country's Voice callability at the destination level, independent of your enabled setting. `available` means we place calls there; `not_supported` means we do not.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * This country's Voice callability at the destination level, independent of your enabled setting. `available` means we place calls there; `not_supported` means we do not.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * Whether we treat this country as a high-risk calling destination.
     *
     * @return bool|null
     */
    public function getHighRiskDestination(): ?bool
    {
        return $this->highRiskDestination;
    }
    /**
     * Whether we treat this country as a high-risk calling destination.
     *
     * @param bool|null $highRiskDestination
     *
     * @return self
     */
    public function setHighRiskDestination(?bool $highRiskDestination): self
    {
        $this->initialized['highRiskDestination'] = true;
        $this->highRiskDestination = $highRiskDestination;
        return $this;
    }
}
