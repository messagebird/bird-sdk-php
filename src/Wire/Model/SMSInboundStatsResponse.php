<?php

namespace MessageBird\Wire\Model;

class SMSInboundStatsResponse
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
     * One row per bucket (day or hour, per the grain) in the period, in chronological order. Buckets with no activity are included with a count of zero, so the series charts continuously without client-side gap handling.
     *
     * @var list<SMSInboundStatsPoint>|null
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
     * One row per bucket (day or hour, per the grain) in the period, in chronological order. Buckets with no activity are included with a count of zero, so the series charts continuously without client-side gap handling.
     *
     * @return list<SMSInboundStatsPoint>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * One row per bucket (day or hour, per the grain) in the period, in chronological order. Buckets with no activity are included with a count of zero, so the series charts continuously without client-side gap handling.
     *
     * @param list<SMSInboundStatsPoint>|null $data
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
