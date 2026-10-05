<?php

namespace MessageBird\Wire\Model;

class EmailBroadcastStatsPoint
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
     * The broadcast this row covers, the same ID the broadcast endpoints return. Only mail sent as part of a broadcast has a broadcast ID, so one-off and transactional sends do not appear in this breakdown at all.
     *
     * @var string|null
     */
    protected $broadcastId;
    /**
     * @var EmailBroadcastStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var EmailBroadcastStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var EmailBroadcastStatsPointLatency|null
     */
    protected $latency;
    /**
     * The broadcast this row covers, the same ID the broadcast endpoints return. Only mail sent as part of a broadcast has a broadcast ID, so one-off and transactional sends do not appear in this breakdown at all.
     *
     * @return string|null
     */
    public function getBroadcastId(): ?string
    {
        return $this->broadcastId;
    }
    /**
     * The broadcast this row covers, the same ID the broadcast endpoints return. Only mail sent as part of a broadcast has a broadcast ID, so one-off and transactional sends do not appear in this breakdown at all.
     *
     * @param string|null $broadcastId
     *
     * @return self
     */
    public function setBroadcastId(?string $broadcastId): self
    {
        $this->initialized['broadcastId'] = true;
        $this->broadcastId = $broadcastId;
        return $this;
    }
    /**
     * @return EmailBroadcastStatsPointDelivery|null
     */
    public function getDelivery(): ?EmailBroadcastStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param EmailBroadcastStatsPointDelivery|EmailDeliveryStats|array|null $delivery
     *
     * @return self
     */
    public function setDelivery($delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = \MessageBird\Core\ModelWrapper::normalize($delivery, EmailBroadcastStatsPointDelivery::class);
        return $this;
    }
    /**
     * @return EmailBroadcastStatsPointEngagement|null
     */
    public function getEngagement(): ?EmailBroadcastStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param EmailBroadcastStatsPointEngagement|EmailEngagementStats|array|null $engagement
     *
     * @return self
     */
    public function setEngagement($engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = \MessageBird\Core\ModelWrapper::normalize($engagement, EmailBroadcastStatsPointEngagement::class);
        return $this;
    }
    /**
     * @return EmailBroadcastStatsPointLatency|null
     */
    public function getLatency(): ?EmailBroadcastStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param EmailBroadcastStatsPointLatency|EmailLatencyStats|array|null $latency
     *
     * @return self
     */
    public function setLatency($latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = \MessageBird\Core\ModelWrapper::normalize($latency, EmailBroadcastStatsPointLatency::class);
        return $this;
    }
}
