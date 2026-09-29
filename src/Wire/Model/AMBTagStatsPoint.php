<?php

namespace MessageBird\Wire\Model;

class AMBTagStatsPoint
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
     * The tag these messages carry, as a bare name or a `name:value` pair. A message with several tags is counted once under each, so rows do not sum to the period total.
     *
     * @var string|null
     */
    protected $tag;
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
     * The tag these messages carry, as a bare name or a `name:value` pair. A message with several tags is counted once under each, so rows do not sum to the period total.
     *
     * @return string|null
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }
    /**
     * The tag these messages carry, as a bare name or a `name:value` pair. A message with several tags is counted once under each, so rows do not sum to the period total.
     *
     * @param string|null $tag
     *
     * @return self
     */
    public function setTag(?string $tag): self
    {
        $this->initialized['tag'] = true;
        $this->tag = $tag;
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
