<?php

namespace MessageBird\Wire\Model;

class SMSBatchSummary
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
     * Number of messages accepted in the batch. Acceptance is all-or-nothing, so this equals the number of messages submitted.
     * 
     *
     * @var int|null
     */
    protected $acceptedCount;
    /**
     * Number of messages accepted in the batch. Acceptance is all-or-nothing, so this equals the number of messages submitted.
     * 
     *
     * @return int|null
     */
    public function getAcceptedCount(): ?int
    {
        return $this->acceptedCount;
    }
    /**
     * Number of messages accepted in the batch. Acceptance is all-or-nothing, so this equals the number of messages submitted.
     *
     * @param int|null $acceptedCount
     *
     * @return self
     */
    public function setAcceptedCount(?int $acceptedCount): self
    {
        $this->initialized['acceptedCount'] = true;
        $this->acceptedCount = $acceptedCount;
        return $this;
    }
}
