<?php

namespace MessageBird\Wire\Model;

class VoiceSettings
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
     * What happens to a call arriving for any of your Bird numbers that has no inbound route of its own.
     * 
     *
     * @var VoiceSettingsInboundConfiguration|null
     */
    protected $inboundConfiguration;
    /**
     * The workspace's daily Voice spend limit and today's usage toward it. Null until your organization has a wallet, since amounts are in its currency.
     * 
     *
     * @var VoiceSettingsDailySpendLimit|null
     */
    protected $dailySpendLimit;
    /**
     * What happens to a call arriving for any of your Bird numbers that has no inbound route of its own.
     * 
     *
     * @return VoiceSettingsInboundConfiguration|null
     */
    public function getInboundConfiguration(): ?VoiceSettingsInboundConfiguration
    {
        return $this->inboundConfiguration;
    }
    /**
     * What happens to a call arriving for any of your Bird numbers that has no inbound route of its own.
     *
     * @param VoiceSettingsInboundConfiguration|null $inboundConfiguration
     *
     * @return self
     */
    public function setInboundConfiguration(?VoiceSettingsInboundConfiguration $inboundConfiguration): self
    {
        $this->initialized['inboundConfiguration'] = true;
        $this->inboundConfiguration = $inboundConfiguration;
        return $this;
    }
    /**
     * The workspace's daily Voice spend limit and today's usage toward it. Null until your organization has a wallet, since amounts are in its currency.
     * 
     *
     * @return VoiceSettingsDailySpendLimit|null
     */
    public function getDailySpendLimit(): ?VoiceSettingsDailySpendLimit
    {
        return $this->dailySpendLimit;
    }
    /**
     * The workspace's daily Voice spend limit and today's usage toward it. Null until your organization has a wallet, since amounts are in its currency.
     *
     * @param VoiceSettingsDailySpendLimit|null $dailySpendLimit
     *
     * @return self
     */
    public function setDailySpendLimit(?VoiceSettingsDailySpendLimit $dailySpendLimit): self
    {
        $this->initialized['dailySpendLimit'] = true;
        $this->dailySpendLimit = $dailySpendLimit;
        return $this;
    }
}
