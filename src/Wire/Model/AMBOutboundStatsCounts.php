<?php

namespace MessageBird\Wire\Model;

class AMBOutboundStatsCounts
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
     * Distinct messages accepted for sending after admission checks. This is the denominator for `sent_rate` and `send_failure_rate`.
     *
     * @var int|null
     */
    protected $accepted;
    /**
     * Distinct messages handed off to Apple.
     *
     * @var int|null
     */
    protected $sent;
    /**
     * Distinct accepted messages that Apple refused or that exhausted their send attempts. See `last_error.code` on the message for the reason; a refused charge is not a send failure, it is `rejected`.
     *
     * @var int|null
     */
    protected $sendFailed;
    /**
     * Distinct messages refused before any send attempt, because the destination has no price, the wallet could not fund the send, or the content cannot be sent yet. Rejected messages are never charged and are not counted in `accepted`, so the total addressed is `accepted + rejected`. Excluded from `send_failure_rate`, which covers send failures only.
     *
     * @var int|null
     */
    protected $rejected;
    /**
     * Share of accepted messages Apple acknowledged, computed as `sent / accepted`. Null when no messages were accepted in scope. This stands where other channels report a delivery rate.
     *
     * @var float|null
     */
    protected $sentRate;
    /**
     * Share of accepted messages that failed to send, computed as `send_failed / accepted`. Null when no messages were accepted in scope.
     *
     * @var float|null
     */
    protected $sendFailureRate;
    /**
     * Distinct messages accepted for sending after admission checks. This is the denominator for `sent_rate` and `send_failure_rate`.
     *
     * @return int|null
     */
    public function getAccepted(): ?int
    {
        return $this->accepted;
    }
    /**
     * Distinct messages accepted for sending after admission checks. This is the denominator for `sent_rate` and `send_failure_rate`.
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
     * Distinct messages handed off to Apple.
     *
     * @return int|null
     */
    public function getSent(): ?int
    {
        return $this->sent;
    }
    /**
     * Distinct messages handed off to Apple.
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
     * Distinct accepted messages that Apple refused or that exhausted their send attempts. See `last_error.code` on the message for the reason; a refused charge is not a send failure, it is `rejected`.
     *
     * @return int|null
     */
    public function getSendFailed(): ?int
    {
        return $this->sendFailed;
    }
    /**
     * Distinct accepted messages that Apple refused or that exhausted their send attempts. See `last_error.code` on the message for the reason; a refused charge is not a send failure, it is `rejected`.
     *
     * @param int|null $sendFailed
     *
     * @return self
     */
    public function setSendFailed(?int $sendFailed): self
    {
        $this->initialized['sendFailed'] = true;
        $this->sendFailed = $sendFailed;
        return $this;
    }
    /**
     * Distinct messages refused before any send attempt, because the destination has no price, the wallet could not fund the send, or the content cannot be sent yet. Rejected messages are never charged and are not counted in `accepted`, so the total addressed is `accepted + rejected`. Excluded from `send_failure_rate`, which covers send failures only.
     *
     * @return int|null
     */
    public function getRejected(): ?int
    {
        return $this->rejected;
    }
    /**
     * Distinct messages refused before any send attempt, because the destination has no price, the wallet could not fund the send, or the content cannot be sent yet. Rejected messages are never charged and are not counted in `accepted`, so the total addressed is `accepted + rejected`. Excluded from `send_failure_rate`, which covers send failures only.
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
     * Share of accepted messages Apple acknowledged, computed as `sent / accepted`. Null when no messages were accepted in scope. This stands where other channels report a delivery rate.
     *
     * @return float|null
     */
    public function getSentRate(): ?float
    {
        return $this->sentRate;
    }
    /**
     * Share of accepted messages Apple acknowledged, computed as `sent / accepted`. Null when no messages were accepted in scope. This stands where other channels report a delivery rate.
     *
     * @param float|null $sentRate
     *
     * @return self
     */
    public function setSentRate(?float $sentRate): self
    {
        $this->initialized['sentRate'] = true;
        $this->sentRate = $sentRate;
        return $this;
    }
    /**
     * Share of accepted messages that failed to send, computed as `send_failed / accepted`. Null when no messages were accepted in scope.
     *
     * @return float|null
     */
    public function getSendFailureRate(): ?float
    {
        return $this->sendFailureRate;
    }
    /**
     * Share of accepted messages that failed to send, computed as `send_failed / accepted`. Null when no messages were accepted in scope.
     *
     * @param float|null $sendFailureRate
     *
     * @return self
     */
    public function setSendFailureRate(?float $sendFailureRate): self
    {
        $this->initialized['sendFailureRate'] = true;
        $this->sendFailureRate = $sendFailureRate;
        return $this;
    }
}
