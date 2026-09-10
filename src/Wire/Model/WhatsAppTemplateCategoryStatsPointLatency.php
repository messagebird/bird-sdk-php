<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateCategoryStatsPointLatency extends \ArrayObject
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
     * @var WhatsAppLatencyQuantiles|null
     */
    protected $processing;
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @var WhatsAppLatencyQuantiles|null
     */
    protected $delivery;
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @var WhatsAppLatencyQuantiles|null
     */
    protected $total;
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @return WhatsAppLatencyQuantiles|null
     */
    public function getProcessing(): ?WhatsAppLatencyQuantiles
    {
        return $this->processing;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     *
     * @param WhatsAppLatencyQuantiles|null $processing
     *
     * @return self
     */
    public function setProcessing(?WhatsAppLatencyQuantiles $processing): self
    {
        $this->initialized['processing'] = true;
        $this->processing = $processing;
        return $this;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @return WhatsAppLatencyQuantiles|null
     */
    public function getDelivery(): ?WhatsAppLatencyQuantiles
    {
        return $this->delivery;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     *
     * @param WhatsAppLatencyQuantiles|null $delivery
     *
     * @return self
     */
    public function setDelivery(?WhatsAppLatencyQuantiles $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @return WhatsAppLatencyQuantiles|null
     */
    public function getTotal(): ?WhatsAppLatencyQuantiles
    {
        return $this->total;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     *
     * @param WhatsAppLatencyQuantiles|null $total
     *
     * @return self
     */
    public function setTotal(?WhatsAppLatencyQuantiles $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
}
