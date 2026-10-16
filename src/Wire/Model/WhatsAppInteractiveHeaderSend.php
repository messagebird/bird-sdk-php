<?php

namespace MessageBird\Wire\Model;

/**
 * What to show above an interactive message's body: `text` for a line of copy, or `url` for an image, video or document. A `list` accepts a `text` header only.
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
     * Which kind of header this is, and which field carries it.
     *
     * @var string|null
     */
    protected $type;
    /**
     * A single line of text above the body. Send it on a `text` header.
     *
     * @var string|null
     */
    protected $text;
    /**
     * Public `https` URL of the file to show on an `image`, `video` or `document` header, fetched by WhatsApp at send time. The free-form `image`, `video` and `document` limits apply.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * Which kind of header this is, and which field carries it.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Which kind of header this is, and which field carries it.
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
     * A single line of text above the body. Send it on a `text` header.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * A single line of text above the body. Send it on a `text` header.
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
     * Public `https` URL of the file to show on an `image`, `video` or `document` header, fetched by WhatsApp at send time. The free-form `image`, `video` and `document` limits apply.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public `https` URL of the file to show on an `image`, `video` or `document` header, fetched by WhatsApp at send time. The free-form `image`, `video` and `document` limits apply.
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
