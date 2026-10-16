<?php

namespace MessageBird\Wire\Model;

/**
 * Your workspace's daily spend limit for calls to this country and today's usage toward it. It applies whether or not the country is enabled, including to verification calls. Null when you have not set one, before your organization has a wallet, or while your wallet currency cannot be read; a limit you set is still enforced then.
 */
class VoiceDestinationDailySpendLimit extends \ArrayObject
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
     * The most your workspace can spend on calls to this country each day, in your organization's wallet currency. Calls are also held to the workspace's own daily limit, and whichever is reached first refuses the call.
     * 
     *
     * @var VoiceDestinationDailySpendLimitLimit|null
     */
    protected $limit;
    /**
     * Used toward today's limit for this country, including calls in progress. A call counts its expected cost when it starts; the part it did not use returns when it is billed. Null when today's usage cannot be read right now; the limit is still enforced.
     * 
     *
     * @var VoiceDestinationDailySpendLimitUsed|null
     */
    protected $used;
    /**
     * What is left of this country's limit today, never below zero. Null when today's usage cannot be read.
     *
     * @var VoiceDestinationDailySpendLimitRemaining|null
     */
    protected $remaining;
    /**
     * When usage resets to zero, at midnight UTC.
     *
     * @var \DateTime|null
     */
    protected $resetsAt;
    /**
     * The most your workspace can spend on calls to this country each day, in your organization's wallet currency. Calls are also held to the workspace's own daily limit, and whichever is reached first refuses the call.
     * 
     *
     * @return VoiceDestinationDailySpendLimitLimit|null
     */
    public function getLimit(): ?VoiceDestinationDailySpendLimitLimit
    {
        return $this->limit;
    }
    /**
     * The most your workspace can spend on calls to this country each day, in your organization's wallet currency. Calls are also held to the workspace's own daily limit, and whichever is reached first refuses the call.
     *
     * @param VoiceDestinationDailySpendLimitLimit|Money|array|null $limit
     *
     * @return self
     */
    public function setLimit($limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = \MessageBird\Core\ModelWrapper::normalize($limit, VoiceDestinationDailySpendLimitLimit::class);
        return $this;
    }
    /**
     * Used toward today's limit for this country, including calls in progress. A call counts its expected cost when it starts; the part it did not use returns when it is billed. Null when today's usage cannot be read right now; the limit is still enforced.
     * 
     *
     * @return VoiceDestinationDailySpendLimitUsed|null
     */
    public function getUsed(): ?VoiceDestinationDailySpendLimitUsed
    {
        return $this->used;
    }
    /**
     * Used toward today's limit for this country, including calls in progress. A call counts its expected cost when it starts; the part it did not use returns when it is billed. Null when today's usage cannot be read right now; the limit is still enforced.
     *
     * @param VoiceDestinationDailySpendLimitUsed|null $used
     *
     * @return self
     */
    public function setUsed(?VoiceDestinationDailySpendLimitUsed $used): self
    {
        $this->initialized['used'] = true;
        $this->used = $used;
        return $this;
    }
    /**
     * What is left of this country's limit today, never below zero. Null when today's usage cannot be read.
     *
     * @return VoiceDestinationDailySpendLimitRemaining|null
     */
    public function getRemaining(): ?VoiceDestinationDailySpendLimitRemaining
    {
        return $this->remaining;
    }
    /**
     * What is left of this country's limit today, never below zero. Null when today's usage cannot be read.
     *
     * @param VoiceDestinationDailySpendLimitRemaining|null $remaining
     *
     * @return self
     */
    public function setRemaining(?VoiceDestinationDailySpendLimitRemaining $remaining): self
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
}
