<?php

namespace MessageBird\Wire\Model;

class CreateVoiceCallSequenceRequest
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
     * Stable identifier for a node within one sequence definition.
     *
     * @var string|null
     */
    protected $entryNodeId;
    /**
     * Data matching the selected entry's configured schema, limited to 16 KiB before and after normalization. Use an empty object when the entry needs no data. Fields remain application data and cannot provide trusted call identity or routing authority.
     *
     * @var array<string, mixed>|null
     */
    protected $triggerData;
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
     * Stable identifier for a node within one sequence definition.
     *
     * @return string|null
     */
    public function getEntryNodeId(): ?string
    {
        return $this->entryNodeId;
    }
    /**
     * Stable identifier for a node within one sequence definition.
     *
     * @param string|null $entryNodeId
     *
     * @return self
     */
    public function setEntryNodeId(?string $entryNodeId): self
    {
        $this->initialized['entryNodeId'] = true;
        $this->entryNodeId = $entryNodeId;
        return $this;
    }
    /**
     * Data matching the selected entry's configured schema, limited to 16 KiB before and after normalization. Use an empty object when the entry needs no data. Fields remain application data and cannot provide trusted call identity or routing authority.
     *
     * @return array<string, mixed>|null
     */
    public function getTriggerData(): ?iterable
    {
        return $this->triggerData;
    }
    /**
     * Data matching the selected entry's configured schema, limited to 16 KiB before and after normalization. Use an empty object when the entry needs no data. Fields remain application data and cannot provide trusted call identity or routing authority.
     *
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
}
