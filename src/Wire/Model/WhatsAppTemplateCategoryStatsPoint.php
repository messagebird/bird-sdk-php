<?php

namespace MessageBird\Wire\Model;

/**
 * Lifecycle counts, derived rates, and engagement for a single WhatsApp message category over the requested period. A template send counts under its template's category; a free-form send counts under `service`.
 */
class WhatsAppTemplateCategoryStatsPoint
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
     * The category this row aggregates. `service` aggregates free-form messages.
     *
     * @var string|null
     */
    protected $category;
    /**
     * @var WhatsAppTemplateCategoryStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var WhatsAppTemplateCategoryStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var WhatsAppTemplateCategoryStatsPointLatency|null
     */
    protected $latency;
    /**
     * The category this row aggregates. `service` aggregates free-form messages.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * The category this row aggregates. `service` aggregates free-form messages.
     *
     * @param string|null $category
     *
     * @return self
     */
    public function setCategory(?string $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;
        return $this;
    }
    /**
     * @return WhatsAppTemplateCategoryStatsPointDelivery|null
     */
    public function getDelivery(): ?WhatsAppTemplateCategoryStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param WhatsAppTemplateCategoryStatsPointDelivery|WhatsAppDeliveryStats|array|null $delivery
     *
     * @return self
     */
    public function setDelivery($delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = \MessageBird\Core\ModelWrapper::normalize($delivery, WhatsAppTemplateCategoryStatsPointDelivery::class);
        return $this;
    }
    /**
     * @return WhatsAppTemplateCategoryStatsPointEngagement|null
     */
    public function getEngagement(): ?WhatsAppTemplateCategoryStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param WhatsAppTemplateCategoryStatsPointEngagement|WhatsAppEngagementStats|array|null $engagement
     *
     * @return self
     */
    public function setEngagement($engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = \MessageBird\Core\ModelWrapper::normalize($engagement, WhatsAppTemplateCategoryStatsPointEngagement::class);
        return $this;
    }
    /**
     * @return WhatsAppTemplateCategoryStatsPointLatency|null
     */
    public function getLatency(): ?WhatsAppTemplateCategoryStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param WhatsAppTemplateCategoryStatsPointLatency|WhatsAppLatencyStats|array|null $latency
     *
     * @return self
     */
    public function setLatency($latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = \MessageBird\Core\ModelWrapper::normalize($latency, WhatsAppTemplateCategoryStatsPointLatency::class);
        return $this;
    }
}
