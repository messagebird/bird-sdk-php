<?php

namespace MessageBird\Wire\Model;

/**
 * Reply button; tapping returns `slug` in an inbound `interactive_reply`.
 */
class WhatsAppInteractiveQuickReplyButtonSend
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
     * Hidden reply identifier, echoed on tap. Any characters, up to 256.
     *
     * @var string|null
     */
    protected $slug;
    /**
     * Button label, unique within its message or carousel card.
     *
     * @var string|null
     */
    protected $text;
    /**
     * Hidden reply identifier, echoed on tap. Any characters, up to 256.
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * Hidden reply identifier, echoed on tap. Any characters, up to 256.
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
     * Button label, unique within its message or carousel card.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * Button label, unique within its message or carousel card.
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
