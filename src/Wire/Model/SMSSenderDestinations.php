<?php

namespace MessageBird\Wire\Model;

/**
 * Where this sender stands with the destinations it is set up for, grouped by whose move is
 * next.
 * 
 * These are not every country the sender could reach. `pending` and `needs_attention` cover
 * only countries you hold a registration for, so a country you could register for but have not,
 * or one you have simply not switched on, appears in none of the three: there is nothing
 * outstanding there. To see everything reachable and what each country would take, read
 * [Get sender requirements](/docs/api/reference/list-workspace-sms-sender-requirements).
 */
class SMSSenderDestinations
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
     * Countries you can send to today: switched on in your SMS destination settings, and either asking for no registration or holding an approved one. A country counts here however it became usable, including one enabled for you automatically when your organization set its business address.
     * 
     *
     * @var list<string>|null
     */
    protected $active;
    /**
     * Countries whose registration is under way and waiting on us or on a carrier. Nothing is asked of you for these; they move to `active` when the registration is approved.
     * 
     *
     * @var list<string>|null
     */
    protected $pending;
    /**
     * Countries you have registered for that are not working, and so are waiting on you: the registration was refused or withdrawn, or it is approved but the destination is switched off in your SMS destination settings. While this sender's number is missing the paperwork proving you own it, every country you have registered for is listed here, because none of them can carry a message until that is settled.
     * 
     *
     * @var list<string>|null
     */
    protected $needsAttention;
    /**
     * Countries you can send to today: switched on in your SMS destination settings, and either asking for no registration or holding an approved one. A country counts here however it became usable, including one enabled for you automatically when your organization set its business address.
     * 
     *
     * @return list<string>|null
     */
    public function getActive(): ?array
    {
        return $this->active;
    }
    /**
     * Countries you can send to today: switched on in your SMS destination settings, and either asking for no registration or holding an approved one. A country counts here however it became usable, including one enabled for you automatically when your organization set its business address.
     *
     * @param list<string>|null $active
     *
     * @return self
     */
    public function setActive(?array $active): self
    {
        $this->initialized['active'] = true;
        $this->active = $active;
        return $this;
    }
    /**
     * Countries whose registration is under way and waiting on us or on a carrier. Nothing is asked of you for these; they move to `active` when the registration is approved.
     * 
     *
     * @return list<string>|null
     */
    public function getPending(): ?array
    {
        return $this->pending;
    }
    /**
     * Countries whose registration is under way and waiting on us or on a carrier. Nothing is asked of you for these; they move to `active` when the registration is approved.
     *
     * @param list<string>|null $pending
     *
     * @return self
     */
    public function setPending(?array $pending): self
    {
        $this->initialized['pending'] = true;
        $this->pending = $pending;
        return $this;
    }
    /**
     * Countries you have registered for that are not working, and so are waiting on you: the registration was refused or withdrawn, or it is approved but the destination is switched off in your SMS destination settings. While this sender's number is missing the paperwork proving you own it, every country you have registered for is listed here, because none of them can carry a message until that is settled.
     * 
     *
     * @return list<string>|null
     */
    public function getNeedsAttention(): ?array
    {
        return $this->needsAttention;
    }
    /**
     * Countries you have registered for that are not working, and so are waiting on you: the registration was refused or withdrawn, or it is approved but the destination is switched off in your SMS destination settings. While this sender's number is missing the paperwork proving you own it, every country you have registered for is listed here, because none of them can carry a message until that is settled.
     *
     * @param list<string>|null $needsAttention
     *
     * @return self
     */
    public function setNeedsAttention(?array $needsAttention): self
    {
        $this->initialized['needsAttention'] = true;
        $this->needsAttention = $needsAttention;
        return $this;
    }
}
