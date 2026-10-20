<?php

namespace MessageBird\Wire\Model;

/**
 * Current usage, measured against the organization limit that requests were checked against when it was read. That limit can briefly differ from the configured `organization_limit` after it changes.
 */
class WorkspaceQuotaUsage extends \ArrayObject
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
     * - `available`: the counts reflect usage at `observed_at`.
     * - `unavailable`: usage could not be read. The counts are unknown, not zero.
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
     * The organization limit requests were checked against when usage was read.
     *
     * @var int|null
     */
    protected $organizationLimit;
    /**
     * The organization's total usage across all its workspaces. `null` on the current-workspace endpoint or when usage is unavailable.
     *
     * @var int|null
     */
    protected $organizationUsed;
    /**
     * This workspace's usage. `null` when usage is unavailable.
     *
     * @var int|null
     */
    protected $workspaceUsed;
    /**
     * How much more the whole organization can add, shared by all its workspaces. `null` on the current-workspace endpoint or when usage is unavailable.
     *
     * @var int|null
     */
    protected $organizationRemaining;
    /**
     * How much more this workspace can add under its own limit. `null` when no workspace limit applies or usage is unavailable.
     *
     * @var int|null
     */
    protected $workspaceRemaining;
    /**
     * How much more this workspace can add now, the lower of `organization_remaining` and any `workspace_remaining`. `null` on the current-workspace endpoint or when usage is unavailable.
     *
     * @var int|null
     */
    protected $remaining;
    /**
     * Whether current usage could be read.
     * 
     * - `available`: the counts reflect usage at `observed_at`.
     * - `unavailable`: usage could not be read. The counts are unknown, not zero.
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
    
    - `available`: the counts reflect usage at `observed_at`.
    - `unavailable`: usage could not be read. The counts are unknown, not zero.
    
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
     * The organization limit requests were checked against when usage was read.
     *
     * @return int|null
     */
    public function getOrganizationLimit(): ?int
    {
        return $this->organizationLimit;
    }
    /**
     * The organization limit requests were checked against when usage was read.
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
     * The organization's total usage across all its workspaces. `null` on the current-workspace endpoint or when usage is unavailable.
     *
     * @return int|null
     */
    public function getOrganizationUsed(): ?int
    {
        return $this->organizationUsed;
    }
    /**
     * The organization's total usage across all its workspaces. `null` on the current-workspace endpoint or when usage is unavailable.
     *
     * @param int|null $organizationUsed
     *
     * @return self
     */
    public function setOrganizationUsed(?int $organizationUsed): self
    {
        $this->initialized['organizationUsed'] = true;
        $this->organizationUsed = $organizationUsed;
        return $this;
    }
    /**
     * This workspace's usage. `null` when usage is unavailable.
     *
     * @return int|null
     */
    public function getWorkspaceUsed(): ?int
    {
        return $this->workspaceUsed;
    }
    /**
     * This workspace's usage. `null` when usage is unavailable.
     *
     * @param int|null $workspaceUsed
     *
     * @return self
     */
    public function setWorkspaceUsed(?int $workspaceUsed): self
    {
        $this->initialized['workspaceUsed'] = true;
        $this->workspaceUsed = $workspaceUsed;
        return $this;
    }
    /**
     * How much more the whole organization can add, shared by all its workspaces. `null` on the current-workspace endpoint or when usage is unavailable.
     *
     * @return int|null
     */
    public function getOrganizationRemaining(): ?int
    {
        return $this->organizationRemaining;
    }
    /**
     * How much more the whole organization can add, shared by all its workspaces. `null` on the current-workspace endpoint or when usage is unavailable.
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
     * How much more this workspace can add under its own limit. `null` when no workspace limit applies or usage is unavailable.
     *
     * @return int|null
     */
    public function getWorkspaceRemaining(): ?int
    {
        return $this->workspaceRemaining;
    }
    /**
     * How much more this workspace can add under its own limit. `null` when no workspace limit applies or usage is unavailable.
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
     * How much more this workspace can add now, the lower of `organization_remaining` and any `workspace_remaining`. `null` on the current-workspace endpoint or when usage is unavailable.
     *
     * @return int|null
     */
    public function getRemaining(): ?int
    {
        return $this->remaining;
    }
    /**
     * How much more this workspace can add now, the lower of `organization_remaining` and any `workspace_remaining`. `null` on the current-workspace endpoint or when usage is unavailable.
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
