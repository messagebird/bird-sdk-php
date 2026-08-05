<?php

namespace MessageBird\Wire\Model;

class EmailStatsResponse
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
     * One row per bucket (day or hour, per the grain) in the period, in chronological order. Buckets with no activity are included with zero counts.
     *
     * @var list<EmailStatsPoint>|null
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
     * One row per bucket (day or hour, per the grain) in the period, in chronological order. Buckets with no activity are included with zero counts.
     *
     * @return list<EmailStatsPoint>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * One row per bucket (day or hour, per the grain) in the period, in chronological order. Buckets with no activity are included with zero counts.
     *
     * @param list<EmailStatsPoint>|null $data
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
