<?php

namespace MessageBird\Wire\Model;

class VoiceSettingsDailySpendLimit extends \ArrayObject
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
     * ISO 4217 three-letter currency code.
     *
     * @var string|null
     */
    protected $currencyCode;
    /**
     * The daily limit calls are admitted against: the workspace limit when one is set, otherwise the default, and never more than `max_limit`. Null when there is no limit.
     * 
     *
     * @var VoiceDailySpendLimitLimit|null
     */
    protected $limit;
    /**
     * Used toward today's limit, including calls in progress. A call counts its expected cost when it starts; the part it did not use returns when it is billed. Null when today's usage cannot be read right now; the limit is still enforced.
     * 
     *
     * @var VoiceDailySpendLimitUsed|null
     */
    protected $used;
    /**
     * What is left of the limit today, never below zero. Null when there is no limit or today's usage cannot be read.
     *
     * @var VoiceDailySpendLimitRemaining|null
     */
    protected $remaining;
    /**
     * When usage resets to zero, at midnight UTC.
     *
     * @var \DateTime|null
     */
    protected $resetsAt;
    /**
     * The daily limit a workspace has until it sets its own. Null when there is no default limit.
     *
     * @var VoiceDailySpendLimitDefaultLimit|null
     */
    protected $defaultLimit;
    /**
     * The highest daily limit this workspace can set. Null when there is no maximum.
     *
     * @var VoiceDailySpendLimitMaxLimit|null
     */
    protected $maxLimit;
    /**
     * The daily limit this workspace set for itself. Null when it uses the default.
     *
     * @var VoiceDailySpendLimitWorkspaceLimit|null
     */
    protected $workspaceLimit;
    /**
     * ISO 4217 three-letter currency code.
     *
     * @return string|null
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }
    /**
     * ISO 4217 three-letter currency code.
     *
     * @param string|null $currencyCode
     *
     * @return self
     */
    public function setCurrencyCode(?string $currencyCode): self
    {
        $this->initialized['currencyCode'] = true;
        $this->currencyCode = $currencyCode;
        return $this;
    }
    /**
     * The daily limit calls are admitted against: the workspace limit when one is set, otherwise the default, and never more than `max_limit`. Null when there is no limit.
     * 
     *
     * @return VoiceDailySpendLimitLimit|null
     */
    public function getLimit(): ?VoiceDailySpendLimitLimit
    {
        return $this->limit;
    }
    /**
     * The daily limit calls are admitted against: the workspace limit when one is set, otherwise the default, and never more than `max_limit`. Null when there is no limit.
     *
     * @param VoiceDailySpendLimitLimit|null $limit
     *
     * @return self
     */
    public function setLimit(?VoiceDailySpendLimitLimit $limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = $limit;
        return $this;
    }
    /**
     * Used toward today's limit, including calls in progress. A call counts its expected cost when it starts; the part it did not use returns when it is billed. Null when today's usage cannot be read right now; the limit is still enforced.
     * 
     *
     * @return VoiceDailySpendLimitUsed|null
     */
    public function getUsed(): ?VoiceDailySpendLimitUsed
    {
        return $this->used;
    }
    /**
     * Used toward today's limit, including calls in progress. A call counts its expected cost when it starts; the part it did not use returns when it is billed. Null when today's usage cannot be read right now; the limit is still enforced.
     *
     * @param VoiceDailySpendLimitUsed|null $used
     *
     * @return self
     */
    public function setUsed(?VoiceDailySpendLimitUsed $used): self
    {
        $this->initialized['used'] = true;
        $this->used = $used;
        return $this;
    }
    /**
     * What is left of the limit today, never below zero. Null when there is no limit or today's usage cannot be read.
     *
     * @return VoiceDailySpendLimitRemaining|null
     */
    public function getRemaining(): ?VoiceDailySpendLimitRemaining
    {
        return $this->remaining;
    }
    /**
     * What is left of the limit today, never below zero. Null when there is no limit or today's usage cannot be read.
     *
     * @param VoiceDailySpendLimitRemaining|null $remaining
     *
     * @return self
     */
    public function setRemaining(?VoiceDailySpendLimitRemaining $remaining): self
    {
        $this->initialized['remaining'] = true;
        $this->remaining = $remaining;
        return $this;
    }
    /**
     * When usage resets to zero, at midnight UTC.
     *
     * @return \DateTime|null
     */
    public function getResetsAt(): ?\DateTime
    {
        return $this->resetsAt;
    }
    /**
     * When usage resets to zero, at midnight UTC.
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
     * The daily limit a workspace has until it sets its own. Null when there is no default limit.
     *
     * @return VoiceDailySpendLimitDefaultLimit|null
     */
    public function getDefaultLimit(): ?VoiceDailySpendLimitDefaultLimit
    {
        return $this->defaultLimit;
    }
    /**
     * The daily limit a workspace has until it sets its own. Null when there is no default limit.
     *
     * @param VoiceDailySpendLimitDefaultLimit|null $defaultLimit
     *
     * @return self
     */
    public function setDefaultLimit(?VoiceDailySpendLimitDefaultLimit $defaultLimit): self
    {
        $this->initialized['defaultLimit'] = true;
        $this->defaultLimit = $defaultLimit;
        return $this;
    }
    /**
     * The highest daily limit this workspace can set. Null when there is no maximum.
     *
     * @return VoiceDailySpendLimitMaxLimit|null
     */
    public function getMaxLimit(): ?VoiceDailySpendLimitMaxLimit
    {
        return $this->maxLimit;
    }
    /**
     * The highest daily limit this workspace can set. Null when there is no maximum.
     *
     * @param VoiceDailySpendLimitMaxLimit|null $maxLimit
     *
     * @return self
     */
    public function setMaxLimit(?VoiceDailySpendLimitMaxLimit $maxLimit): self
    {
        $this->initialized['maxLimit'] = true;
        $this->maxLimit = $maxLimit;
        return $this;
    }
    /**
     * The daily limit this workspace set for itself. Null when it uses the default.
     *
     * @return VoiceDailySpendLimitWorkspaceLimit|null
     */
    public function getWorkspaceLimit(): ?VoiceDailySpendLimitWorkspaceLimit
    {
        return $this->workspaceLimit;
    }
    /**
     * The daily limit this workspace set for itself. Null when it uses the default.
     *
     * @param VoiceDailySpendLimitWorkspaceLimit|null $workspaceLimit
     *
     * @return self
     */
    public function setWorkspaceLimit(?VoiceDailySpendLimitWorkspaceLimit $workspaceLimit): self
    {
        $this->initialized['workspaceLimit'] = true;
        $this->workspaceLimit = $workspaceLimit;
        return $this;
    }
}
