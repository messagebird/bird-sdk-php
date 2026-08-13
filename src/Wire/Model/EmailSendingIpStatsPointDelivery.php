<?php

namespace MessageBird\Wire\Model;

class EmailSendingIpStatsPointDelivery extends \ArrayObject
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
     * Distinct recipients whose message the receiving mail server accepted.
     *
     * @var int|null
     */
    protected $delivered;
    /**
     * Distinct recipients whose delivery failed. This is approximately the sum of the five `bounces.*` sub-counts (hard, soft, admin, block, undetermined). The two are computed independently, so they can differ slightly.
     *
     * @var int|null
     */
    protected $bounced;
    /**
     * Distinct recipients who reported the message as spam. Complaints are not attributed to a sending IP, so this reads 0 on this breakdown. Read complaint counts from the summary or time-series statistics instead.
     *
     * @var int|null
     */
    protected $complained;
    /**
     * Distinct recipients in transient delivery deferral that is still being retried.
     *
     * @var int|null
     */
    protected $deferred;
    /**
     * Out-of-band bounce events: failure notifications received after the receiving server had initially confirmed delivery. Not attributed to a sending IP on this breakdown, so this reads 0. Workspace-wide out-of-band counts are on the summary and time-series statistics.
     * 
     *
     * @var int|null
     */
    protected $oobBounces;
    /**
     * Recipients on this IP who remain in-inbox after all bounce signals resolve, computed as `delivered - oob_bounces`. Clamped to 0 when `oob_bounces` exceeds `delivered`.
     *
     * @var int|null
     */
    protected $effectiveDelivered;
    /**
     * Total recipients on this IP who did not receive the message, computed as `bounced + oob_bounces`.
     *
     * @var int|null
     */
    protected $allBounces;
    /**
     * Share of this IP's delivery attempts that resulted in an out-of-band bounce, computed as `oob_bounces / (delivered + bounced)`. Null when `delivered + bounced` is zero (no attempts).
     *
     * @var float|null
     */
    protected $oobRate;
    /**
     * @var EmailSendingIpDeliveryStatsBounces|null
     */
    protected $bounces;
    /**
     * Share of this IP's delivery attempts that resulted in a message remaining in-inbox, computed as `effective_delivered / (delivered + bounced)`. Null when `delivered + bounced` is zero (no attempts).
     * 
     *
     * @var float|null
     */
    protected $deliveryRate;
    /**
     * Share of this IP's delivery attempts that ultimately failed (inband or out-of-band), computed as `all_bounces / (delivered + bounced)`. Null when `delivered + bounced` is zero (no attempts).
     * 
     *
     * @var float|null
     */
    protected $bounceRate;
    /**
     * Share of effectively delivered recipients on this IP who reported the message as spam, computed as `complained / effective_delivered`. Null when `effective_delivered` is zero.
     * 
     *
     * @var float|null
     */
    protected $complaintRate;
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
     * Distinct recipients whose delivery failed. This is approximately the sum of the five `bounces.*` sub-counts (hard, soft, admin, block, undetermined). The two are computed independently, so they can differ slightly.
     *
     * @return int|null
     */
    public function getBounced(): ?int
    {
        return $this->bounced;
    }
    /**
     * Distinct recipients whose delivery failed. This is approximately the sum of the five `bounces.*` sub-counts (hard, soft, admin, block, undetermined). The two are computed independently, so they can differ slightly.
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
     * Distinct recipients who reported the message as spam. Complaints are not attributed to a sending IP, so this reads 0 on this breakdown. Read complaint counts from the summary or time-series statistics instead.
     *
     * @return int|null
     */
    public function getComplained(): ?int
    {
        return $this->complained;
    }
    /**
     * Distinct recipients who reported the message as spam. Complaints are not attributed to a sending IP, so this reads 0 on this breakdown. Read complaint counts from the summary or time-series statistics instead.
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
     * Distinct recipients in transient delivery deferral that is still being retried.
     *
     * @return int|null
     */
    public function getDeferred(): ?int
    {
        return $this->deferred;
    }
    /**
     * Distinct recipients in transient delivery deferral that is still being retried.
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
     * Out-of-band bounce events: failure notifications received after the receiving server had initially confirmed delivery. Not attributed to a sending IP on this breakdown, so this reads 0. Workspace-wide out-of-band counts are on the summary and time-series statistics.
     * 
     *
     * @return int|null
     */
    public function getOobBounces(): ?int
    {
        return $this->oobBounces;
    }
    /**
     * Out-of-band bounce events: failure notifications received after the receiving server had initially confirmed delivery. Not attributed to a sending IP on this breakdown, so this reads 0. Workspace-wide out-of-band counts are on the summary and time-series statistics.
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
     * Recipients on this IP who remain in-inbox after all bounce signals resolve, computed as `delivered - oob_bounces`. Clamped to 0 when `oob_bounces` exceeds `delivered`.
     *
     * @return int|null
     */
    public function getEffectiveDelivered(): ?int
    {
        return $this->effectiveDelivered;
    }
    /**
     * Recipients on this IP who remain in-inbox after all bounce signals resolve, computed as `delivered - oob_bounces`. Clamped to 0 when `oob_bounces` exceeds `delivered`.
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
     * Total recipients on this IP who did not receive the message, computed as `bounced + oob_bounces`.
     *
     * @return int|null
     */
    public function getAllBounces(): ?int
    {
        return $this->allBounces;
    }
    /**
     * Total recipients on this IP who did not receive the message, computed as `bounced + oob_bounces`.
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
     * Share of this IP's delivery attempts that resulted in an out-of-band bounce, computed as `oob_bounces / (delivered + bounced)`. Null when `delivered + bounced` is zero (no attempts).
     *
     * @return float|null
     */
    public function getOobRate(): ?float
    {
        return $this->oobRate;
    }
    /**
     * Share of this IP's delivery attempts that resulted in an out-of-band bounce, computed as `oob_bounces / (delivered + bounced)`. Null when `delivered + bounced` is zero (no attempts).
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
     * @return EmailSendingIpDeliveryStatsBounces|null
     */
    public function getBounces(): ?EmailSendingIpDeliveryStatsBounces
    {
        return $this->bounces;
    }
    /**
     * @param EmailSendingIpDeliveryStatsBounces|null $bounces
     *
     * @return self
     */
    public function setBounces(?EmailSendingIpDeliveryStatsBounces $bounces): self
    {
        $this->initialized['bounces'] = true;
        $this->bounces = $bounces;
        return $this;
    }
    /**
     * Share of this IP's delivery attempts that resulted in a message remaining in-inbox, computed as `effective_delivered / (delivered + bounced)`. Null when `delivered + bounced` is zero (no attempts).
     * 
     *
     * @return float|null
     */
    public function getDeliveryRate(): ?float
    {
        return $this->deliveryRate;
    }
    /**
     * Share of this IP's delivery attempts that resulted in a message remaining in-inbox, computed as `effective_delivered / (delivered + bounced)`. Null when `delivered + bounced` is zero (no attempts).
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
     * Share of this IP's delivery attempts that ultimately failed (inband or out-of-band), computed as `all_bounces / (delivered + bounced)`. Null when `delivered + bounced` is zero (no attempts).
     * 
     *
     * @return float|null
     */
    public function getBounceRate(): ?float
    {
        return $this->bounceRate;
    }
    /**
     * Share of this IP's delivery attempts that ultimately failed (inband or out-of-band), computed as `all_bounces / (delivered + bounced)`. Null when `delivered + bounced` is zero (no attempts).
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
     * Share of effectively delivered recipients on this IP who reported the message as spam, computed as `complained / effective_delivered`. Null when `effective_delivered` is zero.
     * 
     *
     * @return float|null
     */
    public function getComplaintRate(): ?float
    {
        return $this->complaintRate;
    }
    /**
     * Share of effectively delivered recipients on this IP who reported the message as spam, computed as `complained / effective_delivered`. Null when `effective_delivered` is zero.
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
