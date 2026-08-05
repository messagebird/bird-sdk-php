<?php

namespace MessageBird\Wire\Model;

class MailboxStatsResponse
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
     * The window and bucket grain the response covers, echoed from the request, plus the freshness boundary the data is current to.
     * 
     *
     * @var EmailStatsSeriesPeriod|null
     */
    protected $period;
    /**
     * Single-row aggregate of the mailbox's email activity across the full requested period. Counts are sums of per-bucket counts across the window; latency percentiles are computed across the whole period rather than summed per bucket. Rates are null when their denominator is zero.
     * 
     *
     * @var MailboxStatsSummary|null
     */
    protected $summary;
    /**
     * One row per bucket in the period, in chronological order. Buckets with no activity are included with zero counts.
     *
     * @var list<MailboxStatsPoint>|null
     */
    protected $data;
    /**
     * The window and bucket grain the response covers, echoed from the request, plus the freshness boundary the data is current to.
     * 
     *
     * @return EmailStatsSeriesPeriod|null
     */
    public function getPeriod(): ?EmailStatsSeriesPeriod
    {
        return $this->period;
    }
    /**
     * The window and bucket grain the response covers, echoed from the request, plus the freshness boundary the data is current to.
     *
     * @param EmailStatsSeriesPeriod|null $period
     *
     * @return self
     */
    public function setPeriod(?EmailStatsSeriesPeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * Single-row aggregate of the mailbox's email activity across the full requested period. Counts are sums of per-bucket counts across the window; latency percentiles are computed across the whole period rather than summed per bucket. Rates are null when their denominator is zero.
     * 
     *
     * @return MailboxStatsSummary|null
     */
    public function getSummary(): ?MailboxStatsSummary
    {
        return $this->summary;
    }
    /**
     * Single-row aggregate of the mailbox's email activity across the full requested period. Counts are sums of per-bucket counts across the window; latency percentiles are computed across the whole period rather than summed per bucket. Rates are null when their denominator is zero.
     *
     * @param MailboxStatsSummary|null $summary
     *
     * @return self
     */
    public function setSummary(?MailboxStatsSummary $summary): self
    {
        $this->initialized['summary'] = true;
        $this->summary = $summary;
        return $this;
    }
    /**
     * One row per bucket in the period, in chronological order. Buckets with no activity are included with zero counts.
     *
     * @return list<MailboxStatsPoint>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * One row per bucket in the period, in chronological order. Buckets with no activity are included with zero counts.
     *
     * @param list<MailboxStatsPoint>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
