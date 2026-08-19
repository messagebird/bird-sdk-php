<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageAudio extends \ArrayObject
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
     * ID of the stored file, to pass as `media_id` when fetching it. Absent on an outbound message, whose file we never stored.
     * 
     *
     * @var string|null
     */
    protected $id;
    /**
     * Where to fetch the media. On an inbound message this is a Bird URL you fetch with your API key; it is absent when the file could not be retrieved from WhatsApp. It stays populated after the stored bytes expire, and the link returns `410` from then on. On an outbound message it is the URL the sender supplied, whose availability is the sender's to guarantee.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * Media type WhatsApp reported for the file, for example `image/jpeg`. Absent on outbound messages.
     * 
     *
     * @var string|null
     */
    protected $mimeType;
    /**
     * Whether this is a voice note rather than an attached audio file. A voice note auto-downloads in the WhatsApp client and can be transcribed for the recipient.
     * 
     *
     * @var bool|null
     */
    protected $voice;
    /**
     * ID of the stored file, to pass as `media_id` when fetching it. Absent on an outbound message, whose file we never stored.
     * 
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * ID of the stored file, to pass as `media_id` when fetching it. Absent on an outbound message, whose file we never stored.
     *
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
     * Where to fetch the media. On an inbound message this is a Bird URL you fetch with your API key; it is absent when the file could not be retrieved from WhatsApp. It stays populated after the stored bytes expire, and the link returns `410` from then on. On an outbound message it is the URL the sender supplied, whose availability is the sender's to guarantee.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Where to fetch the media. On an inbound message this is a Bird URL you fetch with your API key; it is absent when the file could not be retrieved from WhatsApp. It stays populated after the stored bytes expire, and the link returns `410` from then on. On an outbound message it is the URL the sender supplied, whose availability is the sender's to guarantee.
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
     * Media type WhatsApp reported for the file, for example `image/jpeg`. Absent on outbound messages.
     * 
     *
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }
    /**
     * Media type WhatsApp reported for the file, for example `image/jpeg`. Absent on outbound messages.
     *
     * @param string|null $mimeType
     *
     * @return self
     */
    public function setMimeType(?string $mimeType): self
    {
        $this->initialized['mimeType'] = true;
        $this->mimeType = $mimeType;
        return $this;
    }
    /**
     * Whether this is a voice note rather than an attached audio file. A voice note auto-downloads in the WhatsApp client and can be transcribed for the recipient.
     * 
     *
     * @return bool|null
     */
    public function getVoice(): ?bool
    {
        return $this->voice;
    }
    /**
     * Whether this is a voice note rather than an attached audio file. A voice note auto-downloads in the WhatsApp client and can be transcribed for the recipient.
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
