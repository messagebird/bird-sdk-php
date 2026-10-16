<?php

namespace MessageBird\Wire\Model;

/**
 * Latency percentiles (p50, p95, p99) in milliseconds for the messages in this breakdown row, for breakdowns whose dimension is known only from delivery onward (sending IP, mailbox provider).
 * 
 * - `delivery`: Time from handing the message off to the receiving mail server accepting it. Null when no deliveries occurred for this row in the period.
 * - `total`: End-to-end time from accepting the send to delivery. Null when no deliveries occurred for this row in the period.
 * 
 * These breakdowns have no `processing` latency family. A message's row identifies which sending IP carried it or which mailbox provider received it. This becomes known only after the receiving mail server reports a delivery, bounce, deferral, or late bounce. The accept-to-processed phase ends before that attribution is known, preventing row-level processing latency. Use `GET /v1/email/stats/daily` for processing-latency percentiles across the whole workspace.
 */
class EmailDeliveryLatencyStats
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
