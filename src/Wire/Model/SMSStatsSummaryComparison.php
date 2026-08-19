<?php

namespace MessageBird\Wire\Model;

class SMSStatsSummaryComparison extends \ArrayObject
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
     * @var SMSStatsSummaryPeriod|null
     */
    protected $period;
    /**
     * @var SMSStatsComparisonDelivery|null
     */
    protected $delivery;
    /**
     * @var SMSStatsComparisonLatency|null
     */
    protected $latency;
    /**
     * @var SMSStatsComparisonDelta|null
     */
    protected $delta;
    /**
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     * 
     *
     * @return SMSStatsSummaryPeriod|null
     */
    public function getPeriod(): ?SMSStatsSummaryPeriod
    {
        return $this->period;
    }
    /**
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     *
     * @param SMSStatsSummaryPeriod|null $period
     *
     * @return self
     */
    public function setPeriod(?SMSStatsSummaryPeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * @return SMSStatsComparisonDelivery|null
     */
    public function getDelivery(): ?SMSStatsComparisonDelivery
    {
        return $this->delivery;
    }
    /**
     * @param SMSStatsComparisonDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?SMSStatsComparisonDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return SMSStatsComparisonLatency|null
     */
    public function getLatency(): ?SMSStatsComparisonLatency
    {
        return $this->latency;
    }
    /**
     * @param SMSStatsComparisonLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?SMSStatsComparisonLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * @return SMSStatsComparisonDelta|null
     */
    public function getDelta(): ?SMSStatsComparisonDelta
    {
        return $this->delta;
    }
    /**
     * @param SMSStatsComparisonDelta|null $delta
     *
     * @return self
     */
    public function setDelta(?SMSStatsComparisonDelta $delta): self
    {
        $this->initialized['delta'] = true;
        $this->delta = $delta;
        return $this;
    }
}
