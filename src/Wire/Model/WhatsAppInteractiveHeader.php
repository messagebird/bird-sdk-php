<?php

namespace MessageBird\Wire\Model;

class WhatsAppInteractiveHeader extends \ArrayObject
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
     * The line of text shown above the body.
     *
     * @var string|null
     */
    protected $text;
    /**
     * The URL of the file shown above the body, as the send supplied it. Interactive content is outbound only, so Bird neither stores nor proxies the file.
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
     * The line of text shown above the body.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The line of text shown above the body.
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
     * The URL of the file shown above the body, as the send supplied it. Interactive content is outbound only, so Bird neither stores nor proxies the file.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * The URL of the file shown above the body, as the send supplied it. Interactive content is outbound only, so Bird neither stores nor proxies the file.
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
