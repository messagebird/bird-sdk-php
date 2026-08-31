<?php

namespace MessageBird\Wire\Model;

class WhatsAppInteractiveCardSendHeader extends \ArrayObject
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
     * Which kind of media this is. A card accepts `image` or `video` only.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * Public `https` URL of the file to show at the top of the card. An image must be JPEG or PNG, up to 5 MB; a video, MP4 with H.264 video and AAC audio, up to 16 MB. WhatsApp fetches it at send time, on the same terms as a message header's `url`.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * Which kind of media this is. A card accepts `image` or `video` only.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Which kind of media this is. A card accepts `image` or `video` only.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * Public `https` URL of the file to show at the top of the card. An image must be JPEG or PNG, up to 5 MB; a video, MP4 with H.264 video and AAC audio, up to 16 MB. WhatsApp fetches it at send time, on the same terms as a message header's `url`.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public `https` URL of the file to show at the top of the card. An image must be JPEG or PNG, up to 5 MB; a video, MP4 with H.264 video and AAC audio, up to 16 MB. WhatsApp fetches it at send time, on the same terms as a message header's `url`.
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
}
