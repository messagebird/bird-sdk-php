<?php

namespace MessageBird\Wire\Model;

/**
 * Free-form audio to send, either as a voice note or as a basic audio file. Deliverable only inside an open 24-hour customer service window; outside one, send a template instead.
 */
class WhatsAppAudioSend
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
     * Public HTTPS URL fetched at send time. AAC, AMR, MP3, M4A, or OGG (OPUS, mono), up to 16 MB.
     *
     * @var string|null
     */
    protected $url;
    /**
     * Send as a voice note; requires an `.ogg` file with the OPUS codec.
     *
     * @var bool|null
     */
    protected $voice = false;
    /**
     * Public HTTPS URL fetched at send time. AAC, AMR, MP3, M4A, or OGG (OPUS, mono), up to 16 MB.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public HTTPS URL fetched at send time. AAC, AMR, MP3, M4A, or OGG (OPUS, mono), up to 16 MB.
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
    /**
     * Send as a voice note; requires an `.ogg` file with the OPUS codec.
     *
     * @return bool|null
     */
    public function getVoice(): ?bool
    {
        return $this->voice;
    }
    /**
     * Send as a voice note; requires an `.ogg` file with the OPUS codec.
     *
     * @param bool|null $voice
     *
     * @return self
     */
    public function setVoice(?bool $voice): self
    {
        $this->initialized['voice'] = true;
        $this->voice = $voice;
        return $this;
    }
}
