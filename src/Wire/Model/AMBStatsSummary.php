<?php

namespace MessageBird\Wire\Model;

class AMBStatsSummary
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
     * New monthly active contact charges activated by replies submitted in this window. Each business-scoped contact counts once per UTC calendar month. Omitted for message-kind, intent, group, category or tag filters. Read from retained activation records independently of the message rollup data_as_of boundary; tenant purges remove these records.
     *
     * @var int|null
     */
    protected $monthlyActiveContacts;
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
     * Outbound Apple Messages for Business counts for the requested scope, attributed to when each message was accepted. Apple Messages for Business has no delivery receipt, so there is no `delivered` count anywhere in this API: `sent` is the last outbound state Bird observes for a message. Very large counts are close estimates rather than exact tallies. Rates are computed once here, clamped to 1, and null when nothing was accepted.
     * 
     *
     * @var AMBOutboundStatsCounts|null
     */
    protected $counts;
    /**
     * Processing-latency percentiles in milliseconds for the requested scope, from acceptance to Apple handoff. Apple Messages for Business has no delivery receipt, so there is no `delivery` or `total` member beside `processing`. Conversation response timing is reported separately in `first_response`. Always present; every percentile is null when no qualifying message in scope has a measurement.
     * 
     *
     * @var AMBStatsLatency|null
     */
    protected $latency;
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @var AMBStatsQuantiles|null
     */
    protected $firstResponse;
    /**
     * The same statistics for the equal-length, inclusive period ending immediately before the requested start, together with computed changes for the message counts and rates listed in `delta`. Present only when `compare=previous_period` is requested. Monthly active contacts and latency values are returned for both periods without a computed change.
     * 
     *
     * @var AMBStatsComparison|null
     */
    protected $comparison;
    /**
     * New monthly active contact charges activated by replies submitted in this window. Each business-scoped contact counts once per UTC calendar month. Omitted for message-kind, intent, group, category or tag filters. Read from retained activation records independently of the message rollup data_as_of boundary; tenant purges remove these records.
     *
     * @return int|null
     */
    public function getMonthlyActiveContacts(): ?int
    {
        return $this->monthlyActiveContacts;
    }
    /**
     * New monthly active contact charges activated by replies submitted in this window. Each business-scoped contact counts once per UTC calendar month. Omitted for message-kind, intent, group, category or tag filters. Read from retained activation records independently of the message rollup data_as_of boundary; tenant purges remove these records.
     *
     * @param int|null $monthlyActiveContacts
     *
     * @return self
     */
    public function setMonthlyActiveContacts(?int $monthlyActiveContacts): self
    {
        $this->initialized['monthlyActiveContacts'] = true;
        $this->monthlyActiveContacts = $monthlyActiveContacts;
        return $this;
    }
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
     * Outbound Apple Messages for Business counts for the requested scope, attributed to when each message was accepted. Apple Messages for Business has no delivery receipt, so there is no `delivered` count anywhere in this API: `sent` is the last outbound state Bird observes for a message. Very large counts are close estimates rather than exact tallies. Rates are computed once here, clamped to 1, and null when nothing was accepted.
     * 
     *
     * @return AMBOutboundStatsCounts|null
     */
    public function getCounts(): ?AMBOutboundStatsCounts
    {
        return $this->counts;
    }
    /**
     * Outbound Apple Messages for Business counts for the requested scope, attributed to when each message was accepted. Apple Messages for Business has no delivery receipt, so there is no `delivered` count anywhere in this API: `sent` is the last outbound state Bird observes for a message. Very large counts are close estimates rather than exact tallies. Rates are computed once here, clamped to 1, and null when nothing was accepted.
     *
     * @param AMBOutboundStatsCounts|null $counts
     *
     * @return self
     */
    public function setCounts(?AMBOutboundStatsCounts $counts): self
    {
        $this->initialized['counts'] = true;
        $this->counts = $counts;
        return $this;
    }
    /**
     * Processing-latency percentiles in milliseconds for the requested scope, from acceptance to Apple handoff. Apple Messages for Business has no delivery receipt, so there is no `delivery` or `total` member beside `processing`. Conversation response timing is reported separately in `first_response`. Always present; every percentile is null when no qualifying message in scope has a measurement.
     * 
     *
     * @return AMBStatsLatency|null
     */
    public function getLatency(): ?AMBStatsLatency
    {
        return $this->latency;
    }
    /**
     * Processing-latency percentiles in milliseconds for the requested scope, from acceptance to Apple handoff. Apple Messages for Business has no delivery receipt, so there is no `delivery` or `total` member beside `processing`. Conversation response timing is reported separately in `first_response`. Always present; every percentile is null when no qualifying message in scope has a measurement.
     *
     * @param AMBStatsLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?AMBStatsLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @return AMBStatsQuantiles|null
     */
    public function getFirstResponse(): ?AMBStatsQuantiles
    {
        return $this->firstResponse;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     *
     * @param AMBStatsQuantiles|null $firstResponse
     *
     * @return self
     */
    public function setFirstResponse(?AMBStatsQuantiles $firstResponse): self
    {
        $this->initialized['firstResponse'] = true;
        $this->firstResponse = $firstResponse;
        return $this;
    }
    /**
     * The same statistics for the equal-length, inclusive period ending immediately before the requested start, together with computed changes for the message counts and rates listed in `delta`. Present only when `compare=previous_period` is requested. Monthly active contacts and latency values are returned for both periods without a computed change.
     * 
     *
     * @return AMBStatsComparison|null
     */
    public function getComparison(): ?AMBStatsComparison
    {
        return $this->comparison;
    }
    /**
     * The same statistics for the equal-length, inclusive period ending immediately before the requested start, together with computed changes for the message counts and rates listed in `delta`. Present only when `compare=previous_period` is requested. Monthly active contacts and latency values are returned for both periods without a computed change.
     *
     * @param AMBStatsComparison|null $comparison
     *
     * @return self
     */
    public function setComparison(?AMBStatsComparison $comparison): self
    {
        $this->initialized['comparison'] = true;
        $this->comparison = $comparison;
        return $this;
    }
}
