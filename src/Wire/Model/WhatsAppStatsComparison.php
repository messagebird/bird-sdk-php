<?php

namespace MessageBird\Wire\Model;

class WhatsAppStatsComparison
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
     * @var WhatsAppStatsComparisonDeltaWrapper|null
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
     * @param WhatsAppStatsComparisonDelivery|WhatsAppDeliveryStats|array|null $delivery
     *
     * @return self
     */
    public function setDelivery($delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = \MessageBird\Core\ModelWrapper::normalize($delivery, WhatsAppStatsComparisonDelivery::class);
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
     * @param WhatsAppStatsComparisonEngagement|WhatsAppEngagementStats|array|null $engagement
     *
     * @return self
     */
    public function setEngagement($engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = \MessageBird\Core\ModelWrapper::normalize($engagement, WhatsAppStatsComparisonEngagement::class);
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
     * @param WhatsAppStatsComparisonLatency|WhatsAppLatencyStats|array|null $latency
     *
     * @return self
     */
    public function setLatency($latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = \MessageBird\Core\ModelWrapper::normalize($latency, WhatsAppStatsComparisonLatency::class);
        return $this;
    }
    /**
     * @return WhatsAppStatsComparisonDeltaWrapper|null
     */
    public function getDelta(): ?WhatsAppStatsComparisonDeltaWrapper
    {
        return $this->delta;
    }
    /**
     * @param WhatsAppStatsComparisonDeltaWrapper|WhatsAppStatsComparisonDelta|array|null $delta
     *
     * @return self
     */
    public function setDelta($delta): self
    {
        $this->initialized['delta'] = true;
        $this->delta = \MessageBird\Core\ModelWrapper::normalize($delta, WhatsAppStatsComparisonDeltaWrapper::class);
        return $this;
    }
}
