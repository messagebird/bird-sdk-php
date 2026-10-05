<?php

namespace MessageBird\Wire\Model;

class WhatsAppCountryStatsPoint
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
     * The destination country this row aggregates, as an ISO 3166-1 alpha-2 code. `ZZ` collects recipients whose country could not be resolved.
     *
     * @var string|null
     */
    protected $country;
    /**
     * @var WhatsAppCountryStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var WhatsAppCountryStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var WhatsAppCountryStatsPointLatency|null
     */
    protected $latency;
    /**
     * The destination country this row aggregates, as an ISO 3166-1 alpha-2 code. `ZZ` collects recipients whose country could not be resolved.
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }
    /**
     * The destination country this row aggregates, as an ISO 3166-1 alpha-2 code. `ZZ` collects recipients whose country could not be resolved.
     *
     * @param string|null $country
     *
     * @return self
     */
    public function setCountry(?string $country): self
    {
        $this->initialized['country'] = true;
        $this->country = $country;
        return $this;
    }
    /**
     * @return WhatsAppCountryStatsPointDelivery|null
     */
    public function getDelivery(): ?WhatsAppCountryStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param WhatsAppCountryStatsPointDelivery|WhatsAppDeliveryStats|array|null $delivery
     *
     * @return self
     */
    public function setDelivery($delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = \MessageBird\Core\ModelWrapper::normalize($delivery, WhatsAppCountryStatsPointDelivery::class);
        return $this;
    }
    /**
     * @return WhatsAppCountryStatsPointEngagement|null
     */
    public function getEngagement(): ?WhatsAppCountryStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param WhatsAppCountryStatsPointEngagement|WhatsAppEngagementStats|array|null $engagement
     *
     * @return self
     */
    public function setEngagement($engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = \MessageBird\Core\ModelWrapper::normalize($engagement, WhatsAppCountryStatsPointEngagement::class);
        return $this;
    }
    /**
     * @return WhatsAppCountryStatsPointLatency|null
     */
    public function getLatency(): ?WhatsAppCountryStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param WhatsAppCountryStatsPointLatency|WhatsAppLatencyStats|array|null $latency
     *
     * @return self
     */
    public function setLatency($latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = \MessageBird\Core\ModelWrapper::normalize($latency, WhatsAppCountryStatsPointLatency::class);
        return $this;
    }
}
