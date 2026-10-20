<?php

namespace MessageBird\Wire\Model;

/**
 * A workspace's own limit for a quota. It is a ceiling, not reserved capacity; the organization limit still applies.
 */
class WorkspaceQuotaWorkspaceLimit extends \ArrayObject
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
     * The workspace limit, in the quota's unit. It can exceed the organization limit. Zero allows nothing more.
     *
     * @var int|null
     */
    protected $value;
    /**
     * Whether the workspace limit applies.
     * 
     * - `active`: the limit applies alongside the organization limit.
     * - `expired`: the limit passed its expiry and no longer applies. It stays visible until it is replaced or removed.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * When the workspace limit stops applying. `null` means it has no expiry.
     *
     * @var \DateTime|null
     */
    protected $expiresAt;
    /**
     * When the workspace limit was last set.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * The workspace limit, in the quota's unit. It can exceed the organization limit. Zero allows nothing more.
     *
     * @return int|null
     */
    public function getValue(): ?int
    {
        return $this->value;
    }
    /**
     * The workspace limit, in the quota's unit. It can exceed the organization limit. Zero allows nothing more.
     *
     * @param int|null $value
     *
     * @return self
     */
    public function setValue(?int $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
    /**
     * Whether the workspace limit applies.
     * 
     * - `active`: the limit applies alongside the organization limit.
     * - `expired`: the limit passed its expiry and no longer applies. It stays visible until it is replaced or removed.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Whether the workspace limit applies.
    
    - `active`: the limit applies alongside the organization limit.
    - `expired`: the limit passed its expiry and no longer applies. It stays visible until it is replaced or removed.
    
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
     * When the workspace limit stops applying. `null` means it has no expiry.
     *
     * @return \DateTime|null
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }
    /**
     * When the workspace limit stops applying. `null` means it has no expiry.
     *
     * @param \DateTime|null $expiresAt
     *
     * @return self
     */
    public function setExpiresAt(?\DateTime $expiresAt): self
    {
        $this->initialized['expiresAt'] = true;
        $this->expiresAt = $expiresAt;
        return $this;
    }
    /**
     * When the workspace limit was last set.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the workspace limit was last set.
     *
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
