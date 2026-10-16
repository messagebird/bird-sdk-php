<?php

namespace MessageBird\Wire\Model;

/**
 * A free-form image to send, with an optional caption. Deliverable only inside an open 24-hour customer service window; outside one, send a template instead.
 */
class WhatsAppImageSend
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
     * Public `https` URL of the image. WhatsApp fetches it at send time, so it must still be reachable then. JPEG or PNG, up to 5 MB.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * Text shown beneath the image.
     *
     * @var string|null
     */
    protected $caption;
    /**
     * Public `https` URL of the image. WhatsApp fetches it at send time, so it must still be reachable then. JPEG or PNG, up to 5 MB.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public `https` URL of the image. WhatsApp fetches it at send time, so it must still be reachable then. JPEG or PNG, up to 5 MB.
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
     * Text shown beneath the image.
     *
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }
    /**
     * Text shown beneath the image.
     *
     * @param string|null $caption
     *
     * @return self
     */
    public function setCaption(?string $caption): self
    {
        $this->initialized['caption'] = true;
        $this->caption = $caption;
        return $this;
    }
}
