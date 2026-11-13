<?php

namespace MessageBird\Wire\Model;

class VoiceLegRecordings
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
     * The stored audio this read covers, each stream once.
     *
     * @var list<VoiceLegRecordingMedia>|null
     */
    protected $media;
    /**
     * Each leg's view of that audio.
     *
     * @var list<VoiceLegRecording>|null
     */
    protected $recordings;
    /**
     * Every transcription attempt over that audio, including failed ones.
     *
     * @var list<VoiceLegTranscript>|null
     */
    protected $transcripts;
    /**
     * Whether a collection above was cut at this read's per-collection limit of
     * 500. When `true`, there is more than is shown here and this response is not
     * the whole set.
     * 
     * `false` means no collection hit that limit, and a collection that could
     * not be read in full fails the request rather than returning a short
     * answer. What `false` does not establish is that every recording made has
     * arrived: delivery into this store is asynchronous, so a recording made
     * moments ago can be absent from a complete read.
     * 
     *
     * @var bool|null
     */
    protected $truncated;
    /**
     * The instant each collection's retention was decided at. Nothing here stays true because you are still holding the response. A recording can expire after it.
     *
     * @var \DateTime|null
     */
    protected $evaluatedAt;
    /**
     * The stored audio this read covers, each stream once.
     *
     * @return list<VoiceLegRecordingMedia>|null
     */
    public function getMedia(): ?array
    {
        return $this->media;
    }
    /**
     * The stored audio this read covers, each stream once.
     *
     * @param list<VoiceLegRecordingMedia>|null $media
     *
     * @return self
     */
    public function setMedia(?array $media): self
    {
        $this->initialized['media'] = true;
        $this->media = $media;
        return $this;
    }
    /**
     * Each leg's view of that audio.
     *
     * @return list<VoiceLegRecording>|null
     */
    public function getRecordings(): ?array
    {
        return $this->recordings;
    }
    /**
     * Each leg's view of that audio.
     *
     * @param list<VoiceLegRecording>|null $recordings
     *
     * @return self
     */
    public function setRecordings(?array $recordings): self
    {
        $this->initialized['recordings'] = true;
        $this->recordings = $recordings;
        return $this;
    }
    /**
     * Every transcription attempt over that audio, including failed ones.
     *
     * @return list<VoiceLegTranscript>|null
     */
    public function getTranscripts(): ?array
    {
        return $this->transcripts;
    }
    /**
     * Every transcription attempt over that audio, including failed ones.
     *
     * @param list<VoiceLegTranscript>|null $transcripts
     *
     * @return self
     */
    public function setTranscripts(?array $transcripts): self
    {
        $this->initialized['transcripts'] = true;
        $this->transcripts = $transcripts;
        return $this;
    }
    /**
     * Whether a collection above was cut at this read's per-collection limit of
     * 500. When `true`, there is more than is shown here and this response is not
     * the whole set.
     * 
     * `false` means no collection hit that limit, and a collection that could
     * not be read in full fails the request rather than returning a short
     * answer. What `false` does not establish is that every recording made has
     * arrived: delivery into this store is asynchronous, so a recording made
     * moments ago can be absent from a complete read.
     * 
     *
     * @return bool|null
     */
    public function getTruncated(): ?bool
    {
        return $this->truncated;
    }
    /**
    * Whether a collection above was cut at this read's per-collection limit of
    500. When `true`, there is more than is shown here and this response is not
    the whole set.
    
    `false` means no collection hit that limit, and a collection that could
    not be read in full fails the request rather than returning a short
    answer. What `false` does not establish is that every recording made has
    arrived: delivery into this store is asynchronous, so a recording made
    moments ago can be absent from a complete read.
    
    *
    * @param bool|null $truncated
    *
    * @return self
    */
    public function setTruncated(?bool $truncated): self
    {
        $this->initialized['truncated'] = true;
        $this->truncated = $truncated;
        return $this;
    }
    /**
     * The instant each collection's retention was decided at. Nothing here stays true because you are still holding the response. A recording can expire after it.
     *
     * @return \DateTime|null
     */
    public function getEvaluatedAt(): ?\DateTime
    {
        return $this->evaluatedAt;
    }
    /**
     * The instant each collection's retention was decided at. Nothing here stays true because you are still holding the response. A recording can expire after it.
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
