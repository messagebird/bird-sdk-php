<?php

namespace MessageBird\Wire\Model;

/**
 * Assign an unassigned eSIM to this person. The profile must be allocated and ready, active, or suspended. Customers handle identification collection and compliance.
 */
class EsimAssignmentCreate
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
     * @var string|null
     */
    protected $subscriberId;
    /**
     * @return string|null
     */
    public function getSubscriberId(): ?string
    {
        return $this->subscriberId;
    }
    /**
     * @param string|null $subscriberId
     *
     * @return self
     */
    public function setSubscriberId(?string $subscriberId): self
    {
        $this->initialized['subscriberId'] = true;
        $this->subscriberId = $subscriberId;
        return $this;
    }
}
