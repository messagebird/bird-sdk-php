<?php

namespace MessageBird\Wire\Model;

/**
 * One content block, as written to a draft.
 */
class WhatsAppTemplateComponentWrite
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
     * A content block's type. A `body` block is required on every language; `header`, `footer`, `buttons` and `carousel` are optional and appear at most once each. A `carousel` holds the cards a marketing template scrolls through, and is the one block type that nests: its cards carry blocks of their own. Any other value is rejected.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * The header's kind. Required on a `header` block and refused on any other.
     * 
     *
     * @var string|null
     */
    protected $format;
    /**
     * The block's text, with each variable written as a placeholder. Send it on a `body`, a `footer`, and a `text` header. Four blocks refuse it. A `buttons` block carries text on the buttons themselves. A media or `location` header shows a file or map and has nowhere to put copy. A `carousel` carries text on its cards. For an authentication template's body and footer, WhatsApp writes the copy from the two settings below. May be empty on a draft; required before submission.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * Ends an authentication template's body with WhatsApp's own advice not to share the code. Send it only on an authentication template's body block, whose copy is otherwise WhatsApp's to write.
     * 
     *
     * @var bool|null
     */
    protected $addSecurityRecommendation;
    /**
     * How long the passcode stays valid. Send it on an authentication template's footer block and WhatsApp writes the footer stating it; omit the footer block entirely to leave it off. WhatsApp enforces the range it accepts and refuses the submission otherwise.
     * 
     *
     * @var int|null
     */
    protected $codeExpirationMinutes;
    /**
     * An example value per `{{n}}` in `text`, in placeholder order. Meta reviews the filled message rather than the template, so a block with variables and no examples is refused. A media header also carries its file here as one entry. Its `type` matches the header's `format`, and its `url` addresses the file. A media header has no placeholder, so this entry is the header's own sample rather than a value that fills one.
     * 
     *
     * @var list<WhatsAppTemplateExampleParameterWrite>|null
     */
    protected $exampleParameters;
    /**
     * The buttons this block carries. Send it only on a `buttons` block. Ten in total, of which at most two open a link and at most one dials a number. Quick replies must sit together rather than being interleaved with the other types, so `Quick reply, Quick reply, Link` is accepted where `Quick reply, Link, Quick reply` is refused. A template with four or more buttons, or one that mixes a quick reply with another type, cannot be opened on WhatsApp's desktop clients, and the recipient is asked to switch to their phone. May be omitted or empty on a draft; at least one button is required before submission.
     * 
     *
     * @var list<WhatsAppTemplateButtonWrite>|null
     */
    protected $buttons;
    /**
     * The cards a `carousel` block scrolls through. Send it only on a `carousel` block, and only on a marketing template. Every card must carry the same blocks in the same order, and a card's header shows an `image` or a `video`. A `document` header works at the top of a template but not on a card. The number of cards is fixed once the language is approved. A template approved with three cards always sends three. Changing the count requires a new template rather than a new version of this one. May be omitted or hold fewer than two on a draft; at least two are required before submission.
     * 
     *
     * @var list<WhatsAppTemplateCardWrite>|null
     */
    protected $cards;
    /**
     * A content block's type. A `body` block is required on every language; `header`, `footer`, `buttons` and `carousel` are optional and appear at most once each. A `carousel` holds the cards a marketing template scrolls through, and is the one block type that nests: its cards carry blocks of their own. Any other value is rejected.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * A content block's type. A `body` block is required on every language; `header`, `footer`, `buttons` and `carousel` are optional and appear at most once each. A `carousel` holds the cards a marketing template scrolls through, and is the one block type that nests: its cards carry blocks of their own. Any other value is rejected.
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
     * The header's kind. Required on a `header` block and refused on any other.
     * 
     *
     * @return string|null
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }
    /**
     * The header's kind. Required on a `header` block and refused on any other.
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
     * The block's text, with each variable written as a placeholder. Send it on a `body`, a `footer`, and a `text` header. Four blocks refuse it. A `buttons` block carries text on the buttons themselves. A media or `location` header shows a file or map and has nowhere to put copy. A `carousel` carries text on its cards. For an authentication template's body and footer, WhatsApp writes the copy from the two settings below. May be empty on a draft; required before submission.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The block's text, with each variable written as a placeholder. Send it on a `body`, a `footer`, and a `text` header. Four blocks refuse it. A `buttons` block carries text on the buttons themselves. A media or `location` header shows a file or map and has nowhere to put copy. A `carousel` carries text on its cards. For an authentication template's body and footer, WhatsApp writes the copy from the two settings below. May be empty on a draft; required before submission.
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
     * Ends an authentication template's body with WhatsApp's own advice not to share the code. Send it only on an authentication template's body block, whose copy is otherwise WhatsApp's to write.
     * 
     *
     * @return bool|null
     */
    public function getAddSecurityRecommendation(): ?bool
    {
        return $this->addSecurityRecommendation;
    }
    /**
     * Ends an authentication template's body with WhatsApp's own advice not to share the code. Send it only on an authentication template's body block, whose copy is otherwise WhatsApp's to write.
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
     * How long the passcode stays valid. Send it on an authentication template's footer block and WhatsApp writes the footer stating it; omit the footer block entirely to leave it off. WhatsApp enforces the range it accepts and refuses the submission otherwise.
     * 
     *
     * @return int|null
     */
    public function getCodeExpirationMinutes(): ?int
    {
        return $this->codeExpirationMinutes;
    }
    /**
     * How long the passcode stays valid. Send it on an authentication template's footer block and WhatsApp writes the footer stating it; omit the footer block entirely to leave it off. WhatsApp enforces the range it accepts and refuses the submission otherwise.
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
     * An example value per `{{n}}` in `text`, in placeholder order. Meta reviews the filled message rather than the template, so a block with variables and no examples is refused. A media header also carries its file here as one entry. Its `type` matches the header's `format`, and its `url` addresses the file. A media header has no placeholder, so this entry is the header's own sample rather than a value that fills one.
     * 
     *
     * @return list<WhatsAppTemplateExampleParameterWrite>|null
     */
    public function getExampleParameters(): ?array
    {
        return $this->exampleParameters;
    }
    /**
     * An example value per `{{n}}` in `text`, in placeholder order. Meta reviews the filled message rather than the template, so a block with variables and no examples is refused. A media header also carries its file here as one entry. Its `type` matches the header's `format`, and its `url` addresses the file. A media header has no placeholder, so this entry is the header's own sample rather than a value that fills one.
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
     * The buttons this block carries. Send it only on a `buttons` block. Ten in total, of which at most two open a link and at most one dials a number. Quick replies must sit together rather than being interleaved with the other types, so `Quick reply, Quick reply, Link` is accepted where `Quick reply, Link, Quick reply` is refused. A template with four or more buttons, or one that mixes a quick reply with another type, cannot be opened on WhatsApp's desktop clients, and the recipient is asked to switch to their phone. May be omitted or empty on a draft; at least one button is required before submission.
     * 
     *
     * @return list<WhatsAppTemplateButtonWrite>|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }
    /**
     * The buttons this block carries. Send it only on a `buttons` block. Ten in total, of which at most two open a link and at most one dials a number. Quick replies must sit together rather than being interleaved with the other types, so `Quick reply, Quick reply, Link` is accepted where `Quick reply, Link, Quick reply` is refused. A template with four or more buttons, or one that mixes a quick reply with another type, cannot be opened on WhatsApp's desktop clients, and the recipient is asked to switch to their phone. May be omitted or empty on a draft; at least one button is required before submission.
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
    /**
     * The cards a `carousel` block scrolls through. Send it only on a `carousel` block, and only on a marketing template. Every card must carry the same blocks in the same order, and a card's header shows an `image` or a `video`. A `document` header works at the top of a template but not on a card. The number of cards is fixed once the language is approved. A template approved with three cards always sends three. Changing the count requires a new template rather than a new version of this one. May be omitted or hold fewer than two on a draft; at least two are required before submission.
     * 
     *
     * @return list<WhatsAppTemplateCardWrite>|null
     */
    public function getCards(): ?array
    {
        return $this->cards;
    }
    /**
     * The cards a `carousel` block scrolls through. Send it only on a `carousel` block, and only on a marketing template. Every card must carry the same blocks in the same order, and a card's header shows an `image` or a `video`. A `document` header works at the top of a template but not on a card. The number of cards is fixed once the language is approved. A template approved with three cards always sends three. Changing the count requires a new template rather than a new version of this one. May be omitted or hold fewer than two on a draft; at least two are required before submission.
     *
     * @param list<WhatsAppTemplateCardWrite>|null $cards
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
