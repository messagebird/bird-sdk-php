<?php

namespace MessageBird\Wire\Model;

class WhatsAppInboundStatsComparison
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
     * Distinct messages received in the preceding period.
     *
     * @var int|null
     */
    protected $received;
    /**
     * @var WhatsAppInboundStatsComparisonDeltaWrapper|null
     */
    protected $delta;
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
     * Distinct messages received in the preceding period.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct messages received in the preceding period.
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
     * @return WhatsAppInboundStatsComparisonDeltaWrapper|null
     */
    public function getDelta(): ?WhatsAppInboundStatsComparisonDeltaWrapper
    {
        return $this->delta;
    }
    /**
     * @param WhatsAppInboundStatsComparisonDeltaWrapper|WhatsAppInboundStatsComparisonDelta|array|null $delta
     *
     * @return self
     */
    public function setDelta($delta): self
    {
        $this->initialized['delta'] = true;
        $this->delta = \MessageBird\Core\ModelWrapper::normalize($delta, WhatsAppInboundStatsComparisonDeltaWrapper::class);
        return $this;
    }
}
