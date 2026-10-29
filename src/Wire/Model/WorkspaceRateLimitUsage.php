<?php

namespace MessageBird\Wire\Model;

/**
 * Remaining capacity in the current rolling window. Taking the observation consumes no capacity, but the request that reads it counts against its own policy, `api_list`, like any other read. It is measured against the limits that requests were checked against when it was read, which can briefly differ from the configured top-level `organization_limit` and `workspace_limit` after a limit changes.
 */
class WorkspaceRateLimitUsage
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
     * Whether current usage could be read.
     * 
     * - `available`: the remaining counts reflect usage at `observed_at`.
     * - `unavailable`: usage could not be read. Remaining counts are unknown, not zero.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * When usage was read.
     *
     * @var \DateTime|null
     */
    protected $observedAt;
    /**
     * The organization limit requests were checked against when usage was read. `null` when usage is unavailable.
     *
     * @var int|null
     */
    protected $organizationLimit;
    /**
     * Units the whole organization can still use in this window, shared by all its workspaces. `null` when usage is unavailable.
     *
     * @var int|null
     */
    protected $organizationRemaining;
    /**
     * The workspace's own limit requests were checked against when usage was read. `null` when no workspace limit applied or usage is unavailable.
     *
     * @var int|null
     */
    protected $workspaceLimit;
    /**
     * Units this workspace can still use under its own limit. `null` when no workspace limit applied, usage is unavailable, or workspace usage is not yet measured for long enough.
     *
     * @var int|null
     */
    protected $workspaceRemaining;
    /**
     * Seconds until the current window ends. `null` when usage is unavailable.
     *
     * @var int|null
     */
    protected $resetsInSeconds;
    /**
     * Whether current usage could be read.
     * 
     * - `available`: the remaining counts reflect usage at `observed_at`.
     * - `unavailable`: usage could not be read. Remaining counts are unknown, not zero.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Whether current usage could be read.
    
    - `available`: the remaining counts reflect usage at `observed_at`.
    - `unavailable`: usage could not be read. Remaining counts are unknown, not zero.
    
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
     * When usage was read.
     *
     * @return \DateTime|null
     */
    public function getObservedAt(): ?\DateTime
    {
        return $this->observedAt;
    }
    /**
     * When usage was read.
     *
     * @param \DateTime|null $observedAt
     *
     * @return self
     */
    public function setObservedAt(?\DateTime $observedAt): self
    {
        $this->initialized['observedAt'] = true;
        $this->observedAt = $observedAt;
        return $this;
    }
    /**
     * The organization limit requests were checked against when usage was read. `null` when usage is unavailable.
     *
     * @return int|null
     */
    public function getOrganizationLimit(): ?int
    {
        return $this->organizationLimit;
    }
    /**
     * The organization limit requests were checked against when usage was read. `null` when usage is unavailable.
     *
     * @param int|null $organizationLimit
     *
     * @return self
     */
    public function setOrganizationLimit(?int $organizationLimit): self
    {
        $this->initialized['organizationLimit'] = true;
        $this->organizationLimit = $organizationLimit;
        return $this;
    }
    /**
     * Units the whole organization can still use in this window, shared by all its workspaces. `null` when usage is unavailable.
     *
     * @return int|null
     */
    public function getOrganizationRemaining(): ?int
    {
        return $this->organizationRemaining;
    }
    /**
     * Units the whole organization can still use in this window, shared by all its workspaces. `null` when usage is unavailable.
     *
     * @param int|null $organizationRemaining
     *
     * @return self
     */
    public function setOrganizationRemaining(?int $organizationRemaining): self
    {
        $this->initialized['organizationRemaining'] = true;
        $this->organizationRemaining = $organizationRemaining;
        return $this;
    }
    /**
     * The workspace's own limit requests were checked against when usage was read. `null` when no workspace limit applied or usage is unavailable.
     *
     * @return int|null
     */
    public function getWorkspaceLimit(): ?int
    {
        return $this->workspaceLimit;
    }
    /**
     * The workspace's own limit requests were checked against when usage was read. `null` when no workspace limit applied or usage is unavailable.
     *
     * @param int|null $workspaceLimit
     *
     * @return self
     */
    public function setWorkspaceLimit(?int $workspaceLimit): self
    {
        $this->initialized['workspaceLimit'] = true;
        $this->workspaceLimit = $workspaceLimit;
        return $this;
    }
    /**
     * Units this workspace can still use under its own limit. `null` when no workspace limit applied, usage is unavailable, or workspace usage is not yet measured for long enough.
     *
     * @return int|null
     */
    public function getWorkspaceRemaining(): ?int
    {
        return $this->workspaceRemaining;
    }
    /**
     * Units this workspace can still use under its own limit. `null` when no workspace limit applied, usage is unavailable, or workspace usage is not yet measured for long enough.
     *
     * @param int|null $workspaceRemaining
     *
     * @return self
     */
    public function setWorkspaceRemaining(?int $workspaceRemaining): self
    {
        $this->initialized['workspaceRemaining'] = true;
        $this->workspaceRemaining = $workspaceRemaining;
        return $this;
    }
    /**
     * Seconds until the current window ends. `null` when usage is unavailable.
     *
     * @return int|null
     */
    public function getResetsInSeconds(): ?int
    {
        return $this->resetsInSeconds;
    }
    /**
     * Seconds until the current window ends. `null` when usage is unavailable.
     *
     * @param int|null $resetsInSeconds
     *
     * @return self
     */
    public function setResetsInSeconds(?int $resetsInSeconds): self
    {
        $this->initialized['resetsInSeconds'] = true;
        $this->resetsInSeconds = $resetsInSeconds;
        return $this;
    }
}
