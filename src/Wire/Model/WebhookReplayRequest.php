<?php

namespace MessageBird\Wire\Model;

class WebhookReplayRequest
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
     * Replay events that occurred at or after this timestamp. Defaults to 24 hours before the request when omitted.
     * 
     *
     * @var \DateTime|null
     */
    protected $since;
    /**
     * Replay events that occurred before or at this timestamp. Omit to bound the window only by `since`.
     * 
     *
     * @var \DateTime|null
     */
    protected $until;
    /**
     * Replay events that occurred at or after this timestamp. Defaults to 24 hours before the request when omitted.
     * 
     *
     * @return \DateTime|null
     */
    public function getSince(): ?\DateTime
    {
        return $this->since;
    }
    /**
     * Replay events that occurred at or after this timestamp. Defaults to 24 hours before the request when omitted.
     *
     * @param \DateTime|null $since
     *
     * @return self
     */
    public function setSince(?\DateTime $since): self
    {
        $this->initialized['since'] = true;
        $this->since = $since;
        return $this;
    }
    /**
     * Replay events that occurred before or at this timestamp. Omit to bound the window only by `since`.
     * 
     *
     * @return \DateTime|null
     */
    public function getUntil(): ?\DateTime
    {
        return $this->until;
    }
    /**
     * Replay events that occurred before or at this timestamp. Omit to bound the window only by `since`.
     *
     * @param \DateTime|null $until
     *
     * @return self
     */
    public function setUntil(?\DateTime $until): self
    {
        $this->initialized['until'] = true;
        $this->until = $until;
        return $this;
    }
}
