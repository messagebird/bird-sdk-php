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
     * Replay events whose delivery attempt failed at or after this timestamp. The bound is inclusive and applies to attempt time, not to when the event occurred, so a retry that trailed its event by a day falls in the window by the hour it was attempted. Defaults to 24 hours before the request when omitted. Attempts are retained for three days, so that is the oldest history a replay reaches: an earlier `since` widens the window without recovering anything older.
     * 
     *
     * @var \DateTime|null
     */
    protected $since;
    /**
     * Replay events whose delivery attempt failed at or before this timestamp, on the same attempt-time bound as `since`. Omitted, it resolves to the time of the request.
     * 
     *
     * @var \DateTime|null
     */
    protected $until;
    /**
     * Replay events whose delivery attempt failed at or after this timestamp. The bound is inclusive and applies to attempt time, not to when the event occurred, so a retry that trailed its event by a day falls in the window by the hour it was attempted. Defaults to 24 hours before the request when omitted. Attempts are retained for three days, so that is the oldest history a replay reaches: an earlier `since` widens the window without recovering anything older.
     * 
     *
     * @return \DateTime|null
     */
    public function getSince(): ?\DateTime
    {
        return $this->since;
    }
    /**
     * Replay events whose delivery attempt failed at or after this timestamp. The bound is inclusive and applies to attempt time, not to when the event occurred, so a retry that trailed its event by a day falls in the window by the hour it was attempted. Defaults to 24 hours before the request when omitted. Attempts are retained for three days, so that is the oldest history a replay reaches: an earlier `since` widens the window without recovering anything older.
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
     * Replay events whose delivery attempt failed at or before this timestamp, on the same attempt-time bound as `since`. Omitted, it resolves to the time of the request.
     * 
     *
     * @return \DateTime|null
     */
    public function getUntil(): ?\DateTime
    {
        return $this->until;
    }
    /**
     * Replay events whose delivery attempt failed at or before this timestamp, on the same attempt-time bound as `since`. Omitted, it resolves to the time of the request.
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
