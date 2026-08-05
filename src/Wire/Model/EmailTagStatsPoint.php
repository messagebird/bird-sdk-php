<?php

namespace MessageBird\Wire\Model;

class EmailTagStatsPoint
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
     * The tag this row aggregates, formatted as `name:value` from the tag set at send time (for example `campaign:welcome-series`). Each distinct name-and-value pair is its own row.
     * 
     *
     * @var string|null
     */
    protected $tag;
    /**
     * @var EmailTagStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var EmailTagStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var EmailTagStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket rate series for this tag over the window. Present only when `include_trend=true`.
     *
     * @var list<EmailStatsSeriesPoint>|null
     */
    protected $trend;
    /**
     * The tag this row aggregates, formatted as `name:value` from the tag set at send time (for example `campaign:welcome-series`). Each distinct name-and-value pair is its own row.
     * 
     *
     * @return string|null
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }
    /**
     * The tag this row aggregates, formatted as `name:value` from the tag set at send time (for example `campaign:welcome-series`). Each distinct name-and-value pair is its own row.
     *
     * @param string|null $tag
     *
     * @return self
     */
    public function setTag(?string $tag): self
    {
        $this->initialized['tag'] = true;
        $this->tag = $tag;
        return $this;
    }
    /**
     * @return EmailTagStatsPointDelivery|null
     */
    public function getDelivery(): ?EmailTagStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param EmailTagStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?EmailTagStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return EmailTagStatsPointEngagement|null
     */
    public function getEngagement(): ?EmailTagStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param EmailTagStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?EmailTagStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return EmailTagStatsPointLatency|null
     */
    public function getLatency(): ?EmailTagStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param EmailTagStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?EmailTagStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Per-bucket rate series for this tag over the window. Present only when `include_trend=true`.
     *
     * @return list<EmailStatsSeriesPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket rate series for this tag over the window. Present only when `include_trend=true`.
     *
     * @param list<EmailStatsSeriesPoint>|null $trend
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
