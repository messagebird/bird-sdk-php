<?php

namespace MessageBird\Wire\Model;

class DestinationSetting
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
     * Whether to enable (`true`) or disable (`false`) this destination country. Omit it to leave the country's enabled setting unchanged.
     * 
     *
     * @var bool|null
     */
    protected $enabled;
    /**
     * Sets or removes this country's daily spend limit; omit it to leave the limit unchanged. Once today's spend reaches the limit, new calls to the country are refused, verification calls included, whether or not it is enabled; a call already in progress is not cut off, so spend can pass the limit by what that call costs.
     * 
     *
     * @var VoiceDestinationDailySpendLimitUpdate|null
     */
    protected $dailySpendLimit;
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
     * Whether to enable (`true`) or disable (`false`) this destination country. Omit it to leave the country's enabled setting unchanged.
     * 
     *
     * @return bool|null
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }
    /**
     * Whether to enable (`true`) or disable (`false`) this destination country. Omit it to leave the country's enabled setting unchanged.
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
     * Sets or removes this country's daily spend limit; omit it to leave the limit unchanged. Once today's spend reaches the limit, new calls to the country are refused, verification calls included, whether or not it is enabled; a call already in progress is not cut off, so spend can pass the limit by what that call costs.
     * 
     *
     * @return VoiceDestinationDailySpendLimitUpdate|null
     */
    public function getDailySpendLimit(): ?VoiceDestinationDailySpendLimitUpdate
    {
        return $this->dailySpendLimit;
    }
    /**
     * Sets or removes this country's daily spend limit; omit it to leave the limit unchanged. Once today's spend reaches the limit, new calls to the country are refused, verification calls included, whether or not it is enabled; a call already in progress is not cut off, so spend can pass the limit by what that call costs.
     *
     * @param VoiceDestinationDailySpendLimitUpdate|null $dailySpendLimit
     *
     * @return self
     */
    public function setDailySpendLimit(?VoiceDestinationDailySpendLimitUpdate $dailySpendLimit): self
    {
        $this->initialized['dailySpendLimit'] = true;
        $this->dailySpendLimit = $dailySpendLimit;
        return $this;
    }
}
