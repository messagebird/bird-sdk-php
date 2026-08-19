<?php

namespace MessageBird\Wire\Model;

class SMSInboundOperatorStatsPoint
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
     * Mobile country code and mobile network code of the network the sending subscriber is on. The breakdown keys on this rather than on an operator name because the carrier reports a name only where a surcharge applies, which would leave most of the world in one unnamed bucket.
     *
     * @var string|null
     */
    protected $mccMnc;
    /**
     * Distinct messages received from senders on this operator during the period.
     *
     * @var int|null
     */
    protected $received;
    /**
     * Mobile country code and mobile network code of the network the sending subscriber is on. The breakdown keys on this rather than on an operator name because the carrier reports a name only where a surcharge applies, which would leave most of the world in one unnamed bucket.
     *
     * @return string|null
     */
    public function getMccMnc(): ?string
    {
        return $this->mccMnc;
    }
    /**
     * Mobile country code and mobile network code of the network the sending subscriber is on. The breakdown keys on this rather than on an operator name because the carrier reports a name only where a surcharge applies, which would leave most of the world in one unnamed bucket.
     *
     * @param string|null $mccMnc
     *
     * @return self
     */
    public function setMccMnc(?string $mccMnc): self
    {
        $this->initialized['mccMnc'] = true;
        $this->mccMnc = $mccMnc;
        return $this;
    }
    /**
     * Distinct messages received from senders on this operator during the period.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct messages received from senders on this operator during the period.
     *
     * @param int|null $received
     *
     * @return self
     */
    public function setReceived(?int $received): self
    {
        $this->initialized['received'] = true;
        $this->received = $received;
        return $this;
    }
}
