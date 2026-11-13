<?php

namespace MessageBird\Wire\Model;

class VoiceLegRecordingMedia
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
    protected $id;
    /**
     * @var string|null
     */
    protected $legId;
    /**
     * `null` on a stream captured before calls existed, which only its leg addresses.
     *
     * @var string|null
     */
    protected $callId;
    /**
     * Codec of the stored payload.
     *
     * @var string|null
     */
    protected $codec;
    /**
     * @var string|null
     */
    protected $state;
    /**
     * Length of the announcement that played before capture started. Zero when nothing was announced. It is not a position on a call clock.
     *
     * @var int|null
     */
    protected $offsetMs;
    /**
     * Length of the payload itself. This runs shorter than `ended_at - started_at` by the silence before the first packet, so use it for anything about the sound and the window for anything about the leg.
     *
     * @var int|null
     */
    protected $audioMs;
    /**
     * The party this audio was captured from, which is what says whose voice it
     * carries. `channel` only says which direction of the leg the stream came
     * from. A recording view's `number` identifies a number associated with
     * that view, which can be an outbound destination.
     * 
     * `null` on a stream stored before the platform recorded a party for it.
     * 
     *
     * @var VoiceLegRecordingMediaSourceParty|null
     */
    protected $sourceParty;
    /**
     * When capture started, which is after any announcement rather than at the answer.
     *
     * @var \DateTime|null
     */
    protected $startedAt;
    /**
     * When capture ended, or null while capture is open or its end is unknown.
     *
     * @var \DateTime|null
     */
    protected $endedAt;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getLegId(): ?string
    {
        return $this->legId;
    }
    /**
     * @param string|null $legId
     *
     * @return self
     */
    public function setLegId(?string $legId): self
    {
        $this->initialized['legId'] = true;
        $this->legId = $legId;
        return $this;
    }
    /**
     * `null` on a stream captured before calls existed, which only its leg addresses.
     *
     * @return string|null
     */
    public function getCallId(): ?string
    {
        return $this->callId;
    }
    /**
     * `null` on a stream captured before calls existed, which only its leg addresses.
     *
     * @param string|null $callId
     *
     * @return self
     */
    public function setCallId(?string $callId): self
    {
        $this->initialized['callId'] = true;
        $this->callId = $callId;
        return $this;
    }
    /**
     * Codec of the stored payload.
     *
     * @return string|null
     */
    public function getCodec(): ?string
    {
        return $this->codec;
    }
    /**
     * Codec of the stored payload.
     *
     * @param string|null $codec
     *
     * @return self
     */
    public function setCodec(?string $codec): self
    {
        $this->initialized['codec'] = true;
        $this->codec = $codec;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
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
    /**
     * Length of the announcement that played before capture started. Zero when nothing was announced. It is not a position on a call clock.
     *
     * @return int|null
     */
    public function getOffsetMs(): ?int
    {
        return $this->offsetMs;
    }
    /**
     * Length of the announcement that played before capture started. Zero when nothing was announced. It is not a position on a call clock.
     *
     * @param int|null $offsetMs
     *
     * @return self
     */
    public function setOffsetMs(?int $offsetMs): self
    {
        $this->initialized['offsetMs'] = true;
        $this->offsetMs = $offsetMs;
        return $this;
    }
    /**
     * Length of the payload itself. This runs shorter than `ended_at - started_at` by the silence before the first packet, so use it for anything about the sound and the window for anything about the leg.
     *
     * @return int|null
     */
    public function getAudioMs(): ?int
    {
        return $this->audioMs;
    }
    /**
     * Length of the payload itself. This runs shorter than `ended_at - started_at` by the silence before the first packet, so use it for anything about the sound and the window for anything about the leg.
     *
     * @param int|null $audioMs
     *
     * @return self
     */
    public function setAudioMs(?int $audioMs): self
    {
        $this->initialized['audioMs'] = true;
        $this->audioMs = $audioMs;
        return $this;
    }
    /**
     * The party this audio was captured from, which is what says whose voice it
     * carries. `channel` only says which direction of the leg the stream came
     * from. A recording view's `number` identifies a number associated with
     * that view, which can be an outbound destination.
     * 
     * `null` on a stream stored before the platform recorded a party for it.
     * 
     *
     * @return VoiceLegRecordingMediaSourceParty|null
     */
    public function getSourceParty(): ?VoiceLegRecordingMediaSourceParty
    {
        return $this->sourceParty;
    }
    /**
    * The party this audio was captured from, which is what says whose voice it
    carries. `channel` only says which direction of the leg the stream came
    from. A recording view's `number` identifies a number associated with
    that view, which can be an outbound destination.
    
    `null` on a stream stored before the platform recorded a party for it.
    
    *
    * @param VoiceLegRecordingMediaSourceParty|null $sourceParty
    *
    * @return self
    */
    public function setSourceParty(?VoiceLegRecordingMediaSourceParty $sourceParty): self
    {
        $this->initialized['sourceParty'] = true;
        $this->sourceParty = $sourceParty;
        return $this;
    }
    /**
     * When capture started, which is after any announcement rather than at the answer.
     *
     * @return \DateTime|null
     */
    public function getStartedAt(): ?\DateTime
    {
        return $this->startedAt;
    }
    /**
     * When capture started, which is after any announcement rather than at the answer.
     *
     * @param \DateTime|null $startedAt
     *
     * @return self
     */
    public function setStartedAt(?\DateTime $startedAt): self
    {
        $this->initialized['startedAt'] = true;
        $this->startedAt = $startedAt;
        return $this;
    }
    /**
     * When capture ended, or null while capture is open or its end is unknown.
     *
     * @return \DateTime|null
     */
    public function getEndedAt(): ?\DateTime
    {
        return $this->endedAt;
    }
    /**
     * When capture ended, or null while capture is open or its end is unknown.
     *
     * @param \DateTime|null $endedAt
     *
     * @return self
     */
    public function setEndedAt(?\DateTime $endedAt): self
    {
        $this->initialized['endedAt'] = true;
        $this->endedAt = $endedAt;
        return $this;
    }
}
