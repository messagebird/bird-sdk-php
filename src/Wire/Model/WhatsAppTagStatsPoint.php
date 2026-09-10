<?php

namespace MessageBird\Wire\Model;

class WhatsAppTagStatsPoint
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
     * The tag this row aggregates, in `name:value` form.
     *
     * @var string|null
     */
    protected $tag;
    /**
     * @var WhatsAppTagStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var WhatsAppTagStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var WhatsAppTagStatsPointLatency|null
     */
    protected $latency;
    /**
     * The tag this row aggregates, in `name:value` form.
     *
     * @return string|null
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }
    /**
     * The tag this row aggregates, in `name:value` form.
     *
     * @param string|null $tag
     *
     * @return self
     */
    public function setTag(?string $tag): self
    {
        $this->initialized['tag'] = true;
        $this->tag = $tag;
        return $this;
    }
    /**
     * @return WhatsAppTagStatsPointDelivery|null
     */
    public function getDelivery(): ?WhatsAppTagStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param WhatsAppTagStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?WhatsAppTagStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return WhatsAppTagStatsPointEngagement|null
     */
    public function getEngagement(): ?WhatsAppTagStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param WhatsAppTagStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?WhatsAppTagStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return WhatsAppTagStatsPointLatency|null
     */
    public function getLatency(): ?WhatsAppTagStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param WhatsAppTagStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?WhatsAppTagStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
}
