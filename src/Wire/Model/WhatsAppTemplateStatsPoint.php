<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateStatsPoint
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
     * The template these messages were sent from, using the same `id` the WhatsApp template endpoints return. A send that resolved no template does not appear in this breakdown. A template renamed after it was used to send still reports under this one `id`, and a template deleted after sending keeps its row rather than dropping the messages.
     * 
     *
     * @var string|null
     */
    protected $templateId;
    /**
     * @var WhatsAppTemplateStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var WhatsAppTemplateStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var WhatsAppTemplateStatsPointLatency|null
     */
    protected $latency;
    /**
     * The template these messages were sent from, using the same `id` the WhatsApp template endpoints return. A send that resolved no template does not appear in this breakdown. A template renamed after it was used to send still reports under this one `id`, and a template deleted after sending keeps its row rather than dropping the messages.
     * 
     *
     * @return string|null
     */
    public function getTemplateId(): ?string
    {
        return $this->templateId;
    }
    /**
     * The template these messages were sent from, using the same `id` the WhatsApp template endpoints return. A send that resolved no template does not appear in this breakdown. A template renamed after it was used to send still reports under this one `id`, and a template deleted after sending keeps its row rather than dropping the messages.
     *
     * @param string|null $templateId
     *
     * @return self
     */
    public function setTemplateId(?string $templateId): self
    {
        $this->initialized['templateId'] = true;
        $this->templateId = $templateId;
        return $this;
    }
    /**
     * @return WhatsAppTemplateStatsPointDelivery|null
     */
    public function getDelivery(): ?WhatsAppTemplateStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param WhatsAppTemplateStatsPointDelivery|WhatsAppDeliveryStats|array|null $delivery
     *
     * @return self
     */
    public function setDelivery($delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = \MessageBird\Core\ModelWrapper::normalize($delivery, WhatsAppTemplateStatsPointDelivery::class);
        return $this;
    }
    /**
     * @return WhatsAppTemplateStatsPointEngagement|null
     */
    public function getEngagement(): ?WhatsAppTemplateStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param WhatsAppTemplateStatsPointEngagement|WhatsAppEngagementStats|array|null $engagement
     *
     * @return self
     */
    public function setEngagement($engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = \MessageBird\Core\ModelWrapper::normalize($engagement, WhatsAppTemplateStatsPointEngagement::class);
        return $this;
    }
    /**
     * @return WhatsAppTemplateStatsPointLatency|null
     */
    public function getLatency(): ?WhatsAppTemplateStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param WhatsAppTemplateStatsPointLatency|WhatsAppLatencyStats|array|null $latency
     *
     * @return self
     */
    public function setLatency($latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = \MessageBird\Core\ModelWrapper::normalize($latency, WhatsAppTemplateStatsPointLatency::class);
        return $this;
    }
}
