<?php

namespace MessageBird\Wire\Model;

/**
 * Why sending stopped for funds or a sending limit, and what happens next. Present only while `status` is `waiting_for_funds` or `paused`.
 * 
 * For a funds hold, add funds during the wait to let sending continue automatically. After the broadcast pauses, check the balance and add funds if it is still short, then resume it explicitly. For `send_limit_reached`, adding funds does not help: sending continues when the limit allows more email, and after a pause you resume it once it does. Resume is refused while the next batch still cannot be paid for or would go over a sending limit. A failed broadcast cannot resume.
 * 
 * Each interruption can wait up to 20 minutes for funds. An interruption for a sending limit (`send_limit_reached`) waits until 10 minutes after the next midnight UTC, when the daily limit resets. Checks, refused batches and partial top-ups during the same interruption do not extend its deadline. Automatic continuation or an explicit resume clears the hold; if sending later stops again, a new wait begins.
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
     * Why sending stopped for funds or a sending limit.
     * 
     * - `automatic_top_up`: Sending stopped while automatic top-up was active. Sending can continue automatically when a funding check succeeds before `wait_until`.
     * - `funds_required`: Sending stopped because your balance cannot pay for more email. While `waiting_for_funds`, a manual or automatic top-up can restart sending before `wait_until`. If the broadcast is `paused`, add funds if needed, then resume it.
     * - `wait_expired`: Status is `paused`. The automatic wait ended before sending continued. Add funds if needed, then resume the broadcast.
     * - `send_limit_reached`: Sending stopped because the next batch would go over one of your organization's email sending limits, such as its daily limit. While `waiting_for_funds`, Bird checks once a minute and continues sending if the limit allows the next batch before `wait_until`, such as after the daily limit resets at midnight UTC. If the broadcast is `paused`, the limit did not allow sending before `wait_until`. Resume it once the limit allows more email, or cancel it.
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
     * Why sending stopped for funds or a sending limit.
     * 
     * - `automatic_top_up`: Sending stopped while automatic top-up was active. Sending can continue automatically when a funding check succeeds before `wait_until`.
     * - `funds_required`: Sending stopped because your balance cannot pay for more email. While `waiting_for_funds`, a manual or automatic top-up can restart sending before `wait_until`. If the broadcast is `paused`, add funds if needed, then resume it.
     * - `wait_expired`: Status is `paused`. The automatic wait ended before sending continued. Add funds if needed, then resume the broadcast.
     * - `send_limit_reached`: Sending stopped because the next batch would go over one of your organization's email sending limits, such as its daily limit. While `waiting_for_funds`, Bird checks once a minute and continues sending if the limit allows the next batch before `wait_until`, such as after the daily limit resets at midnight UTC. If the broadcast is `paused`, the limit did not allow sending before `wait_until`. Resume it once the limit allows more email, or cancel it.
     * 
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
    * Why sending stopped for funds or a sending limit.
    
    - `automatic_top_up`: Sending stopped while automatic top-up was active. Sending can continue automatically when a funding check succeeds before `wait_until`.
    - `funds_required`: Sending stopped because your balance cannot pay for more email. While `waiting_for_funds`, a manual or automatic top-up can restart sending before `wait_until`. If the broadcast is `paused`, add funds if needed, then resume it.
    - `wait_expired`: Status is `paused`. The automatic wait ended before sending continued. Add funds if needed, then resume the broadcast.
    - `send_limit_reached`: Sending stopped because the next batch would go over one of your organization's email sending limits, such as its daily limit. While `waiting_for_funds`, Bird checks once a minute and continues sending if the limit allows the next batch before `wait_until`, such as after the daily limit resets at midnight UTC. If the broadcast is `paused`, the limit did not allow sending before `wait_until`. Resume it once the limit allows more email, or cancel it.
    
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
