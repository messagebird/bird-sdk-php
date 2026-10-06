<?php

namespace MessageBird\Wire\Model;

class EsimRecurringSubscription
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
     * Relationship between the paid period and package delivery.
     * 
     * - `exact_period`: the package covers the accepted paid interval.
     * - `recurring_top_up`: each funded period purchases a standard package. Activation, expiry, and accumulation follow that package’s terms.
     * 
     *
     * @var string|null
     */
    protected $deliveryMode;
    /**
     * @var string|null
     */
    protected $id;
    /**
     * The provisioned eSIM, or null while the initial purchase is pending.
     *
     * @var string|null
     */
    protected $esimId;
    /**
     * The initial purchase order, or null when recurrence was enrolled on an existing eSIM.
     *
     * @var string|null
     */
    protected $initialOrderId;
    /**
     * @var string|null
     */
    protected $subscriberId;
    /**
     * @var string|null
     */
    protected $offerId;
    /**
     * Delivery state of the recurring service. Check payment and renewal fields separately.
     * 
     * - `pending`: enrollment or the initial purchase is still being processed.
     * - `active`: the service has delivered a package and remains active.
     * - `needs_attention`: delivery or a related credit remains unresolved. Check period history and the associated order before purchasing a replacement.
     * - `ended`: recurrence has ended. Previously delivered packages keep their own validity.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * The financial subscription state, or null while acceptance is pending.
     *
     * @var string|null
     */
    protected $billingStatus;
    /**
     * The authoritative billing period boundary, or null while acceptance is pending.
     *
     * @var \DateTime|null
     */
    protected $currentPeriodStart;
    /**
     * The authoritative billing period boundary, or null while acceptance is pending.
     *
     * @var \DateTime|null
     */
    protected $currentPeriodEnd;
    /**
     * Whether future renewal is stopped at the current paid boundary.
     *
     * @var bool|null
     */
    protected $cancelAtPeriodEnd;
    /**
     * The order for the current billing period, or null before fulfillment starts.
     *
     * @var string|null
     */
    protected $latestOrderId;
    /**
     * When the recurring service was requested.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Accepted package price before tax, in its published currency. Null before Billing accepts enrollment.
     *
     * @var EsimRecurringSubscriptionPrice|null
     */
    protected $price;
    /**
     * Accepted cadence, or null before Billing accepts enrollment.
     *
     * @var string|null
     */
    protected $model;
    /**
     * Number of calendar months or fixed 24-hour days in each accepted period. Null before acceptance.
     *
     * @var int|null
     */
    protected $intervalCount;
    /**
     * Next scheduled renewal boundary. Null when enrollment is pending or future renewals have stopped.
     *
     * @var \DateTime|null
     */
    protected $nextRenewalAt;
    /**
     * When canceled recurrence ends: the paid boundary for scheduled cancellation, or the recorded cancellation time for an immediate stop. Null when renewal has not been stopped or no period was accepted. Paid packages remain available under their own validity.
     *
     * @var \DateTime|null
     */
    protected $cancellationEffectiveAt;
    /**
     * First recorded reason future renewal stopped. Null when no reason has been recorded. Delivery outcomes are available separately in period history.
     *
     * @var string|null
     */
    protected $stopReason;
    /**
     * Relationship between the paid period and package delivery.
     * 
     * - `exact_period`: the package covers the accepted paid interval.
     * - `recurring_top_up`: each funded period purchases a standard package. Activation, expiry, and accumulation follow that package’s terms.
     * 
     *
     * @return string|null
     */
    public function getDeliveryMode(): ?string
    {
        return $this->deliveryMode;
    }
    /**
    * Relationship between the paid period and package delivery.
    
    - `exact_period`: the package covers the accepted paid interval.
    - `recurring_top_up`: each funded period purchases a standard package. Activation, expiry, and accumulation follow that package’s terms.
    
    *
    * @param string|null $deliveryMode
    *
    * @return self
    */
    public function setDeliveryMode(?string $deliveryMode): self
    {
        $this->initialized['deliveryMode'] = true;
        $this->deliveryMode = $deliveryMode;
        return $this;
    }
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
     * The provisioned eSIM, or null while the initial purchase is pending.
     *
     * @return string|null
     */
    public function getEsimId(): ?string
    {
        return $this->esimId;
    }
    /**
     * The provisioned eSIM, or null while the initial purchase is pending.
     *
     * @param string|null $esimId
     *
     * @return self
     */
    public function setEsimId(?string $esimId): self
    {
        $this->initialized['esimId'] = true;
        $this->esimId = $esimId;
        return $this;
    }
    /**
     * The initial purchase order, or null when recurrence was enrolled on an existing eSIM.
     *
     * @return string|null
     */
    public function getInitialOrderId(): ?string
    {
        return $this->initialOrderId;
    }
    /**
     * The initial purchase order, or null when recurrence was enrolled on an existing eSIM.
     *
     * @param string|null $initialOrderId
     *
     * @return self
     */
    public function setInitialOrderId(?string $initialOrderId): self
    {
        $this->initialized['initialOrderId'] = true;
        $this->initialOrderId = $initialOrderId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getSubscriberId(): ?string
    {
        return $this->subscriberId;
    }
    /**
     * @param string|null $subscriberId
     *
     * @return self
     */
    public function setSubscriberId(?string $subscriberId): self
    {
        $this->initialized['subscriberId'] = true;
        $this->subscriberId = $subscriberId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getOfferId(): ?string
    {
        return $this->offerId;
    }
    /**
     * @param string|null $offerId
     *
     * @return self
     */
    public function setOfferId(?string $offerId): self
    {
        $this->initialized['offerId'] = true;
        $this->offerId = $offerId;
        return $this;
    }
    /**
     * Delivery state of the recurring service. Check payment and renewal fields separately.
     * 
     * - `pending`: enrollment or the initial purchase is still being processed.
     * - `active`: the service has delivered a package and remains active.
     * - `needs_attention`: delivery or a related credit remains unresolved. Check period history and the associated order before purchasing a replacement.
     * - `ended`: recurrence has ended. Previously delivered packages keep their own validity.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Delivery state of the recurring service. Check payment and renewal fields separately.
    
    - `pending`: enrollment or the initial purchase is still being processed.
    - `active`: the service has delivered a package and remains active.
    - `needs_attention`: delivery or a related credit remains unresolved. Check period history and the associated order before purchasing a replacement.
    - `ended`: recurrence has ended. Previously delivered packages keep their own validity.
    
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
     * The financial subscription state, or null while acceptance is pending.
     *
     * @return string|null
     */
    public function getBillingStatus(): ?string
    {
        return $this->billingStatus;
    }
    /**
     * The financial subscription state, or null while acceptance is pending.
     *
     * @param string|null $billingStatus
     *
     * @return self
     */
    public function setBillingStatus(?string $billingStatus): self
    {
        $this->initialized['billingStatus'] = true;
        $this->billingStatus = $billingStatus;
        return $this;
    }
    /**
     * The authoritative billing period boundary, or null while acceptance is pending.
     *
     * @return \DateTime|null
     */
    public function getCurrentPeriodStart(): ?\DateTime
    {
        return $this->currentPeriodStart;
    }
    /**
     * The authoritative billing period boundary, or null while acceptance is pending.
     *
     * @param \DateTime|null $currentPeriodStart
     *
     * @return self
     */
    public function setCurrentPeriodStart(?\DateTime $currentPeriodStart): self
    {
        $this->initialized['currentPeriodStart'] = true;
        $this->currentPeriodStart = $currentPeriodStart;
        return $this;
    }
    /**
     * The authoritative billing period boundary, or null while acceptance is pending.
     *
     * @return \DateTime|null
     */
    public function getCurrentPeriodEnd(): ?\DateTime
    {
        return $this->currentPeriodEnd;
    }
    /**
     * The authoritative billing period boundary, or null while acceptance is pending.
     *
     * @param \DateTime|null $currentPeriodEnd
     *
     * @return self
     */
    public function setCurrentPeriodEnd(?\DateTime $currentPeriodEnd): self
    {
        $this->initialized['currentPeriodEnd'] = true;
        $this->currentPeriodEnd = $currentPeriodEnd;
        return $this;
    }
    /**
     * Whether future renewal is stopped at the current paid boundary.
     *
     * @return bool|null
     */
    public function getCancelAtPeriodEnd(): ?bool
    {
        return $this->cancelAtPeriodEnd;
    }
    /**
     * Whether future renewal is stopped at the current paid boundary.
     *
     * @param bool|null $cancelAtPeriodEnd
     *
     * @return self
     */
    public function setCancelAtPeriodEnd(?bool $cancelAtPeriodEnd): self
    {
        $this->initialized['cancelAtPeriodEnd'] = true;
        $this->cancelAtPeriodEnd = $cancelAtPeriodEnd;
        return $this;
    }
    /**
     * The order for the current billing period, or null before fulfillment starts.
     *
     * @return string|null
     */
    public function getLatestOrderId(): ?string
    {
        return $this->latestOrderId;
    }
    /**
     * The order for the current billing period, or null before fulfillment starts.
     *
     * @param string|null $latestOrderId
     *
     * @return self
     */
    public function setLatestOrderId(?string $latestOrderId): self
    {
        $this->initialized['latestOrderId'] = true;
        $this->latestOrderId = $latestOrderId;
        return $this;
    }
    /**
     * When the recurring service was requested.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the recurring service was requested.
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
     * Accepted package price before tax, in its published currency. Null before Billing accepts enrollment.
     *
     * @return EsimRecurringSubscriptionPrice|null
     */
    public function getPrice(): ?EsimRecurringSubscriptionPrice
    {
        return $this->price;
    }
    /**
     * Accepted package price before tax, in its published currency. Null before Billing accepts enrollment.
     *
     * @param EsimRecurringSubscriptionPrice|null $price
     *
     * @return self
     */
    public function setPrice(?EsimRecurringSubscriptionPrice $price): self
    {
        $this->initialized['price'] = true;
        $this->price = $price;
        return $this;
    }
    /**
     * Accepted cadence, or null before Billing accepts enrollment.
     *
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }
    /**
     * Accepted cadence, or null before Billing accepts enrollment.
     *
     * @param string|null $model
     *
     * @return self
     */
    public function setModel(?string $model): self
    {
        $this->initialized['model'] = true;
        $this->model = $model;
        return $this;
    }
    /**
     * Number of calendar months or fixed 24-hour days in each accepted period. Null before acceptance.
     *
     * @return int|null
     */
    public function getIntervalCount(): ?int
    {
        return $this->intervalCount;
    }
    /**
     * Number of calendar months or fixed 24-hour days in each accepted period. Null before acceptance.
     *
     * @param int|null $intervalCount
     *
     * @return self
     */
    public function setIntervalCount(?int $intervalCount): self
    {
        $this->initialized['intervalCount'] = true;
        $this->intervalCount = $intervalCount;
        return $this;
    }
    /**
     * Next scheduled renewal boundary. Null when enrollment is pending or future renewals have stopped.
     *
     * @return \DateTime|null
     */
    public function getNextRenewalAt(): ?\DateTime
    {
        return $this->nextRenewalAt;
    }
    /**
     * Next scheduled renewal boundary. Null when enrollment is pending or future renewals have stopped.
     *
     * @param \DateTime|null $nextRenewalAt
     *
     * @return self
     */
    public function setNextRenewalAt(?\DateTime $nextRenewalAt): self
    {
        $this->initialized['nextRenewalAt'] = true;
        $this->nextRenewalAt = $nextRenewalAt;
        return $this;
    }
    /**
     * When canceled recurrence ends: the paid boundary for scheduled cancellation, or the recorded cancellation time for an immediate stop. Null when renewal has not been stopped or no period was accepted. Paid packages remain available under their own validity.
     *
     * @return \DateTime|null
     */
    public function getCancellationEffectiveAt(): ?\DateTime
    {
        return $this->cancellationEffectiveAt;
    }
    /**
     * When canceled recurrence ends: the paid boundary for scheduled cancellation, or the recorded cancellation time for an immediate stop. Null when renewal has not been stopped or no period was accepted. Paid packages remain available under their own validity.
     *
     * @param \DateTime|null $cancellationEffectiveAt
     *
     * @return self
     */
    public function setCancellationEffectiveAt(?\DateTime $cancellationEffectiveAt): self
    {
        $this->initialized['cancellationEffectiveAt'] = true;
        $this->cancellationEffectiveAt = $cancellationEffectiveAt;
        return $this;
    }
    /**
     * First recorded reason future renewal stopped. Null when no reason has been recorded. Delivery outcomes are available separately in period history.
     *
     * @return string|null
     */
    public function getStopReason(): ?string
    {
        return $this->stopReason;
    }
    /**
     * First recorded reason future renewal stopped. Null when no reason has been recorded. Delivery outcomes are available separately in period history.
     *
     * @param string|null $stopReason
     *
     * @return self
     */
    public function setStopReason(?string $stopReason): self
    {
        $this->initialized['stopReason'] = true;
        $this->stopReason = $stopReason;
        return $this;
    }
}
