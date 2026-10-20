<?php

namespace MessageBird\Wire\Model;

/**
 * Renames the party. Single-value identity answers are filled in when you submit or resupply a registration, regardless of its review outcome. Edit those answers through the registration.
 */
class ComplianceIdentityUpdate
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
     * What you call this party. Yours to choose; it is never sent to a carrier.
     *
     * @var string|null
     */
    protected $name;
    /**
     * What you call this party. Yours to choose; it is never sent to a carrier.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * What you call this party. Yours to choose; it is never sent to a carrier.
     *
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
}
