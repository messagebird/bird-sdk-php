<?php

namespace MessageBird\Wire\Model;

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
     * Public `https` URL of the sticker. WhatsApp fetches it at send time, so it must still be reachable then. WebP only, up to 100 KB static or 500 KB animated.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * Public `https` URL of the sticker. WhatsApp fetches it at send time, so it must still be reachable then. WebP only, up to 100 KB static or 500 KB animated.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public `https` URL of the sticker. WhatsApp fetches it at send time, so it must still be reachable then. WebP only, up to 100 KB static or 500 KB animated.
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
