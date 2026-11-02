<?php

namespace MessageBird\Wire\Model;

/**
 * The workspace's ring groups. Not paginated: a workspace holds at most 50 ring groups besides its default group.
 */
class VoiceRingGroupList
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
     * The default group first, then the other ring groups, oldest first.
     *
     * @var list<VoiceRingGroup>|null
     */
    protected $data;
    /**
     * The default group first, then the other ring groups, oldest first.
     *
     * @return list<VoiceRingGroup>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * The default group first, then the other ring groups, oldest first.
     *
     * @param list<VoiceRingGroup>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
