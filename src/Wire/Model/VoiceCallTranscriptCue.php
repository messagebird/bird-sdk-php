<?php

namespace MessageBird\Wire\Model;

class VoiceCallTranscriptCue
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
     * Index into the transcript's `parties` of the party who spoke this cue,
     * the party its stream was captured from. `null` on a stream with no recorded
     * party.
     * 
     *
     * @var int|null
     */
    protected $party;
    /**
     * When this cue began, measured on its stream. `null` on a transcript that timed nothing, whose cues are placed at their stream's start.
     *
     * @var \DateTime|null
     */
    protected $startAt;
    /**
     * When this cue ended. `null` on the same terms as `start_at`.
     *
     * @var \DateTime|null
     */
    protected $endAt;
    /**
     * What was transcribed for this cue.
     *
     * @var string|null
     */
    protected $text;
    /**
     * Index into the transcript's `parties` of the party who spoke this cue,
     * the party its stream was captured from. `null` on a stream with no recorded
     * party.
     * 
     *
     * @return int|null
     */
    public function getParty(): ?int
    {
        return $this->party;
    }
    /**
    * Index into the transcript's `parties` of the party who spoke this cue,
    the party its stream was captured from. `null` on a stream with no recorded
    party.
    
    *
    * @param int|null $party
    *
    * @return self
    */
    public function setParty(?int $party): self
    {
        $this->initialized['party'] = true;
        $this->party = $party;
        return $this;
    }
    /**
     * When this cue began, measured on its stream. `null` on a transcript that timed nothing, whose cues are placed at their stream's start.
     *
     * @return \DateTime|null
     */
    public function getStartAt(): ?\DateTime
    {
        return $this->startAt;
    }
    /**
     * When this cue began, measured on its stream. `null` on a transcript that timed nothing, whose cues are placed at their stream's start.
     *
     * @param \DateTime|null $startAt
     *
     * @return self
     */
    public function setStartAt(?\DateTime $startAt): self
    {
        $this->initialized['startAt'] = true;
        $this->startAt = $startAt;
        return $this;
    }
    /**
     * When this cue ended. `null` on the same terms as `start_at`.
     *
     * @return \DateTime|null
     */
    public function getEndAt(): ?\DateTime
    {
        return $this->endAt;
    }
    /**
     * When this cue ended. `null` on the same terms as `start_at`.
     *
     * @param \DateTime|null $endAt
     *
     * @return self
     */
    public function setEndAt(?\DateTime $endAt): self
    {
        $this->initialized['endAt'] = true;
        $this->endAt = $endAt;
        return $this;
    }
    /**
     * What was transcribed for this cue.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * What was transcribed for this cue.
     *
     * @param string|null $text
     *
     * @return self
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
}
