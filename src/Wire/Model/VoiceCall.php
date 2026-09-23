<?php

namespace MessageBird\Wire\Model;

class VoiceCall
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
    protected $workspaceId;
    /**
     * @var string|null
     */
    protected $initialLegId;
    /**
     * Direction of the initial leg.
     *
     * @var string|null
     */
    protected $direction;
    /**
     * When the initial leg started. `null` in the acceptance snapshot returned by call creation.
     *
     * @var \DateTime|null
     */
    protected $startedAt;
    /**
     * When the call's last leg ended. `null` while any leg is still in progress. Recordings and transcripts can still arrive after this instant, so it does not mean the call is finished being written.
     *
     * @var \DateTime|null
     */
    protected $endedAt;
    /**
     * Whether any leg in the call currently holds a lease. `false` covers the interval between a leg ending and its settlement being confirmed, and says nothing about whether transcription has finished.
     *
     * @var bool|null
     */
    protected $live;
    /**
     * Whether the call ever produced a recording. It stays `true` for the life of the call, so it records that a recording was made rather than promising one can still be fetched.
     *
     * @var bool|null
     */
    protected $hasRecording;
    /**
     * Whether the call ever produced a transcript. A failed transcription attempt does not set it, and a later failure does not clear it.
     *
     * @var bool|null
     */
    protected $hasTranscript;
    /**
     * The distinct participant observations the call's legs recorded, for display beside the call. The length is not a count of people and not a reconstruction of the leg graph.
     *
     * @var list<VoiceParty>|null
     */
    protected $parties;
    /**
     * @var VoiceCallSequence|null
     */
    protected $sequence;
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
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }
    /**
     * @param string|null $workspaceId
     *
     * @return self
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getInitialLegId(): ?string
    {
        return $this->initialLegId;
    }
    /**
     * @param string|null $initialLegId
     *
     * @return self
     */
    public function setInitialLegId(?string $initialLegId): self
    {
        $this->initialized['initialLegId'] = true;
        $this->initialLegId = $initialLegId;
        return $this;
    }
    /**
     * Direction of the initial leg.
     *
     * @return string|null
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }
    /**
     * Direction of the initial leg.
     *
     * @param string|null $direction
     *
     * @return self
     */
    public function setDirection(?string $direction): self
    {
        $this->initialized['direction'] = true;
        $this->direction = $direction;
        return $this;
    }
    /**
     * When the initial leg started. `null` in the acceptance snapshot returned by call creation.
     *
     * @return \DateTime|null
     */
    public function getStartedAt(): ?\DateTime
    {
        return $this->startedAt;
    }
    /**
     * When the initial leg started. `null` in the acceptance snapshot returned by call creation.
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
     * When the call's last leg ended. `null` while any leg is still in progress. Recordings and transcripts can still arrive after this instant, so it does not mean the call is finished being written.
     *
     * @return \DateTime|null
     */
    public function getEndedAt(): ?\DateTime
    {
        return $this->endedAt;
    }
    /**
     * When the call's last leg ended. `null` while any leg is still in progress. Recordings and transcripts can still arrive after this instant, so it does not mean the call is finished being written.
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
    /**
     * Whether any leg in the call currently holds a lease. `false` covers the interval between a leg ending and its settlement being confirmed, and says nothing about whether transcription has finished.
     *
     * @return bool|null
     */
    public function getLive(): ?bool
    {
        return $this->live;
    }
    /**
     * Whether any leg in the call currently holds a lease. `false` covers the interval between a leg ending and its settlement being confirmed, and says nothing about whether transcription has finished.
     *
     * @param bool|null $live
     *
     * @return self
     */
    public function setLive(?bool $live): self
    {
        $this->initialized['live'] = true;
        $this->live = $live;
        return $this;
    }
    /**
     * Whether the call ever produced a recording. It stays `true` for the life of the call, so it records that a recording was made rather than promising one can still be fetched.
     *
     * @return bool|null
     */
    public function getHasRecording(): ?bool
    {
        return $this->hasRecording;
    }
    /**
     * Whether the call ever produced a recording. It stays `true` for the life of the call, so it records that a recording was made rather than promising one can still be fetched.
     *
     * @param bool|null $hasRecording
     *
     * @return self
     */
    public function setHasRecording(?bool $hasRecording): self
    {
        $this->initialized['hasRecording'] = true;
        $this->hasRecording = $hasRecording;
        return $this;
    }
    /**
     * Whether the call ever produced a transcript. A failed transcription attempt does not set it, and a later failure does not clear it.
     *
     * @return bool|null
     */
    public function getHasTranscript(): ?bool
    {
        return $this->hasTranscript;
    }
    /**
     * Whether the call ever produced a transcript. A failed transcription attempt does not set it, and a later failure does not clear it.
     *
     * @param bool|null $hasTranscript
     *
     * @return self
     */
    public function setHasTranscript(?bool $hasTranscript): self
    {
        $this->initialized['hasTranscript'] = true;
        $this->hasTranscript = $hasTranscript;
        return $this;
    }
    /**
     * The distinct participant observations the call's legs recorded, for display beside the call. The length is not a count of people and not a reconstruction of the leg graph.
     *
     * @return list<VoiceParty>|null
     */
    public function getParties(): ?array
    {
        return $this->parties;
    }
    /**
     * The distinct participant observations the call's legs recorded, for display beside the call. The length is not a count of people and not a reconstruction of the leg graph.
     *
     * @param list<VoiceParty>|null $parties
     *
     * @return self
     */
    public function setParties(?array $parties): self
    {
        $this->initialized['parties'] = true;
        $this->parties = $parties;
        return $this;
    }
    /**
     * @return VoiceCallSequence|null
     */
    public function getSequence(): ?VoiceCallSequence
    {
        return $this->sequence;
    }
    /**
     * @param VoiceCallSequence|null $sequence
     *
     * @return self
     */
    public function setSequence(?VoiceCallSequence $sequence): self
    {
        $this->initialized['sequence'] = true;
        $this->sequence = $sequence;
        return $this;
    }
}
