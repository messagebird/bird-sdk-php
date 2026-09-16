<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsPlacementDeltaPts
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
     * Inbox-rate movement in percentage points; negative means it fell.
     *
     * @var float|null
     */
    protected $inbox;
    /**
     * Spam-rate movement in percentage points.
     *
     * @var float|null
     */
    protected $spam;
    /**
     * Inbox-rate movement in percentage points; negative means it fell.
     *
     * @return float|null
     */
    public function getInbox(): ?float
    {
        return $this->inbox;
    }
    /**
     * Inbox-rate movement in percentage points; negative means it fell.
     *
     * @param float|null $inbox
     *
     * @return self
     */
    public function setInbox(?float $inbox): self
    {
        $this->initialized['inbox'] = true;
        $this->inbox = $inbox;
        return $this;
    }
    /**
     * Spam-rate movement in percentage points.
     *
     * @return float|null
     */
    public function getSpam(): ?float
    {
        return $this->spam;
    }
    /**
     * Spam-rate movement in percentage points.
     *
     * @param float|null $spam
     *
     * @return self
     */
    public function setSpam(?float $spam): self
    {
        $this->initialized['spam'] = true;
        $this->spam = $spam;
        return $this;
    }
}
