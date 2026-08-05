<?php

namespace MessageBird\Wire\Model;

class EmailMailboxProviderStatsPointDelivery extends \ArrayObject
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
     * Distinct recipients whose delivery failed. Approximately the sum of the five `bounces.*` sub-counts (hard, soft, admin, block, undetermined); the totals are computed independently so they may differ slightly at the approximation error.
     *
     * @var int|null
     */
    protected $bounced;
    /**
     * Distinct recipients who reported the message as spam.
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
     * @var EmailMailboxProviderDeliveryStatsBounces|null
     */
    protected $bounces;
    /**
     * Share of attempted recipients on this mailbox provider that were delivered, computed as `delivered / (delivered + bounced)`. Null when `delivered + bounced` is zero (no attempts).
     * 
     *
     * @var float|null
     */
    protected $deliveryRate;
    /**
     * Share of attempted recipients on this mailbox provider that bounced, computed as `bounced / (delivered + bounced)`. Null when `delivered + bounced` is zero (no attempts).
     * 
     *
     * @var float|null
     */
    protected $bounceRate;
    /**
     * Share of delivered recipients on this mailbox provider who reported the message as spam, computed as `complained / delivered`. Null when `delivered` is zero.
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
     * Distinct recipients whose delivery failed. Approximately the sum of the five `bounces.*` sub-counts (hard, soft, admin, block, undetermined); the totals are computed independently so they may differ slightly at the approximation error.
     *
     * @return int|null
     */
    public function getBounced(): ?int
    {
        return $this->bounced;
    }
    /**
     * Distinct recipients whose delivery failed. Approximately the sum of the five `bounces.*` sub-counts (hard, soft, admin, block, undetermined); the totals are computed independently so they may differ slightly at the approximation error.
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
     * Distinct recipients who reported the message as spam.
     *
     * @return int|null
     */
    public function getComplained(): ?int
    {
        return $this->complained;
    }
    /**
     * Distinct recipients who reported the message as spam.
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
     * @return EmailMailboxProviderDeliveryStatsBounces|null
     */
    public function getBounces(): ?EmailMailboxProviderDeliveryStatsBounces
    {
        return $this->bounces;
    }
    /**
     * @param EmailMailboxProviderDeliveryStatsBounces|null $bounces
     *
     * @return self
     */
    public function setBounces(?EmailMailboxProviderDeliveryStatsBounces $bounces): self
    {
        $this->initialized['bounces'] = true;
        $this->bounces = $bounces;
        return $this;
    }
    /**
     * Share of attempted recipients on this mailbox provider that were delivered, computed as `delivered / (delivered + bounced)`. Null when `delivered + bounced` is zero (no attempts).
     * 
     *
     * @return float|null
     */
    public function getDeliveryRate(): ?float
    {
        return $this->deliveryRate;
    }
    /**
     * Share of attempted recipients on this mailbox provider that were delivered, computed as `delivered / (delivered + bounced)`. Null when `delivered + bounced` is zero (no attempts).
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
     * Share of attempted recipients on this mailbox provider that bounced, computed as `bounced / (delivered + bounced)`. Null when `delivered + bounced` is zero (no attempts).
     * 
     *
     * @return float|null
     */
    public function getBounceRate(): ?float
    {
        return $this->bounceRate;
    }
    /**
     * Share of attempted recipients on this mailbox provider that bounced, computed as `bounced / (delivered + bounced)`. Null when `delivered + bounced` is zero (no attempts).
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
     * Share of delivered recipients on this mailbox provider who reported the message as spam, computed as `complained / delivered`. Null when `delivered` is zero.
     * 
     *
     * @return float|null
     */
    public function getComplaintRate(): ?float
    {
        return $this->complaintRate;
    }
    /**
     * Share of delivered recipients on this mailbox provider who reported the message as spam, computed as `complained / delivered`. Null when `delivered` is zero.
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
