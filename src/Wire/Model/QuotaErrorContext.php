<?php

namespace MessageBird\Wire\Model;

/**
 * The quota limit that refused a resource change. A change in a workspace is checked against its organization's limit and its workspace's limit, whether set manually or derived from the organization's automatic allocation; the organization limit is reported when both refuse. When scope is workspace, follow the response remediation instead of the error code's organization-wide recovery guidance. An organization administrator can adjust the workspace limit or the automatic allocation; the shared organization limit still applies.
 */
class QuotaErrorContext
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
     * Stable key of the quota that refused the change.
     *
     * @var string|null
     */
    protected $quotaKey;
    /**
     * Which limit refused the request.
     * 
     * - `organization`: the limit shared by every workspace in the organization.
     * - `workspace`: the limit set for this workspace.
     * 
     *
     * @var string|null
     */
    protected $scope;
    /**
     * Stable key of the quota that refused the change.
     *
     * @return string|null
     */
    public function getQuotaKey(): ?string
    {
        return $this->quotaKey;
    }
    /**
     * Stable key of the quota that refused the change.
     *
     * @param string|null $quotaKey
     *
     * @return self
     */
    public function setQuotaKey(?string $quotaKey): self
    {
        $this->initialized['quotaKey'] = true;
        $this->quotaKey = $quotaKey;
        return $this;
    }
    /**
     * Which limit refused the request.
     * 
     * - `organization`: the limit shared by every workspace in the organization.
     * - `workspace`: the limit set for this workspace.
     * 
     *
     * @return string|null
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }
    /**
    * Which limit refused the request.
    
    - `organization`: the limit shared by every workspace in the organization.
    - `workspace`: the limit set for this workspace.
    
    *
    * @param string|null $scope
    *
    * @return self
    */
    public function setScope(?string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
}
