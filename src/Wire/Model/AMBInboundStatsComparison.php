<?php

namespace MessageBird\Wire\Model;

class AMBInboundStatsComparison
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
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     * 
     *
     * @var AMBStatsSummaryPeriod|null
     */
    protected $period;
    /**
     * Distinct messages received in the preceding period.
     *
     * @var int|null
     */
    protected $received;
    /**
     * The change from the preceding period to the requested one. The `received_pct_change` field is a signed relative change, computed as `(current - previous) / previous`. A value of `0.5` means 50% higher, and `-0.2` means 20% lower. The field is null when the previous period received none.
     * 
     *
     * @var AMBInboundStatsComparisonDelta|null
     */
    protected $delta;
    /**
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     * 
     *
     * @return AMBStatsSummaryPeriod|null
     */
    public function getPeriod(): ?AMBStatsSummaryPeriod
    {
        return $this->period;
    }
    /**
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     *
     * @param AMBStatsSummaryPeriod|null $period
     *
     * @return self
     */
    public function setPeriod(?AMBStatsSummaryPeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * Distinct messages received in the preceding period.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct messages received in the preceding period.
     *
     * @param int|null $received
     *
     * @return self
     */
    public function setReceived(?int $received): self
    {
        $this->initialized['received'] = true;
        $this->received = $received;
        return $this;
    }
    /**
     * The change from the preceding period to the requested one. The `received_pct_change` field is a signed relative change, computed as `(current - previous) / previous`. A value of `0.5` means 50% higher, and `-0.2` means 20% lower. The field is null when the previous period received none.
     * 
     *
     * @return AMBInboundStatsComparisonDelta|null
     */
    public function getDelta(): ?AMBInboundStatsComparisonDelta
    {
        return $this->delta;
    }
    /**
     * The change from the preceding period to the requested one. The `received_pct_change` field is a signed relative change, computed as `(current - previous) / previous`. A value of `0.5` means 50% higher, and `-0.2` means 20% lower. The field is null when the previous period received none.
     *
     * @param AMBInboundStatsComparisonDelta|null $delta
     *
     * @return self
     */
    public function setDelta(?AMBInboundStatsComparisonDelta $delta): self
    {
        $this->initialized['delta'] = true;
        $this->delta = $delta;
        return $this;
    }
}
