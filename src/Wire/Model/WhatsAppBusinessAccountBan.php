<?php

namespace MessageBird\Wire\Model;

class WhatsAppBusinessAccountBan extends \ArrayObject
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
     * @var string|null
     */
    protected $state;
    /**
     * When WhatsApp reported the ban, by WhatsApp's own clock. Bird can learn of a ban later than this, so it is not when Bird recorded it.
     *
     * @var \DateTime|null
     */
    protected $occurredAt;
    /**
     * Where to appeal WhatsApp's decision with Meta Business Support, because neither Bird nor this API can lift one. Absent when Bird does not know the account's Meta business portfolio, since there is no support-home path to build without one.
     *
     * @var string|null
     */
    protected $appealUrl;
    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * @param string|null $state
     *
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
    /**
     * When WhatsApp reported the ban, by WhatsApp's own clock. Bird can learn of a ban later than this, so it is not when Bird recorded it.
     *
     * @return \DateTime|null
     */
    public function getOccurredAt(): ?\DateTime
    {
        return $this->occurredAt;
    }
    /**
     * When WhatsApp reported the ban, by WhatsApp's own clock. Bird can learn of a ban later than this, so it is not when Bird recorded it.
     *
     * @param \DateTime|null $occurredAt
     *
     * @return self
     */
    public function setOccurredAt(?\DateTime $occurredAt): self
    {
        $this->initialized['occurredAt'] = true;
        $this->occurredAt = $occurredAt;
        return $this;
    }
    /**
     * Where to appeal WhatsApp's decision with Meta Business Support, because neither Bird nor this API can lift one. Absent when Bird does not know the account's Meta business portfolio, since there is no support-home path to build without one.
     *
     * @return string|null
     */
    public function getAppealUrl(): ?string
    {
        return $this->appealUrl;
    }
    /**
     * Where to appeal WhatsApp's decision with Meta Business Support, because neither Bird nor this API can lift one. Absent when Bird does not know the account's Meta business portfolio, since there is no support-home path to build without one.
     *
     * @param string|null $appealUrl
     *
     * @return self
     */
    public function setAppealUrl(?string $appealUrl): self
    {
        $this->initialized['appealUrl'] = true;
        $this->appealUrl = $appealUrl;
        return $this;
    }
}
