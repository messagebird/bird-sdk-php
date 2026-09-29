<?php

namespace MessageBird\Wire\Model;

class AMBConversationStatsPoint
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
     * The day (YYYY-MM-DD) or hour (RFC 3339, on the hour) this point covers, matching the period's grain.
     *
     * @var string|null
     */
    protected $bucket;
    /**
     * Conversation lifecycle counts for the requested scope, attributed to when each event occurred. A conversation can start, reopen, and close more than once over its life, so `started`, `reopened`, and `closed` can each exceed `conversations`, the number of distinct conversations touched in scope. Very large counts are close estimates rather than exact tallies.
     * 
     *
     * @var AMBConversationStatsCounts|null
     */
    protected $counts;
    /**
     * The day (YYYY-MM-DD) or hour (RFC 3339, on the hour) this point covers, matching the period's grain.
     *
     * @return string|null
     */
    public function getBucket(): ?string
    {
        return $this->bucket;
    }
    /**
     * The day (YYYY-MM-DD) or hour (RFC 3339, on the hour) this point covers, matching the period's grain.
     *
     * @param string|null $bucket
     *
     * @return self
     */
    public function setBucket(?string $bucket): self
    {
        $this->initialized['bucket'] = true;
        $this->bucket = $bucket;
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
}
