<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageSendRequestText extends \ArrayObject
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
     * Whether the WhatsApp client renders a preview of the first URL in `body`. A URL must begin with `http://` or `https://`, only the first one is previewed, and the client falls back to a plain link when it cannot fetch a preview. Not returned when the message is read back, because WhatsApp does not report whether a preview rendered.
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
     * Whether the WhatsApp client renders a preview of the first URL in `body`. A URL must begin with `http://` or `https://`, only the first one is previewed, and the client falls back to a plain link when it cannot fetch a preview. Not returned when the message is read back, because WhatsApp does not report whether a preview rendered.
     * 
     *
     * @return bool|null
     */
    public function getPreviewUrl(): ?bool
    {
        return $this->previewUrl;
    }
    /**
     * Whether the WhatsApp client renders a preview of the first URL in `body`. A URL must begin with `http://` or `https://`, only the first one is previewed, and the client falls back to a plain link when it cannot fetch a preview. Not returned when the message is read back, because WhatsApp does not report whether a preview rendered.
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
