<?php

namespace MessageBird\Wire\Model;

class DomainCapabilities
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
     * @var DomainCapability|null
     */
    protected $sending;
    /**
     * @var DomainCapability|null
     */
    protected $returnPath;
    /**
     * @var DomainCapability|null
     */
    protected $dmarc;
    /**
     * @var DomainCapability|null
     */
    protected $tracking;
    /**
     * @var DomainCapability|null
     */
    protected $inbound;
    /**
     * @return DomainCapability|null
     */
    public function getSending(): ?DomainCapability
    {
        return $this->sending;
    }
    /**
     * @param DomainCapability|null $sending
     *
     * @return self
     */
    public function setSending(?DomainCapability $sending): self
    {
        $this->initialized['sending'] = true;
        $this->sending = $sending;
        return $this;
    }
    /**
     * @return DomainCapability|null
     */
    public function getReturnPath(): ?DomainCapability
    {
        return $this->returnPath;
    }
    /**
     * @param DomainCapability|null $returnPath
     *
     * @return self
     */
    public function setReturnPath(?DomainCapability $returnPath): self
    {
        $this->initialized['returnPath'] = true;
        $this->returnPath = $returnPath;
        return $this;
    }
    /**
     * @return DomainCapability|null
     */
    public function getDmarc(): ?DomainCapability
    {
        return $this->dmarc;
    }
    /**
     * @param DomainCapability|null $dmarc
     *
     * @return self
     */
    public function setDmarc(?DomainCapability $dmarc): self
    {
        $this->initialized['dmarc'] = true;
        $this->dmarc = $dmarc;
        return $this;
    }
    /**
     * @return DomainCapability|null
     */
    public function getTracking(): ?DomainCapability
    {
        return $this->tracking;
    }
    /**
     * @param DomainCapability|null $tracking
     *
     * @return self
     */
    public function setTracking(?DomainCapability $tracking): self
    {
        $this->initialized['tracking'] = true;
        $this->tracking = $tracking;
        return $this;
    }
    /**
     * @return DomainCapability|null
     */
    public function getInbound(): ?DomainCapability
    {
        return $this->inbound;
    }
    /**
     * @param DomainCapability|null $inbound
     *
     * @return self
     */
    public function setInbound(?DomainCapability $inbound): self
    {
        $this->initialized['inbound'] = true;
        $this->inbound = $inbound;
        return $this;
    }
}
