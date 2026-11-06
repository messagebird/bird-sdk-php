<?php

namespace MessageBird\Wire\Model;

/**
 * A rate-limit policy as it applies to one workspace.
 */
class WorkspaceRateLimit
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
     * Stable key of the rate-limit policy.
     *
     * @var string|null
     */
    protected $key;
    /**
     * @var string|null
     */
    protected $name;
    /**
     * @var string|null
     */
    protected $description;
    /**
     * What the policy counts, such as `request` or `message`.
     *
     * @var string|null
     */
    protected $unit;
    /**
     * The rolling window length in seconds.
     *
     * @var int|null
     */
    protected $windowSeconds;
    /**
     * Maximum policy units per rolling window for the whole organization, shared by all its workspaces.
     *
     * @var int|null
     */
    protected $organizationLimit;
    /**
     * The workspace's own saved limit. `null` when none is saved; `limit_source` and `automatic_limit` then show whether an automatic share applies.
     *
     * @var WorkspaceRateLimitWorkspaceLimit|null
     */
    protected $workspaceLimit;
    /**
     * The lower of the organization limit and the workspace's active limit or automatic share. Requests can still be refused below it when other workspaces use the shared organization limit.
     *
     * @var int|null
     */
    protected $limit;
    /**
     * Which limit bounds the workspace's own usage.
     * 
     * - `manual`: the workspace's own active limit.
     * - `automatic`: the workspace's share of the organization limit under its automatic allocation.
     * - `organization`: no workspace limit applies; only the shared organization limit does.
     * 
     *
     * @var string|null
     */
    protected $limitSource;
    /**
     * The workspace's share under the organization's automatic allocation, at least 1 per window. Set only when `limit_source` is `automatic`; it is never saved as a workspace limit.
     *
     * @var int|null
     */
    protected $automaticLimit;
    /**
     * Whether the organization has an automatic allocation of this policy. It can be `true` while `limit_source` is `manual`. When `true`, changing or removing this workspace's limit can change other workspaces' automatic shares.
     *
     * @var bool|null
     */
    protected $allocationEnabled;
    /**
     * When workspace usage has been measured for long enough to set a new workspace limit for this policy. Readiness covers timing only; a new limit also needs an organization with several workspaces, and with one workspace only an existing unexpired limit can be changed.
     *
     * @var WorkspaceRateLimitAttribution|null
     */
    protected $attribution;
    /**
     * Remaining capacity in the current rolling window. Taking the observation consumes no capacity, but the request that reads it counts against its own policy, `api_list`, like any other read. It is measured against the limits that requests were checked against when it was read, which can briefly differ from the configured top-level `organization_limit` and `workspace_limit` after a limit changes.
     *
     * @var WorkspaceRateLimitUsage|null
     */
    protected $usage;
    /**
     * Stable key of the rate-limit policy.
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }
    /**
     * Stable key of the rate-limit policy.
     *
     * @param string|null $key
     *
     * @return self
     */
    public function setKey(?string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * What the policy counts, such as `request` or `message`.
     *
     * @return string|null
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }
    /**
     * What the policy counts, such as `request` or `message`.
     *
     * @param string|null $unit
     *
     * @return self
     */
    public function setUnit(?string $unit): self
    {
        $this->initialized['unit'] = true;
        $this->unit = $unit;
        return $this;
    }
    /**
     * The rolling window length in seconds.
     *
     * @return int|null
     */
    public function getWindowSeconds(): ?int
    {
        return $this->windowSeconds;
    }
    /**
     * The rolling window length in seconds.
     *
     * @param int|null $windowSeconds
     *
     * @return self
     */
    public function setWindowSeconds(?int $windowSeconds): self
    {
        $this->initialized['windowSeconds'] = true;
        $this->windowSeconds = $windowSeconds;
        return $this;
    }
    /**
     * Maximum policy units per rolling window for the whole organization, shared by all its workspaces.
     *
     * @return int|null
     */
    public function getOrganizationLimit(): ?int
    {
        return $this->organizationLimit;
    }
    /**
     * Maximum policy units per rolling window for the whole organization, shared by all its workspaces.
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
     * The workspace's own saved limit. `null` when none is saved; `limit_source` and `automatic_limit` then show whether an automatic share applies.
     *
     * @return WorkspaceRateLimitWorkspaceLimit|null
     */
    public function getWorkspaceLimit(): ?WorkspaceRateLimitWorkspaceLimit
    {
        return $this->workspaceLimit;
    }
    /**
     * The workspace's own saved limit. `null` when none is saved; `limit_source` and `automatic_limit` then show whether an automatic share applies.
     *
     * @param WorkspaceRateLimitWorkspaceLimit|null $workspaceLimit
     *
     * @return self
     */
    public function setWorkspaceLimit(?WorkspaceRateLimitWorkspaceLimit $workspaceLimit): self
    {
        $this->initialized['workspaceLimit'] = true;
        $this->workspaceLimit = $workspaceLimit;
        return $this;
    }
    /**
     * The lower of the organization limit and the workspace's active limit or automatic share. Requests can still be refused below it when other workspaces use the shared organization limit.
     *
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }
    /**
     * The lower of the organization limit and the workspace's active limit or automatic share. Requests can still be refused below it when other workspaces use the shared organization limit.
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
     * Which limit bounds the workspace's own usage.
     * 
     * - `manual`: the workspace's own active limit.
     * - `automatic`: the workspace's share of the organization limit under its automatic allocation.
     * - `organization`: no workspace limit applies; only the shared organization limit does.
     * 
     *
     * @return string|null
     */
    public function getLimitSource(): ?string
    {
        return $this->limitSource;
    }
    /**
    * Which limit bounds the workspace's own usage.
    
    - `manual`: the workspace's own active limit.
    - `automatic`: the workspace's share of the organization limit under its automatic allocation.
    - `organization`: no workspace limit applies; only the shared organization limit does.
    
    *
    * @param string|null $limitSource
    *
    * @return self
    */
    public function setLimitSource(?string $limitSource): self
    {
        $this->initialized['limitSource'] = true;
        $this->limitSource = $limitSource;
        return $this;
    }
    /**
     * The workspace's share under the organization's automatic allocation, at least 1 per window. Set only when `limit_source` is `automatic`; it is never saved as a workspace limit.
     *
     * @return int|null
     */
    public function getAutomaticLimit(): ?int
    {
        return $this->automaticLimit;
    }
    /**
     * The workspace's share under the organization's automatic allocation, at least 1 per window. Set only when `limit_source` is `automatic`; it is never saved as a workspace limit.
     *
     * @param int|null $automaticLimit
     *
     * @return self
     */
    public function setAutomaticLimit(?int $automaticLimit): self
    {
        $this->initialized['automaticLimit'] = true;
        $this->automaticLimit = $automaticLimit;
        return $this;
    }
    /**
     * Whether the organization has an automatic allocation of this policy. It can be `true` while `limit_source` is `manual`. When `true`, changing or removing this workspace's limit can change other workspaces' automatic shares.
     *
     * @return bool|null
     */
    public function getAllocationEnabled(): ?bool
    {
        return $this->allocationEnabled;
    }
    /**
     * Whether the organization has an automatic allocation of this policy. It can be `true` while `limit_source` is `manual`. When `true`, changing or removing this workspace's limit can change other workspaces' automatic shares.
     *
     * @param bool|null $allocationEnabled
     *
     * @return self
     */
    public function setAllocationEnabled(?bool $allocationEnabled): self
    {
        $this->initialized['allocationEnabled'] = true;
        $this->allocationEnabled = $allocationEnabled;
        return $this;
    }
    /**
     * When workspace usage has been measured for long enough to set a new workspace limit for this policy. Readiness covers timing only; a new limit also needs an organization with several workspaces, and with one workspace only an existing unexpired limit can be changed.
     *
     * @return WorkspaceRateLimitAttribution|null
     */
    public function getAttribution(): ?WorkspaceRateLimitAttribution
    {
        return $this->attribution;
    }
    /**
     * When workspace usage has been measured for long enough to set a new workspace limit for this policy. Readiness covers timing only; a new limit also needs an organization with several workspaces, and with one workspace only an existing unexpired limit can be changed.
     *
     * @param WorkspaceRateLimitAttribution|null $attribution
     *
     * @return self
     */
    public function setAttribution(?WorkspaceRateLimitAttribution $attribution): self
    {
        $this->initialized['attribution'] = true;
        $this->attribution = $attribution;
        return $this;
    }
    /**
     * Remaining capacity in the current rolling window. Taking the observation consumes no capacity, but the request that reads it counts against its own policy, `api_list`, like any other read. It is measured against the limits that requests were checked against when it was read, which can briefly differ from the configured top-level `organization_limit` and `workspace_limit` after a limit changes.
     *
     * @return WorkspaceRateLimitUsage|null
     */
    public function getUsage(): ?WorkspaceRateLimitUsage
    {
        return $this->usage;
    }
    /**
     * Remaining capacity in the current rolling window. Taking the observation consumes no capacity, but the request that reads it counts against its own policy, `api_list`, like any other read. It is measured against the limits that requests were checked against when it was read, which can briefly differ from the configured top-level `organization_limit` and `workspace_limit` after a limit changes.
     *
     * @param WorkspaceRateLimitUsage|null $usage
     *
     * @return self
     */
    public function setUsage(?WorkspaceRateLimitUsage $usage): self
    {
        $this->initialized['usage'] = true;
        $this->usage = $usage;
        return $this;
    }
}
