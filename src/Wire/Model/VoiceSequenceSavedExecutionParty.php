<?php

namespace MessageBird\Wire\Model;

/**
 * Saved hypothetical party, or null for an absent observation. Strings may be stale; explicit preview and evaluation validate endpoint types and telephone addresses.
 */
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
     * Digits appended to the destination number; leading zeroes are preserved. Only the destination party supplies this fact; a value on the origin is ignored.
     *
     * @var string|null
     */
    protected $overdialSuffix;
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
    /**
     * Digits appended to the destination number; leading zeroes are preserved. Only the destination party supplies this fact; a value on the origin is ignored.
     *
     * @return string|null
     */
    public function getOverdialSuffix(): ?string
    {
        return $this->overdialSuffix;
    }
    /**
     * Digits appended to the destination number; leading zeroes are preserved. Only the destination party supplies this fact; a value on the origin is ignored.
     *
     * @param string|null $overdialSuffix
     *
     * @return self
     */
    public function setOverdialSuffix(?string $overdialSuffix): self
    {
        $this->initialized['overdialSuffix'] = true;
        $this->overdialSuffix = $overdialSuffix;
        return $this;
    }
}
