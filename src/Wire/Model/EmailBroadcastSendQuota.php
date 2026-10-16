<?php

namespace MessageBird\Wire\Model;

/**
 * The recipients covered by the organization's email send allowance. If you pass `send_at`, the estimate is for that time. Otherwise, it is for a send now.
 * 
 * The organization shares this allowance across its email sends. `allowed` can change as other sends use the allowance. `recipients` can change with audience membership and suppressions. These counts are live estimates. Other sends can use the allowance before a broadcast sends, even if its audience fits now.
 * 
 * `limit_reason` is present only when `limited_by` is `monthly` and you have `org:billing` read access. The reason can reveal the organization's payment state. `broadcasts` is present only for a draft when the organization has a broadcast count limit.
 */
class EmailBroadcastSendQuota
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
     * Number of contacts the broadcast could reach now. Excludes contacts without an email address and contacts suppressed for the broadcast's category. Matches the sendable count from the broadcast's audience counts.
     * 
     *
     * @var int|null
     */
    protected $recipients;
    /**
     * Number of recipients covered by the organization's email send allowance at `send_at`, or now if you omit it. Equals `recipients` when no email limit restricts the send. It is lower when the remaining allowance cannot cover the audience.
     * 
     * Partially covered broadcasts send in whole batches. This count is rounded down to a batch boundary and can be lower than `remaining`. Read this value directly instead of calculating it from `limit` and `remaining`.
     * 
     * A value of 0 means no recipients would receive the broadcast. This happens if the audience exceeds the full email limit, which rejects the send, or if the remaining allowance cannot cover a batch.
     * 
     *
     * @var int|null
     */
    protected $allowed;
    /**
     * The email limit that prevents a broadcast from reaching its full audience.
     * 
     * - `none`: the email send allowance covers every recipient.
     * - `monthly`: the monthly email limit for the billing period.
     * - `daily`: the daily email limit, which resets at the end of each UTC day.
     * 
     * When both email limits apply, the response reports the more restrictive one. If you pass `send_at`, the check evaluates both at that time.
     * 
     *
     * @var string|null
     */
    protected $limitedBy;
    /**
     * The email limit identified by `limited_by`, in emails. Omitted when no email limit restricts the send.
     * 
     *
     * @var int|null
     */
    protected $limit;
    /**
     * The allowance remaining under the email limit identified by `limited_by`, in emails, at `send_at`, or now if you omit it. If the window resets by `send_at`, the check uses its full allowance. Omitted when no email limit restricts the send.
     * 
     *
     * @var int|null
     */
    protected $remaining;
    /**
     * When usage resets to 0 for the email limit identified by `limited_by`, evaluated at `send_at`, or now if you omit it.
     * 
     * A broadcast sent before this time uses the same window and the allowance left after other sends. A broadcast sent at or after this time uses a new window. If `recipients` exceeds the full `limit`, the send is rejected in any window with that limit. Pass the later time as `send_at` to check whether the other email limit still restricts the send.
     * 
     * Omitted when no email limit restricts the send, when the reset is at or before `send_at`, or when the billing period has ended and the next one has not started.
     * 
     *
     * @var \DateTime|null
     */
    protected $resetsAt;
    /**
     * What sets the monthly email limit and how to raise it.
     * 
     * - `plan`: the organization's monthly email limit. This is the plan's included volume unless we have set a different limit for the organization. If the limit matches the included volume, a plan with more included volume raises it. Otherwise, contact Bird support.
     * - `overage_off`: email overage is turned off, so sending stops at the included volume. Turn email overage back on to raise the monthly email limit.
     * - `overdue_payment`: an overdue payment pauses email overage, so sending stops at the included volume. Pay the overdue invoice to raise the monthly email limit.
     * - `unfunded`: the wallet cannot cover email overage, or its funding cannot be confirmed, so sending stops at the included volume. Top up the wallet if it lacks funds. Email overage resumes once sufficient funding is confirmed.
     * - `overage_ceiling`: email overage is billed up to a configured multiple of the included volume. A plan with more included volume raises the email overage ceiling.
     * - `custom_limit`: we have set a monthly email limit for the organization that differs from the plan's included volume. Contact Bird support to change it. These limits currently report as `plan`. This enum value is declared in advance so reporting them as `custom_limit` will not be a breaking change.
     * 
     *
     * @var string|null
     */
    protected $limitReason;
    /**
     * The organization's broadcast count allowance for the current window. This counts broadcasts rather than emails. The window is the billing period, or the UTC day when no current billing period is available.
     * 
     * Sending or scheduling a draft uses one broadcast from the window current when you submit the request. The scheduled send time does not determine the window. Sending an already scheduled broadcast again uses no additional broadcast allowance. `send_at` on the send-quota request does not change this allowance.
     * 
     *
     * @var EmailBroadcastCountAllowance|null
     */
    protected $broadcasts;
    /**
     * Number of contacts the broadcast could reach now. Excludes contacts without an email address and contacts suppressed for the broadcast's category. Matches the sendable count from the broadcast's audience counts.
     * 
     *
     * @return int|null
     */
    public function getRecipients(): ?int
    {
        return $this->recipients;
    }
    /**
     * Number of contacts the broadcast could reach now. Excludes contacts without an email address and contacts suppressed for the broadcast's category. Matches the sendable count from the broadcast's audience counts.
     *
     * @param int|null $recipients
     *
     * @return self
     */
    public function setRecipients(?int $recipients): self
    {
        $this->initialized['recipients'] = true;
        $this->recipients = $recipients;
        return $this;
    }
    /**
     * Number of recipients covered by the organization's email send allowance at `send_at`, or now if you omit it. Equals `recipients` when no email limit restricts the send. It is lower when the remaining allowance cannot cover the audience.
     * 
     * Partially covered broadcasts send in whole batches. This count is rounded down to a batch boundary and can be lower than `remaining`. Read this value directly instead of calculating it from `limit` and `remaining`.
     * 
     * A value of 0 means no recipients would receive the broadcast. This happens if the audience exceeds the full email limit, which rejects the send, or if the remaining allowance cannot cover a batch.
     * 
     *
     * @return int|null
     */
    public function getAllowed(): ?int
    {
        return $this->allowed;
    }
    /**
    * Number of recipients covered by the organization's email send allowance at `send_at`, or now if you omit it. Equals `recipients` when no email limit restricts the send. It is lower when the remaining allowance cannot cover the audience.
    
    Partially covered broadcasts send in whole batches. This count is rounded down to a batch boundary and can be lower than `remaining`. Read this value directly instead of calculating it from `limit` and `remaining`.
    
    A value of 0 means no recipients would receive the broadcast. This happens if the audience exceeds the full email limit, which rejects the send, or if the remaining allowance cannot cover a batch.
    
    *
    * @param int|null $allowed
    *
    * @return self
    */
    public function setAllowed(?int $allowed): self
    {
        $this->initialized['allowed'] = true;
        $this->allowed = $allowed;
        return $this;
    }
    /**
     * The email limit that prevents a broadcast from reaching its full audience.
     * 
     * - `none`: the email send allowance covers every recipient.
     * - `monthly`: the monthly email limit for the billing period.
     * - `daily`: the daily email limit, which resets at the end of each UTC day.
     * 
     * When both email limits apply, the response reports the more restrictive one. If you pass `send_at`, the check evaluates both at that time.
     * 
     *
     * @return string|null
     */
    public function getLimitedBy(): ?string
    {
        return $this->limitedBy;
    }
    /**
    * The email limit that prevents a broadcast from reaching its full audience.
    
    - `none`: the email send allowance covers every recipient.
    - `monthly`: the monthly email limit for the billing period.
    - `daily`: the daily email limit, which resets at the end of each UTC day.
    
    When both email limits apply, the response reports the more restrictive one. If you pass `send_at`, the check evaluates both at that time.
    
    *
    * @param string|null $limitedBy
    *
    * @return self
    */
    public function setLimitedBy(?string $limitedBy): self
    {
        $this->initialized['limitedBy'] = true;
        $this->limitedBy = $limitedBy;
        return $this;
    }
    /**
     * The email limit identified by `limited_by`, in emails. Omitted when no email limit restricts the send.
     * 
     *
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }
    /**
     * The email limit identified by `limited_by`, in emails. Omitted when no email limit restricts the send.
     *
     * @param int|null $limit
     *
     * @return self
     */
    public function setLimit(?int $limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = $limit;
        return $this;
    }
    /**
     * The allowance remaining under the email limit identified by `limited_by`, in emails, at `send_at`, or now if you omit it. If the window resets by `send_at`, the check uses its full allowance. Omitted when no email limit restricts the send.
     * 
     *
     * @return int|null
     */
    public function getRemaining(): ?int
    {
        return $this->remaining;
    }
    /**
     * The allowance remaining under the email limit identified by `limited_by`, in emails, at `send_at`, or now if you omit it. If the window resets by `send_at`, the check uses its full allowance. Omitted when no email limit restricts the send.
     *
     * @param int|null $remaining
     *
     * @return self
     */
    public function setRemaining(?int $remaining): self
    {
        $this->initialized['remaining'] = true;
        $this->remaining = $remaining;
        return $this;
    }
    /**
     * When usage resets to 0 for the email limit identified by `limited_by`, evaluated at `send_at`, or now if you omit it.
     * 
     * A broadcast sent before this time uses the same window and the allowance left after other sends. A broadcast sent at or after this time uses a new window. If `recipients` exceeds the full `limit`, the send is rejected in any window with that limit. Pass the later time as `send_at` to check whether the other email limit still restricts the send.
     * 
     * Omitted when no email limit restricts the send, when the reset is at or before `send_at`, or when the billing period has ended and the next one has not started.
     * 
     *
     * @return \DateTime|null
     */
    public function getResetsAt(): ?\DateTime
    {
        return $this->resetsAt;
    }
    /**
    * When usage resets to 0 for the email limit identified by `limited_by`, evaluated at `send_at`, or now if you omit it.
    
    A broadcast sent before this time uses the same window and the allowance left after other sends. A broadcast sent at or after this time uses a new window. If `recipients` exceeds the full `limit`, the send is rejected in any window with that limit. Pass the later time as `send_at` to check whether the other email limit still restricts the send.
    
    Omitted when no email limit restricts the send, when the reset is at or before `send_at`, or when the billing period has ended and the next one has not started.
    
    *
    * @param \DateTime|null $resetsAt
    *
    * @return self
    */
    public function setResetsAt(?\DateTime $resetsAt): self
    {
        $this->initialized['resetsAt'] = true;
        $this->resetsAt = $resetsAt;
        return $this;
    }
    /**
     * What sets the monthly email limit and how to raise it.
     * 
     * - `plan`: the organization's monthly email limit. This is the plan's included volume unless we have set a different limit for the organization. If the limit matches the included volume, a plan with more included volume raises it. Otherwise, contact Bird support.
     * - `overage_off`: email overage is turned off, so sending stops at the included volume. Turn email overage back on to raise the monthly email limit.
     * - `overdue_payment`: an overdue payment pauses email overage, so sending stops at the included volume. Pay the overdue invoice to raise the monthly email limit.
     * - `unfunded`: the wallet cannot cover email overage, or its funding cannot be confirmed, so sending stops at the included volume. Top up the wallet if it lacks funds. Email overage resumes once sufficient funding is confirmed.
     * - `overage_ceiling`: email overage is billed up to a configured multiple of the included volume. A plan with more included volume raises the email overage ceiling.
     * - `custom_limit`: we have set a monthly email limit for the organization that differs from the plan's included volume. Contact Bird support to change it. These limits currently report as `plan`. This enum value is declared in advance so reporting them as `custom_limit` will not be a breaking change.
     * 
     *
     * @return string|null
     */
    public function getLimitReason(): ?string
    {
        return $this->limitReason;
    }
    /**
    * What sets the monthly email limit and how to raise it.
    
    - `plan`: the organization's monthly email limit. This is the plan's included volume unless we have set a different limit for the organization. If the limit matches the included volume, a plan with more included volume raises it. Otherwise, contact Bird support.
    - `overage_off`: email overage is turned off, so sending stops at the included volume. Turn email overage back on to raise the monthly email limit.
    - `overdue_payment`: an overdue payment pauses email overage, so sending stops at the included volume. Pay the overdue invoice to raise the monthly email limit.
    - `unfunded`: the wallet cannot cover email overage, or its funding cannot be confirmed, so sending stops at the included volume. Top up the wallet if it lacks funds. Email overage resumes once sufficient funding is confirmed.
    - `overage_ceiling`: email overage is billed up to a configured multiple of the included volume. A plan with more included volume raises the email overage ceiling.
    - `custom_limit`: we have set a monthly email limit for the organization that differs from the plan's included volume. Contact Bird support to change it. These limits currently report as `plan`. This enum value is declared in advance so reporting them as `custom_limit` will not be a breaking change.
    
    *
    * @param string|null $limitReason
    *
    * @return self
    */
    public function setLimitReason(?string $limitReason): self
    {
        $this->initialized['limitReason'] = true;
        $this->limitReason = $limitReason;
        return $this;
    }
    /**
     * The organization's broadcast count allowance for the current window. This counts broadcasts rather than emails. The window is the billing period, or the UTC day when no current billing period is available.
     * 
     * Sending or scheduling a draft uses one broadcast from the window current when you submit the request. The scheduled send time does not determine the window. Sending an already scheduled broadcast again uses no additional broadcast allowance. `send_at` on the send-quota request does not change this allowance.
     * 
     *
     * @return EmailBroadcastCountAllowance|null
     */
    public function getBroadcasts(): ?EmailBroadcastCountAllowance
    {
        return $this->broadcasts;
    }
    /**
    * The organization's broadcast count allowance for the current window. This counts broadcasts rather than emails. The window is the billing period, or the UTC day when no current billing period is available.
    
    Sending or scheduling a draft uses one broadcast from the window current when you submit the request. The scheduled send time does not determine the window. Sending an already scheduled broadcast again uses no additional broadcast allowance. `send_at` on the send-quota request does not change this allowance.
    
    *
    * @param EmailBroadcastCountAllowance|null $broadcasts
    *
    * @return self
    */
    public function setBroadcasts(?EmailBroadcastCountAllowance $broadcasts): self
    {
        $this->initialized['broadcasts'] = true;
        $this->broadcasts = $broadcasts;
        return $this;
    }
}
