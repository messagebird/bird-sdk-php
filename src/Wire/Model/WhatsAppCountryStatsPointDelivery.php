<?php

namespace MessageBird\Wire\Model;

class WhatsAppCountryStatsPointDelivery extends \ArrayObject
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
     * Distinct messages accepted for sending after admission checks. This is the denominator for `delivery_rate` and `failure_rate`.
     *
     * @var int|null
     */
    protected $accepted;
    /**
     * Distinct messages handed off for delivery.
     *
     * @var int|null
     */
    protected $sent;
    /**
     * Distinct messages confirmed delivered to the recipient's device.
     *
     * @var int|null
     */
    protected $delivered;
    /**
     * Distinct messages that failed during sending or delivery.
     *
     * @var int|null
     */
    protected $failed;
    /**
     * Distinct messages rejected before any send attempt, because the recipient is on the workspace's suppression list, no reachable recipient was given, the destination has no price, or the wallet could not fund the send. Rejected messages are never charged and are not counted in `accepted`, so the total addressed is `accepted + rejected`. Excluded from `failure_rate`, which covers send failures only.
     *
     * @var int|null
     */
    protected $rejected;
    /**
     * Share of accepted messages that were delivered, computed as `delivered / accepted`. Null when no messages were accepted in scope.
     * 
     *
     * @var float|null
     */
    protected $deliveryRate;
    /**
     * Share of accepted messages that ultimately failed, computed as `failed / accepted`. Null when no messages were accepted in scope.
     * 
     *
     * @var float|null
     */
    protected $failureRate;
    /**
     * Distinct messages accepted for sending after admission checks. This is the denominator for `delivery_rate` and `failure_rate`.
     *
     * @return int|null
     */
    public function getAccepted(): ?int
    {
        return $this->accepted;
    }
    /**
     * Distinct messages accepted for sending after admission checks. This is the denominator for `delivery_rate` and `failure_rate`.
     *
     * @param int|null $accepted
     *
     * @return self
     */
    public function setAccepted(?int $accepted): self
    {
        $this->initialized['accepted'] = true;
        $this->accepted = $accepted;
        return $this;
    }
    /**
     * Distinct messages handed off for delivery.
     *
     * @return int|null
     */
    public function getSent(): ?int
    {
        return $this->sent;
    }
    /**
     * Distinct messages handed off for delivery.
     *
     * @param int|null $sent
     *
     * @return self
     */
    public function setSent(?int $sent): self
    {
        $this->initialized['sent'] = true;
        $this->sent = $sent;
        return $this;
    }
    /**
     * Distinct messages confirmed delivered to the recipient's device.
     *
     * @return int|null
     */
    public function getDelivered(): ?int
    {
        return $this->delivered;
    }
    /**
     * Distinct messages confirmed delivered to the recipient's device.
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
     * Distinct messages that failed during sending or delivery.
     *
     * @return int|null
     */
    public function getFailed(): ?int
    {
        return $this->failed;
    }
    /**
     * Distinct messages that failed during sending or delivery.
     *
     * @param int|null $failed
     *
     * @return self
     */
    public function setFailed(?int $failed): self
    {
        $this->initialized['failed'] = true;
        $this->failed = $failed;
        return $this;
    }
    /**
     * Distinct messages rejected before any send attempt, because the recipient is on the workspace's suppression list, no reachable recipient was given, the destination has no price, or the wallet could not fund the send. Rejected messages are never charged and are not counted in `accepted`, so the total addressed is `accepted + rejected`. Excluded from `failure_rate`, which covers send failures only.
     *
     * @return int|null
     */
    public function getRejected(): ?int
    {
        return $this->rejected;
    }
    /**
     * Distinct messages rejected before any send attempt, because the recipient is on the workspace's suppression list, no reachable recipient was given, the destination has no price, or the wallet could not fund the send. Rejected messages are never charged and are not counted in `accepted`, so the total addressed is `accepted + rejected`. Excluded from `failure_rate`, which covers send failures only.
     *
     * @param int|null $rejected
     *
     * @return self
     */
    public function setRejected(?int $rejected): self
    {
        $this->initialized['rejected'] = true;
        $this->rejected = $rejected;
        return $this;
    }
    /**
     * Share of accepted messages that were delivered, computed as `delivered / accepted`. Null when no messages were accepted in scope.
     * 
     *
     * @return float|null
     */
    public function getDeliveryRate(): ?float
    {
        return $this->deliveryRate;
    }
    /**
     * Share of accepted messages that were delivered, computed as `delivered / accepted`. Null when no messages were accepted in scope.
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
     * Share of accepted messages that ultimately failed, computed as `failed / accepted`. Null when no messages were accepted in scope.
     * 
     *
     * @return float|null
     */
    public function getFailureRate(): ?float
    {
        return $this->failureRate;
    }
    /**
     * Share of accepted messages that ultimately failed, computed as `failed / accepted`. Null when no messages were accepted in scope.
     *
     * @param float|null $failureRate
     *
     * @return self
     */
    public function setFailureRate(?float $failureRate): self
    {
        $this->initialized['failureRate'] = true;
        $this->failureRate = $failureRate;
        return $this;
    }
}
