<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateCardComponent
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
     * The card block's type.
     *
     * @var string|null
     */
    protected $type;
    /**
     * The card header's content type. Present on a card's header block.
     *
     * @var string|null
     */
    protected $format;
    /**
     * The block's text content, with any variable placeholders shown inline.
     *
     * @var string|null
     */
    protected $text;
    /**
     * Example values for this block's variables, in placeholder order.
     *
     * @var list<WhatsAppTemplateExampleParameter>|null
     */
    protected $exampleParameters;
    /**
     * The buttons this card carries. Present on a card's buttons block.
     *
     * @var list<WhatsAppTemplateButton>|null
     */
    protected $buttons;
    /**
     * The card block's type.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The card block's type.
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
     * The card header's content type. Present on a card's header block.
     *
     * @return string|null
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }
    /**
     * The card header's content type. Present on a card's header block.
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
     * The block's text content, with any variable placeholders shown inline.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The block's text content, with any variable placeholders shown inline.
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
     * Example values for this block's variables, in placeholder order.
     *
     * @return list<WhatsAppTemplateExampleParameter>|null
     */
    public function getExampleParameters(): ?array
    {
        return $this->exampleParameters;
    }
    /**
     * Example values for this block's variables, in placeholder order.
     *
     * @param list<WhatsAppTemplateExampleParameter>|null $exampleParameters
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
     * The buttons this card carries. Present on a card's buttons block.
     *
     * @return list<WhatsAppTemplateButton>|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }
    /**
     * The buttons this card carries. Present on a card's buttons block.
     *
     * @param list<WhatsAppTemplateButton>|null $buttons
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
