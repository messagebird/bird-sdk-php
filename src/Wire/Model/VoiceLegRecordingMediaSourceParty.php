<?php

namespace MessageBird\Wire\Model;

/**
 * The party this audio was captured from, which is what says whose voice it
 * carries. `channel` only says which direction of the leg the stream came
 * from. A recording view's `number` identifies a number associated with
 * that view, which can be an outbound destination.
 * 
 * `null` on a stream stored before the platform recorded a party for it.
 */
class VoiceLegRecordingMediaSourceParty extends \ArrayObject
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
     * 
     * `null` on an observation this API could not read. The entry stays, because the call counted it when it deduplicated, and dropping it here would report fewer participants than were observed.
     * 
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
     * Digits dialled after this party's number, including leading zeroes. Absent when no overdial was received.
     *
     * @var string|null
     */
    protected $overdialSuffix;
    /**
     * The workspace trunk on this side of the leg. `null` when this side sat behind no trunk.
     *
     * @var string|null
     */
    protected $trunkId;
    /**
     * The workspace user this side acted for, such as a user's browser, the ring group member whose side a recording captured, or the user who started a sequence call. `null` for every other participant, including an API key.
     *
     * @var string|null
     */
    protected $userId;
    /**
     * What kind of participant sat on this side of a leg, and the coordinate that kind carries: a telephone endpoint off the platform, a SIP or WebRTC endpoint, Bird answering, or the platform placing a leg onward. It does not name a person.
     * 
     * `null` on an observation this API could not read. The entry stays, because the call counted it when it deduplicated, and dropping it here would report fewer participants than were observed.
     * 
     *
     * @return VoicePartyEndpoint|null
     */
    public function getEndpoint(): ?VoicePartyEndpoint
    {
        return $this->endpoint;
    }
    /**
    * What kind of participant sat on this side of a leg, and the coordinate that kind carries: a telephone endpoint off the platform, a SIP or WebRTC endpoint, Bird answering, or the platform placing a leg onward. It does not name a person.
    
    `null` on an observation this API could not read. The entry stays, because the call counted it when it deduplicated, and dropping it here would report fewer participants than were observed.
    
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
     * Digits dialled after this party's number, including leading zeroes. Absent when no overdial was received.
     *
     * @return string|null
     */
    public function getOverdialSuffix(): ?string
    {
        return $this->overdialSuffix;
    }
    /**
     * Digits dialled after this party's number, including leading zeroes. Absent when no overdial was received.
     *
     * @param string|null $overdialSuffix
     *
     * @return self
     */
    public function setOverdialSuffix(?string $overdialSuffix): self
    {
        $this->initialized['overdialSuffix'] = true;
        $this->overdialSuffix = $overdialSuffix;
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
    /**
     * The workspace user this side acted for, such as a user's browser, the ring group member whose side a recording captured, or the user who started a sequence call. `null` for every other participant, including an API key.
     *
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }
    /**
     * The workspace user this side acted for, such as a user's browser, the ring group member whose side a recording captured, or the user who started a sequence call. `null` for every other participant, including an API key.
     *
     * @param string|null $userId
     *
     * @return self
     */
    public function setUserId(?string $userId): self
    {
        $this->initialized['userId'] = true;
        $this->userId = $userId;
        return $this;
    }
}
