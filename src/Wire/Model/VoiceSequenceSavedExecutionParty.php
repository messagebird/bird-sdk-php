<?php

namespace MessageBird\Wire\Model;

class VoiceSequenceSavedExecutionParty
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
     * @var VoiceSequenceSavedExecutionEndpoint|null
     */
    protected $endpoint;
    /**
     * @var string|null
     */
    protected $address;
    /**
     * @return VoiceSequenceSavedExecutionEndpoint|null
     */
    public function getEndpoint(): ?VoiceSequenceSavedExecutionEndpoint
    {
        return $this->endpoint;
    }
    /**
     * @param VoiceSequenceSavedExecutionEndpoint|null $endpoint
     *
     * @return self
     */
    public function setEndpoint(?VoiceSequenceSavedExecutionEndpoint $endpoint): self
    {
        $this->initialized['endpoint'] = true;
        $this->endpoint = $endpoint;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * @param string|null $address
     *
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;
        return $this;
    }
}
