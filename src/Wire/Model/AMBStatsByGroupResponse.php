<?php

namespace MessageBird\Wire\Model;

class AMBStatsByGroupResponse
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
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     * 
     *
     * @var AMBStatsSummaryPeriod|null
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
     * Group rows ranked by accepted volume descending.
     *
     * @var list<AMBGroupStatsPoint>|null
     */
    protected $data;
    /**
     * Total distinct groups with activity in the period, regardless of `limit`.
     *
     * @var int|null
     */
    protected $total;
    /**
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     * 
     *
     * @return AMBStatsSummaryPeriod|null
     */
    public function getPeriod(): ?AMBStatsSummaryPeriod
    {
        return $this->period;
    }
    /**
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     *
     * @param AMBStatsSummaryPeriod|null $period
     *
     * @return self
     */
    public function setPeriod(?AMBStatsSummaryPeriod $period): self
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
     * Group rows ranked by accepted volume descending.
     *
     * @return list<AMBGroupStatsPoint>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Group rows ranked by accepted volume descending.
     *
     * @param list<AMBGroupStatsPoint>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
    /**
     * Total distinct groups with activity in the period, regardless of `limit`.
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
    /**
     * Total distinct groups with activity in the period, regardless of `limit`.
     *
     * @param int|null $total
     *
     * @return self
     */
    public function setTotal(?int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
}
