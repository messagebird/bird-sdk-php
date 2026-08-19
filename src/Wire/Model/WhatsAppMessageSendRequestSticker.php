<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageSendRequestSticker extends \ArrayObject
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
     * Public `https` URL of the sticker. WhatsApp fetches it at send time, so it must still be reachable then: a signed URL has to outlive the send. We do not store or proxy the file. WhatsApp caches a fetched URL for 10 minutes and re-serves that copy for an identical URL sent again within the window; vary the URL to force a re-fetch. WebP only: up to 100 KB for a static sticker and 500 KB for an animated one. A sticker carries no caption.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * Public `https` URL of the sticker. WhatsApp fetches it at send time, so it must still be reachable then: a signed URL has to outlive the send. We do not store or proxy the file. WhatsApp caches a fetched URL for 10 minutes and re-serves that copy for an identical URL sent again within the window; vary the URL to force a re-fetch. WebP only: up to 100 KB for a static sticker and 500 KB for an animated one. A sticker carries no caption.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public `https` URL of the sticker. WhatsApp fetches it at send time, so it must still be reachable then: a signed URL has to outlive the send. We do not store or proxy the file. WhatsApp caches a fetched URL for 10 minutes and re-serves that copy for an identical URL sent again within the window; vary the URL to force a re-fetch. WebP only: up to 100 KB for a static sticker and 500 KB for an animated one. A sticker carries no caption.
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
