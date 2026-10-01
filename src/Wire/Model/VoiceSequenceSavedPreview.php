<?php

namespace MessageBird\Wire\Model;

class VoiceSequenceSavedPreview
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
     * Stable identifier for a node within one sequence definition.
     *
     * @var string|null
     */
    protected $triggerNodeId;
    /**
     * @var array<string, mixed>|null
     */
    protected $triggerData;
    /**
     * @var list<mixed>|null
     */
    protected $nodeSamples;
    /**
     * Saved hypothetical values, which may be stale or incomplete in meaning. Each string is nonempty and limited to 128 bytes. Explicit preview and evaluation require valid typed identifiers and a timestamp.
     *
     * @var VoiceSequenceSavedExecutionSample|null
     */
    protected $executionSample;
    /**
     * Stable identifier for a node within one sequence definition.
     *
     * @return string|null
     */
    public function getTriggerNodeId(): ?string
    {
        return $this->triggerNodeId;
    }
    /**
     * Stable identifier for a node within one sequence definition.
     *
     * @param string|null $triggerNodeId
     *
     * @return self
     */
    public function setTriggerNodeId(?string $triggerNodeId): self
    {
        $this->initialized['triggerNodeId'] = true;
        $this->triggerNodeId = $triggerNodeId;
        return $this;
    }
    /**
     * @return array<string, mixed>|null
     */
    public function getTriggerData(): ?iterable
    {
        return $this->triggerData;
    }
    /**
     * @param array<string, mixed>|null $triggerData
     *
     * @return self
     */
    public function setTriggerData(?iterable $triggerData): self
    {
        $this->initialized['triggerData'] = true;
        $this->triggerData = $triggerData;
        return $this;
    }
    /**
     * @return list<mixed>|null
     */
    public function getNodeSamples(): ?array
    {
        return $this->nodeSamples;
    }
    /**
     * @param list<mixed>|null $nodeSamples
     *
     * @return self
     */
    public function setNodeSamples(?array $nodeSamples): self
    {
        $this->initialized['nodeSamples'] = true;
        $this->nodeSamples = $nodeSamples;
        return $this;
    }
    /**
     * Saved hypothetical values, which may be stale or incomplete in meaning. Each string is nonempty and limited to 128 bytes. Explicit preview and evaluation require valid typed identifiers and a timestamp.
     *
     * @return VoiceSequenceSavedExecutionSample|null
     */
    public function getExecutionSample(): ?VoiceSequenceSavedExecutionSample
    {
        return $this->executionSample;
    }
    /**
     * Saved hypothetical values, which may be stale or incomplete in meaning. Each string is nonempty and limited to 128 bytes. Explicit preview and evaluation require valid typed identifiers and a timestamp.
     *
     * @param VoiceSequenceSavedExecutionSample|null $executionSample
     *
     * @return self
     */
    public function setExecutionSample(?VoiceSequenceSavedExecutionSample $executionSample): self
    {
        $this->initialized['executionSample'] = true;
        $this->executionSample = $executionSample;
        return $this;
    }
}
