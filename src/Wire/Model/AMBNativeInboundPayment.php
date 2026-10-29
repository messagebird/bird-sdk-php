<?php

namespace MessageBird\Wire\Model;

class AMBNativeInboundPayment
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
     * Payment state reported by Apple. This does not confirm that a payment settled.
     *
     * @var string|null
     */
    protected $state;
    /**
     * Payment state reported by Apple. This does not confirm that a payment settled.
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * Payment state reported by Apple. This does not confirm that a payment settled.
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
}
