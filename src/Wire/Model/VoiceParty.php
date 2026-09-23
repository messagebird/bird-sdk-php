<?php

namespace MessageBird\Wire\Model;

class VoiceParty
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
     * What kind of participant sat on this side of a leg, and the coordinate that kind carries: a telephone endpoint off the platform, a SIP or WebRTC endpoint, Bird answering, or the platform placing a leg onward. It does not name a person.
     * `null` on an observation this API could not read. The entry stays, because the session counted it when it deduplicated, and dropping it here would report fewer participants than were observed.
     *
     * @var VoicePartyEndpoint|null
     */
    protected $endpoint;
    /**
     * This side's own address, in E.164 or as a `sip:` URI. `null` when the observation carried none, which does not say whether one was withheld, missing, or nonexistent.
     *
     * @var string|null
     */
    protected $address;
    /**
     * The workspace trunk on this side of the leg. `null` when this side sat behind no trunk.
     *
     * @var string|null
     */
    protected $trunkId;
    /**
     * What kind of participant sat on this side of a leg, and the coordinate that kind carries: a telephone endpoint off the platform, a SIP or WebRTC endpoint, Bird answering, or the platform placing a leg onward. It does not name a person.
     * `null` on an observation this API could not read. The entry stays, because the session counted it when it deduplicated, and dropping it here would report fewer participants than were observed.
     *
     * @return VoicePartyEndpoint|null
     */
    public function getEndpoint(): ?VoicePartyEndpoint
    {
        return $this->endpoint;
    }
    /**
    * What kind of participant sat on this side of a leg, and the coordinate that kind carries: a telephone endpoint off the platform, a SIP or WebRTC endpoint, Bird answering, or the platform placing a leg onward. It does not name a person.
    `null` on an observation this API could not read. The entry stays, because the session counted it when it deduplicated, and dropping it here would report fewer participants than were observed.
    *
    * @param VoicePartyEndpoint|null $endpoint
    *
    * @return self
    */
    public function setEndpoint(?VoicePartyEndpoint $endpoint): self
    {
        $this->initialized['endpoint'] = true;
        $this->endpoint = $endpoint;
        return $this;
    }
    /**
     * This side's own address, in E.164 or as a `sip:` URI. `null` when the observation carried none, which does not say whether one was withheld, missing, or nonexistent.
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * This side's own address, in E.164 or as a `sip:` URI. `null` when the observation carried none, which does not say whether one was withheld, missing, or nonexistent.
     *
     * @param string|null $address
     *
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;
        return $this;
    }
    /**
     * The workspace trunk on this side of the leg. `null` when this side sat behind no trunk.
     *
     * @return string|null
     */
    public function getTrunkId(): ?string
    {
        return $this->trunkId;
    }
    /**
     * The workspace trunk on this side of the leg. `null` when this side sat behind no trunk.
     *
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
