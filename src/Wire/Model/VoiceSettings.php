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
}
