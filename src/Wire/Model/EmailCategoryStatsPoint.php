<?php

namespace MessageBird\Wire\Model;

class EmailCategoryStatsPoint
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
     * The category this row aggregates, as set at send time. `transactional` is one-to-one mail triggered by a user action; `marketing` is bulk sending. New categories may be added over time.
     *
     * @var string|null
     */
    protected $category;
    /**
     * @var EmailCategoryStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var EmailCategoryStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var EmailCategoryStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket rate series for this category over the window. Present only when `include_trend=true`.
     *
     * @var list<EmailStatsSeriesPoint>|null
     */
    protected $trend;
    /**
     * The category this row aggregates, as set at send time. `transactional` is one-to-one mail triggered by a user action; `marketing` is bulk sending. New categories may be added over time.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * The category this row aggregates, as set at send time. `transactional` is one-to-one mail triggered by a user action; `marketing` is bulk sending. New categories may be added over time.
     *
     * @param string|null $category
     *
     * @return self
     */
    public function setCategory(?string $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;
        return $this;
    }
    /**
     * @return EmailCategoryStatsPointDelivery|null
     */
    public function getDelivery(): ?EmailCategoryStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param EmailCategoryStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?EmailCategoryStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return EmailCategoryStatsPointEngagement|null
     */
    public function getEngagement(): ?EmailCategoryStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param EmailCategoryStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?EmailCategoryStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return EmailCategoryStatsPointLatency|null
     */
    public function getLatency(): ?EmailCategoryStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param EmailCategoryStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?EmailCategoryStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Per-bucket rate series for this category over the window. Present only when `include_trend=true`.
     *
     * @return list<EmailStatsSeriesPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket rate series for this category over the window. Present only when `include_trend=true`.
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
