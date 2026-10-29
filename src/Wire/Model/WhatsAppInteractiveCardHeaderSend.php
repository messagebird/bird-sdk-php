<?php

namespace MessageBird\Wire\Model;

/**
 * Required carousel-card media: image or video only.
 */
class WhatsAppInteractiveCardHeaderSend
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
     * Card media kind: `image` or `video`.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Public HTTPS URL fetched at send time. Image: JPEG/PNG, up to 5 MB. Video: MP4 (H.264/AAC), up to 16 MB.
     *
     * @var string|null
     */
    protected $url;
    /**
     * Card media kind: `image` or `video`.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Card media kind: `image` or `video`.
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
     * Public HTTPS URL fetched at send time. Image: JPEG/PNG, up to 5 MB. Video: MP4 (H.264/AAC), up to 16 MB.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public HTTPS URL fetched at send time. Image: JPEG/PNG, up to 5 MB. Video: MP4 (H.264/AAC), up to 16 MB.
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
