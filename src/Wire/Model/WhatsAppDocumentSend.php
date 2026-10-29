<?php

namespace MessageBird\Wire\Model;

/**
 * A free-form document to send, with an optional caption and filename. Deliverable only inside an open 24-hour customer service window; outside one, send a template instead.
 */
class WhatsAppDocumentSend
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
     * Public HTTPS URL fetched at send time, up to 100 MB. PDF, Word, Excel, PowerPoint, and plain text render reliably.
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
     * Recipient-visible filename with extension.
     *
     * @var string|null
     */
    protected $filename;
    /**
     * Public HTTPS URL fetched at send time, up to 100 MB. PDF, Word, Excel, PowerPoint, and plain text render reliably.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public HTTPS URL fetched at send time, up to 100 MB. PDF, Word, Excel, PowerPoint, and plain text render reliably.
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
     * Recipient-visible filename with extension.
     *
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }
    /**
     * Recipient-visible filename with extension.
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
