<?php

namespace MessageBird\Wire\Model;

class SMSTagStatsPoint
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
     * The tag this row aggregates, in `name:value` form. Each distinct name-and-value pair is its own row, and a message carrying several tags is counted once under each of them, so rows do not sum to the period total.
     * 
     *
     * @var string|null
     */
    protected $tag;
    /**
     * @var SMSTagStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var SMSTagStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket lifecycle-count series for this tag over the window, bucketed by `trend_grain`. Sparse, so only buckets with activity are present rather than zero-filled, unlike the daily and hourly series. Present only when `include_trend=true`.
     * 
     *
     * @var list<SMSStatsPoint>|null
     */
    protected $trend;
    /**
     * The tag this row aggregates, in `name:value` form. Each distinct name-and-value pair is its own row, and a message carrying several tags is counted once under each of them, so rows do not sum to the period total.
     * 
     *
     * @return string|null
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }
    /**
     * The tag this row aggregates, in `name:value` form. Each distinct name-and-value pair is its own row, and a message carrying several tags is counted once under each of them, so rows do not sum to the period total.
     *
     * @param string|null $tag
     *
     * @return self
     */
    public function setTag(?string $tag): self
    {
        $this->initialized['tag'] = true;
        $this->tag = $tag;
        return $this;
    }
    /**
     * @return SMSTagStatsPointDelivery|null
     */
    public function getDelivery(): ?SMSTagStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param SMSTagStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?SMSTagStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return SMSTagStatsPointLatency|null
     */
    public function getLatency(): ?SMSTagStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param SMSTagStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?SMSTagStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Per-bucket lifecycle-count series for this tag over the window, bucketed by `trend_grain`. Sparse, so only buckets with activity are present rather than zero-filled, unlike the daily and hourly series. Present only when `include_trend=true`.
     * 
     *
     * @return list<SMSStatsPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket lifecycle-count series for this tag over the window, bucketed by `trend_grain`. Sparse, so only buckets with activity are present rather than zero-filled, unlike the daily and hourly series. Present only when `include_trend=true`.
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
