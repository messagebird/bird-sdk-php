<?php

namespace MessageBird\Wire\Model;

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
     * Public `https` URL of the audio file. WhatsApp fetches it at send time, so it must still be reachable then. AAC, AMR, MP3, M4A or OGG (OPUS codec, mono), up to 16 MB.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * Whether to send this as a voice note rather than an audio file. A voice note needs an `.ogg` file encoded with the OPUS codec.
     * 
     *
     * @var bool|null
     */
    protected $voice = false;
    /**
     * Public `https` URL of the audio file. WhatsApp fetches it at send time, so it must still be reachable then. AAC, AMR, MP3, M4A or OGG (OPUS codec, mono), up to 16 MB.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public `https` URL of the audio file. WhatsApp fetches it at send time, so it must still be reachable then. AAC, AMR, MP3, M4A or OGG (OPUS codec, mono), up to 16 MB.
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
     * Whether to send this as a voice note rather than an audio file. A voice note needs an `.ogg` file encoded with the OPUS codec.
     * 
     *
     * @return bool|null
     */
    public function getVoice(): ?bool
    {
        return $this->voice;
    }
    /**
     * Whether to send this as a voice note rather than an audio file. A voice note needs an `.ogg` file encoded with the OPUS codec.
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
