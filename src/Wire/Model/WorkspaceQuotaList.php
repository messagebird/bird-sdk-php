<?php

namespace MessageBird\Wire\Model;

class WorkspaceQuotaList
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
     * @var list<WorkspaceQuota>|null
     */
    protected $data;
    /**
     * Whether workspace limits can be set.
     * 
     * - `available`: workspace limits can be set and changed.
     * - `unavailable`: new workspace limits cannot be set in this region yet. Existing workspace limits still apply and can be removed.
     * 
     *
     * @var string|null
     */
    protected $configuration;
    /**
     * @return list<WorkspaceQuota>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * @param list<WorkspaceQuota>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
    /**
     * Whether workspace limits can be set.
     * 
     * - `available`: workspace limits can be set and changed.
     * - `unavailable`: new workspace limits cannot be set in this region yet. Existing workspace limits still apply and can be removed.
     * 
     *
     * @return string|null
     */
    public function getConfiguration(): ?string
    {
        return $this->configuration;
    }
    /**
    * Whether workspace limits can be set.
    
    - `available`: workspace limits can be set and changed.
    - `unavailable`: new workspace limits cannot be set in this region yet. Existing workspace limits still apply and can be removed.
    
    *
    * @param string|null $configuration
    *
    * @return self
    */
    public function setConfiguration(?string $configuration): self
    {
        $this->initialized['configuration'] = true;
        $this->configuration = $configuration;
        return $this;
    }
}
