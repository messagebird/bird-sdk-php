<?php

namespace MessageBird\Wire\Model;

class WhatsAppStatsResponse
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
     * @var WhatsAppStatsSeriesPeriod|null
     */
    protected $period;
    /**
     * One row per day or hour in chronological order. Buckets with no activity contain zero counts.
     *
     * @var list<WhatsAppStatsPoint>|null
     */
    protected $data;
    /**
     * The window and bucket grain the response covers, echoed from the request, plus the freshness boundary the data is current to.
     * 
     *
     * @return WhatsAppStatsSeriesPeriod|null
     */
    public function getPeriod(): ?WhatsAppStatsSeriesPeriod
    {
        return $this->period;
    }
    /**
     * The window and bucket grain the response covers, echoed from the request, plus the freshness boundary the data is current to.
     *
     * @param WhatsAppStatsSeriesPeriod|null $period
     *
     * @return self
     */
    public function setPeriod(?WhatsAppStatsSeriesPeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * One row per day or hour in chronological order. Buckets with no activity contain zero counts.
     *
     * @return list<WhatsAppStatsPoint>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * One row per day or hour in chronological order. Buckets with no activity contain zero counts.
     *
     * @param list<WhatsAppStatsPoint>|null $data
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
