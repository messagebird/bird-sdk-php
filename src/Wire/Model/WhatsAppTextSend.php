<?php

namespace MessageBird\Wire\Model;

/**
 * Free-form text to send. Deliverable only inside an open 24-hour customer service window; outside one, send a template instead.
 */
class WhatsAppTextSend
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
     * Message text; URLs become clickable links.
     *
     * @var string|null
     */
    protected $body;
    /**
     * Preview the first link in `body`. Omitted on reads.
     *
     * @var bool|null
     */
    protected $previewUrl = false;
    /**
     * Message text; URLs become clickable links.
     *
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }
    /**
     * Message text; URLs become clickable links.
     *
     * @param string|null $body
     *
     * @return self
     */
    public function setBody(?string $body): self
    {
        $this->initialized['body'] = true;
        $this->body = $body;
        return $this;
    }
    /**
     * Preview the first link in `body`. Omitted on reads.
     *
     * @return bool|null
     */
    public function getPreviewUrl(): ?bool
    {
        return $this->previewUrl;
    }
    /**
     * Preview the first link in `body`. Omitted on reads.
     *
     * @param bool|null $previewUrl
     *
     * @return self
     */
    public function setPreviewUrl(?bool $previewUrl): self
    {
        $this->initialized['previewUrl'] = true;
        $this->previewUrl = $previewUrl;
        return $this;
    }
}
