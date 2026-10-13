<?php

namespace MessageBird\Wire\Model;

class DomainReceiving
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
     * Receiving control state, separate from DNS verification. `enabled` means receiving is configured; check `capabilities.inbound.status` for readiness. `disabling` means a request to turn off receiving is in progress. `disable_failed` means the latest attempt failed and can be retried. `disabled` means receiving is off and no longer blocks deletion.
     * 
     *
     * @var string|null
     */
    protected $state;
    /**
     * Receiving is assigned to another workspace in this organization. Its controls are unavailable in the current workspace. An authorized user must open the receiving workspace to turn it off.
     * 
     *
     * @var bool|null
     */
    protected $managedElsewhere;
    /**
     * Receiving control state, separate from DNS verification. `enabled` means receiving is configured; check `capabilities.inbound.status` for readiness. `disabling` means a request to turn off receiving is in progress. `disable_failed` means the latest attempt failed and can be retried. `disabled` means receiving is off and no longer blocks deletion.
     * 
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * Receiving control state, separate from DNS verification. `enabled` means receiving is configured; check `capabilities.inbound.status` for readiness. `disabling` means a request to turn off receiving is in progress. `disable_failed` means the latest attempt failed and can be retried. `disabled` means receiving is off and no longer blocks deletion.
     *
     * @param string|null $state
     *
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
    /**
     * Receiving is assigned to another workspace in this organization. Its controls are unavailable in the current workspace. An authorized user must open the receiving workspace to turn it off.
     * 
     *
     * @return bool|null
     */
    public function getManagedElsewhere(): ?bool
    {
        return $this->managedElsewhere;
    }
    /**
     * Receiving is assigned to another workspace in this organization. Its controls are unavailable in the current workspace. An authorized user must open the receiving workspace to turn it off.
     *
     * @param bool|null $managedElsewhere
     *
     * @return self
     */
    public function setManagedElsewhere(?bool $managedElsewhere): self
    {
        $this->initialized['managedElsewhere'] = true;
        $this->managedElsewhere = $managedElsewhere;
        return $this;
    }
}
