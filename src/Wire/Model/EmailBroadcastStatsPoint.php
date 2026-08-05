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
     * The broadcast this row aggregates, the same identifier returned by the broadcast endpoints. Only messages sent as part of a broadcast carry a broadcast identifier; one-off and transactional sends are not included in this breakdown.
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
     * The broadcast this row aggregates, the same identifier returned by the broadcast endpoints. Only messages sent as part of a broadcast carry a broadcast identifier; one-off and transactional sends are not included in this breakdown.
     *
     * @return string|null
     */
    public function getBroadcastId(): ?string
    {
        return $this->broadcastId;
    }
    /**
     * The broadcast this row aggregates, the same identifier returned by the broadcast endpoints. Only messages sent as part of a broadcast carry a broadcast identifier; one-off and transactional sends are not included in this breakdown.
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
     * @param EmailBroadcastStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?EmailBroadcastStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
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
     * @param EmailBroadcastStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?EmailBroadcastStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
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
     * @param EmailBroadcastStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?EmailBroadcastStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
}
