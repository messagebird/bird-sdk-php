<?php

namespace MessageBird\Wire\Model;

class AMBSuppression
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
     * @var string|null
     */
    protected $businessAccountId;
    /**
     * Canonical E.164 phone number, or the exact opaque identifier Apple supplied.
     *
     * @var string|null
     */
    protected $address;
    /**
     * What kind of value `address` holds.
     * 
     * - `phone_number` means `address` is the customer's phone number. Apple's CloseSession event carries a phone number rather than an opaque identifier, so a suppression opened by a close on a conversation identified by phone number takes this kind.
     * - `opaque_user_id` means `address` is the opaque identifier Apple assigns to the customer's conversation with the business, stable across a close and a later re-initiation.
     * 
     *
     * @var string|null
     */
    protected $addressType;
    /**
     * Why the handle is suppressed. `manual` means it was added directly through this API or the dashboard. `opted_out` covers every case where Apple or the customer signaled they should not be contacted: a close, a permanent delivery failure, a declined invitation, or a stop keyword. This list grows over time, so treat an unknown value as informational rather than rejecting the record.
     * 
     *
     * @var string|null
     */
    protected $reason;
    /**
     * Who created the episode. user and api_key identify manual blocks. close_session and gone are protected automatic conversation facts. Phone invitation opt-outs are recorded as preferences.
     *
     * @var string|null
     */
    protected $origin;
    /**
     * Paths blocked by this episode. Treat unknown values as blocking.
     *
     * @var string|null
     */
    protected $appliesTo;
    /**
     * @var string|null
     */
    protected $sourceMessageId;
    /**
     * @var string|null
     */
    protected $sourceEventId;
    /**
     * @var string|null
     */
    protected $sourceEndMessageId;
    /**
     * When the blocking state took effect.
     *
     * @var \DateTime|null
     */
    protected $effectiveAt;
    /**
     * When Bird recorded this episode.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When Bird recorded the end, or null while active.
     *
     * @var \DateTime|null
     */
    protected $endedAt;
    /**
     * What ended the episode, or null while active. Customers can end only manual episodes.
     *
     * @var string|null
     */
    protected $endedReason;
    /**
     * When the end took effect, or null while active.
     *
     * @var \DateTime|null
     */
    protected $endedEffectiveAt;
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
     * @return string|null
     */
    public function getBusinessAccountId(): ?string
    {
        return $this->businessAccountId;
    }
    /**
     * @param string|null $businessAccountId
     *
     * @return self
     */
    public function setBusinessAccountId(?string $businessAccountId): self
    {
        $this->initialized['businessAccountId'] = true;
        $this->businessAccountId = $businessAccountId;
        return $this;
    }
    /**
     * Canonical E.164 phone number, or the exact opaque identifier Apple supplied.
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * Canonical E.164 phone number, or the exact opaque identifier Apple supplied.
     *
     * @param string|null $address
     *
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;
        return $this;
    }
    /**
     * What kind of value `address` holds.
     * 
     * - `phone_number` means `address` is the customer's phone number. Apple's CloseSession event carries a phone number rather than an opaque identifier, so a suppression opened by a close on a conversation identified by phone number takes this kind.
     * - `opaque_user_id` means `address` is the opaque identifier Apple assigns to the customer's conversation with the business, stable across a close and a later re-initiation.
     * 
     *
     * @return string|null
     */
    public function getAddressType(): ?string
    {
        return $this->addressType;
    }
    /**
    * What kind of value `address` holds.
    
    - `phone_number` means `address` is the customer's phone number. Apple's CloseSession event carries a phone number rather than an opaque identifier, so a suppression opened by a close on a conversation identified by phone number takes this kind.
    - `opaque_user_id` means `address` is the opaque identifier Apple assigns to the customer's conversation with the business, stable across a close and a later re-initiation.
    
    *
    * @param string|null $addressType
    *
    * @return self
    */
    public function setAddressType(?string $addressType): self
    {
        $this->initialized['addressType'] = true;
        $this->addressType = $addressType;
        return $this;
    }
    /**
     * Why the handle is suppressed. `manual` means it was added directly through this API or the dashboard. `opted_out` covers every case where Apple or the customer signaled they should not be contacted: a close, a permanent delivery failure, a declined invitation, or a stop keyword. This list grows over time, so treat an unknown value as informational rather than rejecting the record.
     * 
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
     * Why the handle is suppressed. `manual` means it was added directly through this API or the dashboard. `opted_out` covers every case where Apple or the customer signaled they should not be contacted: a close, a permanent delivery failure, a declined invitation, or a stop keyword. This list grows over time, so treat an unknown value as informational rather than rejecting the record.
     *
     * @param string|null $reason
     *
     * @return self
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
    /**
     * Who created the episode. user and api_key identify manual blocks. close_session and gone are protected automatic conversation facts. Phone invitation opt-outs are recorded as preferences.
     *
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }
    /**
     * Who created the episode. user and api_key identify manual blocks. close_session and gone are protected automatic conversation facts. Phone invitation opt-outs are recorded as preferences.
     *
     * @param string|null $origin
     *
     * @return self
     */
    public function setOrigin(?string $origin): self
    {
        $this->initialized['origin'] = true;
        $this->origin = $origin;
        return $this;
    }
    /**
     * Paths blocked by this episode. Treat unknown values as blocking.
     *
     * @return string|null
     */
    public function getAppliesTo(): ?string
    {
        return $this->appliesTo;
    }
    /**
     * Paths blocked by this episode. Treat unknown values as blocking.
     *
     * @param string|null $appliesTo
     *
     * @return self
     */
    public function setAppliesTo(?string $appliesTo): self
    {
        $this->initialized['appliesTo'] = true;
        $this->appliesTo = $appliesTo;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getSourceMessageId(): ?string
    {
        return $this->sourceMessageId;
    }
    /**
     * @param string|null $sourceMessageId
     *
     * @return self
     */
    public function setSourceMessageId(?string $sourceMessageId): self
    {
        $this->initialized['sourceMessageId'] = true;
        $this->sourceMessageId = $sourceMessageId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getSourceEventId(): ?string
    {
        return $this->sourceEventId;
    }
    /**
     * @param string|null $sourceEventId
     *
     * @return self
     */
    public function setSourceEventId(?string $sourceEventId): self
    {
        $this->initialized['sourceEventId'] = true;
        $this->sourceEventId = $sourceEventId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getSourceEndMessageId(): ?string
    {
        return $this->sourceEndMessageId;
    }
    /**
     * @param string|null $sourceEndMessageId
     *
     * @return self
     */
    public function setSourceEndMessageId(?string $sourceEndMessageId): self
    {
        $this->initialized['sourceEndMessageId'] = true;
        $this->sourceEndMessageId = $sourceEndMessageId;
        return $this;
    }
    /**
     * When the blocking state took effect.
     *
     * @return \DateTime|null
     */
    public function getEffectiveAt(): ?\DateTime
    {
        return $this->effectiveAt;
    }
    /**
     * When the blocking state took effect.
     *
     * @param \DateTime|null $effectiveAt
     *
     * @return self
     */
    public function setEffectiveAt(?\DateTime $effectiveAt): self
    {
        $this->initialized['effectiveAt'] = true;
        $this->effectiveAt = $effectiveAt;
        return $this;
    }
    /**
     * When Bird recorded this episode.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When Bird recorded this episode.
     *
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * When Bird recorded the end, or null while active.
     *
     * @return \DateTime|null
     */
    public function getEndedAt(): ?\DateTime
    {
        return $this->endedAt;
    }
    /**
     * When Bird recorded the end, or null while active.
     *
     * @param \DateTime|null $endedAt
     *
     * @return self
     */
    public function setEndedAt(?\DateTime $endedAt): self
    {
        $this->initialized['endedAt'] = true;
        $this->endedAt = $endedAt;
        return $this;
    }
    /**
     * What ended the episode, or null while active. Customers can end only manual episodes.
     *
     * @return string|null
     */
    public function getEndedReason(): ?string
    {
        return $this->endedReason;
    }
    /**
     * What ended the episode, or null while active. Customers can end only manual episodes.
     *
     * @param string|null $endedReason
     *
     * @return self
     */
    public function setEndedReason(?string $endedReason): self
    {
        $this->initialized['endedReason'] = true;
        $this->endedReason = $endedReason;
        return $this;
    }
    /**
     * When the end took effect, or null while active.
     *
     * @return \DateTime|null
     */
    public function getEndedEffectiveAt(): ?\DateTime
    {
        return $this->endedEffectiveAt;
    }
    /**
     * When the end took effect, or null while active.
     *
     * @param \DateTime|null $endedEffectiveAt
     *
     * @return self
     */
    public function setEndedEffectiveAt(?\DateTime $endedEffectiveAt): self
    {
        $this->initialized['endedEffectiveAt'] = true;
        $this->endedEffectiveAt = $endedEffectiveAt;
        return $this;
    }
}
