<?php

namespace MessageBird\Wire\Model;

class VoiceSequenceSavedExecutionSample
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
    protected $startedAt;
    /**
     * Saved hypothetical root call identities. Strings may be stale; explicit preview and evaluation require valid typed identifiers.
     *
     * @var VoiceSequenceSavedExecutionCallSample|null
     */
    protected $call;
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
    public function getStartedAt(): ?string
    {
        return $this->startedAt;
    }
    /**
     * @param string|null $startedAt
     *
     * @return self
     */
    public function setStartedAt(?string $startedAt): self
    {
        $this->initialized['startedAt'] = true;
        $this->startedAt = $startedAt;
        return $this;
    }
    /**
     * Saved hypothetical root call identities. Strings may be stale; explicit preview and evaluation require valid typed identifiers.
     *
     * @return VoiceSequenceSavedExecutionCallSample|null
     */
    public function getCall(): ?VoiceSequenceSavedExecutionCallSample
    {
        return $this->call;
    }
    /**
     * Saved hypothetical root call identities. Strings may be stale; explicit preview and evaluation require valid typed identifiers.
     *
     * @param VoiceSequenceSavedExecutionCallSample|null $call
     *
     * @return self
     */
    public function setCall(?VoiceSequenceSavedExecutionCallSample $call): self
    {
        $this->initialized['call'] = true;
        $this->call = $call;
        return $this;
    }
}
