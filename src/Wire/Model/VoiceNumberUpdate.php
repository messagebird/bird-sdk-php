<?php

namespace MessageBird\Wire\Model;

class VoiceNumberUpdate
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
     * Your own label for this number. Send null to remove the one it has. Omit the field to leave it alone.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * @var VoiceInboundConfigurationPut|null
     */
    protected $inboundConfiguration;
    /**
     * Your own label for this number. Send null to remove the one it has. Omit the field to leave it alone.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Your own label for this number. Send null to remove the one it has. Omit the field to leave it alone.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * @return VoiceInboundConfigurationPut|null
     */
    public function getInboundConfiguration(): ?VoiceInboundConfigurationPut
    {
        return $this->inboundConfiguration;
    }
    /**
     * @param VoiceInboundConfigurationPut|null $inboundConfiguration
     *
     * @return self
     */
    public function setInboundConfiguration(?VoiceInboundConfigurationPut $inboundConfiguration): self
    {
        $this->initialized['inboundConfiguration'] = true;
        $this->inboundConfiguration = $inboundConfiguration;
        return $this;
    }
}
