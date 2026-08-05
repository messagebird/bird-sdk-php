<?php

namespace MessageBird\Wire\Model;

class EmailSendingDomainStatsPoint
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
     * The sending domain (the portion of the `From` address after the `@`), normalized to lowercase.
     *
     * @var string|null
     */
    protected $sendingDomain;
    /**
     * @var EmailSendingDomainStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var EmailSendingDomainStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var EmailSendingDomainStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket rate series for this sending domain over the window. Present only when `include_trend=true`.
     *
     * @var list<EmailStatsSeriesPoint>|null
     */
    protected $trend;
    /**
     * The sending domain (the portion of the `From` address after the `@`), normalized to lowercase.
     *
     * @return string|null
     */
    public function getSendingDomain(): ?string
    {
        return $this->sendingDomain;
    }
    /**
     * The sending domain (the portion of the `From` address after the `@`), normalized to lowercase.
     *
     * @param string|null $sendingDomain
     *
     * @return self
     */
    public function setSendingDomain(?string $sendingDomain): self
    {
        $this->initialized['sendingDomain'] = true;
        $this->sendingDomain = $sendingDomain;
        return $this;
    }
    /**
     * @return EmailSendingDomainStatsPointDelivery|null
     */
    public function getDelivery(): ?EmailSendingDomainStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param EmailSendingDomainStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?EmailSendingDomainStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return EmailSendingDomainStatsPointEngagement|null
     */
    public function getEngagement(): ?EmailSendingDomainStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param EmailSendingDomainStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?EmailSendingDomainStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return EmailSendingDomainStatsPointLatency|null
     */
    public function getLatency(): ?EmailSendingDomainStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param EmailSendingDomainStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?EmailSendingDomainStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Per-bucket rate series for this sending domain over the window. Present only when `include_trend=true`.
     *
     * @return list<EmailStatsSeriesPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket rate series for this sending domain over the window. Present only when `include_trend=true`.
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
