<?php

namespace MessageBird\Wire\Model;

/**
 * Aggregate delivery and latency stats for a single cost center over the requested period.
 */
class SMSCostCenterStatsPoint
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
     * The cost center this row aggregates, as set on the message or taken from its messaging profile at send time.
     *
     * @var string|null
     */
    protected $costCenter;
    /**
     * @var SMSCostCenterStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var SMSCostCenterStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket lifecycle counts for this cost center, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @var list<SMSStatsPoint>|null
     */
    protected $trend;
    /**
     * The cost center this row aggregates, as set on the message or taken from its messaging profile at send time.
     *
     * @return string|null
     */
    public function getCostCenter(): ?string
    {
        return $this->costCenter;
    }
    /**
     * The cost center this row aggregates, as set on the message or taken from its messaging profile at send time.
     *
     * @param string|null $costCenter
     *
     * @return self
     */
    public function setCostCenter(?string $costCenter): self
    {
        $this->initialized['costCenter'] = true;
        $this->costCenter = $costCenter;
        return $this;
    }
    /**
     * @return SMSCostCenterStatsPointDelivery|null
     */
    public function getDelivery(): ?SMSCostCenterStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param SMSCostCenterStatsPointDelivery|SMSDeliveryStats|array|null $delivery
     *
     * @return self
     */
    public function setDelivery($delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = \MessageBird\Core\ModelWrapper::normalize($delivery, SMSCostCenterStatsPointDelivery::class);
        return $this;
    }
    /**
     * @return SMSCostCenterStatsPointLatency|null
     */
    public function getLatency(): ?SMSCostCenterStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param SMSCostCenterStatsPointLatency|SMSLatencyStats|array|null $latency
     *
     * @return self
     */
    public function setLatency($latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = \MessageBird\Core\ModelWrapper::normalize($latency, SMSCostCenterStatsPointLatency::class);
        return $this;
    }
    /**
     * Per-bucket lifecycle counts for this cost center, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @return list<SMSStatsPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket lifecycle counts for this cost center, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @param list<SMSStatsPoint>|null $trend
     *
     * @return self
     */
    public function setTrend(?array $trend): self
    {
        $this->initialized['trend'] = true;
        $this->trend = $trend;
        return $this;
    }
}
