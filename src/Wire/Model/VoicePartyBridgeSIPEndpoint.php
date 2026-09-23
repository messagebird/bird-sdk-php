<?php

namespace MessageBird\Wire\Model;

class VoicePartyBridgeSIPEndpoint
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
    protected $trunkId;
    /**
     * @return string|null
     */
    public function getTrunkId(): ?string
    {
        return $this->trunkId;
    }
    /**
     * @param string|null $trunkId
     *
     * @return self
     */
    public function setTrunkId(?string $trunkId): self
    {
        $this->initialized['trunkId'] = true;
        $this->trunkId = $trunkId;
        return $this;
    }
}
