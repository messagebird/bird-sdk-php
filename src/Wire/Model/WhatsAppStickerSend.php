<?php

namespace MessageBird\Wire\Model;

/**
 * A free-form sticker to send. Deliverable only inside an open 24-hour customer service window; outside one, send a template instead.
 */
class WhatsAppStickerSend
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
     * Public HTTPS URL fetched at send time. WebP, up to 100 KB static or 500 KB animated.
     *
     * @var string|null
     */
    protected $url;
    /**
     * Public HTTPS URL fetched at send time. WebP, up to 100 KB static or 500 KB animated.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public HTTPS URL fetched at send time. WebP, up to 100 KB static or 500 KB animated.
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
