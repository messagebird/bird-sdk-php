<?php

namespace MessageBird\Wire\Model;

/**
 * Latency percentiles (p50, p95, p99) in milliseconds for the bucket. On the summary endpoint these are computed across the whole period rather than per bucket. Three families are reported:
 * 
 * - `processing`: Time from accepting the send to handing the message off for delivery. Measured per processed recipient; null when no recipient in the bucket has reached the processed stage.
 * - `delivery`: Time from handoff to the receiving mail server accepting the message, dominated by recipient-side delivery behavior. Measured per delivered recipient; null when no deliveries occurred in the bucket.
 * - `total`: End-to-end time from accepting the send to delivery, and the number most worth watching against your own delivery targets. Measured per delivered recipient; null when no deliveries occurred in the bucket.
 * 
 * Each family is reported independently. A family is omitted when no qualifying
 * event contributed a latency measurement in the bucket. This also applies when
 * the workspace has not recorded latency for that stage yet. The `processing`
 * family can therefore be present while `delivery` and `total` are absent. A
 * client must handle a missing family, and a null p50/p95/p99 within a present
 * family, by rendering a placeholder rather than assuming a number.
 */
class EmailLatencyStats
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
    protected $processing;
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
    public function getProcessing(): ?EmailLatencyQuantiles
    {
        return $this->processing;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family over the bucket. All three are null when no qualifying event contributed a measurement.
     *
     * @param EmailLatencyQuantiles|null $processing
     *
     * @return self
     */
    public function setProcessing(?EmailLatencyQuantiles $processing): self
    {
        $this->initialized['processing'] = true;
        $this->processing = $processing;
        return $this;
    }
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
