<?php

namespace MessageBird\Wire\Model;

class EmailMailboxProviderStatsPoint
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
     * The recipient mailbox provider this row aggregates, as a lowercase classifier such as `gmail`, `yahoo`, `microsoft`, or `apple`. New classifiers may be added over time.
     *
     * @var string|null
     */
    protected $mailboxProvider;
    /**
     * @var EmailMailboxProviderStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var EmailMailboxProviderStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var EmailMailboxProviderStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket rate series for this mailbox provider over the window. Present only when `include_trend=true`.
     *
     * @var list<EmailStatsSeriesPoint>|null
     */
    protected $trend;
    /**
     * The recipient mailbox provider this row aggregates, as a lowercase classifier such as `gmail`, `yahoo`, `microsoft`, or `apple`. New classifiers may be added over time.
     *
     * @return string|null
     */
    public function getMailboxProvider(): ?string
    {
        return $this->mailboxProvider;
    }
    /**
     * The recipient mailbox provider this row aggregates, as a lowercase classifier such as `gmail`, `yahoo`, `microsoft`, or `apple`. New classifiers may be added over time.
     *
     * @param string|null $mailboxProvider
     *
     * @return self
     */
    public function setMailboxProvider(?string $mailboxProvider): self
    {
        $this->initialized['mailboxProvider'] = true;
        $this->mailboxProvider = $mailboxProvider;
        return $this;
    }
    /**
     * @return EmailMailboxProviderStatsPointDelivery|null
     */
    public function getDelivery(): ?EmailMailboxProviderStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param EmailMailboxProviderStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?EmailMailboxProviderStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return EmailMailboxProviderStatsPointEngagement|null
     */
    public function getEngagement(): ?EmailMailboxProviderStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param EmailMailboxProviderStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?EmailMailboxProviderStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return EmailMailboxProviderStatsPointLatency|null
     */
    public function getLatency(): ?EmailMailboxProviderStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param EmailMailboxProviderStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?EmailMailboxProviderStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Per-bucket rate series for this mailbox provider over the window. Present only when `include_trend=true`.
     *
     * @return list<EmailStatsSeriesPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket rate series for this mailbox provider over the window. Present only when `include_trend=true`.
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
