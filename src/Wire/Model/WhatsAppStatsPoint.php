<?php

namespace MessageBird\Wire\Model;

class WhatsAppStatsPoint
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
     * The day (YYYY-MM-DD) or hour (RFC 3339, on the hour) this point covers, matching the period's grain.
     *
     * @var string|null
     */
    protected $bucket;
    /**
     * @var WhatsAppStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var WhatsAppStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var WhatsAppStatsPointLatency|null
     */
    protected $latency;
    /**
     * The day (YYYY-MM-DD) or hour (RFC 3339, on the hour) this point covers, matching the period's grain.
     *
     * @return string|null
     */
    public function getBucket(): ?string
    {
        return $this->bucket;
    }
    /**
     * The day (YYYY-MM-DD) or hour (RFC 3339, on the hour) this point covers, matching the period's grain.
     *
     * @param string|null $bucket
     *
     * @return self
     */
    public function setBucket(?string $bucket): self
    {
        $this->initialized['bucket'] = true;
        $this->bucket = $bucket;
        return $this;
    }
    /**
     * @return WhatsAppStatsPointDelivery|null
     */
    public function getDelivery(): ?WhatsAppStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param WhatsAppStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?WhatsAppStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return WhatsAppStatsPointEngagement|null
     */
    public function getEngagement(): ?WhatsAppStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param WhatsAppStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?WhatsAppStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return WhatsAppStatsPointLatency|null
     */
    public function getLatency(): ?WhatsAppStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param WhatsAppStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?WhatsAppStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
}
