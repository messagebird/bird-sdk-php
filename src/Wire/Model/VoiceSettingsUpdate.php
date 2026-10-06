<?php

namespace MessageBird\Wire\Model;

class VoiceSettingsUpdate
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
     * The route for calls arriving on any of your Bird numbers that has no inbound route of its own; verified caller IDs receive no calls. It takes effect on the next call to each of those numbers. Numbers with their own route keep it.
     * 
     *
     * @var VoiceSettingsInboundConfigurationPut|null
     */
    protected $inboundConfiguration;
    /**
     * The route for calls arriving on any of your Bird numbers that has no inbound route of its own; verified caller IDs receive no calls. It takes effect on the next call to each of those numbers. Numbers with their own route keep it.
     * 
     *
     * @return VoiceSettingsInboundConfigurationPut|null
     */
    public function getInboundConfiguration(): ?VoiceSettingsInboundConfigurationPut
    {
        return $this->inboundConfiguration;
    }
    /**
     * The route for calls arriving on any of your Bird numbers that has no inbound route of its own; verified caller IDs receive no calls. It takes effect on the next call to each of those numbers. Numbers with their own route keep it.
     *
     * @param VoiceSettingsInboundConfigurationPut|null $inboundConfiguration
     *
     * @return self
     */
    public function setInboundConfiguration(?VoiceSettingsInboundConfigurationPut $inboundConfiguration): self
    {
        $this->initialized['inboundConfiguration'] = true;
        $this->inboundConfiguration = $inboundConfiguration;
        return $this;
    }
}
