<?php

namespace MessageBird\Wire\Model;

class SMSOriginatorStatsPoint
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
     * Sender address this row aggregates, either an alphanumeric sender ID or a phone number. Matches the message `from` value.
     *
     * @var string|null
     */
    protected $originator;
    /**
     * @var SMSOriginatorStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var SMSOriginatorStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket lifecycle counts for this originator, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @var list<SMSStatsPoint>|null
     */
    protected $trend;
    /**
     * Sender address this row aggregates, either an alphanumeric sender ID or a phone number. Matches the message `from` value.
     *
     * @return string|null
     */
    public function getOriginator(): ?string
    {
        return $this->originator;
    }
    /**
     * Sender address this row aggregates, either an alphanumeric sender ID or a phone number. Matches the message `from` value.
     *
     * @param string|null $originator
     *
     * @return self
     */
    public function setOriginator(?string $originator): self
    {
        $this->initialized['originator'] = true;
        $this->originator = $originator;
        return $this;
    }
    /**
     * @return SMSOriginatorStatsPointDelivery|null
     */
    public function getDelivery(): ?SMSOriginatorStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param SMSOriginatorStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?SMSOriginatorStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return SMSOriginatorStatsPointLatency|null
     */
    public function getLatency(): ?SMSOriginatorStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param SMSOriginatorStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?SMSOriginatorStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Per-bucket lifecycle counts for this originator, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @return list<SMSStatsPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket lifecycle counts for this originator, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
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
