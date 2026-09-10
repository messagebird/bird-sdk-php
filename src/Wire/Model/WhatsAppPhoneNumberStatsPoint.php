<?php

namespace MessageBird\Wire\Model;

class WhatsAppPhoneNumberStatsPoint
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
     * The business sender phone number in E.164 form.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * `true` for a shared Bird-managed number; `false` for a number owned by your workspace.
     * 
     *
     * @var bool|null
     */
    protected $shared;
    /**
     * @var WhatsAppPhoneNumberStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var WhatsAppPhoneNumberStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var WhatsAppPhoneNumberStatsPointLatency|null
     */
    protected $latency;
    /**
     * The business sender phone number in E.164 form.
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * The business sender phone number in E.164 form.
     *
     * @param string|null $phoneNumber
     *
     * @return self
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->initialized['phoneNumber'] = true;
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
    /**
     * `true` for a shared Bird-managed number; `false` for a number owned by your workspace.
     * 
     *
     * @return bool|null
     */
    public function getShared(): ?bool
    {
        return $this->shared;
    }
    /**
     * `true` for a shared Bird-managed number; `false` for a number owned by your workspace.
     *
     * @param bool|null $shared
     *
     * @return self
     */
    public function setShared(?bool $shared): self
    {
        $this->initialized['shared'] = true;
        $this->shared = $shared;
        return $this;
    }
    /**
     * @return WhatsAppPhoneNumberStatsPointDelivery|null
     */
    public function getDelivery(): ?WhatsAppPhoneNumberStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param WhatsAppPhoneNumberStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?WhatsAppPhoneNumberStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return WhatsAppPhoneNumberStatsPointEngagement|null
     */
    public function getEngagement(): ?WhatsAppPhoneNumberStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param WhatsAppPhoneNumberStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?WhatsAppPhoneNumberStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return WhatsAppPhoneNumberStatsPointLatency|null
     */
    public function getLatency(): ?WhatsAppPhoneNumberStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param WhatsAppPhoneNumberStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?WhatsAppPhoneNumberStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
}
