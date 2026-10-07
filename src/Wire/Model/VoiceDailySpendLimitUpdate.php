<?php

namespace MessageBird\Wire\Model;

class VoiceDailySpendLimitUpdate
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
     * The workspace's own daily limit, in the organization's wallet currency from zero up to `max_limit`, with at most six decimal places; a negative or more precise amount is refused with 422. It can be above or below the default. Null removes it, so the default applies.
     * 
     *
     * @var VoiceDailySpendLimitUpdateWorkspaceLimit|null
     */
    protected $workspaceLimit;
    /**
     * The workspace's own daily limit, in the organization's wallet currency from zero up to `max_limit`, with at most six decimal places; a negative or more precise amount is refused with 422. It can be above or below the default. Null removes it, so the default applies.
     * 
     *
     * @return VoiceDailySpendLimitUpdateWorkspaceLimit|null
     */
    public function getWorkspaceLimit(): ?VoiceDailySpendLimitUpdateWorkspaceLimit
    {
        return $this->workspaceLimit;
    }
    /**
     * The workspace's own daily limit, in the organization's wallet currency from zero up to `max_limit`, with at most six decimal places; a negative or more precise amount is refused with 422. It can be above or below the default. Null removes it, so the default applies.
     *
     * @param VoiceDailySpendLimitUpdateWorkspaceLimit|null $workspaceLimit
     *
     * @return self
     */
    public function setWorkspaceLimit(?VoiceDailySpendLimitUpdateWorkspaceLimit $workspaceLimit): self
    {
        $this->initialized['workspaceLimit'] = true;
        $this->workspaceLimit = $workspaceLimit;
        return $this;
    }
}
