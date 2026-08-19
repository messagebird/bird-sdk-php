<?php

namespace MessageBird\Wire\Model;

class SMSCountryStatsPoint
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
     * The destination country this row aggregates, as an ISO 3166-1 alpha-2 code.
     *
     * @var string|null
     */
    protected $country;
    /**
     * @var SMSCountryStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var SMSCountryStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket lifecycle counts for this country, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @var list<SMSStatsPoint>|null
     */
    protected $trend;
    /**
     * The destination country this row aggregates, as an ISO 3166-1 alpha-2 code.
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }
    /**
     * The destination country this row aggregates, as an ISO 3166-1 alpha-2 code.
     *
     * @param string|null $country
     *
     * @return self
     */
    public function setCountry(?string $country): self
    {
        $this->initialized['country'] = true;
        $this->country = $country;
        return $this;
    }
    /**
     * @return SMSCountryStatsPointDelivery|null
     */
    public function getDelivery(): ?SMSCountryStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param SMSCountryStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?SMSCountryStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return SMSCountryStatsPointLatency|null
     */
    public function getLatency(): ?SMSCountryStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param SMSCountryStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?SMSCountryStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Per-bucket lifecycle counts for this country, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @return list<SMSStatsPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket lifecycle counts for this country, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
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
