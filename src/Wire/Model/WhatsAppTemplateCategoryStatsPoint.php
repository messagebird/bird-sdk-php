<?php

namespace MessageBird\Wire\Model;

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
     * The template category this row aggregates.
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
     * The template category this row aggregates.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * The template category this row aggregates.
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
     * @param WhatsAppTemplateCategoryStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?WhatsAppTemplateCategoryStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
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
     * @param WhatsAppTemplateCategoryStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?WhatsAppTemplateCategoryStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
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
     * @param WhatsAppTemplateCategoryStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?WhatsAppTemplateCategoryStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
}
