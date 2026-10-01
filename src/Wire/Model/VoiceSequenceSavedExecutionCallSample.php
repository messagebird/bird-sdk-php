<?php

namespace MessageBird\Wire\Model;

class VoiceSequenceSavedExecutionCallSample
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
    protected $id;
    /**
     * @var string|null
     */
    protected $sessionId;
    /**
     * Saved hypothetical party, or null for an absent observation. Strings may be stale; explicit preview and evaluation validate endpoint types and telephone addresses.
     *
     * @var VoiceSequenceSavedExecutionParty|null
     */
    protected $orig;
    /**
     * Saved hypothetical party, or null for an absent observation. Strings may be stale; explicit preview and evaluation validate endpoint types and telephone addresses.
     *
     * @var VoiceSequenceSavedExecutionParty|null
     */
    protected $dest;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }
    /**
     * @param string|null $sessionId
     *
     * @return self
     */
    public function setSessionId(?string $sessionId): self
    {
        $this->initialized['sessionId'] = true;
        $this->sessionId = $sessionId;
        return $this;
    }
    /**
     * Saved hypothetical party, or null for an absent observation. Strings may be stale; explicit preview and evaluation validate endpoint types and telephone addresses.
     *
     * @return VoiceSequenceSavedExecutionParty|null
     */
    public function getOrig(): ?VoiceSequenceSavedExecutionParty
    {
        return $this->orig;
    }
    /**
     * Saved hypothetical party, or null for an absent observation. Strings may be stale; explicit preview and evaluation validate endpoint types and telephone addresses.
     *
     * @param VoiceSequenceSavedExecutionParty|null $orig
     *
     * @return self
     */
    public function setOrig(?VoiceSequenceSavedExecutionParty $orig): self
    {
        $this->initialized['orig'] = true;
        $this->orig = $orig;
        return $this;
    }
    /**
     * Saved hypothetical party, or null for an absent observation. Strings may be stale; explicit preview and evaluation validate endpoint types and telephone addresses.
     *
     * @return VoiceSequenceSavedExecutionParty|null
     */
    public function getDest(): ?VoiceSequenceSavedExecutionParty
    {
        return $this->dest;
    }
    /**
     * Saved hypothetical party, or null for an absent observation. Strings may be stale; explicit preview and evaluation validate endpoint types and telephone addresses.
     *
     * @param VoiceSequenceSavedExecutionParty|null $dest
     *
     * @return self
     */
    public function setDest(?VoiceSequenceSavedExecutionParty $dest): self
    {
        $this->initialized['dest'] = true;
        $this->dest = $dest;
        return $this;
    }
}
