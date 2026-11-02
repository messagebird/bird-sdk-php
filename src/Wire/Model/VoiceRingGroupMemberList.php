<?php

namespace MessageBird\Wire\Model;

/**
 * The ring group's members. Not paginated: a ring group holds at most 200 members, and the default group's members are the workspace's online users.
 */
class VoiceRingGroupMemberList
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
     * The members, in the order they joined; the default group's online users, by user ID.
     *
     * @var list<VoiceRingGroupMember>|null
     */
    protected $data;
    /**
     * The members, in the order they joined; the default group's online users, by user ID.
     *
     * @return list<VoiceRingGroupMember>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * The members, in the order they joined; the default group's online users, by user ID.
     *
     * @param list<VoiceRingGroupMember>|null $data
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
