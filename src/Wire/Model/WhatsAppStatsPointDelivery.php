<?php

namespace MessageBird\Wire\Model;

class WhatsAppStatsPointDelivery extends \ArrayObject
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
     * Distinct messages accepted for sending after admission checks.
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
     * Distinct messages accepted for sending after admission checks.
     *
     * @return int|null
     */
    public function getAccepted(): ?int
    {
        return $this->accepted;
    }
    /**
     * Distinct messages accepted for sending after admission checks.
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
}
