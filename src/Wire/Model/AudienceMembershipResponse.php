<?php

namespace MessageBird\Wire\Model;

class AudienceMembershipResponse
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
     * Exact count of all audience members at the source evaluation instant, including contacts without email and unsubscribed contacts.
     *
     * @var AudienceMembershipSummary|null
     */
    protected $membership;
    /**
     * Exact count of all audience members at the source evaluation instant, including contacts without email and unsubscribed contacts.
     *
     * @return AudienceMembershipSummary|null
     */
    public function getMembership(): ?AudienceMembershipSummary
    {
        return $this->membership;
    }
    /**
     * Exact count of all audience members at the source evaluation instant, including contacts without email and unsubscribed contacts.
     *
     * @param AudienceMembershipSummary|null $membership
     *
     * @return self
     */
    public function setMembership(?AudienceMembershipSummary $membership): self
    {
        $this->initialized['membership'] = true;
        $this->membership = $membership;
        return $this;
    }
}
