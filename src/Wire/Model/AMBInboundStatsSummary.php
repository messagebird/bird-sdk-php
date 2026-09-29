<?php

namespace MessageBird\Wire\Model;

class AMBInboundStatsSummary
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
     * Distinct messages received in the period, counted by the time each message occurred. Computed across the whole window rather than summed from the daily or hourly series, so it can sit slightly below the sum of those rows.
     *
     * @var int|null
     */
    protected $received;
    /**
     * The received-message count for the equal-length, inclusive period ending immediately before the requested start, together with the change between the two periods. Present only when `compare=previous_period` is requested. The change is already computed, so a percentage difference needs no second request.
     * 
     *
     * @var AMBInboundStatsComparison|null
     */
    protected $comparison;
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
     * Distinct messages received in the period, counted by the time each message occurred. Computed across the whole window rather than summed from the daily or hourly series, so it can sit slightly below the sum of those rows.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct messages received in the period, counted by the time each message occurred. Computed across the whole window rather than summed from the daily or hourly series, so it can sit slightly below the sum of those rows.
     *
     * @param int|null $received
     *
     * @return self
     */
    public function setReceived(?int $received): self
    {
        $this->initialized['received'] = true;
        $this->received = $received;
        return $this;
    }
    /**
     * The received-message count for the equal-length, inclusive period ending immediately before the requested start, together with the change between the two periods. Present only when `compare=previous_period` is requested. The change is already computed, so a percentage difference needs no second request.
     * 
     *
     * @return AMBInboundStatsComparison|null
     */
    public function getComparison(): ?AMBInboundStatsComparison
    {
        return $this->comparison;
    }
    /**
     * The received-message count for the equal-length, inclusive period ending immediately before the requested start, together with the change between the two periods. Present only when `compare=previous_period` is requested. The change is already computed, so a percentage difference needs no second request.
     *
     * @param AMBInboundStatsComparison|null $comparison
     *
     * @return self
     */
    public function setComparison(?AMBInboundStatsComparison $comparison): self
    {
        $this->initialized['comparison'] = true;
        $this->comparison = $comparison;
        return $this;
    }
}
