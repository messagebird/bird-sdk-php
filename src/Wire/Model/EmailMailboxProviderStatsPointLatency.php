<?php

namespace MessageBird\Wire\Model;

class EmailMailboxProviderStatsPointLatency extends \ArrayObject
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
     * p50, p95, and p99 latency percentiles in milliseconds for one latency family over the bucket. Percentiles are approximate (computed from a high-volume aggregation pipeline). All three are null together when no qualifying event contributed a latency measurement in the bucket.
     * 
     *
     * @var EmailLatencyQuantiles|null
     */
    protected $delivery;
    /**
     * p50, p95, and p99 latency percentiles in milliseconds for one latency family over the bucket. Percentiles are approximate (computed from a high-volume aggregation pipeline). All three are null together when no qualifying event contributed a latency measurement in the bucket.
     * 
     *
     * @var EmailLatencyQuantiles|null
     */
    protected $total;
    /**
     * p50, p95, and p99 latency percentiles in milliseconds for one latency family over the bucket. Percentiles are approximate (computed from a high-volume aggregation pipeline). All three are null together when no qualifying event contributed a latency measurement in the bucket.
     * 
     *
     * @return EmailLatencyQuantiles|null
     */
    public function getDelivery(): ?EmailLatencyQuantiles
    {
        return $this->delivery;
    }
    /**
     * p50, p95, and p99 latency percentiles in milliseconds for one latency family over the bucket. Percentiles are approximate (computed from a high-volume aggregation pipeline). All three are null together when no qualifying event contributed a latency measurement in the bucket.
     *
     * @param EmailLatencyQuantiles|null $delivery
     *
     * @return self
     */
    public function setDelivery(?EmailLatencyQuantiles $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * p50, p95, and p99 latency percentiles in milliseconds for one latency family over the bucket. Percentiles are approximate (computed from a high-volume aggregation pipeline). All three are null together when no qualifying event contributed a latency measurement in the bucket.
     * 
     *
     * @return EmailLatencyQuantiles|null
     */
    public function getTotal(): ?EmailLatencyQuantiles
    {
        return $this->total;
    }
    /**
     * p50, p95, and p99 latency percentiles in milliseconds for one latency family over the bucket. Percentiles are approximate (computed from a high-volume aggregation pipeline). All three are null together when no qualifying event contributed a latency measurement in the bucket.
     *
     * @param EmailLatencyQuantiles|null $total
     *
     * @return self
     */
    public function setTotal(?EmailLatencyQuantiles $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
}
