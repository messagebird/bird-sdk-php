<?php

namespace MessageBird\Wire\Model;

class VoiceNumberDirections
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
     * Whether calls to this number arrive here. False for a number from another carrier, whose calls that carrier routes, and for one allocated to you that cannot carry calls.
     * 
     *
     * @var bool|null
     */
    protected $inbound;
    /**
     * Whether this number can be presented on a call you place. Buying a number does not grant this on its own: proving control of it does.
     * 
     *
     * @var bool|null
     */
    protected $outbound;
    /**
     * Whether calls to this number arrive here. False for a number from another carrier, whose calls that carrier routes, and for one allocated to you that cannot carry calls.
     * 
     *
     * @return bool|null
     */
    public function getInbound(): ?bool
    {
        return $this->inbound;
    }
    /**
     * Whether calls to this number arrive here. False for a number from another carrier, whose calls that carrier routes, and for one allocated to you that cannot carry calls.
     *
     * @param bool|null $inbound
     *
     * @return self
     */
    public function setInbound(?bool $inbound): self
    {
        $this->initialized['inbound'] = true;
        $this->inbound = $inbound;
        return $this;
    }
    /**
     * Whether this number can be presented on a call you place. Buying a number does not grant this on its own: proving control of it does.
     * 
     *
     * @return bool|null
     */
    public function getOutbound(): ?bool
    {
        return $this->outbound;
    }
    /**
     * Whether this number can be presented on a call you place. Buying a number does not grant this on its own: proving control of it does.
     *
     * @param bool|null $outbound
     *
     * @return self
     */
    public function setOutbound(?bool $outbound): self
    {
        $this->initialized['outbound'] = true;
        $this->outbound = $outbound;
        return $this;
    }
}
