<?php

namespace MessageBird\Wire\Model;

class WhatsAppInteractiveButtonCtaUrl extends \ArrayObject
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
     * The button's label.
     *
     * @var string|null
     */
    protected $text;
    /**
     * The address the button opens, as the send supplied it.
     *
     * @var string|null
     */
    protected $url;
    /**
     * The button's label.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The button's label.
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
     * The address the button opens, as the send supplied it.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * The address the button opens, as the send supplied it.
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
