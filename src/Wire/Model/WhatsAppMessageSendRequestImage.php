<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageSendRequestImage extends \ArrayObject
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
     * Public `https` URL of the image. WhatsApp fetches it at send time, so it must still be reachable then: a signed URL has to outlive the send. We do not store or proxy the file. WhatsApp caches a fetched URL for 10 minutes and re-serves that copy for an identical URL sent again within the window; vary the URL to force a re-fetch. JPEG and PNG only, up to 5 MB.
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
     * Public `https` URL of the image. WhatsApp fetches it at send time, so it must still be reachable then: a signed URL has to outlive the send. We do not store or proxy the file. WhatsApp caches a fetched URL for 10 minutes and re-serves that copy for an identical URL sent again within the window; vary the URL to force a re-fetch. JPEG and PNG only, up to 5 MB.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public `https` URL of the image. WhatsApp fetches it at send time, so it must still be reachable then: a signed URL has to outlive the send. We do not store or proxy the file. WhatsApp caches a fetched URL for 10 minutes and re-serves that copy for an identical URL sent again within the window; vary the URL to force a re-fetch. JPEG and PNG only, up to 5 MB.
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
