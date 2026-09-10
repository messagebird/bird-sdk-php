<?php

namespace MessageBird\Wire\Model;

class WhatsAppStatsSummary
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
     * @var WhatsAppStatsSummaryDelivery|null
     */
    protected $delivery;
    /**
     * @var WhatsAppStatsSummaryEngagement|null
     */
    protected $engagement;
    /**
     * @var WhatsAppStatsSummaryLatency|null
     */
    protected $latency;
    /**
     * @var WhatsAppStatsSummaryComparison|null
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
     * @return WhatsAppStatsSummaryDelivery|null
     */
    public function getDelivery(): ?WhatsAppStatsSummaryDelivery
    {
        return $this->delivery;
    }
    /**
     * @param WhatsAppStatsSummaryDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?WhatsAppStatsSummaryDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return WhatsAppStatsSummaryEngagement|null
     */
    public function getEngagement(): ?WhatsAppStatsSummaryEngagement
    {
        return $this->engagement;
    }
    /**
     * @param WhatsAppStatsSummaryEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?WhatsAppStatsSummaryEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return WhatsAppStatsSummaryLatency|null
     */
    public function getLatency(): ?WhatsAppStatsSummaryLatency
    {
        return $this->latency;
    }
    /**
     * @param WhatsAppStatsSummaryLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?WhatsAppStatsSummaryLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * @return WhatsAppStatsSummaryComparison|null
     */
    public function getComparison(): ?WhatsAppStatsSummaryComparison
    {
        return $this->comparison;
    }
    /**
     * @param WhatsAppStatsSummaryComparison|null $comparison
     *
     * @return self
     */
    public function setComparison(?WhatsAppStatsSummaryComparison $comparison): self
    {
        $this->initialized['comparison'] = true;
        $this->comparison = $comparison;
        return $this;
    }
}
