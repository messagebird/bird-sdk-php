<?php

namespace MessageBird\Wire\Model;

class AMBStatsPoint
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
}
