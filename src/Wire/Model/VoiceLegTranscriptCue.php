<?php

namespace MessageBird\Wire\Model;

class VoiceLegTranscriptCue
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
     * Position of this cue in the transcript.
     *
     * @var int|null
     */
    protected $seq;
    /**
     * Offset of this cue from the start of its stream, in milliseconds. Set on `aligned` cues; `null` when nothing measured it, because a zero would be a claim about timing that was never made.
     *
     * @var int|null
     */
    protected $startMs;
    /**
     * Offset of the end of this cue from the start of its stream. `null` on the same terms as `start_ms`.
     *
     * @var int|null
     */
    protected $endMs;
    /**
     * What was transcribed for this cue. Empty on the single cue of a stream where nothing was heard.
     *
     * @var string|null
     */
    protected $text;
    /**
     * Position of this cue in the transcript.
     *
     * @return int|null
     */
    public function getSeq(): ?int
    {
        return $this->seq;
    }
    /**
     * Position of this cue in the transcript.
     *
     * @param int|null $seq
     *
     * @return self
     */
    public function setSeq(?int $seq): self
    {
        $this->initialized['seq'] = true;
        $this->seq = $seq;
        return $this;
    }
    /**
     * Offset of this cue from the start of its stream, in milliseconds. Set on `aligned` cues; `null` when nothing measured it, because a zero would be a claim about timing that was never made.
     *
     * @return int|null
     */
    public function getStartMs(): ?int
    {
        return $this->startMs;
    }
    /**
     * Offset of this cue from the start of its stream, in milliseconds. Set on `aligned` cues; `null` when nothing measured it, because a zero would be a claim about timing that was never made.
     *
     * @param int|null $startMs
     *
     * @return self
     */
    public function setStartMs(?int $startMs): self
    {
        $this->initialized['startMs'] = true;
        $this->startMs = $startMs;
        return $this;
    }
    /**
     * Offset of the end of this cue from the start of its stream. `null` on the same terms as `start_ms`.
     *
     * @return int|null
     */
    public function getEndMs(): ?int
    {
        return $this->endMs;
    }
    /**
     * Offset of the end of this cue from the start of its stream. `null` on the same terms as `start_ms`.
     *
     * @param int|null $endMs
     *
     * @return self
     */
    public function setEndMs(?int $endMs): self
    {
        $this->initialized['endMs'] = true;
        $this->endMs = $endMs;
        return $this;
    }
    /**
     * What was transcribed for this cue. Empty on the single cue of a stream where nothing was heard.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * What was transcribed for this cue. Empty on the single cue of a stream where nothing was heard.
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
