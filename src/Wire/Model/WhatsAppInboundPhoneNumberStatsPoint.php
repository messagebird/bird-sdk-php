<?php

namespace MessageBird\Wire\Model;

class WhatsAppInboundPhoneNumberStatsPoint
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
     * The business phone number that received the messages, in E.164 form.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * Distinct messages the number received in the period.
     *
     * @var int|null
     */
    protected $received;
    /**
     * The business phone number that received the messages, in E.164 form.
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * The business phone number that received the messages, in E.164 form.
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
     * Distinct messages the number received in the period.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct messages the number received in the period.
     *
     * @param int|null $received
     *
     * @return self
     */
    public function setReceived(?int $received): self
    {
        $this->initialized['received'] = true;
        $this->received = $received;
        return $this;
    }
}
