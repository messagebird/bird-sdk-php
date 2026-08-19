<?php

namespace MessageBird\Wire\Model;

class SMSInboundStatsSummaryResponse
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
     * Distinct messages received in the period, counted by the time the carrier received them.
     *
     * @var int|null
     */
    protected $received;
    /**
     * @var SMSInboundStatsSummaryResponseComparison|null
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
     * Distinct messages received in the period, counted by the time the carrier received them.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct messages received in the period, counted by the time the carrier received them.
     *
     * @param int|null $received
     *
     * @return self
     */
    public function setReceived(?int $received): self
    {
        $this->initialized['received'] = true;
        $this->received = $received;
        return $this;
    }
    /**
     * @return SMSInboundStatsSummaryResponseComparison|null
     */
    public function getComparison(): ?SMSInboundStatsSummaryResponseComparison
    {
        return $this->comparison;
    }
    /**
     * @param SMSInboundStatsSummaryResponseComparison|null $comparison
     *
     * @return self
     */
    public function setComparison(?SMSInboundStatsSummaryResponseComparison $comparison): self
    {
        $this->initialized['comparison'] = true;
        $this->comparison = $comparison;
        return $this;
    }
}
