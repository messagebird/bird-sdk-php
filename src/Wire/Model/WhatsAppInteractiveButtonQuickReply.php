<?php

namespace MessageBird\Wire\Model;

class WhatsAppInteractiveButtonQuickReply extends \ArrayObject
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
     * The handle the button carries back, never shown to the recipient. On a tap on a template's quick-reply button, it is the payload that template declared.
     * 
     *
     * @var string|null
     */
    protected $slug;
    /**
     * The label the recipient saw.
     *
     * @var string|null
     */
    protected $text;
    /**
     * The handle the button carries back, never shown to the recipient. On a tap on a template's quick-reply button, it is the payload that template declared.
     * 
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The handle the button carries back, never shown to the recipient. On a tap on a template's quick-reply button, it is the payload that template declared.
     *
     * @param string|null $slug
     *
     * @return self
     */
    public function setSlug(?string $slug): self
    {
        $this->initialized['slug'] = true;
        $this->slug = $slug;
        return $this;
    }
    /**
     * The label the recipient saw.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The label the recipient saw.
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
}
