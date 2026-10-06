<?php

namespace MessageBird\Wire\Model;

class EsimRecurringPeriod
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
     * Start of the funded billing period. Package activation follows the accepted delivery mode.
     *
     * @var \DateTime|null
     */
    protected $periodStart;
    /**
     * End of the paid billing period. A recurring top-up package can expire at a different time; check the package’s expiry.
     *
     * @var \DateTime|null
     */
    protected $periodEnd;
    /**
     * Delivery outcome of a paid period.
     * 
     * - `pending`: package delivery has not been confirmed, including an uncertain network outcome.
     * - `completed`: the package was delivered.
     * - `failing`: delivery failed and the credit is being processed.
     * - `failed`: failure processing is complete. Check `refund_transaction_id` for an issued credit.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * @var Money|null
     */
    protected $netAmount;
    /**
     * @var Money|null
     */
    protected $taxAmount;
    /**
     * @var Money|null
     */
    protected $totalAmount;
    /**
     * Original wallet charge, or null for a free period.
     *
     * @var string|null
     */
    protected $walletTransactionId;
    /**
     * Confirmed wallet credit after definitive failure, or null when no credit was issued.
     *
     * @var string|null
     */
    protected $refundTransactionId;
    /**
     * Delivery order, or null before fulfillment starts.
     *
     * @var string|null
     */
    protected $orderId;
    /**
     * Delivery order state, or null before fulfillment starts.
     *
     * @var string|null
     */
    protected $orderStatus;
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
     * Start of the funded billing period. Package activation follows the accepted delivery mode.
     *
     * @return \DateTime|null
     */
    public function getPeriodStart(): ?\DateTime
    {
        return $this->periodStart;
    }
    /**
     * Start of the funded billing period. Package activation follows the accepted delivery mode.
     *
     * @param \DateTime|null $periodStart
     *
     * @return self
     */
    public function setPeriodStart(?\DateTime $periodStart): self
    {
        $this->initialized['periodStart'] = true;
        $this->periodStart = $periodStart;
        return $this;
    }
    /**
     * End of the paid billing period. A recurring top-up package can expire at a different time; check the package’s expiry.
     *
     * @return \DateTime|null
     */
    public function getPeriodEnd(): ?\DateTime
    {
        return $this->periodEnd;
    }
    /**
     * End of the paid billing period. A recurring top-up package can expire at a different time; check the package’s expiry.
     *
     * @param \DateTime|null $periodEnd
     *
     * @return self
     */
    public function setPeriodEnd(?\DateTime $periodEnd): self
    {
        $this->initialized['periodEnd'] = true;
        $this->periodEnd = $periodEnd;
        return $this;
    }
    /**
     * Delivery outcome of a paid period.
     * 
     * - `pending`: package delivery has not been confirmed, including an uncertain network outcome.
     * - `completed`: the package was delivered.
     * - `failing`: delivery failed and the credit is being processed.
     * - `failed`: failure processing is complete. Check `refund_transaction_id` for an issued credit.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Delivery outcome of a paid period.
    
    - `pending`: package delivery has not been confirmed, including an uncertain network outcome.
    - `completed`: the package was delivered.
    - `failing`: delivery failed and the credit is being processed.
    - `failed`: failure processing is complete. Check `refund_transaction_id` for an issued credit.
    
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
     * @return Money|null
     */
    public function getNetAmount(): ?Money
    {
        return $this->netAmount;
    }
    /**
     * @param Money|null $netAmount
     *
     * @return self
     */
    public function setNetAmount(?Money $netAmount): self
    {
        $this->initialized['netAmount'] = true;
        $this->netAmount = $netAmount;
        return $this;
    }
    /**
     * @return Money|null
     */
    public function getTaxAmount(): ?Money
    {
        return $this->taxAmount;
    }
    /**
     * @param Money|null $taxAmount
     *
     * @return self
     */
    public function setTaxAmount(?Money $taxAmount): self
    {
        $this->initialized['taxAmount'] = true;
        $this->taxAmount = $taxAmount;
        return $this;
    }
    /**
     * @return Money|null
     */
    public function getTotalAmount(): ?Money
    {
        return $this->totalAmount;
    }
    /**
     * @param Money|null $totalAmount
     *
     * @return self
     */
    public function setTotalAmount(?Money $totalAmount): self
    {
        $this->initialized['totalAmount'] = true;
        $this->totalAmount = $totalAmount;
        return $this;
    }
    /**
     * Original wallet charge, or null for a free period.
     *
     * @return string|null
     */
    public function getWalletTransactionId(): ?string
    {
        return $this->walletTransactionId;
    }
    /**
     * Original wallet charge, or null for a free period.
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
     * Confirmed wallet credit after definitive failure, or null when no credit was issued.
     *
     * @return string|null
     */
    public function getRefundTransactionId(): ?string
    {
        return $this->refundTransactionId;
    }
    /**
     * Confirmed wallet credit after definitive failure, or null when no credit was issued.
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
     * Delivery order, or null before fulfillment starts.
     *
     * @return string|null
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }
    /**
     * Delivery order, or null before fulfillment starts.
     *
     * @param string|null $orderId
     *
     * @return self
     */
    public function setOrderId(?string $orderId): self
    {
        $this->initialized['orderId'] = true;
        $this->orderId = $orderId;
        return $this;
    }
    /**
     * Delivery order state, or null before fulfillment starts.
     *
     * @return string|null
     */
    public function getOrderStatus(): ?string
    {
        return $this->orderStatus;
    }
    /**
     * Delivery order state, or null before fulfillment starts.
     *
     * @param string|null $orderStatus
     *
     * @return self
     */
    public function setOrderStatus(?string $orderStatus): self
    {
        $this->initialized['orderStatus'] = true;
        $this->orderStatus = $orderStatus;
        return $this;
    }
}
