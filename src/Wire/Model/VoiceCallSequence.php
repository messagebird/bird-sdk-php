<?php

namespace MessageBird\Wire\Model;

class VoiceCallSequence
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
     * Voice sequence selected for this call. Null for a call that ran an inline definition.
     *
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $runId;
    /**
     * Voice sequence selected for this call. Null for a call that ran an inline definition.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Voice sequence selected for this call. Null for a call that ran an inline definition.
     *
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
    public function getRunId(): ?string
    {
        return $this->runId;
    }
    /**
     * @param string|null $runId
     *
     * @return self
     */
    public function setRunId(?string $runId): self
    {
        $this->initialized['runId'] = true;
        $this->runId = $runId;
        return $this;
    }
}
