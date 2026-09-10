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
     * @param WhatsAppCountryStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?WhatsAppCountryStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
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
     * @param WhatsAppCountryStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?WhatsAppCountryStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
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
     * @param WhatsAppCountryStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?WhatsAppCountryStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
}
