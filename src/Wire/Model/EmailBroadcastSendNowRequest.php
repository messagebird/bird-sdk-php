<?php

namespace MessageBird\Wire\Model;

class EmailBroadcastSendNowRequest
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
     * When to send the broadcast. It has to be at least 30 seconds and at most 365 days from now. Leave it out to send straight away.
     *
     * @var \DateTime|null
     */
    protected $scheduledAt;
    /**
     * When to send the broadcast. It has to be at least 30 seconds and at most 365 days from now. Leave it out to send straight away.
     *
     * @return \DateTime|null
     */
    public function getScheduledAt(): ?\DateTime
    {
        return $this->scheduledAt;
    }
    /**
     * When to send the broadcast. It has to be at least 30 seconds and at most 365 days from now. Leave it out to send straight away.
     *
     * @param \DateTime|null $scheduledAt
     *
     * @return self
     */
    public function setScheduledAt(?\DateTime $scheduledAt): self
    {
        $this->initialized['scheduledAt'] = true;
        $this->scheduledAt = $scheduledAt;
        return $this;
    }
}
