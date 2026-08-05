<?php

namespace MessageBird\Wire\Model;

class EmailStatsComparisonDelta extends \ArrayObject
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
     * Relative change in accepted messages (the `sends_accepted` count) versus the previous period, as a signed fraction. Null when the previous period accepted none.
     *
     * @var float|null
     */
    protected $sendsAcceptedPctChange;
    /**
     * Relative change in effectively delivered recipients (`delivery.effective_delivered`, the delivery-rate numerator) versus the previous period, as a signed fraction. Null when the previous period effectively delivered none.
     *
     * @var float|null
     */
    protected $deliveredPctChange;
    /**
     * Relative change in total bounces including out-of-band (`delivery.all_bounces`, the bounce-rate numerator) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @var float|null
     */
    protected $bouncedPctChange;
    /**
     * Relative change in spam complaints (`delivery.complained`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @var float|null
     */
    protected $complainedPctChange;
    /**
     * Relative change in unique non-prefetched opens (`engagement.unique_opens_non_prefetched`, the same count the open rate uses) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @var float|null
     */
    protected $openedPctChange;
    /**
     * Signed difference between this period's and the previous period's delivery rate, both fractions in [0,1] (multiply by 100 for percentage points). Null when either period's delivery rate is undefined.
     *
     * @var float|null
     */
    protected $deliveryRatePp;
    /**
     * Signed difference between this period's and the previous period's open rate, both fractions (multiply by 100 for percentage points). Null when either period's open rate is undefined.
     *
     * @var float|null
     */
    protected $openRatePp;
    /**
     * Signed difference between this period's and the previous period's click rate, both fractions (multiply by 100 for percentage points). Null when either period's click rate is undefined.
     *
     * @var float|null
     */
    protected $clickRatePp;
    /**
     * Signed difference between this period's and the previous period's bounce rate, both fractions in [0,1] (multiply by 100 for percentage points). Null when either period's bounce rate is undefined.
     *
     * @var float|null
     */
    protected $bounceRatePp;
    /**
     * Signed difference between this period's and the previous period's complaint rate, both fractions (multiply by 100 for percentage points). Null when either period's complaint rate is undefined.
     *
     * @var float|null
     */
    protected $complaintRatePp;
    /**
     * Signed difference between this period's and the previous period's unsubscribe rate, both fractions (multiply by 100 for percentage points). Null when either period's unsubscribe rate is undefined.
     *
     * @var float|null
     */
    protected $unsubscribeRatePp;
    /**
     * Relative change in accepted messages (the `sends_accepted` count) versus the previous period, as a signed fraction. Null when the previous period accepted none.
     *
     * @return float|null
     */
    public function getSendsAcceptedPctChange(): ?float
    {
        return $this->sendsAcceptedPctChange;
    }
    /**
     * Relative change in accepted messages (the `sends_accepted` count) versus the previous period, as a signed fraction. Null when the previous period accepted none.
     *
     * @param float|null $sendsAcceptedPctChange
     *
     * @return self
     */
    public function setSendsAcceptedPctChange(?float $sendsAcceptedPctChange): self
    {
        $this->initialized['sendsAcceptedPctChange'] = true;
        $this->sendsAcceptedPctChange = $sendsAcceptedPctChange;
        return $this;
    }
    /**
     * Relative change in effectively delivered recipients (`delivery.effective_delivered`, the delivery-rate numerator) versus the previous period, as a signed fraction. Null when the previous period effectively delivered none.
     *
     * @return float|null
     */
    public function getDeliveredPctChange(): ?float
    {
        return $this->deliveredPctChange;
    }
    /**
     * Relative change in effectively delivered recipients (`delivery.effective_delivered`, the delivery-rate numerator) versus the previous period, as a signed fraction. Null when the previous period effectively delivered none.
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
     * Relative change in total bounces including out-of-band (`delivery.all_bounces`, the bounce-rate numerator) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @return float|null
     */
    public function getBouncedPctChange(): ?float
    {
        return $this->bouncedPctChange;
    }
    /**
     * Relative change in total bounces including out-of-band (`delivery.all_bounces`, the bounce-rate numerator) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @param float|null $bouncedPctChange
     *
     * @return self
     */
    public function setBouncedPctChange(?float $bouncedPctChange): self
    {
        $this->initialized['bouncedPctChange'] = true;
        $this->bouncedPctChange = $bouncedPctChange;
        return $this;
    }
    /**
     * Relative change in spam complaints (`delivery.complained`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @return float|null
     */
    public function getComplainedPctChange(): ?float
    {
        return $this->complainedPctChange;
    }
    /**
     * Relative change in spam complaints (`delivery.complained`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @param float|null $complainedPctChange
     *
     * @return self
     */
    public function setComplainedPctChange(?float $complainedPctChange): self
    {
        $this->initialized['complainedPctChange'] = true;
        $this->complainedPctChange = $complainedPctChange;
        return $this;
    }
    /**
     * Relative change in unique non-prefetched opens (`engagement.unique_opens_non_prefetched`, the same count the open rate uses) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @return float|null
     */
    public function getOpenedPctChange(): ?float
    {
        return $this->openedPctChange;
    }
    /**
     * Relative change in unique non-prefetched opens (`engagement.unique_opens_non_prefetched`, the same count the open rate uses) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @param float|null $openedPctChange
     *
     * @return self
     */
    public function setOpenedPctChange(?float $openedPctChange): self
    {
        $this->initialized['openedPctChange'] = true;
        $this->openedPctChange = $openedPctChange;
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
     * Signed difference between this period's and the previous period's open rate, both fractions (multiply by 100 for percentage points). Null when either period's open rate is undefined.
     *
     * @return float|null
     */
    public function getOpenRatePp(): ?float
    {
        return $this->openRatePp;
    }
    /**
     * Signed difference between this period's and the previous period's open rate, both fractions (multiply by 100 for percentage points). Null when either period's open rate is undefined.
     *
     * @param float|null $openRatePp
     *
     * @return self
     */
    public function setOpenRatePp(?float $openRatePp): self
    {
        $this->initialized['openRatePp'] = true;
        $this->openRatePp = $openRatePp;
        return $this;
    }
    /**
     * Signed difference between this period's and the previous period's click rate, both fractions (multiply by 100 for percentage points). Null when either period's click rate is undefined.
     *
     * @return float|null
     */
    public function getClickRatePp(): ?float
    {
        return $this->clickRatePp;
    }
    /**
     * Signed difference between this period's and the previous period's click rate, both fractions (multiply by 100 for percentage points). Null when either period's click rate is undefined.
     *
     * @param float|null $clickRatePp
     *
     * @return self
     */
    public function setClickRatePp(?float $clickRatePp): self
    {
        $this->initialized['clickRatePp'] = true;
        $this->clickRatePp = $clickRatePp;
        return $this;
    }
    /**
     * Signed difference between this period's and the previous period's bounce rate, both fractions in [0,1] (multiply by 100 for percentage points). Null when either period's bounce rate is undefined.
     *
     * @return float|null
     */
    public function getBounceRatePp(): ?float
    {
        return $this->bounceRatePp;
    }
    /**
     * Signed difference between this period's and the previous period's bounce rate, both fractions in [0,1] (multiply by 100 for percentage points). Null when either period's bounce rate is undefined.
     *
     * @param float|null $bounceRatePp
     *
     * @return self
     */
    public function setBounceRatePp(?float $bounceRatePp): self
    {
        $this->initialized['bounceRatePp'] = true;
        $this->bounceRatePp = $bounceRatePp;
        return $this;
    }
    /**
     * Signed difference between this period's and the previous period's complaint rate, both fractions (multiply by 100 for percentage points). Null when either period's complaint rate is undefined.
     *
     * @return float|null
     */
    public function getComplaintRatePp(): ?float
    {
        return $this->complaintRatePp;
    }
    /**
     * Signed difference between this period's and the previous period's complaint rate, both fractions (multiply by 100 for percentage points). Null when either period's complaint rate is undefined.
     *
     * @param float|null $complaintRatePp
     *
     * @return self
     */
    public function setComplaintRatePp(?float $complaintRatePp): self
    {
        $this->initialized['complaintRatePp'] = true;
        $this->complaintRatePp = $complaintRatePp;
        return $this;
    }
    /**
     * Signed difference between this period's and the previous period's unsubscribe rate, both fractions (multiply by 100 for percentage points). Null when either period's unsubscribe rate is undefined.
     *
     * @return float|null
     */
    public function getUnsubscribeRatePp(): ?float
    {
        return $this->unsubscribeRatePp;
    }
    /**
     * Signed difference between this period's and the previous period's unsubscribe rate, both fractions (multiply by 100 for percentage points). Null when either period's unsubscribe rate is undefined.
     *
     * @param float|null $unsubscribeRatePp
     *
     * @return self
     */
    public function setUnsubscribeRatePp(?float $unsubscribeRatePp): self
    {
        $this->initialized['unsubscribeRatePp'] = true;
        $this->unsubscribeRatePp = $unsubscribeRatePp;
        return $this;
    }
}
