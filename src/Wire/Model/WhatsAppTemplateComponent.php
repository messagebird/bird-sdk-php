<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateComponent
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
     * The content block's type within the template.
     *
     * @var string|null
     */
    protected $type;
    /**
     * The header block's content type. Present on a header block. A `text` header carries a line of copy. The `image`, `video`, `gif`, and `document` formats each show a file whose address is in the block's `example_parameters`. The `location` format shows a map. It carries no content because the coordinates belong to the message rather than the template.
     * 
     *
     * @var string|null
     */
    protected $format;
    /**
     * The block's text content, with any variable placeholders shown inline. Present when the block carries text. An authentication template's body and footer are written by WhatsApp from the two settings below rather than by you, so their text is absent until the language has been submitted and WhatsApp has supplied it.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * Whether this authentication template's body ends with WhatsApp's advice not to share the code. Present on an authentication template's body block.
     * 
     *
     * @var bool|null
     */
    protected $addSecurityRecommendation;
    /**
     * How long the passcode stays valid, which WhatsApp states in this footer. Present on an authentication template's footer block. Omitting it on a write leaves the footer off entirely.
     * 
     *
     * @var int|null
     */
    protected $codeExpirationMinutes;
    /**
     * Example values for this block's variables, in placeholder order (one per `{{n}}`). Use them to see what a filled message looks like. Present when the block has variables.
     *
     * @var list<WhatsAppTemplateExampleParameter>|null
     */
    protected $exampleParameters;
    /**
     * The buttons attached to this block. Present when the block carries buttons.
     *
     * @var list<WhatsAppTemplateButton>|null
     */
    protected $buttons;
    /**
     * The cards this block scrolls through, in display order. Present on a `carousel` block.
     * 
     *
     * @var list<WhatsAppTemplateCard>|null
     */
    protected $cards;
    /**
     * The content block's type within the template.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The content block's type within the template.
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
     * The header block's content type. Present on a header block. A `text` header carries a line of copy. The `image`, `video`, `gif`, and `document` formats each show a file whose address is in the block's `example_parameters`. The `location` format shows a map. It carries no content because the coordinates belong to the message rather than the template.
     * 
     *
     * @return string|null
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }
    /**
     * The header block's content type. Present on a header block. A `text` header carries a line of copy. The `image`, `video`, `gif`, and `document` formats each show a file whose address is in the block's `example_parameters`. The `location` format shows a map. It carries no content because the coordinates belong to the message rather than the template.
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
     * The block's text content, with any variable placeholders shown inline. Present when the block carries text. An authentication template's body and footer are written by WhatsApp from the two settings below rather than by you, so their text is absent until the language has been submitted and WhatsApp has supplied it.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The block's text content, with any variable placeholders shown inline. Present when the block carries text. An authentication template's body and footer are written by WhatsApp from the two settings below rather than by you, so their text is absent until the language has been submitted and WhatsApp has supplied it.
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
     * Whether this authentication template's body ends with WhatsApp's advice not to share the code. Present on an authentication template's body block.
     * 
     *
     * @return bool|null
     */
    public function getAddSecurityRecommendation(): ?bool
    {
        return $this->addSecurityRecommendation;
    }
    /**
     * Whether this authentication template's body ends with WhatsApp's advice not to share the code. Present on an authentication template's body block.
     *
     * @param bool|null $addSecurityRecommendation
     *
     * @return self
     */
    public function setAddSecurityRecommendation(?bool $addSecurityRecommendation): self
    {
        $this->initialized['addSecurityRecommendation'] = true;
        $this->addSecurityRecommendation = $addSecurityRecommendation;
        return $this;
    }
    /**
     * How long the passcode stays valid, which WhatsApp states in this footer. Present on an authentication template's footer block. Omitting it on a write leaves the footer off entirely.
     * 
     *
     * @return int|null
     */
    public function getCodeExpirationMinutes(): ?int
    {
        return $this->codeExpirationMinutes;
    }
    /**
     * How long the passcode stays valid, which WhatsApp states in this footer. Present on an authentication template's footer block. Omitting it on a write leaves the footer off entirely.
     *
     * @param int|null $codeExpirationMinutes
     *
     * @return self
     */
    public function setCodeExpirationMinutes(?int $codeExpirationMinutes): self
    {
        $this->initialized['codeExpirationMinutes'] = true;
        $this->codeExpirationMinutes = $codeExpirationMinutes;
        return $this;
    }
    /**
     * Example values for this block's variables, in placeholder order (one per `{{n}}`). Use them to see what a filled message looks like. Present when the block has variables.
     *
     * @return list<WhatsAppTemplateExampleParameter>|null
     */
    public function getExampleParameters(): ?array
    {
        return $this->exampleParameters;
    }
    /**
     * Example values for this block's variables, in placeholder order (one per `{{n}}`). Use them to see what a filled message looks like. Present when the block has variables.
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
     * The buttons attached to this block. Present when the block carries buttons.
     *
     * @return list<WhatsAppTemplateButton>|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }
    /**
     * The buttons attached to this block. Present when the block carries buttons.
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
    /**
     * The cards this block scrolls through, in display order. Present on a `carousel` block.
     * 
     *
     * @return list<WhatsAppTemplateCard>|null
     */
    public function getCards(): ?array
    {
        return $this->cards;
    }
    /**
     * The cards this block scrolls through, in display order. Present on a `carousel` block.
     *
     * @param list<WhatsAppTemplateCard>|null $cards
     *
     * @return self
     */
    public function setCards(?array $cards): self
    {
        $this->initialized['cards'] = true;
        $this->cards = $cards;
        return $this;
    }
}
