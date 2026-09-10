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
     * @param WhatsAppTemplateStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?WhatsAppTemplateStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
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
     * @param WhatsAppTemplateStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?WhatsAppTemplateStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
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
     * @param WhatsAppTemplateStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?WhatsAppTemplateStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
}
