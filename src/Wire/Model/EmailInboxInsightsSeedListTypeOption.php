<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSeedListTypeOption
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
     * Which pool of seed addresses a test uses. Which pools an account can use depends on what has been provisioned for it, so read the usable set from the seed-test options rather than assuming these are the only values.
     * 
     *
     * @var string|null
     */
    protected $value;
    /**
     * Whether this pool is provisioned for the account. An unavailable pool is one the account has not been set up for rather than one its plan forbids, and there is no self-serve way to enable one, so leave it out of the choices you offer rather than showing it unpickable.
     * 
     *
     * @var bool|null
     */
    protected $available;
    /**
     * Which pool of seed addresses a test uses. Which pools an account can use depends on what has been provisioned for it, so read the usable set from the seed-test options rather than assuming these are the only values.
     * 
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
    /**
     * Which pool of seed addresses a test uses. Which pools an account can use depends on what has been provisioned for it, so read the usable set from the seed-test options rather than assuming these are the only values.
     *
     * @param string|null $value
     *
     * @return self
     */
    public function setValue(?string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
    /**
     * Whether this pool is provisioned for the account. An unavailable pool is one the account has not been set up for rather than one its plan forbids, and there is no self-serve way to enable one, so leave it out of the choices you offer rather than showing it unpickable.
     * 
     *
     * @return bool|null
     */
    public function getAvailable(): ?bool
    {
        return $this->available;
    }
    /**
     * Whether this pool is provisioned for the account. An unavailable pool is one the account has not been set up for rather than one its plan forbids, and there is no self-serve way to enable one, so leave it out of the choices you offer rather than showing it unpickable.
     *
     * @param bool|null $available
     *
     * @return self
     */
    public function setAvailable(?bool $available): self
    {
        $this->initialized['available'] = true;
        $this->available = $available;
        return $this;
    }
}
