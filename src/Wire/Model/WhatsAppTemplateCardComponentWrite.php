<?php

namespace MessageBird\Wire\Model;

/**
 * One content block inside a carousel card, as written to a draft. A card carries a narrower set of blocks than a template does, so it has its own shape rather than reusing the template's.
 */
class WhatsAppTemplateCardComponentWrite
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
     * A card block's type. A card carries a `header` showing an image or a video, and optionally a `body` and a `buttons` block. A card has no footer and cannot hold a carousel of its own, which is why a card's blocks are a narrower set than a template's.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * The card header's kind. Required on a card's `header` block and refused on any other.
     * 
     *
     * @var string|null
     */
    protected $format;
    /**
     * The card block's text, with each variable written as a placeholder. Send it on a `body` block. If any card carries body text then every card must, so the cards keep an even height. May be empty on a draft; required before submission.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * An example value per `{{n}}` in `text`, in placeholder order. Meta reviews the filled message rather than the template, so a block with variables and no examples is refused. A card's `header` block carries its file here as a single entry whose `type` matches the header's `format` and whose `url` addresses the file, the same way a template header does.
     * 
     *
     * @var list<WhatsAppTemplateExampleParameterWrite>|null
     */
    protected $exampleParameters;
    /**
     * The buttons this card carries, at most two. Send it only on a card's `buttons` block. Every card must carry the same buttons in the same order. A card takes a `quick_reply`, `phone_number` or `url` button; a `copy_code` or `request_contact_info` button belongs on the template itself.
     * 
     *
     * @var list<WhatsAppTemplateButtonWrite>|null
     */
    protected $buttons;
    /**
     * A card block's type. A card carries a `header` showing an image or a video, and optionally a `body` and a `buttons` block. A card has no footer and cannot hold a carousel of its own, which is why a card's blocks are a narrower set than a template's.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * A card block's type. A card carries a `header` showing an image or a video, and optionally a `body` and a `buttons` block. A card has no footer and cannot hold a carousel of its own, which is why a card's blocks are a narrower set than a template's.
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
     * The card header's kind. Required on a card's `header` block and refused on any other.
     * 
     *
     * @return string|null
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }
    /**
     * The card header's kind. Required on a card's `header` block and refused on any other.
     *
     * @param string|null $format
     *
     * @return self
     */
    public function setFormat(?string $format): self
    {
        $this->initialized['format'] = true;
        $this->format = $format;
        return $this;
    }
    /**
     * The card block's text, with each variable written as a placeholder. Send it on a `body` block. If any card carries body text then every card must, so the cards keep an even height. May be empty on a draft; required before submission.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The card block's text, with each variable written as a placeholder. Send it on a `body` block. If any card carries body text then every card must, so the cards keep an even height. May be empty on a draft; required before submission.
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
     * An example value per `{{n}}` in `text`, in placeholder order. Meta reviews the filled message rather than the template, so a block with variables and no examples is refused. A card's `header` block carries its file here as a single entry whose `type` matches the header's `format` and whose `url` addresses the file, the same way a template header does.
     * 
     *
     * @return list<WhatsAppTemplateExampleParameterWrite>|null
     */
    public function getExampleParameters(): ?array
    {
        return $this->exampleParameters;
    }
    /**
     * An example value per `{{n}}` in `text`, in placeholder order. Meta reviews the filled message rather than the template, so a block with variables and no examples is refused. A card's `header` block carries its file here as a single entry whose `type` matches the header's `format` and whose `url` addresses the file, the same way a template header does.
     *
     * @param list<WhatsAppTemplateExampleParameterWrite>|null $exampleParameters
     *
     * @return self
     */
    public function setExampleParameters(?array $exampleParameters): self
    {
        $this->initialized['exampleParameters'] = true;
        $this->exampleParameters = $exampleParameters;
        return $this;
    }
    /**
     * The buttons this card carries, at most two. Send it only on a card's `buttons` block. Every card must carry the same buttons in the same order. A card takes a `quick_reply`, `phone_number` or `url` button; a `copy_code` or `request_contact_info` button belongs on the template itself.
     * 
     *
     * @return list<WhatsAppTemplateButtonWrite>|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }
    /**
     * The buttons this card carries, at most two. Send it only on a card's `buttons` block. Every card must carry the same buttons in the same order. A card takes a `quick_reply`, `phone_number` or `url` button; a `copy_code` or `request_contact_info` button belongs on the template itself.
     *
     * @param list<WhatsAppTemplateButtonWrite>|null $buttons
     *
     * @return self
     */
    public function setButtons(?array $buttons): self
    {
        $this->initialized['buttons'] = true;
        $this->buttons = $buttons;
        return $this;
    }
}
