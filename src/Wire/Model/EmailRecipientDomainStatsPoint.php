<?php

namespace MessageBird\Wire\Model;

class EmailRecipientDomainStatsPoint
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
     * The recipient mailbox domain this row aggregates (the part of the recipient address after the `@`), normalized to lowercase.
     *
     * @var string|null
     */
    protected $recipientDomain;
    /**
     * @var EmailRecipientDomainStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var EmailRecipientDomainStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var EmailRecipientDomainStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket rate series for this recipient domain over the window. Present only when `include_trend=true`.
     *
     * @var list<EmailStatsSeriesPoint>|null
     */
    protected $trend;
    /**
     * The recipient mailbox domain this row aggregates (the part of the recipient address after the `@`), normalized to lowercase.
     *
     * @return string|null
     */
    public function getRecipientDomain(): ?string
    {
        return $this->recipientDomain;
    }
    /**
     * The recipient mailbox domain this row aggregates (the part of the recipient address after the `@`), normalized to lowercase.
     *
     * @param string|null $recipientDomain
     *
     * @return self
     */
    public function setRecipientDomain(?string $recipientDomain): self
    {
        $this->initialized['recipientDomain'] = true;
        $this->recipientDomain = $recipientDomain;
        return $this;
    }
    /**
     * @return EmailRecipientDomainStatsPointDelivery|null
     */
    public function getDelivery(): ?EmailRecipientDomainStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param EmailRecipientDomainStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?EmailRecipientDomainStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return EmailRecipientDomainStatsPointEngagement|null
     */
    public function getEngagement(): ?EmailRecipientDomainStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param EmailRecipientDomainStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?EmailRecipientDomainStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return EmailRecipientDomainStatsPointLatency|null
     */
    public function getLatency(): ?EmailRecipientDomainStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param EmailRecipientDomainStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?EmailRecipientDomainStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Per-bucket rate series for this recipient domain over the window. Present only when `include_trend=true`.
     *
     * @return list<EmailStatsSeriesPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket rate series for this recipient domain over the window. Present only when `include_trend=true`.
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
