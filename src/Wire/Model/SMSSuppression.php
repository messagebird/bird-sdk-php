<?php

namespace MessageBird\Wire\Model;

class SMSSuppression
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
     * The subscriber, in E.164 format.
     *
     * @var string|null
     */
    protected $destination;
    /**
     * The sender this stops. A suppression covers one sender, so your other senders still reach this subscriber. Opting out of one of your programs does not opt out of the others.
     * 
     *
     * @var string|null
     */
    protected $originator;
    /**
     * @var string|null
     */
    protected $reason;
    /**
     * @var string|null
     */
    protected $origin;
    /**
     * @var string|null
     */
    protected $appliesTo;
    /**
     * Whether this is stopping messages right now. Always true in a list, which carries only the suppressions in force; false when you fetch one by ID that has since ended, which is also when `ended_at` is set.
     * 
     *
     * @var bool|null
     */
    protected $blocking;
    /**
     * The inbound message the subscriber opted out with, or the outbound message whose delivery report reported the opt-out. Null when neither applies.
     * 
     *
     * @var string|null
     */
    protected $sourceSmsId;
    /**
     * When the subscriber opted out, as reported by whoever reported it. This is what orders one subscriber's history, and it can be earlier than `created_at` when a message reached us late.
     * 
     *
     * @var \DateTime|null
     */
    protected $effectiveAt;
    /**
     * When this stopped applying. Null while it is still stopping messages.
     *
     * @var \DateTime|null
     */
    protected $endedAt;
    /**
     * What ended it. Null while it is still stopping messages.
     *
     * @var string|null
     */
    protected $endedReason;
    /**
     * When the subscriber opted back in, as reported. Null while it is still stopping messages.
     *
     * @var \DateTime|null
     */
    protected $endedEffectiveAt;
    /**
     * The inbound message the subscriber opted back in with, when there was one. Null while it is still stopping messages, and when something other than a start keyword ended it.
     * 
     *
     * @var string|null
     */
    protected $sourceEndSmsId;
    /**
     * When we recorded it.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When we last recorded the subscriber opting out of this sender. Later than `created_at` when they texted a stop keyword again while already suppressed, which adds no new record but does earn another confirmation reply.
     * 
     *
     * @var \DateTime|null
     */
    protected $lastAssertedAt;
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
     * The subscriber, in E.164 format.
     *
     * @return string|null
     */
    public function getDestination(): ?string
    {
        return $this->destination;
    }
    /**
     * The subscriber, in E.164 format.
     *
     * @param string|null $destination
     *
     * @return self
     */
    public function setDestination(?string $destination): self
    {
        $this->initialized['destination'] = true;
        $this->destination = $destination;
        return $this;
    }
    /**
     * The sender this stops. A suppression covers one sender, so your other senders still reach this subscriber. Opting out of one of your programs does not opt out of the others.
     * 
     *
     * @return string|null
     */
    public function getOriginator(): ?string
    {
        return $this->originator;
    }
    /**
     * The sender this stops. A suppression covers one sender, so your other senders still reach this subscriber. Opting out of one of your programs does not opt out of the others.
     *
     * @param string|null $originator
     *
     * @return self
     */
    public function setOriginator(?string $originator): self
    {
        $this->initialized['originator'] = true;
        $this->originator = $originator;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
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
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }
    /**
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
     * @return string|null
     */
    public function getAppliesTo(): ?string
    {
        return $this->appliesTo;
    }
    /**
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
     * Whether this is stopping messages right now. Always true in a list, which carries only the suppressions in force; false when you fetch one by ID that has since ended, which is also when `ended_at` is set.
     * 
     *
     * @return bool|null
     */
    public function getBlocking(): ?bool
    {
        return $this->blocking;
    }
    /**
     * Whether this is stopping messages right now. Always true in a list, which carries only the suppressions in force; false when you fetch one by ID that has since ended, which is also when `ended_at` is set.
     *
     * @param bool|null $blocking
     *
     * @return self
     */
    public function setBlocking(?bool $blocking): self
    {
        $this->initialized['blocking'] = true;
        $this->blocking = $blocking;
        return $this;
    }
    /**
     * The inbound message the subscriber opted out with, or the outbound message whose delivery report reported the opt-out. Null when neither applies.
     * 
     *
     * @return string|null
     */
    public function getSourceSmsId(): ?string
    {
        return $this->sourceSmsId;
    }
    /**
     * The inbound message the subscriber opted out with, or the outbound message whose delivery report reported the opt-out. Null when neither applies.
     *
     * @param string|null $sourceSmsId
     *
     * @return self
     */
    public function setSourceSmsId(?string $sourceSmsId): self
    {
        $this->initialized['sourceSmsId'] = true;
        $this->sourceSmsId = $sourceSmsId;
        return $this;
    }
    /**
     * When the subscriber opted out, as reported by whoever reported it. This is what orders one subscriber's history, and it can be earlier than `created_at` when a message reached us late.
     * 
     *
     * @return \DateTime|null
     */
    public function getEffectiveAt(): ?\DateTime
    {
        return $this->effectiveAt;
    }
    /**
     * When the subscriber opted out, as reported by whoever reported it. This is what orders one subscriber's history, and it can be earlier than `created_at` when a message reached us late.
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
     * When this stopped applying. Null while it is still stopping messages.
     *
     * @return \DateTime|null
     */
    public function getEndedAt(): ?\DateTime
    {
        return $this->endedAt;
    }
    /**
     * When this stopped applying. Null while it is still stopping messages.
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
     * What ended it. Null while it is still stopping messages.
     *
     * @return string|null
     */
    public function getEndedReason(): ?string
    {
        return $this->endedReason;
    }
    /**
     * What ended it. Null while it is still stopping messages.
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
     * When the subscriber opted back in, as reported. Null while it is still stopping messages.
     *
     * @return \DateTime|null
     */
    public function getEndedEffectiveAt(): ?\DateTime
    {
        return $this->endedEffectiveAt;
    }
    /**
     * When the subscriber opted back in, as reported. Null while it is still stopping messages.
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
    /**
     * The inbound message the subscriber opted back in with, when there was one. Null while it is still stopping messages, and when something other than a start keyword ended it.
     * 
     *
     * @return string|null
     */
    public function getSourceEndSmsId(): ?string
    {
        return $this->sourceEndSmsId;
    }
    /**
     * The inbound message the subscriber opted back in with, when there was one. Null while it is still stopping messages, and when something other than a start keyword ended it.
     *
     * @param string|null $sourceEndSmsId
     *
     * @return self
     */
    public function setSourceEndSmsId(?string $sourceEndSmsId): self
    {
        $this->initialized['sourceEndSmsId'] = true;
        $this->sourceEndSmsId = $sourceEndSmsId;
        return $this;
    }
    /**
     * When we recorded it.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When we recorded it.
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
     * When we last recorded the subscriber opting out of this sender. Later than `created_at` when they texted a stop keyword again while already suppressed, which adds no new record but does earn another confirmation reply.
     * 
     *
     * @return \DateTime|null
     */
    public function getLastAssertedAt(): ?\DateTime
    {
        return $this->lastAssertedAt;
    }
    /**
     * When we last recorded the subscriber opting out of this sender. Later than `created_at` when they texted a stop keyword again while already suppressed, which adds no new record but does earn another confirmation reply.
     *
     * @param \DateTime|null $lastAssertedAt
     *
     * @return self
     */
    public function setLastAssertedAt(?\DateTime $lastAssertedAt): self
    {
        $this->initialized['lastAssertedAt'] = true;
        $this->lastAssertedAt = $lastAssertedAt;
        return $this;
    }
}
