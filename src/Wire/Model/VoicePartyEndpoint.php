<?php

namespace MessageBird\Wire\Model;

class VoicePartyEndpoint extends \ArrayObject
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
     * The technical participant observed on one side of a call. Additional endpoint types may appear in retained observations.
     *
     * @var string|null
     */
    protected $type;
    /**
     * @var VoicePartySIPEndpoint|null
     */
    protected $sip;
    /**
     * @var VoicePartyBridgePSTNEndpoint|null
     */
    protected $bridgePstn;
    /**
     * @var VoicePartyBridgeSIPEndpoint|null
     */
    protected $bridgeSip;
    /**
     * The technical participant observed on one side of a call. Additional endpoint types may appear in retained observations.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The technical participant observed on one side of a call. Additional endpoint types may appear in retained observations.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * @return VoicePartySIPEndpoint|null
     */
    public function getSip(): ?VoicePartySIPEndpoint
    {
        return $this->sip;
    }
    /**
     * @param VoicePartySIPEndpoint|null $sip
     *
     * @return self
     */
    public function setSip(?VoicePartySIPEndpoint $sip): self
    {
        $this->initialized['sip'] = true;
        $this->sip = $sip;
        return $this;
    }
    /**
     * @return VoicePartyBridgePSTNEndpoint|null
     */
    public function getBridgePstn(): ?VoicePartyBridgePSTNEndpoint
    {
        return $this->bridgePstn;
    }
    /**
     * @param VoicePartyBridgePSTNEndpoint|null $bridgePstn
     *
     * @return self
     */
    public function setBridgePstn(?VoicePartyBridgePSTNEndpoint $bridgePstn): self
    {
        $this->initialized['bridgePstn'] = true;
        $this->bridgePstn = $bridgePstn;
        return $this;
    }
    /**
     * @return VoicePartyBridgeSIPEndpoint|null
     */
    public function getBridgeSip(): ?VoicePartyBridgeSIPEndpoint
    {
        return $this->bridgeSip;
    }
    /**
     * @param VoicePartyBridgeSIPEndpoint|null $bridgeSip
     *
     * @return self
     */
    public function setBridgeSip(?VoicePartyBridgeSIPEndpoint $bridgeSip): self
    {
        $this->initialized['bridgeSip'] = true;
        $this->bridgeSip = $bridgeSip;
        return $this;
    }
}
