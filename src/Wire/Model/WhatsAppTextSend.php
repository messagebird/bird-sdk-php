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
     * The message text. The WhatsApp client turns any URL it contains into a clickable link.
     * 
     *
     * @var string|null
     */
    protected $body;
    /**
     * Whether the WhatsApp client previews the first link in `body`. Not returned when the message is read back.
     * 
     *
     * @var bool|null
     */
    protected $previewUrl = false;
    /**
     * The message text. The WhatsApp client turns any URL it contains into a clickable link.
     * 
     *
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }
    /**
     * The message text. The WhatsApp client turns any URL it contains into a clickable link.
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
     * Whether the WhatsApp client previews the first link in `body`. Not returned when the message is read back.
     * 
     *
     * @return bool|null
     */
    public function getPreviewUrl(): ?bool
    {
        return $this->previewUrl;
    }
    /**
     * Whether the WhatsApp client previews the first link in `body`. Not returned when the message is read back.
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
