<?php

namespace MessageBird\Wire\Model;

class EsimRecurringOffer
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
    protected $offerId;
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
     * The number of calendar months or fixed days in each period.
     *
     * @var int|null
     */
    protected $intervalCount;
    /**
     * The recurring configuration revision to accept.
     *
     * @var int|null
     */
    protected $revision;
    /**
     * @var Money|null
     */
    protected $price;
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
     * The number of calendar months or fixed days in each period.
     *
     * @return int|null
     */
    public function getIntervalCount(): ?int
    {
        return $this->intervalCount;
    }
    /**
     * The number of calendar months or fixed days in each period.
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
     * The recurring configuration revision to accept.
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * The recurring configuration revision to accept.
     *
     * @param int|null $revision
     *
     * @return self
     */
    public function setRevision(?int $revision): self
    {
        $this->initialized['revision'] = true;
        $this->revision = $revision;
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
}
