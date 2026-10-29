<?php

namespace MessageBird\Wire\Model;

/**
 * When workspace usage has been measured for long enough to set a new workspace limit for this policy. Readiness covers timing only; a new limit also needs an organization with several workspaces, and with one workspace only an existing unexpired limit can be changed.
 */
class WorkspaceRateLimitAttribution
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
     * Whether workspace usage has been measured for long enough to set a new workspace limit.
     * 
     * - `unavailable`: workspace limits cannot be set in this region yet.
     * - `warming`: workspace usage is being measured; a limit can be set from `ready_at`.
     * - `ready`: a workspace limit can be set.
     * 
     * Existing workspace limits are enforced in every state and can be removed while the workspace can be managed.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * When workspace usage has been measured for long enough, from which a workspace limit can be set if the organization's other conditions allow it. `null` while workspace limits are unavailable in this region.
     *
     * @var \DateTime|null
     */
    protected $readyAt;
    /**
     * Whether workspace usage has been measured for long enough to set a new workspace limit.
     * 
     * - `unavailable`: workspace limits cannot be set in this region yet.
     * - `warming`: workspace usage is being measured; a limit can be set from `ready_at`.
     * - `ready`: a workspace limit can be set.
     * 
     * Existing workspace limits are enforced in every state and can be removed while the workspace can be managed.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Whether workspace usage has been measured for long enough to set a new workspace limit.
    
    - `unavailable`: workspace limits cannot be set in this region yet.
    - `warming`: workspace usage is being measured; a limit can be set from `ready_at`.
    - `ready`: a workspace limit can be set.
    
    Existing workspace limits are enforced in every state and can be removed while the workspace can be managed.
    
    *
    * @param string|null $status
    *
    * @return self
    */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * When workspace usage has been measured for long enough, from which a workspace limit can be set if the organization's other conditions allow it. `null` while workspace limits are unavailable in this region.
     *
     * @return \DateTime|null
     */
    public function getReadyAt(): ?\DateTime
    {
        return $this->readyAt;
    }
    /**
     * When workspace usage has been measured for long enough, from which a workspace limit can be set if the organization's other conditions allow it. `null` while workspace limits are unavailable in this region.
     *
     * @param \DateTime|null $readyAt
     *
     * @return self
     */
    public function setReadyAt(?\DateTime $readyAt): self
    {
        $this->initialized['readyAt'] = true;
        $this->readyAt = $readyAt;
        return $this;
    }
}
