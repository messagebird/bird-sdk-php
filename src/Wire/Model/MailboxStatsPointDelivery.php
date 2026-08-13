<?php

namespace MessageBird\Wire\Model;

class MailboxStatsPointDelivery extends \ArrayObject
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
     * Distinct recipients accepted for delivery after suppression filtering. Reported on time buckets and the period summary. Breakdown rows leave it out, because their rollups do not have it.
     *
     * @var int|null
     */
    protected $accepted;
    /**
     * Distinct recipients whose message was processed and handed off for delivery.
     *
     * @var int|null
     */
    protected $processed;
    /**
     * Distinct recipients whose message the receiving mail server accepted.
     *
     * @var int|null
     */
    protected $delivered;
    /**
     * Distinct recipients whose delivery failed. This is approximately the sum of the five `bounces.*` sub-counts (hard, soft, admin, block, undetermined). The two totals are worked out independently, so they can differ slightly.
     * 
     *
     * @var int|null
     */
    protected $bounced;
    /**
     * @var EmailDeliveryStatsBounces|null
     */
    protected $bounces;
    /**
     * Distinct recipients who reported the message as spam via a feedback loop.
     *
     * @var int|null
     */
    protected $complained;
    /**
     * Distinct recipients whose delivery the receiving server temporarily delayed and is still being retried.
     * 
     *
     * @var int|null
     */
    protected $deferred;
    /**
     * Distinct recipients rejected before any delivery attempt. Includes recipients on the workspace suppression list, transmissions that could not be completed, message-generation failures, and recipients refused by sending policy. The per-recipient `rejection_reason` field on `GET /v1/email/messages/{message_id}/recipients` surfaces the specific cause.
     * 
     *
     * @var int|null
     */
    protected $rejected;
    /**
     * Out-of-band bounce events: distinct failure notifications received after the receiving server had initially confirmed delivery. Counted as deduplicated events, not unique recipients.
     * 
     *
     * @var int|null
     */
    protected $oobBounces;
    /**
     * Recipients who remain in-inbox in this scope after all bounce signals resolve, computed as `delivered - oob_bounces`. Use this as the base for engagement-rate denominators. Clamped to 0 when `oob_bounces` exceeds `delivered`.
     *
     * @var int|null
     */
    protected $effectiveDelivered;
    /**
     * Total recipients in this scope who did not receive the message, computed as `bounced + oob_bounces`.
     *
     * @var int|null
     */
    protected $allBounces;
    /**
     * Share of this scope's delivery attempts that resulted in an out-of-band bounce, computed as `oob_bounces / (delivered + bounced)`. Null when there were no attempts.
     *
     * @var float|null
     */
    protected $oobRate;
    /**
     * Share of this scope's delivery attempts that resulted in a message remaining in-inbox, computed as `effective_delivered / (delivered + bounced)`. Null when there were no attempts.
     * 
     *
     * @var float|null
     */
    protected $deliveryRate;
    /**
     * Share of this scope's delivery attempts that ultimately failed (inband or out-of-band), computed as `all_bounces / (delivered + bounced)`. Because `oob_bounces` counts events rather than recipients, `all_bounces` can exceed the attempt count. The rate is clamped to 1. Null when there were no attempts.
     * 
     *
     * @var float|null
     */
    protected $bounceRate;
    /**
     * Spam complaints in this scope relative to effectively delivered recipients, computed as `complained / effective_delivered`. Complaints are attributed by event time, so a scope can record more of them than it effectively delivered, pushing the rate above 1. Null when `effective_delivered` is zero.
     * 
     *
     * @var float|null
     */
    protected $complaintRate;
    /**
     * Distinct recipients accepted for delivery after suppression filtering. Reported on time buckets and the period summary. Breakdown rows leave it out, because their rollups do not have it.
     *
     * @return int|null
     */
    public function getAccepted(): ?int
    {
        return $this->accepted;
    }
    /**
     * Distinct recipients accepted for delivery after suppression filtering. Reported on time buckets and the period summary. Breakdown rows leave it out, because their rollups do not have it.
     *
     * @param int|null $accepted
     *
     * @return self
     */
    public function setAccepted(?int $accepted): self
    {
        $this->initialized['accepted'] = true;
        $this->accepted = $accepted;
        return $this;
    }
    /**
     * Distinct recipients whose message was processed and handed off for delivery.
     *
     * @return int|null
     */
    public function getProcessed(): ?int
    {
        return $this->processed;
    }
    /**
     * Distinct recipients whose message was processed and handed off for delivery.
     *
     * @param int|null $processed
     *
     * @return self
     */
    public function setProcessed(?int $processed): self
    {
        $this->initialized['processed'] = true;
        $this->processed = $processed;
        return $this;
    }
    /**
     * Distinct recipients whose message the receiving mail server accepted.
     *
     * @return int|null
     */
    public function getDelivered(): ?int
    {
        return $this->delivered;
    }
    /**
     * Distinct recipients whose message the receiving mail server accepted.
     *
     * @param int|null $delivered
     *
     * @return self
     */
    public function setDelivered(?int $delivered): self
    {
        $this->initialized['delivered'] = true;
        $this->delivered = $delivered;
        return $this;
    }
    /**
     * Distinct recipients whose delivery failed. This is approximately the sum of the five `bounces.*` sub-counts (hard, soft, admin, block, undetermined). The two totals are worked out independently, so they can differ slightly.
     * 
     *
     * @return int|null
     */
    public function getBounced(): ?int
    {
        return $this->bounced;
    }
    /**
     * Distinct recipients whose delivery failed. This is approximately the sum of the five `bounces.*` sub-counts (hard, soft, admin, block, undetermined). The two totals are worked out independently, so they can differ slightly.
     *
     * @param int|null $bounced
     *
     * @return self
     */
    public function setBounced(?int $bounced): self
    {
        $this->initialized['bounced'] = true;
        $this->bounced = $bounced;
        return $this;
    }
    /**
     * @return EmailDeliveryStatsBounces|null
     */
    public function getBounces(): ?EmailDeliveryStatsBounces
    {
        return $this->bounces;
    }
    /**
     * @param EmailDeliveryStatsBounces|null $bounces
     *
     * @return self
     */
    public function setBounces(?EmailDeliveryStatsBounces $bounces): self
    {
        $this->initialized['bounces'] = true;
        $this->bounces = $bounces;
        return $this;
    }
    /**
     * Distinct recipients who reported the message as spam via a feedback loop.
     *
     * @return int|null
     */
    public function getComplained(): ?int
    {
        return $this->complained;
    }
    /**
     * Distinct recipients who reported the message as spam via a feedback loop.
     *
     * @param int|null $complained
     *
     * @return self
     */
    public function setComplained(?int $complained): self
    {
        $this->initialized['complained'] = true;
        $this->complained = $complained;
        return $this;
    }
    /**
     * Distinct recipients whose delivery the receiving server temporarily delayed and is still being retried.
     * 
     *
     * @return int|null
     */
    public function getDeferred(): ?int
    {
        return $this->deferred;
    }
    /**
     * Distinct recipients whose delivery the receiving server temporarily delayed and is still being retried.
     *
     * @param int|null $deferred
     *
     * @return self
     */
    public function setDeferred(?int $deferred): self
    {
        $this->initialized['deferred'] = true;
        $this->deferred = $deferred;
        return $this;
    }
    /**
     * Distinct recipients rejected before any delivery attempt. Includes recipients on the workspace suppression list, transmissions that could not be completed, message-generation failures, and recipients refused by sending policy. The per-recipient `rejection_reason` field on `GET /v1/email/messages/{message_id}/recipients` surfaces the specific cause.
     * 
     *
     * @return int|null
     */
    public function getRejected(): ?int
    {
        return $this->rejected;
    }
    /**
     * Distinct recipients rejected before any delivery attempt. Includes recipients on the workspace suppression list, transmissions that could not be completed, message-generation failures, and recipients refused by sending policy. The per-recipient `rejection_reason` field on `GET /v1/email/messages/{message_id}/recipients` surfaces the specific cause.
     *
     * @param int|null $rejected
     *
     * @return self
     */
    public function setRejected(?int $rejected): self
    {
        $this->initialized['rejected'] = true;
        $this->rejected = $rejected;
        return $this;
    }
    /**
     * Out-of-band bounce events: distinct failure notifications received after the receiving server had initially confirmed delivery. Counted as deduplicated events, not unique recipients.
     * 
     *
     * @return int|null
     */
    public function getOobBounces(): ?int
    {
        return $this->oobBounces;
    }
    /**
     * Out-of-band bounce events: distinct failure notifications received after the receiving server had initially confirmed delivery. Counted as deduplicated events, not unique recipients.
     *
     * @param int|null $oobBounces
     *
     * @return self
     */
    public function setOobBounces(?int $oobBounces): self
    {
        $this->initialized['oobBounces'] = true;
        $this->oobBounces = $oobBounces;
        return $this;
    }
    /**
     * Recipients who remain in-inbox in this scope after all bounce signals resolve, computed as `delivered - oob_bounces`. Use this as the base for engagement-rate denominators. Clamped to 0 when `oob_bounces` exceeds `delivered`.
     *
     * @return int|null
     */
    public function getEffectiveDelivered(): ?int
    {
        return $this->effectiveDelivered;
    }
    /**
     * Recipients who remain in-inbox in this scope after all bounce signals resolve, computed as `delivered - oob_bounces`. Use this as the base for engagement-rate denominators. Clamped to 0 when `oob_bounces` exceeds `delivered`.
     *
     * @param int|null $effectiveDelivered
     *
     * @return self
     */
    public function setEffectiveDelivered(?int $effectiveDelivered): self
    {
        $this->initialized['effectiveDelivered'] = true;
        $this->effectiveDelivered = $effectiveDelivered;
        return $this;
    }
    /**
     * Total recipients in this scope who did not receive the message, computed as `bounced + oob_bounces`.
     *
     * @return int|null
     */
    public function getAllBounces(): ?int
    {
        return $this->allBounces;
    }
    /**
     * Total recipients in this scope who did not receive the message, computed as `bounced + oob_bounces`.
     *
     * @param int|null $allBounces
     *
     * @return self
     */
    public function setAllBounces(?int $allBounces): self
    {
        $this->initialized['allBounces'] = true;
        $this->allBounces = $allBounces;
        return $this;
    }
    /**
     * Share of this scope's delivery attempts that resulted in an out-of-band bounce, computed as `oob_bounces / (delivered + bounced)`. Null when there were no attempts.
     *
     * @return float|null
     */
    public function getOobRate(): ?float
    {
        return $this->oobRate;
    }
    /**
     * Share of this scope's delivery attempts that resulted in an out-of-band bounce, computed as `oob_bounces / (delivered + bounced)`. Null when there were no attempts.
     *
     * @param float|null $oobRate
     *
     * @return self
     */
    public function setOobRate(?float $oobRate): self
    {
        $this->initialized['oobRate'] = true;
        $this->oobRate = $oobRate;
        return $this;
    }
    /**
     * Share of this scope's delivery attempts that resulted in a message remaining in-inbox, computed as `effective_delivered / (delivered + bounced)`. Null when there were no attempts.
     * 
     *
     * @return float|null
     */
    public function getDeliveryRate(): ?float
    {
        return $this->deliveryRate;
    }
    /**
     * Share of this scope's delivery attempts that resulted in a message remaining in-inbox, computed as `effective_delivered / (delivered + bounced)`. Null when there were no attempts.
     *
     * @param float|null $deliveryRate
     *
     * @return self
     */
    public function setDeliveryRate(?float $deliveryRate): self
    {
        $this->initialized['deliveryRate'] = true;
        $this->deliveryRate = $deliveryRate;
        return $this;
    }
    /**
     * Share of this scope's delivery attempts that ultimately failed (inband or out-of-band), computed as `all_bounces / (delivered + bounced)`. Because `oob_bounces` counts events rather than recipients, `all_bounces` can exceed the attempt count. The rate is clamped to 1. Null when there were no attempts.
     * 
     *
     * @return float|null
     */
    public function getBounceRate(): ?float
    {
        return $this->bounceRate;
    }
    /**
     * Share of this scope's delivery attempts that ultimately failed (inband or out-of-band), computed as `all_bounces / (delivered + bounced)`. Because `oob_bounces` counts events rather than recipients, `all_bounces` can exceed the attempt count. The rate is clamped to 1. Null when there were no attempts.
     *
     * @param float|null $bounceRate
     *
     * @return self
     */
    public function setBounceRate(?float $bounceRate): self
    {
        $this->initialized['bounceRate'] = true;
        $this->bounceRate = $bounceRate;
        return $this;
    }
    /**
     * Spam complaints in this scope relative to effectively delivered recipients, computed as `complained / effective_delivered`. Complaints are attributed by event time, so a scope can record more of them than it effectively delivered, pushing the rate above 1. Null when `effective_delivered` is zero.
     * 
     *
     * @return float|null
     */
    public function getComplaintRate(): ?float
    {
        return $this->complaintRate;
    }
    /**
     * Spam complaints in this scope relative to effectively delivered recipients, computed as `complained / effective_delivered`. Complaints are attributed by event time, so a scope can record more of them than it effectively delivered, pushing the rate above 1. Null when `effective_delivered` is zero.
     *
     * @param float|null $complaintRate
     *
     * @return self
     */
    public function setComplaintRate(?float $complaintRate): self
    {
        $this->initialized['complaintRate'] = true;
        $this->complaintRate = $complaintRate;
        return $this;
    }
}
