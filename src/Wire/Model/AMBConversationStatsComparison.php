<?php

namespace MessageBird\Wire\Model;

class AMBConversationStatsComparison
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
     * Conversation lifecycle counts for the requested scope, attributed to when each event occurred. A conversation can start, reopen, and close more than once over its life, so `started`, `reopened`, and `closed` can each exceed `conversations`, the number of distinct conversations touched in scope. Very large counts are close estimates rather than exact tallies.
     * 
     *
     * @var AMBConversationStatsCounts|null
     */
    protected $counts;
    /**
     * Changes from the previous period. Each value is the signed relative change `(current - previous) / previous` and is null when the previous count is zero.
     * 
     *
     * @var AMBConversationStatsComparisonDelta|null
     */
    protected $delta;
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
     * Changes from the previous period. Each value is the signed relative change `(current - previous) / previous` and is null when the previous count is zero.
     * 
     *
     * @return AMBConversationStatsComparisonDelta|null
     */
    public function getDelta(): ?AMBConversationStatsComparisonDelta
    {
        return $this->delta;
    }
    /**
     * Changes from the previous period. Each value is the signed relative change `(current - previous) / previous` and is null when the previous count is zero.
     *
     * @param AMBConversationStatsComparisonDelta|null $delta
     *
     * @return self
     */
    public function setDelta(?AMBConversationStatsComparisonDelta $delta): self
    {
        $this->initialized['delta'] = true;
        $this->delta = $delta;
        return $this;
    }
}
