<?php

namespace MessageBird\Wire\Model;

/**
 * The rate-limit policy that refused the request. Present only on `rate_limit_error` responses from a rate-limit policy. A workspace-targeted request is checked against its organization's limit and any limit set for its workspace; the organization limit is reported when both are exhausted.
 */
class RateLimitErrorContext
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
     * Stable key of the rate-limit policy that refused the request.
     *
     * @var string|null
     */
    protected $policyKey;
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
     * The rolling window length in seconds.
     *
     * @var int|null
     */
    protected $windowSeconds;
    /**
     * Maximum policy units per rolling window under the limit that refused the request.
     *
     * @var int|null
     */
    protected $limit;
    /**
     * Stable key of the rate-limit policy that refused the request.
     *
     * @return string|null
     */
    public function getPolicyKey(): ?string
    {
        return $this->policyKey;
    }
    /**
     * Stable key of the rate-limit policy that refused the request.
     *
     * @param string|null $policyKey
     *
     * @return self
     */
    public function setPolicyKey(?string $policyKey): self
    {
        $this->initialized['policyKey'] = true;
        $this->policyKey = $policyKey;
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
     * Maximum policy units per rolling window under the limit that refused the request.
     *
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }
    /**
     * Maximum policy units per rolling window under the limit that refused the request.
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
}
