<?php

namespace MessageBird\Wire\Model;

class VoiceCallTranscript
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
    protected $callId;
    /**
     * Each distinct stored party heard in `cues`, once. A stream with no recorded party adds nothing here; its cues carry a `null` party.
     *
     * @var list<VoiceParty>|null
     */
    protected $parties;
    /**
     * Every cue of the call in spoken order. A cue without times sits at the start of its stream.
     *
     * @var list<VoiceCallTranscriptCue>|null
     */
    protected $cues;
    /**
     * `false` when a stream's every transcription failed, or the read was cut
     * at its limit. `true` does not mean every stream has cues: a stream where
     * nothing was heard, one never transcribed, or one whose transcript has not
     * arrived yet contributes none and leaves this `true`.
     * 
     *
     * @var bool|null
     */
    protected $complete;
    /**
     * The instant retention was decided at. A transcript can expire after it.
     *
     * @var \DateTime|null
     */
    protected $evaluatedAt;
    /**
     * @return string|null
     */
    public function getCallId(): ?string
    {
        return $this->callId;
    }
    /**
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
     * Each distinct stored party heard in `cues`, once. A stream with no recorded party adds nothing here; its cues carry a `null` party.
     *
     * @return list<VoiceParty>|null
     */
    public function getParties(): ?array
    {
        return $this->parties;
    }
    /**
     * Each distinct stored party heard in `cues`, once. A stream with no recorded party adds nothing here; its cues carry a `null` party.
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
     * Every cue of the call in spoken order. A cue without times sits at the start of its stream.
     *
     * @return list<VoiceCallTranscriptCue>|null
     */
    public function getCues(): ?array
    {
        return $this->cues;
    }
    /**
     * Every cue of the call in spoken order. A cue without times sits at the start of its stream.
     *
     * @param list<VoiceCallTranscriptCue>|null $cues
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
     * `false` when a stream's every transcription failed, or the read was cut
     * at its limit. `true` does not mean every stream has cues: a stream where
     * nothing was heard, one never transcribed, or one whose transcript has not
     * arrived yet contributes none and leaves this `true`.
     * 
     *
     * @return bool|null
     */
    public function getComplete(): ?bool
    {
        return $this->complete;
    }
    /**
    * `false` when a stream's every transcription failed, or the read was cut
    at its limit. `true` does not mean every stream has cues: a stream where
    nothing was heard, one never transcribed, or one whose transcript has not
    arrived yet contributes none and leaves this `true`.
    
    *
    * @param bool|null $complete
    *
    * @return self
    */
    public function setComplete(?bool $complete): self
    {
        $this->initialized['complete'] = true;
        $this->complete = $complete;
        return $this;
    }
    /**
     * The instant retention was decided at. A transcript can expire after it.
     *
     * @return \DateTime|null
     */
    public function getEvaluatedAt(): ?\DateTime
    {
        return $this->evaluatedAt;
    }
    /**
     * The instant retention was decided at. A transcript can expire after it.
     *
     * @param \DateTime|null $evaluatedAt
     *
     * @return self
     */
    public function setEvaluatedAt(?\DateTime $evaluatedAt): self
    {
        $this->initialized['evaluatedAt'] = true;
        $this->evaluatedAt = $evaluatedAt;
        return $this;
    }
}
