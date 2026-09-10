<?php

namespace MessageBird\Wire\Model;

class WhatsAppStatsSummaryComparison extends \ArrayObject
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
     * @var WhatsAppStatsComparisonDelivery|null
     */
    protected $delivery;
    /**
     * @var WhatsAppStatsComparisonEngagement|null
     */
    protected $engagement;
    /**
     * @var WhatsAppStatsComparisonLatency|null
     */
    protected $latency;
    /**
     * @var WhatsAppStatsComparisonDelta|null
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
     * @return WhatsAppStatsComparisonDelivery|null
     */
    public function getDelivery(): ?WhatsAppStatsComparisonDelivery
    {
        return $this->delivery;
    }
    /**
     * @param WhatsAppStatsComparisonDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?WhatsAppStatsComparisonDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return WhatsAppStatsComparisonEngagement|null
     */
    public function getEngagement(): ?WhatsAppStatsComparisonEngagement
    {
        return $this->engagement;
    }
    /**
     * @param WhatsAppStatsComparisonEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?WhatsAppStatsComparisonEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return WhatsAppStatsComparisonLatency|null
     */
    public function getLatency(): ?WhatsAppStatsComparisonLatency
    {
        return $this->latency;
    }
    /**
     * @param WhatsAppStatsComparisonLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?WhatsAppStatsComparisonLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * @return WhatsAppStatsComparisonDelta|null
     */
    public function getDelta(): ?WhatsAppStatsComparisonDelta
    {
        return $this->delta;
    }
    /**
     * @param WhatsAppStatsComparisonDelta|null $delta
     *
     * @return self
     */
    public function setDelta(?WhatsAppStatsComparisonDelta $delta): self
    {
        $this->initialized['delta'] = true;
        $this->delta = $delta;
        return $this;
    }
}
