<?php

namespace MessageBird\Wire\Model;

class WhatsAppReachEstimateRow
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
     * The candidate bid, per 1,000 deliveries in the smallest currency unit. It is the unit `optimization_spec.bid_amount` takes.
     *
     * @var int|null
     */
    protected $bidAmount;
    /**
     * The audience size the estimate is for.
     *
     * @var int|null
     */
    protected $users;
    /**
     * @var int|null
     */
    protected $deliveriesLowerBound;
    /**
     * @var int|null
     */
    protected $deliveriesUpperBound;
    /**
     * The lower cost estimate, per 1,000 deliveries in the smallest currency unit.
     *
     * @var float|null
     */
    protected $costLowerBound;
    /**
     * The upper cost estimate, per 1,000 deliveries in the smallest currency unit.
     *
     * @var float|null
     */
    protected $costUpperBound;
    /**
     * The candidate bid, per 1,000 deliveries in the smallest currency unit. It is the unit `optimization_spec.bid_amount` takes.
     *
     * @return int|null
     */
    public function getBidAmount(): ?int
    {
        return $this->bidAmount;
    }
    /**
     * The candidate bid, per 1,000 deliveries in the smallest currency unit. It is the unit `optimization_spec.bid_amount` takes.
     *
     * @param int|null $bidAmount
     *
     * @return self
     */
    public function setBidAmount(?int $bidAmount): self
    {
        $this->initialized['bidAmount'] = true;
        $this->bidAmount = $bidAmount;
        return $this;
    }
    /**
     * The audience size the estimate is for.
     *
     * @return int|null
     */
    public function getUsers(): ?int
    {
        return $this->users;
    }
    /**
     * The audience size the estimate is for.
     *
     * @param int|null $users
     *
     * @return self
     */
    public function setUsers(?int $users): self
    {
        $this->initialized['users'] = true;
        $this->users = $users;
        return $this;
    }
    /**
     * @return int|null
     */
    public function getDeliveriesLowerBound(): ?int
    {
        return $this->deliveriesLowerBound;
    }
    /**
     * @param int|null $deliveriesLowerBound
     *
     * @return self
     */
    public function setDeliveriesLowerBound(?int $deliveriesLowerBound): self
    {
        $this->initialized['deliveriesLowerBound'] = true;
        $this->deliveriesLowerBound = $deliveriesLowerBound;
        return $this;
    }
    /**
     * @return int|null
     */
    public function getDeliveriesUpperBound(): ?int
    {
        return $this->deliveriesUpperBound;
    }
    /**
     * @param int|null $deliveriesUpperBound
     *
     * @return self
     */
    public function setDeliveriesUpperBound(?int $deliveriesUpperBound): self
    {
        $this->initialized['deliveriesUpperBound'] = true;
        $this->deliveriesUpperBound = $deliveriesUpperBound;
        return $this;
    }
    /**
     * The lower cost estimate, per 1,000 deliveries in the smallest currency unit.
     *
     * @return float|null
     */
    public function getCostLowerBound(): ?float
    {
        return $this->costLowerBound;
    }
    /**
     * The lower cost estimate, per 1,000 deliveries in the smallest currency unit.
     *
     * @param float|null $costLowerBound
     *
     * @return self
     */
    public function setCostLowerBound(?float $costLowerBound): self
    {
        $this->initialized['costLowerBound'] = true;
        $this->costLowerBound = $costLowerBound;
        return $this;
    }
    /**
     * The upper cost estimate, per 1,000 deliveries in the smallest currency unit.
     *
     * @return float|null
     */
    public function getCostUpperBound(): ?float
    {
        return $this->costUpperBound;
    }
    /**
     * The upper cost estimate, per 1,000 deliveries in the smallest currency unit.
     *
     * @param float|null $costUpperBound
     *
     * @return self
     */
    public function setCostUpperBound(?float $costUpperBound): self
    {
        $this->initialized['costUpperBound'] = true;
        $this->costUpperBound = $costUpperBound;
        return $this;
    }
}
