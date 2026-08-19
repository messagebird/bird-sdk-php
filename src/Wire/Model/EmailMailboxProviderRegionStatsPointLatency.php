<?php

namespace MessageBird\Wire\Model;

class EmailMailboxProviderRegionStatsPointLatency extends \ArrayObject
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
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family over the bucket. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @var EmailLatencyQuantiles|null
     */
    protected $delivery;
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family over the bucket. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @var EmailLatencyQuantiles|null
     */
    protected $total;
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family over the bucket. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @return EmailLatencyQuantiles|null
     */
    public function getDelivery(): ?EmailLatencyQuantiles
    {
        return $this->delivery;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family over the bucket. All three are null when no qualifying event contributed a measurement.
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
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family over the bucket. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @return EmailLatencyQuantiles|null
     */
    public function getTotal(): ?EmailLatencyQuantiles
    {
        return $this->total;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family over the bucket. All three are null when no qualifying event contributed a measurement.
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
