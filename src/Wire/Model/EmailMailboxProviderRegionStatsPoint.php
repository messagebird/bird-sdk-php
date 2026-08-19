<?php

namespace MessageBird\Wire\Model;

class EmailMailboxProviderRegionStatsPoint
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
     * The recipient mailbox provider this row aggregates, as a lowercase classifier such as `gmail`, `yahoo`, `microsoft`, or `apple`.
     *
     * @var string|null
     */
    protected $mailboxProvider;
    /**
     * The provider region this row aggregates, as reported by the receiving mail system (for example `NA`, `EU`, `APAC`). The set is open and provider-specific.
     *
     * @var string|null
     */
    protected $mailboxProviderRegion;
    /**
     * @var EmailMailboxProviderRegionStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var EmailMailboxProviderRegionStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var EmailMailboxProviderRegionStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket rate series for this provider region over the window. Present only when `include_trend=true`.
     *
     * @var list<EmailStatsSeriesPoint>|null
     */
    protected $trend;
    /**
     * The recipient mailbox provider this row aggregates, as a lowercase classifier such as `gmail`, `yahoo`, `microsoft`, or `apple`.
     *
     * @return string|null
     */
    public function getMailboxProvider(): ?string
    {
        return $this->mailboxProvider;
    }
    /**
     * The recipient mailbox provider this row aggregates, as a lowercase classifier such as `gmail`, `yahoo`, `microsoft`, or `apple`.
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
     * The provider region this row aggregates, as reported by the receiving mail system (for example `NA`, `EU`, `APAC`). The set is open and provider-specific.
     *
     * @return string|null
     */
    public function getMailboxProviderRegion(): ?string
    {
        return $this->mailboxProviderRegion;
    }
    /**
     * The provider region this row aggregates, as reported by the receiving mail system (for example `NA`, `EU`, `APAC`). The set is open and provider-specific.
     *
     * @param string|null $mailboxProviderRegion
     *
     * @return self
     */
    public function setMailboxProviderRegion(?string $mailboxProviderRegion): self
    {
        $this->initialized['mailboxProviderRegion'] = true;
        $this->mailboxProviderRegion = $mailboxProviderRegion;
        return $this;
    }
    /**
     * @return EmailMailboxProviderRegionStatsPointDelivery|null
     */
    public function getDelivery(): ?EmailMailboxProviderRegionStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param EmailMailboxProviderRegionStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?EmailMailboxProviderRegionStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return EmailMailboxProviderRegionStatsPointEngagement|null
     */
    public function getEngagement(): ?EmailMailboxProviderRegionStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param EmailMailboxProviderRegionStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?EmailMailboxProviderRegionStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return EmailMailboxProviderRegionStatsPointLatency|null
     */
    public function getLatency(): ?EmailMailboxProviderRegionStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param EmailMailboxProviderRegionStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?EmailMailboxProviderRegionStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Per-bucket rate series for this provider region over the window. Present only when `include_trend=true`.
     *
     * @return list<EmailStatsSeriesPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket rate series for this provider region over the window. Present only when `include_trend=true`.
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
