<?php

namespace MessageBird\Wire\Model;

/**
 * Delivery and latency stats for messages sent from a single IP address over the requested period. Per-IP attribution begins only after a message is processed: we learn which IP a message used only from its delivery, bounce, deferral, and late-bounce events. Acceptance and processing events do not contribute to per-IP attribution. As a result, per-IP rows omit the `accepted` and `processed` counts and the `processing` latency family. Those fields never appear on a per-IP row. They are not returned as null.
 */
class EmailSendingIpStatsPoint
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
     * The IP address used to send messages aggregated in this row.
     *
     * @var string|null
     */
    protected $sendingIp;
    /**
     * The dedicated IP pool this address sent through, or null when the messages went through the shared pool. Recorded when each message was sent, so it reflects the pool used at send time even if the IP has since moved between pools or been released.
     * 
     *
     * @var string|null
     */
    protected $ipPoolId;
    /**
     * @var EmailSendingIpStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var EmailSendingIpStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket delivery-rate series for this IP over the window. Present only when `include_trend=true`. Engagement is not attributed to a sending IP, so each point's open and click rates read 0 in buckets with deliveries and null in buckets without.
     *
     * @var list<EmailStatsSeriesPoint>|null
     */
    protected $trend;
    /**
     * The IP address used to send messages aggregated in this row.
     *
     * @return string|null
     */
    public function getSendingIp(): ?string
    {
        return $this->sendingIp;
    }
    /**
     * The IP address used to send messages aggregated in this row.
     *
     * @param string|null $sendingIp
     *
     * @return self
     */
    public function setSendingIp(?string $sendingIp): self
    {
        $this->initialized['sendingIp'] = true;
        $this->sendingIp = $sendingIp;
        return $this;
    }
    /**
     * The dedicated IP pool this address sent through, or null when the messages went through the shared pool. Recorded when each message was sent, so it reflects the pool used at send time even if the IP has since moved between pools or been released.
     * 
     *
     * @return string|null
     */
    public function getIpPoolId(): ?string
    {
        return $this->ipPoolId;
    }
    /**
     * The dedicated IP pool this address sent through, or null when the messages went through the shared pool. Recorded when each message was sent, so it reflects the pool used at send time even if the IP has since moved between pools or been released.
     *
     * @param string|null $ipPoolId
     *
     * @return self
     */
    public function setIpPoolId(?string $ipPoolId): self
    {
        $this->initialized['ipPoolId'] = true;
        $this->ipPoolId = $ipPoolId;
        return $this;
    }
    /**
     * @return EmailSendingIpStatsPointDelivery|null
     */
    public function getDelivery(): ?EmailSendingIpStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param EmailSendingIpStatsPointDelivery|EmailSendingIpDeliveryStats|array|null $delivery
     *
     * @return self
     */
    public function setDelivery($delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = \MessageBird\Core\ModelWrapper::normalize($delivery, EmailSendingIpStatsPointDelivery::class);
        return $this;
    }
    /**
     * @return EmailSendingIpStatsPointLatency|null
     */
    public function getLatency(): ?EmailSendingIpStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param EmailSendingIpStatsPointLatency|EmailDeliveryLatencyStats|array|null $latency
     *
     * @return self
     */
    public function setLatency($latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = \MessageBird\Core\ModelWrapper::normalize($latency, EmailSendingIpStatsPointLatency::class);
        return $this;
    }
    /**
     * Per-bucket delivery-rate series for this IP over the window. Present only when `include_trend=true`. Engagement is not attributed to a sending IP, so each point's open and click rates read 0 in buckets with deliveries and null in buckets without.
     *
     * @return list<EmailStatsSeriesPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket delivery-rate series for this IP over the window. Present only when `include_trend=true`. Engagement is not attributed to a sending IP, so each point's open and click rates read 0 in buckets with deliveries and null in buckets without.
     *
     * @param list<EmailStatsSeriesPoint>|null $trend
     *
     * @return self
     */
    public function setTrend(?array $trend): self
    {
        $this->initialized['trend'] = true;
        $this->trend = $trend;
        return $this;
    }
}
