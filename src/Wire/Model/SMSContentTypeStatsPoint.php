<?php

namespace MessageBird\Wire\Model;

/**
 * Aggregate delivery and latency stats for a single message type over the requested period.
 */
class SMSContentTypeStatsPoint
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
     * Message type used for reporting. Previously recorded statistics remain attributed to SMS. New activity uses the message type.
     *
     * @var string|null
     */
    protected $contentType;
    /**
     * @var SMSContentTypeStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var SMSContentTypeStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket lifecycle counts for this message type, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @var list<SMSStatsPoint>|null
     */
    protected $trend;
    /**
     * Message type used for reporting. Previously recorded statistics remain attributed to SMS. New activity uses the message type.
     *
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    /**
     * Message type used for reporting. Previously recorded statistics remain attributed to SMS. New activity uses the message type.
     *
     * @param string|null $contentType
     *
     * @return self
     */
    public function setContentType(?string $contentType): self
    {
        $this->initialized['contentType'] = true;
        $this->contentType = $contentType;
        return $this;
    }
    /**
     * @return SMSContentTypeStatsPointDelivery|null
     */
    public function getDelivery(): ?SMSContentTypeStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param SMSContentTypeStatsPointDelivery|SMSDeliveryStats|array|null $delivery
     *
     * @return self
     */
    public function setDelivery($delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = \MessageBird\Core\ModelWrapper::normalize($delivery, SMSContentTypeStatsPointDelivery::class);
        return $this;
    }
    /**
     * @return SMSContentTypeStatsPointLatency|null
     */
    public function getLatency(): ?SMSContentTypeStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param SMSContentTypeStatsPointLatency|SMSLatencyStats|array|null $latency
     *
     * @return self
     */
    public function setLatency($latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = \MessageBird\Core\ModelWrapper::normalize($latency, SMSContentTypeStatsPointLatency::class);
        return $this;
    }
    /**
     * Per-bucket lifecycle counts for this message type, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @return list<SMSStatsPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket lifecycle counts for this message type, using `trend_grain`. Includes only buckets with activity. Present when `include_trend=true`.
     *
     * @param list<SMSStatsPoint>|null $trend
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
