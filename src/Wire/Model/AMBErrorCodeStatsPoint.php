<?php

namespace MessageBird\Wire\Model;

class AMBErrorCodeStatsPoint
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
     * Machine-readable reason a send failed, in one of two namespaces: `bird:` for a reason Bird's own pipeline assigned (for example `bird:business_not_registered`), or `apple:` followed by the HTTP status Apple's API returned for the send attempt (for example `apple:404`). This is an open, growing set in both namespaces; accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $errorCode;
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
     * Machine-readable reason a send failed, in one of two namespaces: `bird:` for a reason Bird's own pipeline assigned (for example `bird:business_not_registered`), or `apple:` followed by the HTTP status Apple's API returned for the send attempt (for example `apple:404`). This is an open, growing set in both namespaces; accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }
    /**
     * Machine-readable reason a send failed, in one of two namespaces: `bird:` for a reason Bird's own pipeline assigned (for example `bird:business_not_registered`), or `apple:` followed by the HTTP status Apple's API returned for the send attempt (for example `apple:404`). This is an open, growing set in both namespaces; accept unrecognized values.
     *
     * @param string|null $errorCode
     *
     * @return self
     */
    public function setErrorCode(?string $errorCode): self
    {
        $this->initialized['errorCode'] = true;
        $this->errorCode = $errorCode;
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
}
