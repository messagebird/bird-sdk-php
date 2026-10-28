<?php

namespace MessageBird\Wire\Model;

/**
 * A resource or value quota as it applies to one workspace.
 */
class WorkspaceQuota
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
     * Stable key of the quota.
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
     * What the limit counts, such as `mailboxes`, `bytes` or `days`.
     *
     * @var string|null
     */
    protected $unit;
    /**
     * What the quota limits.
     * 
     * - `counted`: an amount the workspace accumulates, such as mailboxes or stored bytes. Usage is reported.
     * - `value`: the largest setting a resource may be given, such as a retention period. No usage is counted.
     * 
     *
     * @var string|null
     */
    protected $kind;
    /**
     * When the limits are applied.
     * 
     * - `create`: a request that would add more than the limits allow is refused, and nothing is created.
     * - `outbound_send`: sending is refused once the bytes already stored reach a limit. The size of the message being sent is not counted in advance, and incoming mail is still accepted.
     * - `value`: a setting above the limit is refused when it is chosen. Existing resources keep their settings.
     * 
     *
     * @var string|null
     */
    protected $enforcement;
    /**
     * The largest workspace limit this quota accepts, in its unit.
     *
     * @var int|null
     */
    protected $maximumValue;
    /**
     * The organization's limit, shared by all its workspaces.
     *
     * @var int|null
     */
    protected $organizationLimit;
    /**
     * Where the organization limit comes from.
     * 
     * - `default`: Bird's standard limit.
     * - `plan`: the organization's plan.
     * - `override`: a limit Bird set for the organization.
     * 
     *
     * @var string|null
     */
    protected $organizationSource;
    /**
     * The workspace's own saved limit. `null` when none is saved; `limit_source` and `automatic_limit` then show whether an automatic share applies.
     *
     * @var WorkspaceQuotaWorkspaceLimit|null
     */
    protected $workspaceLimit;
    /**
     * The lower of the organization limit currently applied to requests and the workspace's active limit or automatic share. The applied organization limit can briefly differ from the configured `organization_limit` after a change. A request can still be refused below this value when other workspaces use the shared organization limit.
     *
     * @var int|null
     */
    protected $limit;
    /**
     * Which limit bounds the workspace's own usage.
     * 
     * - `manual`: the workspace's own active limit.
     * - `automatic`: the workspace's share of the organization limit under its automatic allocation.
     * - `organization`: no workspace limit applies; only the shared organization limit does. This includes an automatic allocation of an unlimited organization limit.
     * 
     *
     * @var string|null
     */
    protected $limitSource;
    /**
     * The workspace's share under the organization's automatic allocation. Set only when `limit_source` is `automatic`; it is never saved as a workspace limit.
     *
     * @var int|null
     */
    protected $automaticLimit;
    /**
     * Whether the organization has an automatic allocation of this quota. It can be `true` while `limit_source` is `manual`, or `organization` when the organization limit is unlimited. When `true`, changing or removing this workspace's limit can change other workspaces' automatic shares.
     *
     * @var bool|null
     */
    protected $allocationEnabled;
    /**
     * Current usage. `null` for a `value` quota, which counts nothing.
     *
     * @var WorkspaceQuotaUsage|null
     */
    protected $usage;
    /**
     * Stable key of the quota.
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }
    /**
     * Stable key of the quota.
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
     * What the limit counts, such as `mailboxes`, `bytes` or `days`.
     *
     * @return string|null
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }
    /**
     * What the limit counts, such as `mailboxes`, `bytes` or `days`.
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
     * What the quota limits.
     * 
     * - `counted`: an amount the workspace accumulates, such as mailboxes or stored bytes. Usage is reported.
     * - `value`: the largest setting a resource may be given, such as a retention period. No usage is counted.
     * 
     *
     * @return string|null
     */
    public function getKind(): ?string
    {
        return $this->kind;
    }
    /**
    * What the quota limits.
    
    - `counted`: an amount the workspace accumulates, such as mailboxes or stored bytes. Usage is reported.
    - `value`: the largest setting a resource may be given, such as a retention period. No usage is counted.
    
    *
    * @param string|null $kind
    *
    * @return self
    */
    public function setKind(?string $kind): self
    {
        $this->initialized['kind'] = true;
        $this->kind = $kind;
        return $this;
    }
    /**
     * When the limits are applied.
     * 
     * - `create`: a request that would add more than the limits allow is refused, and nothing is created.
     * - `outbound_send`: sending is refused once the bytes already stored reach a limit. The size of the message being sent is not counted in advance, and incoming mail is still accepted.
     * - `value`: a setting above the limit is refused when it is chosen. Existing resources keep their settings.
     * 
     *
     * @return string|null
     */
    public function getEnforcement(): ?string
    {
        return $this->enforcement;
    }
    /**
    * When the limits are applied.
    
    - `create`: a request that would add more than the limits allow is refused, and nothing is created.
    - `outbound_send`: sending is refused once the bytes already stored reach a limit. The size of the message being sent is not counted in advance, and incoming mail is still accepted.
    - `value`: a setting above the limit is refused when it is chosen. Existing resources keep their settings.
    
    *
    * @param string|null $enforcement
    *
    * @return self
    */
    public function setEnforcement(?string $enforcement): self
    {
        $this->initialized['enforcement'] = true;
        $this->enforcement = $enforcement;
        return $this;
    }
    /**
     * The largest workspace limit this quota accepts, in its unit.
     *
     * @return int|null
     */
    public function getMaximumValue(): ?int
    {
        return $this->maximumValue;
    }
    /**
     * The largest workspace limit this quota accepts, in its unit.
     *
     * @param int|null $maximumValue
     *
     * @return self
     */
    public function setMaximumValue(?int $maximumValue): self
    {
        $this->initialized['maximumValue'] = true;
        $this->maximumValue = $maximumValue;
        return $this;
    }
    /**
     * The organization's limit, shared by all its workspaces.
     *
     * @return int|null
     */
    public function getOrganizationLimit(): ?int
    {
        return $this->organizationLimit;
    }
    /**
     * The organization's limit, shared by all its workspaces.
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
     * Where the organization limit comes from.
     * 
     * - `default`: Bird's standard limit.
     * - `plan`: the organization's plan.
     * - `override`: a limit Bird set for the organization.
     * 
     *
     * @return string|null
     */
    public function getOrganizationSource(): ?string
    {
        return $this->organizationSource;
    }
    /**
    * Where the organization limit comes from.
    
    - `default`: Bird's standard limit.
    - `plan`: the organization's plan.
    - `override`: a limit Bird set for the organization.
    
    *
    * @param string|null $organizationSource
    *
    * @return self
    */
    public function setOrganizationSource(?string $organizationSource): self
    {
        $this->initialized['organizationSource'] = true;
        $this->organizationSource = $organizationSource;
        return $this;
    }
    /**
     * The workspace's own saved limit. `null` when none is saved; `limit_source` and `automatic_limit` then show whether an automatic share applies.
     *
     * @return WorkspaceQuotaWorkspaceLimit|null
     */
    public function getWorkspaceLimit(): ?WorkspaceQuotaWorkspaceLimit
    {
        return $this->workspaceLimit;
    }
    /**
     * The workspace's own saved limit. `null` when none is saved; `limit_source` and `automatic_limit` then show whether an automatic share applies.
     *
     * @param WorkspaceQuotaWorkspaceLimit|null $workspaceLimit
     *
     * @return self
     */
    public function setWorkspaceLimit(?WorkspaceQuotaWorkspaceLimit $workspaceLimit): self
    {
        $this->initialized['workspaceLimit'] = true;
        $this->workspaceLimit = $workspaceLimit;
        return $this;
    }
    /**
     * The lower of the organization limit currently applied to requests and the workspace's active limit or automatic share. The applied organization limit can briefly differ from the configured `organization_limit` after a change. A request can still be refused below this value when other workspaces use the shared organization limit.
     *
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }
    /**
     * The lower of the organization limit currently applied to requests and the workspace's active limit or automatic share. The applied organization limit can briefly differ from the configured `organization_limit` after a change. A request can still be refused below this value when other workspaces use the shared organization limit.
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
     * - `organization`: no workspace limit applies; only the shared organization limit does. This includes an automatic allocation of an unlimited organization limit.
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
    - `organization`: no workspace limit applies; only the shared organization limit does. This includes an automatic allocation of an unlimited organization limit.
    
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
     * The workspace's share under the organization's automatic allocation. Set only when `limit_source` is `automatic`; it is never saved as a workspace limit.
     *
     * @return int|null
     */
    public function getAutomaticLimit(): ?int
    {
        return $this->automaticLimit;
    }
    /**
     * The workspace's share under the organization's automatic allocation. Set only when `limit_source` is `automatic`; it is never saved as a workspace limit.
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
     * Whether the organization has an automatic allocation of this quota. It can be `true` while `limit_source` is `manual`, or `organization` when the organization limit is unlimited. When `true`, changing or removing this workspace's limit can change other workspaces' automatic shares.
     *
     * @return bool|null
     */
    public function getAllocationEnabled(): ?bool
    {
        return $this->allocationEnabled;
    }
    /**
     * Whether the organization has an automatic allocation of this quota. It can be `true` while `limit_source` is `manual`, or `organization` when the organization limit is unlimited. When `true`, changing or removing this workspace's limit can change other workspaces' automatic shares.
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
     * Current usage. `null` for a `value` quota, which counts nothing.
     *
     * @return WorkspaceQuotaUsage|null
     */
    public function getUsage(): ?WorkspaceQuotaUsage
    {
        return $this->usage;
    }
    /**
     * Current usage. `null` for a `value` quota, which counts nothing.
     *
     * @param WorkspaceQuotaUsage|null $usage
     *
     * @return self
     */
    public function setUsage(?WorkspaceQuotaUsage $usage): self
    {
        $this->initialized['usage'] = true;
        $this->usage = $usage;
        return $this;
    }
}
