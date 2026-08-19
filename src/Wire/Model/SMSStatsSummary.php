<?php

namespace MessageBird\Wire\Model;

class SMSStatsSummary
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
     * @var SMSStatsSummaryDelivery|null
     */
    protected $delivery;
    /**
     * @var SMSStatsSummaryLatency|null
     */
    protected $latency;
    /**
     * @var SMSStatsSummaryComparison|null
     */
    protected $comparison;
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
     * @return SMSStatsSummaryDelivery|null
     */
    public function getDelivery(): ?SMSStatsSummaryDelivery
    {
        return $this->delivery;
    }
    /**
     * @param SMSStatsSummaryDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?SMSStatsSummaryDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return SMSStatsSummaryLatency|null
     */
    public function getLatency(): ?SMSStatsSummaryLatency
    {
        return $this->latency;
    }
    /**
     * @param SMSStatsSummaryLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?SMSStatsSummaryLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * @return SMSStatsSummaryComparison|null
     */
    public function getComparison(): ?SMSStatsSummaryComparison
    {
        return $this->comparison;
    }
    /**
     * @param SMSStatsSummaryComparison|null $comparison
     *
     * @return self
     */
    public function setComparison(?SMSStatsSummaryComparison $comparison): self
    {
        $this->initialized['comparison'] = true;
        $this->comparison = $comparison;
        return $this;
    }
}
