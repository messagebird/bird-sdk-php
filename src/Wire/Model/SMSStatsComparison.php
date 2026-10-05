<?php

namespace MessageBird\Wire\Model;

class SMSStatsComparison
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
     * @var SMSStatsComparisonDeltaWrapper|null
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
     * @param SMSStatsComparisonDelivery|SMSDeliveryStats|array|null $delivery
     *
     * @return self
     */
    public function setDelivery($delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = \MessageBird\Core\ModelWrapper::normalize($delivery, SMSStatsComparisonDelivery::class);
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
     * @param SMSStatsComparisonLatency|SMSLatencyStats|array|null $latency
     *
     * @return self
     */
    public function setLatency($latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = \MessageBird\Core\ModelWrapper::normalize($latency, SMSStatsComparisonLatency::class);
        return $this;
    }
    /**
     * @return SMSStatsComparisonDeltaWrapper|null
     */
    public function getDelta(): ?SMSStatsComparisonDeltaWrapper
    {
        return $this->delta;
    }
    /**
     * @param SMSStatsComparisonDeltaWrapper|SMSStatsComparisonDelta|array|null $delta
     *
     * @return self
     */
    public function setDelta($delta): self
    {
        $this->initialized['delta'] = true;
        $this->delta = \MessageBird\Core\ModelWrapper::normalize($delta, SMSStatsComparisonDeltaWrapper::class);
        return $this;
    }
}
