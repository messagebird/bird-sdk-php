<?php

namespace MessageBird\Wire\Model;

class EmailBroadcastCounts
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
     * The broadcast these counts are for.
     *
     * @var string|null
     */
    protected $broadcastId;
    /**
     * Where the broadcast is in its lifecycle, so the counts read in context. Anything past `draft` or `scheduled` means these numbers describe an audience the broadcast has already been sent to, not one it is about to reach.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * What to do next, given where the broadcast is. On a broadcast that has already sent this names
     * the reads that carry delivery outcomes, which these counts never do. An empty list means there
     * is nothing to do; the field is absent entirely on responses that do not report next actions.
     * 
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * How many contacts are in the audience.
     *
     * @var int|null
     */
    protected $total;
    /**
     * How many of those contacts have an email address. A contact with no address is not counted. This is never higher than `total`.
     *
     * @var int|null
     */
    protected $addressable;
    /**
     * How many of the addressable contacts are not suppressed for this broadcast's category, which is who the email would actually go to. This is never higher than `addressable`. Which suppressions apply depends on the category, so the same audience can give a higher number for a transactional broadcast than for a marketing one. A transactional broadcast still reaches people who unsubscribed from or complained about marketing mail, and a marketing broadcast does not.
     * 
     *
     * @var int|null
     */
    protected $sendable;
    /**
     * The broadcast these counts are for.
     *
     * @return string|null
     */
    public function getBroadcastId(): ?string
    {
        return $this->broadcastId;
    }
    /**
     * The broadcast these counts are for.
     *
     * @param string|null $broadcastId
     *
     * @return self
     */
    public function setBroadcastId(?string $broadcastId): self
    {
        $this->initialized['broadcastId'] = true;
        $this->broadcastId = $broadcastId;
        return $this;
    }
    /**
     * Where the broadcast is in its lifecycle, so the counts read in context. Anything past `draft` or `scheduled` means these numbers describe an audience the broadcast has already been sent to, not one it is about to reach.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Where the broadcast is in its lifecycle, so the counts read in context. Anything past `draft` or `scheduled` means these numbers describe an audience the broadcast has already been sent to, not one it is about to reach.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * What to do next, given where the broadcast is. On a broadcast that has already sent this names
     * the reads that carry delivery outcomes, which these counts never do. An empty list means there
     * is nothing to do; the field is absent entirely on responses that do not report next actions.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
    * What to do next, given where the broadcast is. On a broadcast that has already sent this names
    the reads that carry delivery outcomes, which these counts never do. An empty list means there
    is nothing to do; the field is absent entirely on responses that do not report next actions.
    
    *
    * @param list<NextAction>|null $next
    *
    * @return self
    */
    public function setNext(?array $next): self
    {
        $this->initialized['next'] = true;
        $this->next = $next;
        return $this;
    }
    /**
     * How many contacts are in the audience.
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
    /**
     * How many contacts are in the audience.
     *
     * @param int|null $total
     *
     * @return self
     */
    public function setTotal(?int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
    /**
     * How many of those contacts have an email address. A contact with no address is not counted. This is never higher than `total`.
     *
     * @return int|null
     */
    public function getAddressable(): ?int
    {
        return $this->addressable;
    }
    /**
     * How many of those contacts have an email address. A contact with no address is not counted. This is never higher than `total`.
     *
     * @param int|null $addressable
     *
     * @return self
     */
    public function setAddressable(?int $addressable): self
    {
        $this->initialized['addressable'] = true;
        $this->addressable = $addressable;
        return $this;
    }
    /**
     * How many of the addressable contacts are not suppressed for this broadcast's category, which is who the email would actually go to. This is never higher than `addressable`. Which suppressions apply depends on the category, so the same audience can give a higher number for a transactional broadcast than for a marketing one. A transactional broadcast still reaches people who unsubscribed from or complained about marketing mail, and a marketing broadcast does not.
     * 
     *
     * @return int|null
     */
    public function getSendable(): ?int
    {
        return $this->sendable;
    }
    /**
     * How many of the addressable contacts are not suppressed for this broadcast's category, which is who the email would actually go to. This is never higher than `addressable`. Which suppressions apply depends on the category, so the same audience can give a higher number for a transactional broadcast than for a marketing one. A transactional broadcast still reaches people who unsubscribed from or complained about marketing mail, and a marketing broadcast does not.
     *
     * @param int|null $sendable
     *
     * @return self
     */
    public function setSendable(?int $sendable): self
    {
        $this->initialized['sendable'] = true;
        $this->sendable = $sendable;
        return $this;
    }
}
