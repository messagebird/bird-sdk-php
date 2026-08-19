<?php

namespace MessageBird\Wire\Model;

class SMSInboundStatsComparisonDelta extends \ArrayObject
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
     * Relative change in received messages versus the previous period, as a signed fraction. Null when the previous period received none.
     *
     * @var float|null
     */
    protected $receivedPctChange;
    /**
     * Relative change in received messages versus the previous period, as a signed fraction. Null when the previous period received none.
     *
     * @return float|null
     */
    public function getReceivedPctChange(): ?float
    {
        return $this->receivedPctChange;
    }
    /**
     * Relative change in received messages versus the previous period, as a signed fraction. Null when the previous period received none.
     *
     * @param float|null $receivedPctChange
     *
     * @return self
     */
    public function setReceivedPctChange(?float $receivedPctChange): self
    {
        $this->initialized['receivedPctChange'] = true;
        $this->receivedPctChange = $receivedPctChange;
        return $this;
    }
}
