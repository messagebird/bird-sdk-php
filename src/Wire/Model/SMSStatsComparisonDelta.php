<?php

namespace MessageBird\Wire\Model;

class SMSStatsComparisonDelta extends \ArrayObject
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
     * Relative change in accepted messages (`delivery.accepted`) versus the previous period, as a signed fraction. Null when the previous period accepted none.
     *
     * @var float|null
     */
    protected $acceptedPctChange;
    /**
     * Relative change in sent messages (`delivery.sent`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @var float|null
     */
    protected $sentPctChange;
    /**
     * Relative change in delivered messages (`delivery.delivered`) versus the previous period, as a signed fraction. Null when the previous period delivered none.
     *
     * @var float|null
     */
    protected $deliveredPctChange;
    /**
     * Relative change in undelivered messages (`delivery.undelivered`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @var float|null
     */
    protected $undeliveredPctChange;
    /**
     * Relative change in failed messages (`delivery.failed`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @var float|null
     */
    protected $failedPctChange;
    /**
     * Relative change in rejected messages (`delivery.rejected`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @var float|null
     */
    protected $rejectedPctChange;
    /**
     * Relative change in expired messages (`delivery.expired`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @var float|null
     */
    protected $expiredPctChange;
    /**
     * Signed difference between this period's and the previous period's delivery rate, both fractions in [0,1] (multiply by 100 for percentage points). Null when either period's delivery rate is undefined.
     *
     * @var float|null
     */
    protected $deliveryRatePp;
    /**
     * Signed difference between the current and previous failure-rate fractions. Multiply by 100 for percentage points. The value can fall outside `[-1, 1]` because a message can contribute to more than one failure outcome and high-volume counts are approximate. Null when either rate is undefined.
     * 
     *
     * @var float|null
     */
    protected $failureRatePp;
    /**
     * Relative change in accepted messages (`delivery.accepted`) versus the previous period, as a signed fraction. Null when the previous period accepted none.
     *
     * @return float|null
     */
    public function getAcceptedPctChange(): ?float
    {
        return $this->acceptedPctChange;
    }
    /**
     * Relative change in accepted messages (`delivery.accepted`) versus the previous period, as a signed fraction. Null when the previous period accepted none.
     *
     * @param float|null $acceptedPctChange
     *
     * @return self
     */
    public function setAcceptedPctChange(?float $acceptedPctChange): self
    {
        $this->initialized['acceptedPctChange'] = true;
        $this->acceptedPctChange = $acceptedPctChange;
        return $this;
    }
    /**
     * Relative change in sent messages (`delivery.sent`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @return float|null
     */
    public function getSentPctChange(): ?float
    {
        return $this->sentPctChange;
    }
    /**
     * Relative change in sent messages (`delivery.sent`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @param float|null $sentPctChange
     *
     * @return self
     */
    public function setSentPctChange(?float $sentPctChange): self
    {
        $this->initialized['sentPctChange'] = true;
        $this->sentPctChange = $sentPctChange;
        return $this;
    }
    /**
     * Relative change in delivered messages (`delivery.delivered`) versus the previous period, as a signed fraction. Null when the previous period delivered none.
     *
     * @return float|null
     */
    public function getDeliveredPctChange(): ?float
    {
        return $this->deliveredPctChange;
    }
    /**
     * Relative change in delivered messages (`delivery.delivered`) versus the previous period, as a signed fraction. Null when the previous period delivered none.
     *
     * @param float|null $deliveredPctChange
     *
     * @return self
     */
    public function setDeliveredPctChange(?float $deliveredPctChange): self
    {
        $this->initialized['deliveredPctChange'] = true;
        $this->deliveredPctChange = $deliveredPctChange;
        return $this;
    }
    /**
     * Relative change in undelivered messages (`delivery.undelivered`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @return float|null
     */
    public function getUndeliveredPctChange(): ?float
    {
        return $this->undeliveredPctChange;
    }
    /**
     * Relative change in undelivered messages (`delivery.undelivered`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @param float|null $undeliveredPctChange
     *
     * @return self
     */
    public function setUndeliveredPctChange(?float $undeliveredPctChange): self
    {
        $this->initialized['undeliveredPctChange'] = true;
        $this->undeliveredPctChange = $undeliveredPctChange;
        return $this;
    }
    /**
     * Relative change in failed messages (`delivery.failed`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @return float|null
     */
    public function getFailedPctChange(): ?float
    {
        return $this->failedPctChange;
    }
    /**
     * Relative change in failed messages (`delivery.failed`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @param float|null $failedPctChange
     *
     * @return self
     */
    public function setFailedPctChange(?float $failedPctChange): self
    {
        $this->initialized['failedPctChange'] = true;
        $this->failedPctChange = $failedPctChange;
        return $this;
    }
    /**
     * Relative change in rejected messages (`delivery.rejected`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @return float|null
     */
    public function getRejectedPctChange(): ?float
    {
        return $this->rejectedPctChange;
    }
    /**
     * Relative change in rejected messages (`delivery.rejected`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @param float|null $rejectedPctChange
     *
     * @return self
     */
    public function setRejectedPctChange(?float $rejectedPctChange): self
    {
        $this->initialized['rejectedPctChange'] = true;
        $this->rejectedPctChange = $rejectedPctChange;
        return $this;
    }
    /**
     * Relative change in expired messages (`delivery.expired`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @return float|null
     */
    public function getExpiredPctChange(): ?float
    {
        return $this->expiredPctChange;
    }
    /**
     * Relative change in expired messages (`delivery.expired`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @param float|null $expiredPctChange
     *
     * @return self
     */
    public function setExpiredPctChange(?float $expiredPctChange): self
    {
        $this->initialized['expiredPctChange'] = true;
        $this->expiredPctChange = $expiredPctChange;
        return $this;
    }
    /**
     * Signed difference between this period's and the previous period's delivery rate, both fractions in [0,1] (multiply by 100 for percentage points). Null when either period's delivery rate is undefined.
     *
     * @return float|null
     */
    public function getDeliveryRatePp(): ?float
    {
        return $this->deliveryRatePp;
    }
    /**
     * Signed difference between this period's and the previous period's delivery rate, both fractions in [0,1] (multiply by 100 for percentage points). Null when either period's delivery rate is undefined.
     *
     * @param float|null $deliveryRatePp
     *
     * @return self
     */
    public function setDeliveryRatePp(?float $deliveryRatePp): self
    {
        $this->initialized['deliveryRatePp'] = true;
        $this->deliveryRatePp = $deliveryRatePp;
        return $this;
    }
    /**
     * Signed difference between the current and previous failure-rate fractions. Multiply by 100 for percentage points. The value can fall outside `[-1, 1]` because a message can contribute to more than one failure outcome and high-volume counts are approximate. Null when either rate is undefined.
     * 
     *
     * @return float|null
     */
    public function getFailureRatePp(): ?float
    {
        return $this->failureRatePp;
    }
    /**
     * Signed difference between the current and previous failure-rate fractions. Multiply by 100 for percentage points. The value can fall outside `[-1, 1]` because a message can contribute to more than one failure outcome and high-volume counts are approximate. Null when either rate is undefined.
     *
     * @param float|null $failureRatePp
     *
     * @return self
     */
    public function setFailureRatePp(?float $failureRatePp): self
    {
        $this->initialized['failureRatePp'] = true;
        $this->failureRatePp = $failureRatePp;
        return $this;
    }
}
