<?php

namespace MessageBird\Wire\Model;

class WhatsAppGroupJoinRequestDecision
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
     * The join requests to act on, as returned by `GET /v1/whatsapp/groups/{group_id}/join-requests`. Each is decided on its own, so one can fail while the rest succeed. An ID that names no waiting request returns a `422` `WhatsAppGroupJoinRequestNotFound`. The 50 is Bird's own request bound, not a WhatsApp one: how many people the group can hold does not limit how many can queue at its link, so a rejection sweep is not held to the size of the group it is refusing entry to.
     * 
     *
     * @var list<string>|null
     */
    protected $joinRequestIds;
    /**
     * The join requests to act on, as returned by `GET /v1/whatsapp/groups/{group_id}/join-requests`. Each is decided on its own, so one can fail while the rest succeed. An ID that names no waiting request returns a `422` `WhatsAppGroupJoinRequestNotFound`. The 50 is Bird's own request bound, not a WhatsApp one: how many people the group can hold does not limit how many can queue at its link, so a rejection sweep is not held to the size of the group it is refusing entry to.
     * 
     *
     * @return list<string>|null
     */
    public function getJoinRequestIds(): ?array
    {
        return $this->joinRequestIds;
    }
    /**
     * The join requests to act on, as returned by `GET /v1/whatsapp/groups/{group_id}/join-requests`. Each is decided on its own, so one can fail while the rest succeed. An ID that names no waiting request returns a `422` `WhatsAppGroupJoinRequestNotFound`. The 50 is Bird's own request bound, not a WhatsApp one: how many people the group can hold does not limit how many can queue at its link, so a rejection sweep is not held to the size of the group it is refusing entry to.
     *
     * @param list<string>|null $joinRequestIds
     *
     * @return self
     */
    public function setJoinRequestIds(?array $joinRequestIds): self
    {
        $this->initialized['joinRequestIds'] = true;
        $this->joinRequestIds = $joinRequestIds;
        return $this;
    }
}
