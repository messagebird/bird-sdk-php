<?php

namespace MessageBird\Wire\Model;

class VoiceLegTranscript
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
     * `null` on a transcript of a stream captured before calls existed.
     *
     * @var string|null
     */
    protected $callId;
    /**
     * @var string|null
     */
    protected $mediaId;
    /**
     * When that stream started. A transcript is retained with the stream it describes rather than on its own transcription lag.
     *
     * @var \DateTime|null
     */
    protected $mediaStartedAt;
    /**
     * @var string|null
     */
    protected $state;
    /**
     * @var string|null
     */
    protected $source;
    /**
     * The model that produced it.
     *
     * @var string|null
     */
    protected $model;
    /**
     * The direction of the transcribed stream.
     *
     * @var string|null
     */
    protected $channel;
    /**
     * The transcript, in order. Concatenating cues across streams reads as prose nobody spoke, and a reader matching over it can match the wrong party's words.
     *
     * @var list<VoiceLegTranscriptCue>|null
     */
    protected $cues;
    /**
     * The party this audio was captured from, which is what says whose voice it
     * carries. `channel` only says which direction of the leg the stream came
     * from. A recording view's `number` identifies a number associated with
     * that view, which can be an outbound destination.
     * 
     * `null` on a stream stored before the platform recorded a party for it.
     * 
     *
     * @var VoiceLegTranscriptSourceParty|null
     */
    protected $sourceParty;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
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
     * `null` on a transcript of a stream captured before calls existed.
     *
     * @return string|null
     */
    public function getCallId(): ?string
    {
        return $this->callId;
    }
    /**
     * `null` on a transcript of a stream captured before calls existed.
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
     * @return string|null
     */
    public function getMediaId(): ?string
    {
        return $this->mediaId;
    }
    /**
     * @param string|null $mediaId
     *
     * @return self
     */
    public function setMediaId(?string $mediaId): self
    {
        $this->initialized['mediaId'] = true;
        $this->mediaId = $mediaId;
        return $this;
    }
    /**
     * When that stream started. A transcript is retained with the stream it describes rather than on its own transcription lag.
     *
     * @return \DateTime|null
     */
    public function getMediaStartedAt(): ?\DateTime
    {
        return $this->mediaStartedAt;
    }
    /**
     * When that stream started. A transcript is retained with the stream it describes rather than on its own transcription lag.
     *
     * @param \DateTime|null $mediaStartedAt
     *
     * @return self
     */
    public function setMediaStartedAt(?\DateTime $mediaStartedAt): self
    {
        $this->initialized['mediaStartedAt'] = true;
        $this->mediaStartedAt = $mediaStartedAt;
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
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
     * @param string|null $source
     *
     * @return self
     */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;
        return $this;
    }
    /**
     * The model that produced it.
     *
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }
    /**
     * The model that produced it.
     *
     * @param string|null $model
     *
     * @return self
     */
    public function setModel(?string $model): self
    {
        $this->initialized['model'] = true;
        $this->model = $model;
        return $this;
    }
    /**
     * The direction of the transcribed stream.
     *
     * @return string|null
     */
    public function getChannel(): ?string
    {
        return $this->channel;
    }
    /**
     * The direction of the transcribed stream.
     *
     * @param string|null $channel
     *
     * @return self
     */
    public function setChannel(?string $channel): self
    {
        $this->initialized['channel'] = true;
        $this->channel = $channel;
        return $this;
    }
    /**
     * The transcript, in order. Concatenating cues across streams reads as prose nobody spoke, and a reader matching over it can match the wrong party's words.
     *
     * @return list<VoiceLegTranscriptCue>|null
     */
    public function getCues(): ?array
    {
        return $this->cues;
    }
    /**
     * The transcript, in order. Concatenating cues across streams reads as prose nobody spoke, and a reader matching over it can match the wrong party's words.
     *
     * @param list<VoiceLegTranscriptCue>|null $cues
     *
     * @return self
     */
    public function setCues(?array $cues): self
    {
        $this->initialized['cues'] = true;
        $this->cues = $cues;
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
     * @return VoiceLegTranscriptSourceParty|null
     */
    public function getSourceParty(): ?VoiceLegTranscriptSourceParty
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
    * @param VoiceLegTranscriptSourceParty|null $sourceParty
    *
    * @return self
    */
    public function setSourceParty(?VoiceLegTranscriptSourceParty $sourceParty): self
    {
        $this->initialized['sourceParty'] = true;
        $this->sourceParty = $sourceParty;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
}
