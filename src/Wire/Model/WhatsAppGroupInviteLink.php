<?php

namespace MessageBird\Wire\Model;

class WhatsAppGroupInviteLink
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
     * The group's one invite link. Every link the group had before this one stops working.
     *
     * @var string|null
     */
    protected $inviteLink;
    /**
     * The group's one invite link. Every link the group had before this one stops working.
     *
     * @return string|null
     */
    public function getInviteLink(): ?string
    {
        return $this->inviteLink;
    }
    /**
     * The group's one invite link. Every link the group had before this one stops working.
     *
     * @param string|null $inviteLink
     *
     * @return self
     */
    public function setInviteLink(?string $inviteLink): self
    {
        $this->initialized['inviteLink'] = true;
        $this->inviteLink = $inviteLink;
        return $this;
    }
}
