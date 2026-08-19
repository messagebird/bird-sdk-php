<?php

namespace MessageBird\Wire\Model;

class SMSStatsComparisonDelivery extends \ArrayObject
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
     * Distinct messages handed off to the carrier for delivery.
     *
     * @var int|null
     */
    protected $sent;
    /**
     * Distinct messages the carrier confirmed as delivered to the handset.
     *
     * @var int|null
     */
    protected $delivered;
    /**
     * Distinct messages the carrier reported as not delivered.
     *
     * @var int|null
     */
    protected $undelivered;
    /**
     * Distinct messages that failed during sending.
     *
     * @var int|null
     */
    protected $failed;
    /**
     * Distinct messages rejected before any send attempt, for example by sending policy or a message-generation failure.
     *
     * @var int|null
     */
    protected $rejected;
    /**
     * Distinct messages that could not be delivered within their validity window and expired.
     *
     * @var int|null
     */
    protected $expired;
    /**
     * Share of accepted messages that were delivered, computed as `delivered / accepted`. Null when no messages were accepted in scope.
     * 
     *
     * @var float|null
     */
    protected $deliveryRate;
    /**
     * Share of accepted messages that ultimately failed, computed as `(undelivered + failed + expired) / accepted`. Null when no messages were accepted in scope.
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
     * Distinct messages handed off to the carrier for delivery.
     *
     * @return int|null
     */
    public function getSent(): ?int
    {
        return $this->sent;
    }
    /**
     * Distinct messages handed off to the carrier for delivery.
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
     * Distinct messages the carrier confirmed as delivered to the handset.
     *
     * @return int|null
     */
    public function getDelivered(): ?int
    {
        return $this->delivered;
    }
    /**
     * Distinct messages the carrier confirmed as delivered to the handset.
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
     * Distinct messages the carrier reported as not delivered.
     *
     * @return int|null
     */
    public function getUndelivered(): ?int
    {
        return $this->undelivered;
    }
    /**
     * Distinct messages the carrier reported as not delivered.
     *
     * @param int|null $undelivered
     *
     * @return self
     */
    public function setUndelivered(?int $undelivered): self
    {
        $this->initialized['undelivered'] = true;
        $this->undelivered = $undelivered;
        return $this;
    }
    /**
     * Distinct messages that failed during sending.
     *
     * @return int|null
     */
    public function getFailed(): ?int
    {
        return $this->failed;
    }
    /**
     * Distinct messages that failed during sending.
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
     * Distinct messages rejected before any send attempt, for example by sending policy or a message-generation failure.
     *
     * @return int|null
     */
    public function getRejected(): ?int
    {
        return $this->rejected;
    }
    /**
     * Distinct messages rejected before any send attempt, for example by sending policy or a message-generation failure.
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
     * Distinct messages that could not be delivered within their validity window and expired.
     *
     * @return int|null
     */
    public function getExpired(): ?int
    {
        return $this->expired;
    }
    /**
     * Distinct messages that could not be delivered within their validity window and expired.
     *
     * @param int|null $expired
     *
     * @return self
     */
    public function setExpired(?int $expired): self
    {
        $this->initialized['expired'] = true;
        $this->expired = $expired;
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
     * Share of accepted messages that ultimately failed, computed as `(undelivered + failed + expired) / accepted`. Null when no messages were accepted in scope.
     * 
     *
     * @return float|null
     */
    public function getFailureRate(): ?float
    {
        return $this->failureRate;
    }
    /**
     * Share of accepted messages that ultimately failed, computed as `(undelivered + failed + expired) / accepted`. Null when no messages were accepted in scope.
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
