<?php

namespace MessageBird\Wire\Model;

/**
 * The organization's broadcast count allowance for the current window. This counts broadcasts rather than emails. The window is the billing period, or the UTC day when no current billing period is available.
 * 
 * Sending or scheduling a draft uses one broadcast from the window current when you submit the request. The scheduled send time does not determine the window. Sending an already scheduled broadcast again uses no additional broadcast allowance. `send_at` on the send-quota request does not change this allowance.
 */
class EmailBroadcastCountAllowance
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
     * Maximum number of broadcasts the organization can send in this window.
     * 
     *
     * @var int|null
     */
    protected $limit;
    /**
     * Number of broadcasts remaining in this window. At 0, you cannot send or schedule a draft.
     * 
     *
     * @var int|null
     */
    protected $remaining;
    /**
     * When the window ends and broadcast usage resets to 0. This is the end of the billing period, or the end of the UTC day when no current billing period is available.
     * 
     *
     * @var \DateTime|null
     */
    protected $resetsAt;
    /**
     * Maximum number of broadcasts the organization can send in this window.
     * 
     *
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }
    /**
     * Maximum number of broadcasts the organization can send in this window.
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
     * Number of broadcasts remaining in this window. At 0, you cannot send or schedule a draft.
     * 
     *
     * @return int|null
     */
    public function getRemaining(): ?int
    {
        return $this->remaining;
    }
    /**
     * Number of broadcasts remaining in this window. At 0, you cannot send or schedule a draft.
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
     * When the window ends and broadcast usage resets to 0. This is the end of the billing period, or the end of the UTC day when no current billing period is available.
     * 
     *
     * @return \DateTime|null
     */
    public function getResetsAt(): ?\DateTime
    {
        return $this->resetsAt;
    }
    /**
     * When the window ends and broadcast usage resets to 0. This is the end of the billing period, or the end of the UTC day when no current billing period is available.
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
}
