<?php

namespace MessageBird\Wire\Model;

class SMSErrorCodeStatsPoint
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
     * Standardized failure reason this row aggregates. Matches the `error_code` message-list filter.
     *
     * @var string|null
     */
    protected $errorCode;
    /**
     * @var SMSErrorCodeStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var SMSErrorCodeStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket lifecycle counts for this error code, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @var list<SMSStatsPoint>|null
     */
    protected $trend;
    /**
     * Standardized failure reason this row aggregates. Matches the `error_code` message-list filter.
     *
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }
    /**
     * Standardized failure reason this row aggregates. Matches the `error_code` message-list filter.
     *
     * @param string|null $errorCode
     *
     * @return self
     */
    public function setErrorCode(?string $errorCode): self
    {
        $this->initialized['errorCode'] = true;
        $this->errorCode = $errorCode;
        return $this;
    }
    /**
     * @return SMSErrorCodeStatsPointDelivery|null
     */
    public function getDelivery(): ?SMSErrorCodeStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param SMSErrorCodeStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?SMSErrorCodeStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return SMSErrorCodeStatsPointLatency|null
     */
    public function getLatency(): ?SMSErrorCodeStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param SMSErrorCodeStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?SMSErrorCodeStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Per-bucket lifecycle counts for this error code, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @return list<SMSStatsPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket lifecycle counts for this error code, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
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
