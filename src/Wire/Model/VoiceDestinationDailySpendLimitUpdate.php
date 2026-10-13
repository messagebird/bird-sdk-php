<?php

namespace MessageBird\Wire\Model;

class VoiceDestinationDailySpendLimitUpdate
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
     * The daily spend limit for calls to this country, in your organization's wallet currency, from zero up to the workspace's `max_limit` in Voice settings, with at most six decimal places. Setting an amount needs an organization wallet; removing one does not. Null removes it, so only the workspace's daily limit applies.
     * 
     *
     * @var VoiceDestinationDailySpendLimitUpdateLimit|null
     */
    protected $limit;
    /**
     * The daily spend limit for calls to this country, in your organization's wallet currency, from zero up to the workspace's `max_limit` in Voice settings, with at most six decimal places. Setting an amount needs an organization wallet; removing one does not. Null removes it, so only the workspace's daily limit applies.
     * 
     *
     * @return VoiceDestinationDailySpendLimitUpdateLimit|null
     */
    public function getLimit(): ?VoiceDestinationDailySpendLimitUpdateLimit
    {
        return $this->limit;
    }
    /**
     * The daily spend limit for calls to this country, in your organization's wallet currency, from zero up to the workspace's `max_limit` in Voice settings, with at most six decimal places. Setting an amount needs an organization wallet; removing one does not. Null removes it, so only the workspace's daily limit applies.
     *
     * @param VoiceDestinationDailySpendLimitUpdateLimit|null $limit
     *
     * @return self
     */
    public function setLimit(?VoiceDestinationDailySpendLimitUpdateLimit $limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = $limit;
        return $this;
    }
}
