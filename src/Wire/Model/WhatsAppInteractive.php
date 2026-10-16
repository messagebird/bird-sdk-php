<?php

namespace MessageBird\Wire\Model;

/**
 * Interactive content of a WhatsApp message: body text plus something the recipient can tap. The field named by `type` is the one that is present, except on `location_request_message` and `request_contact_info`, which name no field: each is a single button asking the recipient for something, so `body_text` is the whole message. Outbound only, and so an echo of what the send asked for: a contact cannot send interactive content, and a tap on it reads as `interactive_reply`, or on a location or contact request as the message the recipient shared in answer. Unlike the send schema, this one does not pin each `type` to its field. The vocabulary in `type` is open, so dispatch on it and treat an unrecognized value as a kind added since. Only the discriminator is open: this schema declares no additional properties, so a new kind's own payload field arrives here in the same change that introduces the kind, which is additive.
 */
class WhatsAppInteractive
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
     * Which kind of interactive message this is, and which field carries it.
     *
     * @var string|null
     */
    protected $type;
    /**
     * What was shown above the body. Absent when the message carried no header.
     *
     * @var WhatsAppInteractiveHeaderWrapper|null
     */
    protected $header;
    /**
     * The message's main text.
     *
     * @var string|null
     */
    protected $bodyText;
    /**
     * The small print below the body. Absent when the message carried none.
     *
     * @var string|null
     */
    protected $footerText;
    /**
     * The buttons the message offered, in the order shown.
     *
     * @var list<WhatsAppInteractiveButton>|null
     */
    protected $buttons;
    /**
     * The menu the message offered.
     *
     * @var WhatsAppInteractiveListWrapper|null
     */
    protected $list;
    /**
     * The link button the message offered.
     *
     * @var WhatsAppInteractiveCtaUrlWrapper|null
     */
    protected $ctaUrl;
    /**
     * The cards the message offered, in the order they appeared, left to right.
     * 
     *
     * @var list<WhatsAppInteractiveCard>|null
     */
    protected $cards;
    /**
     * Which kind of interactive message this is, and which field carries it.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Which kind of interactive message this is, and which field carries it.
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
     * What was shown above the body. Absent when the message carried no header.
     *
     * @return WhatsAppInteractiveHeaderWrapper|null
     */
    public function getHeader(): ?WhatsAppInteractiveHeaderWrapper
    {
        return $this->header;
    }
    /**
     * What was shown above the body. Absent when the message carried no header.
     *
     * @param WhatsAppInteractiveHeaderWrapper|WhatsAppInteractiveHeader|array|null $header
     *
     * @return self
     */
    public function setHeader($header): self
    {
        $this->initialized['header'] = true;
        $this->header = \MessageBird\Core\ModelWrapper::normalize($header, WhatsAppInteractiveHeaderWrapper::class);
        return $this;
    }
    /**
     * The message's main text.
     *
     * @return string|null
     */
    public function getBodyText(): ?string
    {
        return $this->bodyText;
    }
    /**
     * The message's main text.
     *
     * @param string|null $bodyText
     *
     * @return self
     */
    public function setBodyText(?string $bodyText): self
    {
        $this->initialized['bodyText'] = true;
        $this->bodyText = $bodyText;
        return $this;
    }
    /**
     * The small print below the body. Absent when the message carried none.
     *
     * @return string|null
     */
    public function getFooterText(): ?string
    {
        return $this->footerText;
    }
    /**
     * The small print below the body. Absent when the message carried none.
     *
     * @param string|null $footerText
     *
     * @return self
     */
    public function setFooterText(?string $footerText): self
    {
        $this->initialized['footerText'] = true;
        $this->footerText = $footerText;
        return $this;
    }
    /**
     * The buttons the message offered, in the order shown.
     *
     * @return list<WhatsAppInteractiveButton>|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }
    /**
     * The buttons the message offered, in the order shown.
     *
     * @param list<WhatsAppInteractiveButton>|null $buttons
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
     * The menu the message offered.
     *
     * @return WhatsAppInteractiveListWrapper|null
     */
    public function getList(): ?WhatsAppInteractiveListWrapper
    {
        return $this->list;
    }
    /**
     * The menu the message offered.
     *
     * @param WhatsAppInteractiveListWrapper|WhatsAppInteractiveList|array|null $list
     *
     * @return self
     */
    public function setList($list): self
    {
        $this->initialized['list'] = true;
        $this->list = \MessageBird\Core\ModelWrapper::normalize($list, WhatsAppInteractiveListWrapper::class);
        return $this;
    }
    /**
     * The link button the message offered.
     *
     * @return WhatsAppInteractiveCtaUrlWrapper|null
     */
    public function getCtaUrl(): ?WhatsAppInteractiveCtaUrlWrapper
    {
        return $this->ctaUrl;
    }
    /**
     * The link button the message offered.
     *
     * @param WhatsAppInteractiveCtaUrlWrapper|WhatsAppInteractiveCtaUrl|array|null $ctaUrl
     *
     * @return self
     */
    public function setCtaUrl($ctaUrl): self
    {
        $this->initialized['ctaUrl'] = true;
        $this->ctaUrl = \MessageBird\Core\ModelWrapper::normalize($ctaUrl, WhatsAppInteractiveCtaUrlWrapper::class);
        return $this;
    }
    /**
     * The cards the message offered, in the order they appeared, left to right.
     * 
     *
     * @return list<WhatsAppInteractiveCard>|null
     */
    public function getCards(): ?array
    {
        return $this->cards;
    }
    /**
     * The cards the message offered, in the order they appeared, left to right.
     *
     * @param list<WhatsAppInteractiveCard>|null $cards
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
