<?php

namespace MessageBird\Wire\Model;

/**
 * Content above the body: `text` or a media `url`. Lists accept text headers only.
 */
class WhatsAppInteractiveHeaderSend
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
     * Header kind; determines which field to supply.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Single line above the body, for `text` headers.
     *
     * @var string|null
     */
    protected $text;
    /**
     * Public HTTPS URL fetched at send time for `image`, `video`, or `document` headers. The corresponding free-form media limits apply.
     *
     * @var string|null
     */
    protected $url;
    /**
     * Header kind; determines which field to supply.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Header kind; determines which field to supply.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * Single line above the body, for `text` headers.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * Single line above the body, for `text` headers.
     *
     * @param string|null $text
     *
     * @return self
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
    /**
     * Public HTTPS URL fetched at send time for `image`, `video`, or `document` headers. The corresponding free-form media limits apply.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public HTTPS URL fetched at send time for `image`, `video`, or `document` headers. The corresponding free-form media limits apply.
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
