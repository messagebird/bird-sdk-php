<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSeedEngagementProfileOption
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
     * Which engagement behaviour the seed addresses simulate. `all` mixes engaged and dormant seeds, which is what makes an engagement split measurable; single-cohort profiles exist too, and the usable set comes from the seed-test options rather than from this list.
     * 
     *
     * @var string|null
     */
    protected $value;
    /**
     * Whether this behaviour is provisioned for the account. As with the seed pools, an unavailable behaviour is one the account has not been set up for rather than one its plan forbids, so leave it out of the choices you offer rather than showing it unpickable.
     * 
     *
     * @var bool|null
     */
    protected $available;
    /**
     * Which engagement behaviour the seed addresses simulate. `all` mixes engaged and dormant seeds, which is what makes an engagement split measurable; single-cohort profiles exist too, and the usable set comes from the seed-test options rather than from this list.
     * 
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
    /**
     * Which engagement behaviour the seed addresses simulate. `all` mixes engaged and dormant seeds, which is what makes an engagement split measurable; single-cohort profiles exist too, and the usable set comes from the seed-test options rather than from this list.
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
     * Whether this behaviour is provisioned for the account. As with the seed pools, an unavailable behaviour is one the account has not been set up for rather than one its plan forbids, so leave it out of the choices you offer rather than showing it unpickable.
     * 
     *
     * @return bool|null
     */
    public function getAvailable(): ?bool
    {
        return $this->available;
    }
    /**
     * Whether this behaviour is provisioned for the account. As with the seed pools, an unavailable behaviour is one the account has not been set up for rather than one its plan forbids, so leave it out of the choices you offer rather than showing it unpickable.
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
