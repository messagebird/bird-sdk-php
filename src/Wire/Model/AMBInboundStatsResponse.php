<?php

namespace MessageBird\Wire\Model;

class AMBInboundStatsResponse
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
     * @var AMBStatsSeriesPeriod|null
     */
    protected $period;
    /**
     * Which timestamp a statistics response buckets its rows and totals by:
     * 
     * - `accepted_time`: attributed to when Bird accepted the outbound message for sending. The outbound send statistics use this, so a later event for the same message, such as a send failure, still counts against the day or hour its message was accepted.
     * - `event_time`: attributed to when the event itself occurred. Inbound message statistics, conversation statistics and the staff per-business failure counts use this, since there is no earlier outbound event to anchor them to.
     * 
     * A response never mixes the two axes: every row and total in one payload shares the same attribution.
     * 
     *
     * @var string|null
     */
    protected $attribution;
    /**
     * One row per bucket (day or hour, matching the request) in the period, in chronological order. Buckets with no activity are included with a count of zero, so the series charts continuously without client-side gap handling.
     *
     * @var list<AMBInboundStatsPoint>|null
     */
    protected $data;
    /**
     * The window and bucket grain the response covers, echoed from the request, plus the freshness boundary the data is current to.
     * 
     *
     * @return AMBStatsSeriesPeriod|null
     */
    public function getPeriod(): ?AMBStatsSeriesPeriod
    {
        return $this->period;
    }
    /**
     * The window and bucket grain the response covers, echoed from the request, plus the freshness boundary the data is current to.
     *
     * @param AMBStatsSeriesPeriod|null $period
     *
     * @return self
     */
    public function setPeriod(?AMBStatsSeriesPeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * Which timestamp a statistics response buckets its rows and totals by:
     * 
     * - `accepted_time`: attributed to when Bird accepted the outbound message for sending. The outbound send statistics use this, so a later event for the same message, such as a send failure, still counts against the day or hour its message was accepted.
     * - `event_time`: attributed to when the event itself occurred. Inbound message statistics, conversation statistics and the staff per-business failure counts use this, since there is no earlier outbound event to anchor them to.
     * 
     * A response never mixes the two axes: every row and total in one payload shares the same attribution.
     * 
     *
     * @return string|null
     */
    public function getAttribution(): ?string
    {
        return $this->attribution;
    }
    /**
    * Which timestamp a statistics response buckets its rows and totals by:
    
    - `accepted_time`: attributed to when Bird accepted the outbound message for sending. The outbound send statistics use this, so a later event for the same message, such as a send failure, still counts against the day or hour its message was accepted.
    - `event_time`: attributed to when the event itself occurred. Inbound message statistics, conversation statistics and the staff per-business failure counts use this, since there is no earlier outbound event to anchor them to.
    
    A response never mixes the two axes: every row and total in one payload shares the same attribution.
    
    *
    * @param string|null $attribution
    *
    * @return self
    */
    public function setAttribution(?string $attribution): self
    {
        $this->initialized['attribution'] = true;
        $this->attribution = $attribution;
        return $this;
    }
    /**
     * One row per bucket (day or hour, matching the request) in the period, in chronological order. Buckets with no activity are included with a count of zero, so the series charts continuously without client-side gap handling.
     *
     * @return list<AMBInboundStatsPoint>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * One row per bucket (day or hour, matching the request) in the period, in chronological order. Buckets with no activity are included with a count of zero, so the series charts continuously without client-side gap handling.
     *
     * @param list<AMBInboundStatsPoint>|null $data
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
