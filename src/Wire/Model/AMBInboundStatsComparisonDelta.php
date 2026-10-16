<?php

namespace MessageBird\Wire\Model;

/**
 * The change from the preceding period to the requested one. The `received_pct_change` field is a signed relative change, computed as `(current - previous) / previous`. A value of `0.5` means 50% higher, and `-0.2` means 20% lower. The field is null when the previous period received none.
 */
class AMBInboundStatsComparisonDelta
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
