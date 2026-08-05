<?php

namespace MessageBird\Wire\Model;

class EmailStatsSummary
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
     * Distinct email messages accepted, counted at the message level (one per accepted send regardless of recipient count) and summed per bucket across the period. This counts messages, not recipients, so it is not comparable to `delivery.accepted`, which counts recipients (a single message to 500 recipients is 1 here and up to 500 there).
     *
     * @var int|null
     */
    protected $sendsAccepted;
    /**
     * @var EmailStatsSummaryDelivery|null
     */
    protected $delivery;
    /**
     * @var EmailStatsSummaryEngagement|null
     */
    protected $engagement;
    /**
     * @var EmailStatsSummaryLatency|null
     */
    protected $latency;
    /**
     * @var EmailStatsSummaryComparison|null
     */
    protected $comparison;
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
     * Distinct email messages accepted, counted at the message level (one per accepted send regardless of recipient count) and summed per bucket across the period. This counts messages, not recipients, so it is not comparable to `delivery.accepted`, which counts recipients (a single message to 500 recipients is 1 here and up to 500 there).
     *
     * @return int|null
     */
    public function getSendsAccepted(): ?int
    {
        return $this->sendsAccepted;
    }
    /**
     * Distinct email messages accepted, counted at the message level (one per accepted send regardless of recipient count) and summed per bucket across the period. This counts messages, not recipients, so it is not comparable to `delivery.accepted`, which counts recipients (a single message to 500 recipients is 1 here and up to 500 there).
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
     * @return EmailStatsSummaryDelivery|null
     */
    public function getDelivery(): ?EmailStatsSummaryDelivery
    {
        return $this->delivery;
    }
    /**
     * @param EmailStatsSummaryDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?EmailStatsSummaryDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return EmailStatsSummaryEngagement|null
     */
    public function getEngagement(): ?EmailStatsSummaryEngagement
    {
        return $this->engagement;
    }
    /**
     * @param EmailStatsSummaryEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?EmailStatsSummaryEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return EmailStatsSummaryLatency|null
     */
    public function getLatency(): ?EmailStatsSummaryLatency
    {
        return $this->latency;
    }
    /**
     * @param EmailStatsSummaryLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?EmailStatsSummaryLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * @return EmailStatsSummaryComparison|null
     */
    public function getComparison(): ?EmailStatsSummaryComparison
    {
        return $this->comparison;
    }
    /**
     * @param EmailStatsSummaryComparison|null $comparison
     *
     * @return self
     */
    public function setComparison(?EmailStatsSummaryComparison $comparison): self
    {
        $this->initialized['comparison'] = true;
        $this->comparison = $comparison;
        return $this;
    }
}
