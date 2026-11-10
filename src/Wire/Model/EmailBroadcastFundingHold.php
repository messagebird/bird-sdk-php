<?php

namespace MessageBird\Wire\Model;

/**
 * Why sending stopped for funds and what happens next. Present only while `status` is `waiting_for_funds` or `paused`.
 * 
 * The send-allowance response includes `can_start` when waiting and resuming are available. If `can_start` is absent, do not assume a top-up can recover a broadcast or that a failed broadcast can resume.
 * 
 * Each interruption can wait up to 20 minutes for funds. Checks, refused batches and partial top-ups during the same interruption do not extend its deadline. Automatic continuation or an explicit resume clears the hold; if sending later stops for funds again, a new 20-minute wait begins.
 */
class EmailBroadcastFundingHold
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
     * Why sending stopped for funds.
     * 
     * - `automatic_top_up`: Sending stopped while automatic top-up was active. Sending can continue automatically when a funding check succeeds before `wait_until`.
     * - `funds_required`: Sending stopped because your balance cannot pay for more email. While `waiting_for_funds`, a manual or automatic top-up can restart sending before `wait_until`. If the broadcast is `paused`, add funds if needed, then resume it.
     * - `wait_expired`: Status is `paused`. The automatic wait ended before sending continued. Add funds if needed, then resume the broadcast.
     * 
     *
     * @var string|null
     */
    protected $reason;
    /**
     * When the automatic wait ends, or ended. Absent when the broadcast paused without waiting.
     *
     * @var \DateTime|null
     */
    protected $waitUntil;
    /**
     * When the broadcast paused. Present only while `status` is `paused`.
     *
     * @var \DateTime|null
     */
    protected $pausedAt;
    /**
     * Why sending stopped for funds.
     * 
     * - `automatic_top_up`: Sending stopped while automatic top-up was active. Sending can continue automatically when a funding check succeeds before `wait_until`.
     * - `funds_required`: Sending stopped because your balance cannot pay for more email. While `waiting_for_funds`, a manual or automatic top-up can restart sending before `wait_until`. If the broadcast is `paused`, add funds if needed, then resume it.
     * - `wait_expired`: Status is `paused`. The automatic wait ended before sending continued. Add funds if needed, then resume the broadcast.
     * 
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
    * Why sending stopped for funds.
    
    - `automatic_top_up`: Sending stopped while automatic top-up was active. Sending can continue automatically when a funding check succeeds before `wait_until`.
    - `funds_required`: Sending stopped because your balance cannot pay for more email. While `waiting_for_funds`, a manual or automatic top-up can restart sending before `wait_until`. If the broadcast is `paused`, add funds if needed, then resume it.
    - `wait_expired`: Status is `paused`. The automatic wait ended before sending continued. Add funds if needed, then resume the broadcast.
    
    *
    * @param string|null $reason
    *
    * @return self
    */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
    /**
     * When the automatic wait ends, or ended. Absent when the broadcast paused without waiting.
     *
     * @return \DateTime|null
     */
    public function getWaitUntil(): ?\DateTime
    {
        return $this->waitUntil;
    }
    /**
     * When the automatic wait ends, or ended. Absent when the broadcast paused without waiting.
     *
     * @param \DateTime|null $waitUntil
     *
     * @return self
     */
    public function setWaitUntil(?\DateTime $waitUntil): self
    {
        $this->initialized['waitUntil'] = true;
        $this->waitUntil = $waitUntil;
        return $this;
    }
    /**
     * When the broadcast paused. Present only while `status` is `paused`.
     *
     * @return \DateTime|null
     */
    public function getPausedAt(): ?\DateTime
    {
        return $this->pausedAt;
    }
    /**
     * When the broadcast paused. Present only while `status` is `paused`.
     *
     * @param \DateTime|null $pausedAt
     *
     * @return self
     */
    public function setPausedAt(?\DateTime $pausedAt): self
    {
        $this->initialized['pausedAt'] = true;
        $this->pausedAt = $pausedAt;
        return $this;
    }
}
