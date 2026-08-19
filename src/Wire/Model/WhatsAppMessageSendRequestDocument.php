<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageSendRequestDocument extends \ArrayObject
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
     * Public `https` URL of the document. WhatsApp fetches it at send time, so it must still be reachable then: a signed URL has to outlive the send. We do not store or proxy the file. WhatsApp caches a fetched URL for 10 minutes and re-serves that copy for an identical URL sent again within the window; vary the URL to force a re-fetch. Up to 100 MB. PDF, Word, Excel, PowerPoint and plain text render reliably in the WhatsApp client; other file types are transmitted but WhatsApp does not support them.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * Text shown beneath the document.
     *
     * @var string|null
     */
    protected $caption;
    /**
     * Name the recipient sees, including the extension. WhatsApp derives one from the URL when you omit it.
     * 
     *
     * @var string|null
     */
    protected $filename;
    /**
     * Public `https` URL of the document. WhatsApp fetches it at send time, so it must still be reachable then: a signed URL has to outlive the send. We do not store or proxy the file. WhatsApp caches a fetched URL for 10 minutes and re-serves that copy for an identical URL sent again within the window; vary the URL to force a re-fetch. Up to 100 MB. PDF, Word, Excel, PowerPoint and plain text render reliably in the WhatsApp client; other file types are transmitted but WhatsApp does not support them.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public `https` URL of the document. WhatsApp fetches it at send time, so it must still be reachable then: a signed URL has to outlive the send. We do not store or proxy the file. WhatsApp caches a fetched URL for 10 minutes and re-serves that copy for an identical URL sent again within the window; vary the URL to force a re-fetch. Up to 100 MB. PDF, Word, Excel, PowerPoint and plain text render reliably in the WhatsApp client; other file types are transmitted but WhatsApp does not support them.
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
     * Text shown beneath the document.
     *
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }
    /**
     * Text shown beneath the document.
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
    /**
     * Name the recipient sees, including the extension. WhatsApp derives one from the URL when you omit it.
     * 
     *
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }
    /**
     * Name the recipient sees, including the extension. WhatsApp derives one from the URL when you omit it.
     *
     * @param string|null $filename
     *
     * @return self
     */
    public function setFilename(?string $filename): self
    {
        $this->initialized['filename'] = true;
        $this->filename = $filename;
        return $this;
    }
}
