<?php

namespace MessageBird\Wire\Model;

class SMSCategoryStatsPoint
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
     * The category this row aggregates, as set at send time. `transactional` is one-to-one messaging triggered by a user action; `marketing` is bulk sending. New categories may be added over time.
     *
     * @var string|null
     */
    protected $category;
    /**
     * @var SMSCategoryStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var SMSCategoryStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket lifecycle counts for this category, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @var list<SMSStatsPoint>|null
     */
    protected $trend;
    /**
     * The category this row aggregates, as set at send time. `transactional` is one-to-one messaging triggered by a user action; `marketing` is bulk sending. New categories may be added over time.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * The category this row aggregates, as set at send time. `transactional` is one-to-one messaging triggered by a user action; `marketing` is bulk sending. New categories may be added over time.
     *
     * @param string|null $category
     *
     * @return self
     */
    public function setCategory(?string $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;
        return $this;
    }
    /**
     * @return SMSCategoryStatsPointDelivery|null
     */
    public function getDelivery(): ?SMSCategoryStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param SMSCategoryStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?SMSCategoryStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return SMSCategoryStatsPointLatency|null
     */
    public function getLatency(): ?SMSCategoryStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param SMSCategoryStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?SMSCategoryStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Per-bucket lifecycle counts for this category, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @return list<SMSStatsPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket lifecycle counts for this category, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
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
