<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageSendRequestAudio extends \ArrayObject
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
     * Public `https` URL of the audio file. WhatsApp fetches it at send time, so it must still be reachable then: a signed URL has to outlive the send. We do not store or proxy the file. WhatsApp caches a fetched URL for 10 minutes and re-serves that copy for an identical URL sent again within the window; vary the URL to force a re-fetch. AAC, AMR, MP3, M4A and OGG (OPUS codec, mono) are supported, up to 16 MB.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * Whether to send this as a voice note rather than a basic audio message. A voice note auto-downloads, shows the sender's profile picture, and can be transcribed for the recipient. It requires an `.ogg` file encoded with the OPUS codec; any other format makes transcription fail. Leave it false for an ordinary audio attachment.
     * 
     *
     * @var bool|null
     */
    protected $voice = false;
    /**
     * Public `https` URL of the audio file. WhatsApp fetches it at send time, so it must still be reachable then: a signed URL has to outlive the send. We do not store or proxy the file. WhatsApp caches a fetched URL for 10 minutes and re-serves that copy for an identical URL sent again within the window; vary the URL to force a re-fetch. AAC, AMR, MP3, M4A and OGG (OPUS codec, mono) are supported, up to 16 MB.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public `https` URL of the audio file. WhatsApp fetches it at send time, so it must still be reachable then: a signed URL has to outlive the send. We do not store or proxy the file. WhatsApp caches a fetched URL for 10 minutes and re-serves that copy for an identical URL sent again within the window; vary the URL to force a re-fetch. AAC, AMR, MP3, M4A and OGG (OPUS codec, mono) are supported, up to 16 MB.
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
     * Whether to send this as a voice note rather than a basic audio message. A voice note auto-downloads, shows the sender's profile picture, and can be transcribed for the recipient. It requires an `.ogg` file encoded with the OPUS codec; any other format makes transcription fail. Leave it false for an ordinary audio attachment.
     * 
     *
     * @return bool|null
     */
    public function getVoice(): ?bool
    {
        return $this->voice;
    }
    /**
     * Whether to send this as a voice note rather than a basic audio message. A voice note auto-downloads, shows the sender's profile picture, and can be transcribed for the recipient. It requires an `.ogg` file encoded with the OPUS codec; any other format makes transcription fail. Leave it false for an ordinary audio attachment.
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
