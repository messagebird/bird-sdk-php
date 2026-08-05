<?php

namespace MessageBird\Wire\Model;

class EmailStatsSummaryComparison extends \ArrayObject
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
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants). The grain of `from` and `to` mirrors the grain of the request's bounds; days and hour boundaries follow the requested `timezone` (UTC when omitted).
     * 
     *
     * @var EmailStatsSummaryPeriod|null
     */
    protected $period;
    /**
     * Distinct email messages accepted in the preceding period, counted at the message level.
     *
     * @var int|null
     */
    protected $sendsAccepted;
    /**
     * @var EmailStatsComparisonDelivery|null
     */
    protected $delivery;
    /**
     * @var EmailStatsComparisonEngagement|null
     */
    protected $engagement;
    /**
     * @var EmailStatsComparisonLatency|null
     */
    protected $latency;
    /**
     * @var EmailStatsComparisonDelta|null
     */
    protected $delta;
    /**
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants). The grain of `from` and `to` mirrors the grain of the request's bounds; days and hour boundaries follow the requested `timezone` (UTC when omitted).
     * 
     *
     * @return EmailStatsSummaryPeriod|null
     */
    public function getPeriod(): ?EmailStatsSummaryPeriod
    {
        return $this->period;
    }
    /**
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants). The grain of `from` and `to` mirrors the grain of the request's bounds; days and hour boundaries follow the requested `timezone` (UTC when omitted).
     *
     * @param EmailStatsSummaryPeriod|null $period
     *
     * @return self
     */
    public function setPeriod(?EmailStatsSummaryPeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * Distinct email messages accepted in the preceding period, counted at the message level.
     *
     * @return int|null
     */
    public function getSendsAccepted(): ?int
    {
        return $this->sendsAccepted;
    }
    /**
     * Distinct email messages accepted in the preceding period, counted at the message level.
     *
     * @param int|null $sendsAccepted
     *
     * @return self
     */
    public function setSendsAccepted(?int $sendsAccepted): self
    {
        $this->initialized['sendsAccepted'] = true;
        $this->sendsAccepted = $sendsAccepted;
        return $this;
    }
    /**
     * @return EmailStatsComparisonDelivery|null
     */
    public function getDelivery(): ?EmailStatsComparisonDelivery
    {
        return $this->delivery;
    }
    /**
     * @param EmailStatsComparisonDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?EmailStatsComparisonDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return EmailStatsComparisonEngagement|null
     */
    public function getEngagement(): ?EmailStatsComparisonEngagement
    {
        return $this->engagement;
    }
    /**
     * @param EmailStatsComparisonEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?EmailStatsComparisonEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return EmailStatsComparisonLatency|null
     */
    public function getLatency(): ?EmailStatsComparisonLatency
    {
        return $this->latency;
    }
    /**
     * @param EmailStatsComparisonLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?EmailStatsComparisonLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * @return EmailStatsComparisonDelta|null
     */
    public function getDelta(): ?EmailStatsComparisonDelta
    {
        return $this->delta;
    }
    /**
     * @param EmailStatsComparisonDelta|null $delta
     *
     * @return self
     */
    public function setDelta(?EmailStatsComparisonDelta $delta): self
    {
        $this->initialized['delta'] = true;
        $this->delta = $delta;
        return $this;
    }
}
