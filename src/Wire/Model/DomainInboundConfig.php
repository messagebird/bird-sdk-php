<?php

namespace MessageBird\Wire\Model;

class DomainInboundConfig
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
     * Set `true` to enable receiving on this domain, `false` to disable it. Disabling tears receiving down and removes the MX records from `dns_records`; this is immediate in the normal case, and if a step needs retrying the capability clears as soon as teardown finishes.
     * 
     *
     * @var bool|null
     */
    protected $enabled;
    /**
     * Set `true` to enable receiving on this domain, `false` to disable it. Disabling tears receiving down and removes the MX records from `dns_records`; this is immediate in the normal case, and if a step needs retrying the capability clears as soon as teardown finishes.
     * 
     *
     * @return bool|null
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }
    /**
     * Set `true` to enable receiving on this domain, `false` to disable it. Disabling tears receiving down and removes the MX records from `dns_records`; this is immediate in the normal case, and if a step needs retrying the capability clears as soon as teardown finishes.
     *
     * @param bool|null $enabled
     *
     * @return self
     */
    public function setEnabled(?bool $enabled): self
    {
        $this->initialized['enabled'] = true;
        $this->enabled = $enabled;
        return $this;
    }
}
