<?php

namespace MessageBird\Wire\Model;

class WhatsAppInboundStatsSummaryResponse
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
     * @var WhatsAppStatsSummaryPeriod|null
     */
    protected $period;
    /**
     * Distinct messages received in the period, counted by the time each message reached your number. Computed across the whole window rather than summed from the daily or hourly series, so it can sit slightly below the sum of those rows.
     *
     * @var int|null
     */
    protected $received;
    /**
     * @var WhatsAppInboundStatsSummaryResponseComparison|null
     */
    protected $comparison;
    /**
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     * 
     *
     * @return WhatsAppStatsSummaryPeriod|null
     */
    public function getPeriod(): ?WhatsAppStatsSummaryPeriod
    {
        return $this->period;
    }
    /**
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     *
     * @param WhatsAppStatsSummaryPeriod|null $period
     *
     * @return self
     */
    public function setPeriod(?WhatsAppStatsSummaryPeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * Distinct messages received in the period, counted by the time each message reached your number. Computed across the whole window rather than summed from the daily or hourly series, so it can sit slightly below the sum of those rows.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct messages received in the period, counted by the time each message reached your number. Computed across the whole window rather than summed from the daily or hourly series, so it can sit slightly below the sum of those rows.
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
     * @return WhatsAppInboundStatsSummaryResponseComparison|null
     */
    public function getComparison(): ?WhatsAppInboundStatsSummaryResponseComparison
    {
        return $this->comparison;
    }
    /**
     * @param WhatsAppInboundStatsSummaryResponseComparison|null $comparison
     *
     * @return self
     */
    public function setComparison(?WhatsAppInboundStatsSummaryResponseComparison $comparison): self
    {
        $this->initialized['comparison'] = true;
        $this->comparison = $comparison;
        return $this;
    }
}
