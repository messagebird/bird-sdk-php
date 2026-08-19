<?php

namespace MessageBird\Wire\Model;

class SMSCarrierStatsPoint
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
     * The delivery carrier this row aggregates, as resolved for the destination handset.
     *
     * @var string|null
     */
    protected $carrier;
    /**
     * @var SMSCarrierStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var SMSCarrierStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket lifecycle counts for this carrier, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @var list<SMSStatsPoint>|null
     */
    protected $trend;
    /**
     * The delivery carrier this row aggregates, as resolved for the destination handset.
     *
     * @return string|null
     */
    public function getCarrier(): ?string
    {
        return $this->carrier;
    }
    /**
     * The delivery carrier this row aggregates, as resolved for the destination handset.
     *
     * @param string|null $carrier
     *
     * @return self
     */
    public function setCarrier(?string $carrier): self
    {
        $this->initialized['carrier'] = true;
        $this->carrier = $carrier;
        return $this;
    }
    /**
     * @return SMSCarrierStatsPointDelivery|null
     */
    public function getDelivery(): ?SMSCarrierStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param SMSCarrierStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?SMSCarrierStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return SMSCarrierStatsPointLatency|null
     */
    public function getLatency(): ?SMSCarrierStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param SMSCarrierStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?SMSCarrierStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Per-bucket lifecycle counts for this carrier, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @return list<SMSStatsPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket lifecycle counts for this carrier, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
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
