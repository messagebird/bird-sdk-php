<?php

namespace MessageBird\Wire\Model;

class EsimOrder extends \ArrayObject
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
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * @var string|null
     */
    protected $mode;
    /**
     * Offer purchased.
     *
     * @var string|null
     */
    protected $offerId;
    /**
     * Revision of the offer this order locked at creation. The quoted price stays that of this revision even if the offer changes later. The produced package snapshots its coverage at purchase; the zone's live country list governs new sales only.
     *
     * @var int|null
     */
    protected $offerRevision;
    /**
     * Coverage zone of the purchased offer, captured at creation.
     *
     * @var string|null
     */
    protected $zoneId;
    /**
     * The eSIM the package lands on. Set at creation when adding to an existing eSIM; set when provisioning starts for a new-eSIM order; null before that.
     *
     * @var string|null
     */
    protected $esimId;
    /**
     * Subscriber to assign when the new eSIM is delivered. Null when none was requested, including top-up orders, which retain the existing assignment.
     *
     * @var string|null
     */
    protected $subscriberId;
    /**
     * The recurring service associated with this purchase. Absent for one-time orders.
     *
     * @var string|null
     */
    protected $recurringSubscriptionId;
    /**
     * The purchased data package, set when the order completes; null before that.
     *
     * @var string|null
     */
    protected $packageId;
    /**
     * The quoted price, locked at creation in your billing currency. A `mode: test` order quotes this price and is never charged it, so its `wallet_transaction_id` stays null.
     *
     * @var EsimOrderPrice|null
     */
    protected $price;
    /**
     * The wallet transaction that paid for this order, for reconciling against your billing transactions. Null until the charge lands, and always null for a `mode: test` order, which is never charged.
     *
     * @var string|null
     */
    protected $walletTransactionId;
    /**
     * The wallet transaction that credited the charge back after a failure. Null unless the order failed after charging.
     *
     * @var string|null
     */
    protected $refundTransactionId;
    /**
     * Where install credentials are delivered once available. Present when requested at creation.
     *
     * @var EsimOrderDelivery|null
     */
    protected $delivery;
    /**
     * Details of an insufficient-funds attempt while the order is in `charging`. May be null even while the order is awaiting funds; a null value does not confirm payment. Check the order status and your wallet balance.
     *
     * @var EsimOrderFunding|null
     */
    protected $funding;
    /**
     * Reason the order failed. Null unless `status` is `failed`. Handle unrecognized codes without assuming the purchase succeeded.
     * 
     * - `canceled`: canceled while awaiting funds.
     * - `resolved_by_support`: support closed an unresolved order as failed.
     * - `esim_released`: the target profile became unavailable before delivery.
     * - `mode_mismatch`: the purchase could not be fulfilled in its original live or test mode.
     * 
     * Any charge is credited automatically. Check `refund_transaction_id` to confirm an issued credit.
     * 
     *
     * @var string|null
     */
    protected $failureCode;
    /**
     * Why the order failed, in plain terms. Null unless status is failed.
     *
     * @var string|null
     */
    protected $failureReason;
    /**
     * When the order reached completed. Null before that.
     *
     * @var \DateTime|null
     */
    protected $completedAt;
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
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
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
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
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
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
     * @return string|null
     */
    public function getMode(): ?string
    {
        return $this->mode;
    }
    /**
     * @param string|null $mode
     *
     * @return self
     */
    public function setMode(?string $mode): self
    {
        $this->initialized['mode'] = true;
        $this->mode = $mode;
        return $this;
    }
    /**
     * Offer purchased.
     *
     * @return string|null
     */
    public function getOfferId(): ?string
    {
        return $this->offerId;
    }
    /**
     * Offer purchased.
     *
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
     * Revision of the offer this order locked at creation. The quoted price stays that of this revision even if the offer changes later. The produced package snapshots its coverage at purchase; the zone's live country list governs new sales only.
     *
     * @return int|null
     */
    public function getOfferRevision(): ?int
    {
        return $this->offerRevision;
    }
    /**
     * Revision of the offer this order locked at creation. The quoted price stays that of this revision even if the offer changes later. The produced package snapshots its coverage at purchase; the zone's live country list governs new sales only.
     *
     * @param int|null $offerRevision
     *
     * @return self
     */
    public function setOfferRevision(?int $offerRevision): self
    {
        $this->initialized['offerRevision'] = true;
        $this->offerRevision = $offerRevision;
        return $this;
    }
    /**
     * Coverage zone of the purchased offer, captured at creation.
     *
     * @return string|null
     */
    public function getZoneId(): ?string
    {
        return $this->zoneId;
    }
    /**
     * Coverage zone of the purchased offer, captured at creation.
     *
     * @param string|null $zoneId
     *
     * @return self
     */
    public function setZoneId(?string $zoneId): self
    {
        $this->initialized['zoneId'] = true;
        $this->zoneId = $zoneId;
        return $this;
    }
    /**
     * The eSIM the package lands on. Set at creation when adding to an existing eSIM; set when provisioning starts for a new-eSIM order; null before that.
     *
     * @return string|null
     */
    public function getEsimId(): ?string
    {
        return $this->esimId;
    }
    /**
     * The eSIM the package lands on. Set at creation when adding to an existing eSIM; set when provisioning starts for a new-eSIM order; null before that.
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
     * Subscriber to assign when the new eSIM is delivered. Null when none was requested, including top-up orders, which retain the existing assignment.
     *
     * @return string|null
     */
    public function getSubscriberId(): ?string
    {
        return $this->subscriberId;
    }
    /**
     * Subscriber to assign when the new eSIM is delivered. Null when none was requested, including top-up orders, which retain the existing assignment.
     *
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
     * The recurring service associated with this purchase. Absent for one-time orders.
     *
     * @return string|null
     */
    public function getRecurringSubscriptionId(): ?string
    {
        return $this->recurringSubscriptionId;
    }
    /**
     * The recurring service associated with this purchase. Absent for one-time orders.
     *
     * @param string|null $recurringSubscriptionId
     *
     * @return self
     */
    public function setRecurringSubscriptionId(?string $recurringSubscriptionId): self
    {
        $this->initialized['recurringSubscriptionId'] = true;
        $this->recurringSubscriptionId = $recurringSubscriptionId;
        return $this;
    }
    /**
     * The purchased data package, set when the order completes; null before that.
     *
     * @return string|null
     */
    public function getPackageId(): ?string
    {
        return $this->packageId;
    }
    /**
     * The purchased data package, set when the order completes; null before that.
     *
     * @param string|null $packageId
     *
     * @return self
     */
    public function setPackageId(?string $packageId): self
    {
        $this->initialized['packageId'] = true;
        $this->packageId = $packageId;
        return $this;
    }
    /**
     * The quoted price, locked at creation in your billing currency. A `mode: test` order quotes this price and is never charged it, so its `wallet_transaction_id` stays null.
     *
     * @return EsimOrderPrice|null
     */
    public function getPrice(): ?EsimOrderPrice
    {
        return $this->price;
    }
    /**
     * The quoted price, locked at creation in your billing currency. A `mode: test` order quotes this price and is never charged it, so its `wallet_transaction_id` stays null.
     *
     * @param EsimOrderPrice|Money|array|null $price
     *
     * @return self
     */
    public function setPrice($price): self
    {
        $this->initialized['price'] = true;
        $this->price = \MessageBird\Core\ModelWrapper::normalize($price, EsimOrderPrice::class);
        return $this;
    }
    /**
     * The wallet transaction that paid for this order, for reconciling against your billing transactions. Null until the charge lands, and always null for a `mode: test` order, which is never charged.
     *
     * @return string|null
     */
    public function getWalletTransactionId(): ?string
    {
        return $this->walletTransactionId;
    }
    /**
     * The wallet transaction that paid for this order, for reconciling against your billing transactions. Null until the charge lands, and always null for a `mode: test` order, which is never charged.
     *
     * @param string|null $walletTransactionId
     *
     * @return self
     */
    public function setWalletTransactionId(?string $walletTransactionId): self
    {
        $this->initialized['walletTransactionId'] = true;
        $this->walletTransactionId = $walletTransactionId;
        return $this;
    }
    /**
     * The wallet transaction that credited the charge back after a failure. Null unless the order failed after charging.
     *
     * @return string|null
     */
    public function getRefundTransactionId(): ?string
    {
        return $this->refundTransactionId;
    }
    /**
     * The wallet transaction that credited the charge back after a failure. Null unless the order failed after charging.
     *
     * @param string|null $refundTransactionId
     *
     * @return self
     */
    public function setRefundTransactionId(?string $refundTransactionId): self
    {
        $this->initialized['refundTransactionId'] = true;
        $this->refundTransactionId = $refundTransactionId;
        return $this;
    }
    /**
     * Where install credentials are delivered once available. Present when requested at creation.
     *
     * @return EsimOrderDelivery|null
     */
    public function getDelivery(): ?EsimOrderDelivery
    {
        return $this->delivery;
    }
    /**
     * Where install credentials are delivered once available. Present when requested at creation.
     *
     * @param EsimOrderDelivery|EsimDelivery|array|null $delivery
     *
     * @return self
     */
    public function setDelivery($delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = \MessageBird\Core\ModelWrapper::normalize($delivery, EsimOrderDelivery::class);
        return $this;
    }
    /**
     * Details of an insufficient-funds attempt while the order is in `charging`. May be null even while the order is awaiting funds; a null value does not confirm payment. Check the order status and your wallet balance.
     *
     * @return EsimOrderFunding|null
     */
    public function getFunding(): ?EsimOrderFunding
    {
        return $this->funding;
    }
    /**
     * Details of an insufficient-funds attempt while the order is in `charging`. May be null even while the order is awaiting funds; a null value does not confirm payment. Check the order status and your wallet balance.
     *
     * @param EsimOrderFunding|null $funding
     *
     * @return self
     */
    public function setFunding(?EsimOrderFunding $funding): self
    {
        $this->initialized['funding'] = true;
        $this->funding = $funding;
        return $this;
    }
    /**
     * Reason the order failed. Null unless `status` is `failed`. Handle unrecognized codes without assuming the purchase succeeded.
     * 
     * - `canceled`: canceled while awaiting funds.
     * - `resolved_by_support`: support closed an unresolved order as failed.
     * - `esim_released`: the target profile became unavailable before delivery.
     * - `mode_mismatch`: the purchase could not be fulfilled in its original live or test mode.
     * 
     * Any charge is credited automatically. Check `refund_transaction_id` to confirm an issued credit.
     * 
     *
     * @return string|null
     */
    public function getFailureCode(): ?string
    {
        return $this->failureCode;
    }
    /**
    * Reason the order failed. Null unless `status` is `failed`. Handle unrecognized codes without assuming the purchase succeeded.
    
    - `canceled`: canceled while awaiting funds.
    - `resolved_by_support`: support closed an unresolved order as failed.
    - `esim_released`: the target profile became unavailable before delivery.
    - `mode_mismatch`: the purchase could not be fulfilled in its original live or test mode.
    
    Any charge is credited automatically. Check `refund_transaction_id` to confirm an issued credit.
    
    *
    * @param string|null $failureCode
    *
    * @return self
    */
    public function setFailureCode(?string $failureCode): self
    {
        $this->initialized['failureCode'] = true;
        $this->failureCode = $failureCode;
        return $this;
    }
    /**
     * Why the order failed, in plain terms. Null unless status is failed.
     *
     * @return string|null
     */
    public function getFailureReason(): ?string
    {
        return $this->failureReason;
    }
    /**
     * Why the order failed, in plain terms. Null unless status is failed.
     *
     * @param string|null $failureReason
     *
     * @return self
     */
    public function setFailureReason(?string $failureReason): self
    {
        $this->initialized['failureReason'] = true;
        $this->failureReason = $failureReason;
        return $this;
    }
    /**
     * When the order reached completed. Null before that.
     *
     * @return \DateTime|null
     */
    public function getCompletedAt(): ?\DateTime
    {
        return $this->completedAt;
    }
    /**
     * When the order reached completed. Null before that.
     *
     * @param \DateTime|null $completedAt
     *
     * @return self
     */
    public function setCompletedAt(?\DateTime $completedAt): self
    {
        $this->initialized['completedAt'] = true;
        $this->completedAt = $completedAt;
        return $this;
    }
}
