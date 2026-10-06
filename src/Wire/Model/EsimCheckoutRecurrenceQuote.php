<?php

namespace MessageBird\Wire\Model;

class EsimCheckoutRecurrenceQuote extends \ArrayObject
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
     * The offer revision to accept when purchasing.
     *
     * @var int|null
     */
    protected $offerRevision;
    /**
     * The recurring configuration revision to accept when purchasing.
     *
     * @var int|null
     */
    protected $recurrenceRevision;
    /**
     * @var Money|null
     */
    protected $price;
    /**
     * Billing cadence for recurring packages.
     * 
     * - `calendar_month`: periods follow calendar months from the billing anchor.
     * - `fixed_days`: each period lasts the stated number of 24-hour days.
     * 
     *
     * @var string|null
     */
    protected $model;
    /**
     * The number of calendar months or fixed 24-hour days per period.
     *
     * @var int|null
     */
    protected $intervalCount;
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
     * The offer revision to accept when purchasing.
     *
     * @return int|null
     */
    public function getOfferRevision(): ?int
    {
        return $this->offerRevision;
    }
    /**
     * The offer revision to accept when purchasing.
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
     * The recurring configuration revision to accept when purchasing.
     *
     * @return int|null
     */
    public function getRecurrenceRevision(): ?int
    {
        return $this->recurrenceRevision;
    }
    /**
     * The recurring configuration revision to accept when purchasing.
     *
     * @param int|null $recurrenceRevision
     *
     * @return self
     */
    public function setRecurrenceRevision(?int $recurrenceRevision): self
    {
        $this->initialized['recurrenceRevision'] = true;
        $this->recurrenceRevision = $recurrenceRevision;
        return $this;
    }
    /**
     * @return Money|null
     */
    public function getPrice(): ?Money
    {
        return $this->price;
    }
    /**
     * @param Money|null $price
     *
     * @return self
     */
    public function setPrice(?Money $price): self
    {
        $this->initialized['price'] = true;
        $this->price = $price;
        return $this;
    }
    /**
     * Billing cadence for recurring packages.
     * 
     * - `calendar_month`: periods follow calendar months from the billing anchor.
     * - `fixed_days`: each period lasts the stated number of 24-hour days.
     * 
     *
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }
    /**
    * Billing cadence for recurring packages.
    
    - `calendar_month`: periods follow calendar months from the billing anchor.
    - `fixed_days`: each period lasts the stated number of 24-hour days.
    
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
     * The number of calendar months or fixed 24-hour days per period.
     *
     * @return int|null
     */
    public function getIntervalCount(): ?int
    {
        return $this->intervalCount;
    }
    /**
     * The number of calendar months or fixed 24-hour days per period.
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
}
