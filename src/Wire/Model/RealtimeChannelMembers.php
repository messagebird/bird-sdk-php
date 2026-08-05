<?php

namespace MessageBird\Wire\Model;

class RealtimeChannelMembers
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
     * @var list<RealtimeChannelMember>|null
     */
    protected $members;
    /**
     * @return list<RealtimeChannelMember>|null
     */
    public function getMembers(): ?array
    {
        return $this->members;
    }
    /**
     * @param list<RealtimeChannelMember>|null $members
     *
     * @return self
     */
    public function setMembers(?array $members): self
    {
        $this->initialized['members'] = true;
        $this->members = $members;
        return $this;
    }
}
