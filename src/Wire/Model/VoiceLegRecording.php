<?php

namespace MessageBird\Wire\Model;

class VoiceLegRecording
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
     * `null` on a recording captured before calls existed.
     *
     * @var string|null
     */
    protected $callId;
    /**
     * The number associated with this recording view, when one was recorded. It can be an outbound destination. Omitted for numberless calls.
     *
     * @var string|null
     */
    protected $number;
    /**
     * It does not say whose voice it is.
     *
     * @var string|null
     */
    protected $channel;
    /**
     * @var string|null
     */
    protected $mediaId;
    /**
     * When the referenced stream started, which a view captured from the far leg does not share with its own `started_at`.
     *
     * @var \DateTime|null
     */
    protected $mediaStartedAt;
    /**
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
     * `null` on a recording captured before calls existed.
     *
     * @return string|null
     */
    public function getCallId(): ?string
    {
        return $this->callId;
    }
    /**
     * `null` on a recording captured before calls existed.
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
     * The number associated with this recording view, when one was recorded. It can be an outbound destination. Omitted for numberless calls.
     *
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }
    /**
     * The number associated with this recording view, when one was recorded. It can be an outbound destination. Omitted for numberless calls.
     *
     * @param string|null $number
     *
     * @return self
     */
    public function setNumber(?string $number): self
    {
        $this->initialized['number'] = true;
        $this->number = $number;
        return $this;
    }
    /**
     * It does not say whose voice it is.
     *
     * @return string|null
     */
    public function getChannel(): ?string
    {
        return $this->channel;
    }
    /**
     * It does not say whose voice it is.
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
     * When the referenced stream started, which a view captured from the far leg does not share with its own `started_at`.
     *
     * @return \DateTime|null
     */
    public function getMediaStartedAt(): ?\DateTime
    {
        return $this->mediaStartedAt;
    }
    /**
     * When the referenced stream started, which a view captured from the far leg does not share with its own `started_at`.
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
     * @return \DateTime|null
     */
    public function getStartedAt(): ?\DateTime
    {
        return $this->startedAt;
    }
    /**
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
