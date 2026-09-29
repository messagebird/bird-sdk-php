<?php

namespace MessageBird\Wire\Model;

class AMBConversationStatsSummary
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
     * Conversation lifecycle counts for the requested scope, attributed to when each event occurred. A conversation can start, reopen, and close more than once over its life, so `started`, `reopened`, and `closed` can each exceed `conversations`, the number of distinct conversations touched in scope. Very large counts are close estimates rather than exact tallies.
     * 
     *
     * @var AMBConversationStatsCounts|null
     */
    protected $counts;
    /**
     * The same statistics for the equal-length, inclusive period ending immediately before the requested start, together with the change between the two periods. Present only when `compare=previous_period` is requested. The change is already computed, so a percentage difference needs no second request.
     * 
     *
     * @var AMBConversationStatsComparison|null
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
     * Conversation lifecycle counts for the requested scope, attributed to when each event occurred. A conversation can start, reopen, and close more than once over its life, so `started`, `reopened`, and `closed` can each exceed `conversations`, the number of distinct conversations touched in scope. Very large counts are close estimates rather than exact tallies.
     * 
     *
     * @return AMBConversationStatsCounts|null
     */
    public function getCounts(): ?AMBConversationStatsCounts
    {
        return $this->counts;
    }
    /**
     * Conversation lifecycle counts for the requested scope, attributed to when each event occurred. A conversation can start, reopen, and close more than once over its life, so `started`, `reopened`, and `closed` can each exceed `conversations`, the number of distinct conversations touched in scope. Very large counts are close estimates rather than exact tallies.
     *
     * @param AMBConversationStatsCounts|null $counts
     *
     * @return self
     */
    public function setCounts(?AMBConversationStatsCounts $counts): self
    {
        $this->initialized['counts'] = true;
        $this->counts = $counts;
        return $this;
    }
    /**
     * The same statistics for the equal-length, inclusive period ending immediately before the requested start, together with the change between the two periods. Present only when `compare=previous_period` is requested. The change is already computed, so a percentage difference needs no second request.
     * 
     *
     * @return AMBConversationStatsComparison|null
     */
    public function getComparison(): ?AMBConversationStatsComparison
    {
        return $this->comparison;
    }
    /**
     * The same statistics for the equal-length, inclusive period ending immediately before the requested start, together with the change between the two periods. Present only when `compare=previous_period` is requested. The change is already computed, so a percentage difference needs no second request.
     *
     * @param AMBConversationStatsComparison|null $comparison
     *
     * @return self
     */
    public function setComparison(?AMBConversationStatsComparison $comparison): self
    {
        $this->initialized['comparison'] = true;
        $this->comparison = $comparison;
        return $this;
    }
}
