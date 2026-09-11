<?php

namespace MessageBird\Wire\Model;

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
     * Number of contacts the broadcast would send to right now, after contacts without an email address and contacts suppressed for the broadcast's category are dropped. The same number the broadcast's audience counts report as sendable.
     * 
     *
     * @var int|null
     */
    protected $recipients;
    /**
     * Number of those recipients the organization's email send allowance covers. Equal to `recipients` when nothing limits the send, and lower when part of the audience runs past what is left of it. A part-covered send goes out in whole batches, so this is cut back to a batch boundary rather than to the exact number of emails left: it can sit below `remaining` rather than matching it, and should be read rather than worked out from `limit` and `remaining`. 0 means none of them would go out, either because the audience is larger than the whole allowance, which is refused rather than sent in part, or because too little of the allowance is left to carry any of it.
     * 
     *
     * @var int|null
     */
    protected $allowed;
    /**
     * Which of the organization's email send allowances stops a send from reaching its whole audience.
     * 
     * - `none`: every recipient is covered.
     * - `monthly`: the allowance that runs with the billing period.
     * - `daily`: the allowance that resets at the end of each UTC day.
     * 
     * When both apply, the tighter of the two is reported.
     * 
     *
     * @var string|null
     */
    protected $limitedBy;
    /**
     * Size of the allowance named by `limited_by`, in emails. Omitted when nothing limits the send.
     * 
     *
     * @var int|null
     */
    protected $limit;
    /**
     * How much of that allowance is left in the current window, in emails. Omitted when nothing limits the send.
     * 
     *
     * @var int|null
     */
    protected $remaining;
    /**
     * Number of contacts the broadcast would send to right now, after contacts without an email address and contacts suppressed for the broadcast's category are dropped. The same number the broadcast's audience counts report as sendable.
     * 
     *
     * @return int|null
     */
    public function getRecipients(): ?int
    {
        return $this->recipients;
    }
    /**
     * Number of contacts the broadcast would send to right now, after contacts without an email address and contacts suppressed for the broadcast's category are dropped. The same number the broadcast's audience counts report as sendable.
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
     * Number of those recipients the organization's email send allowance covers. Equal to `recipients` when nothing limits the send, and lower when part of the audience runs past what is left of it. A part-covered send goes out in whole batches, so this is cut back to a batch boundary rather than to the exact number of emails left: it can sit below `remaining` rather than matching it, and should be read rather than worked out from `limit` and `remaining`. 0 means none of them would go out, either because the audience is larger than the whole allowance, which is refused rather than sent in part, or because too little of the allowance is left to carry any of it.
     * 
     *
     * @return int|null
     */
    public function getAllowed(): ?int
    {
        return $this->allowed;
    }
    /**
     * Number of those recipients the organization's email send allowance covers. Equal to `recipients` when nothing limits the send, and lower when part of the audience runs past what is left of it. A part-covered send goes out in whole batches, so this is cut back to a batch boundary rather than to the exact number of emails left: it can sit below `remaining` rather than matching it, and should be read rather than worked out from `limit` and `remaining`. 0 means none of them would go out, either because the audience is larger than the whole allowance, which is refused rather than sent in part, or because too little of the allowance is left to carry any of it.
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
     * Which of the organization's email send allowances stops a send from reaching its whole audience.
     * 
     * - `none`: every recipient is covered.
     * - `monthly`: the allowance that runs with the billing period.
     * - `daily`: the allowance that resets at the end of each UTC day.
     * 
     * When both apply, the tighter of the two is reported.
     * 
     *
     * @return string|null
     */
    public function getLimitedBy(): ?string
    {
        return $this->limitedBy;
    }
    /**
    * Which of the organization's email send allowances stops a send from reaching its whole audience.
    
    - `none`: every recipient is covered.
    - `monthly`: the allowance that runs with the billing period.
    - `daily`: the allowance that resets at the end of each UTC day.
    
    When both apply, the tighter of the two is reported.
    
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
     * Size of the allowance named by `limited_by`, in emails. Omitted when nothing limits the send.
     * 
     *
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }
    /**
     * Size of the allowance named by `limited_by`, in emails. Omitted when nothing limits the send.
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
     * How much of that allowance is left in the current window, in emails. Omitted when nothing limits the send.
     * 
     *
     * @return int|null
     */
    public function getRemaining(): ?int
    {
        return $this->remaining;
    }
    /**
     * How much of that allowance is left in the current window, in emails. Omitted when nothing limits the send.
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
}
