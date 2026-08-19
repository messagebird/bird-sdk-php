<?php

namespace MessageBird\Wire\Model;

class SMSCategoryStatsPointLatency extends \ArrayObject
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
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @var SMSLatencyQuantiles|null
     */
    protected $processing;
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @var SMSLatencyQuantiles|null
     */
    protected $delivery;
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @var SMSLatencyQuantiles|null
     */
    protected $total;
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @return SMSLatencyQuantiles|null
     */
    public function getProcessing(): ?SMSLatencyQuantiles
    {
        return $this->processing;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     *
     * @param SMSLatencyQuantiles|null $processing
     *
     * @return self
     */
    public function setProcessing(?SMSLatencyQuantiles $processing): self
    {
        $this->initialized['processing'] = true;
        $this->processing = $processing;
        return $this;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @return SMSLatencyQuantiles|null
     */
    public function getDelivery(): ?SMSLatencyQuantiles
    {
        return $this->delivery;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     *
     * @param SMSLatencyQuantiles|null $delivery
     *
     * @return self
     */
    public function setDelivery(?SMSLatencyQuantiles $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @return SMSLatencyQuantiles|null
     */
    public function getTotal(): ?SMSLatencyQuantiles
    {
        return $this->total;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     *
     * @param SMSLatencyQuantiles|null $total
     *
     * @return self
     */
    public function setTotal(?SMSLatencyQuantiles $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
}
