<?php

namespace MessageBird\Wire\Model;

class SMSStatsResponse
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
     * @var SMSStatsSeriesPeriod|null
     */
    protected $period;
    /**
     * One row per day or hour in chronological order. Buckets with no activity contain zero counts.
     *
     * @var list<SMSStatsPoint>|null
     */
    protected $data;
    /**
     * The window and bucket grain the response covers, echoed from the request, plus the freshness boundary the data is current to.
     * 
     *
     * @return SMSStatsSeriesPeriod|null
     */
    public function getPeriod(): ?SMSStatsSeriesPeriod
    {
        return $this->period;
    }
    /**
     * The window and bucket grain the response covers, echoed from the request, plus the freshness boundary the data is current to.
     *
     * @param SMSStatsSeriesPeriod|null $period
     *
     * @return self
     */
    public function setPeriod(?SMSStatsSeriesPeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * One row per day or hour in chronological order. Buckets with no activity contain zero counts.
     *
     * @return list<SMSStatsPoint>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * One row per day or hour in chronological order. Buckets with no activity contain zero counts.
     *
     * @param list<SMSStatsPoint>|null $data
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
