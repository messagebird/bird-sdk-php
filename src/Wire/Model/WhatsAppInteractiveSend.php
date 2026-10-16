<?php

namespace MessageBird\Wire\Model;

/**
 * An interactive message: body text plus something for the recipient to tap. Name the kind in `type` and send that kind's field: `buttons`, `list`, `cta_url` or `cards`. `location_request_message` and `request_contact_info` carry only `body_text`.
 */
class WhatsAppInteractiveSend
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
     * Optional content above the body: text on a `list`; text, image, video or document on `button` and `cta_url`. A `carousel` and the two request kinds take none.
     * 
     *
     * @var WhatsAppInteractiveSendHeader|null
     */
    protected $header;
    /**
     * The message's main text, required on every kind. Up to 1024 characters, except on a `list`.
     * 
     *
     * @var string|null
     */
    protected $bodyText;
    /**
     * Optional small print below the body and above the buttons. A `carousel` and both request kinds take no footer.
     * 
     *
     * @var string|null
     */
    protected $footerText;
    /**
     * The `quick_reply` buttons of a `button` message, in order. Labels must be unique within the message.
     * 
     *
     * @var list<WhatsAppInteractiveButtonSend>|null
     */
    protected $buttons;
    /**
     * The menu to show. Send this on a `list` message.
     *
     * @var WhatsAppInteractiveSendList|null
     */
    protected $list;
    /**
     * The link button to show. Send this on a `cta_url` message.
     *
     * @var WhatsAppInteractiveSendCtaUrl|null
     */
    protected $ctaUrl;
    /**
     * The cards of a `carousel` message, 2 to 10, left to right. A carousel takes no header or footer of its own.
     * 
     *
     * @var list<WhatsAppInteractiveCardSend>|null
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
     * Optional content above the body: text on a `list`; text, image, video or document on `button` and `cta_url`. A `carousel` and the two request kinds take none.
     * 
     *
     * @return WhatsAppInteractiveSendHeader|null
     */
    public function getHeader(): ?WhatsAppInteractiveSendHeader
    {
        return $this->header;
    }
    /**
     * Optional content above the body: text on a `list`; text, image, video or document on `button` and `cta_url`. A `carousel` and the two request kinds take none.
     *
     * @param WhatsAppInteractiveSendHeader|WhatsAppInteractiveHeaderSend|array|null $header
     *
     * @return self
     */
    public function setHeader($header): self
    {
        $this->initialized['header'] = true;
        $this->header = \MessageBird\Core\ModelWrapper::normalize($header, WhatsAppInteractiveSendHeader::class);
        return $this;
    }
    /**
     * The message's main text, required on every kind. Up to 1024 characters, except on a `list`.
     * 
     *
     * @return string|null
     */
    public function getBodyText(): ?string
    {
        return $this->bodyText;
    }
    /**
     * The message's main text, required on every kind. Up to 1024 characters, except on a `list`.
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
     * Optional small print below the body and above the buttons. A `carousel` and both request kinds take no footer.
     * 
     *
     * @return string|null
     */
    public function getFooterText(): ?string
    {
        return $this->footerText;
    }
    /**
     * Optional small print below the body and above the buttons. A `carousel` and both request kinds take no footer.
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
     * The `quick_reply` buttons of a `button` message, in order. Labels must be unique within the message.
     * 
     *
     * @return list<WhatsAppInteractiveButtonSend>|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }
    /**
     * The `quick_reply` buttons of a `button` message, in order. Labels must be unique within the message.
     *
     * @param list<WhatsAppInteractiveButtonSend>|null $buttons
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
     * The menu to show. Send this on a `list` message.
     *
     * @return WhatsAppInteractiveSendList|null
     */
    public function getList(): ?WhatsAppInteractiveSendList
    {
        return $this->list;
    }
    /**
     * The menu to show. Send this on a `list` message.
     *
     * @param WhatsAppInteractiveSendList|WhatsAppInteractiveListSend|array|null $list
     *
     * @return self
     */
    public function setList($list): self
    {
        $this->initialized['list'] = true;
        $this->list = \MessageBird\Core\ModelWrapper::normalize($list, WhatsAppInteractiveSendList::class);
        return $this;
    }
    /**
     * The link button to show. Send this on a `cta_url` message.
     *
     * @return WhatsAppInteractiveSendCtaUrl|null
     */
    public function getCtaUrl(): ?WhatsAppInteractiveSendCtaUrl
    {
        return $this->ctaUrl;
    }
    /**
     * The link button to show. Send this on a `cta_url` message.
     *
     * @param WhatsAppInteractiveSendCtaUrl|WhatsAppInteractiveCtaUrlSend|array|null $ctaUrl
     *
     * @return self
     */
    public function setCtaUrl($ctaUrl): self
    {
        $this->initialized['ctaUrl'] = true;
        $this->ctaUrl = \MessageBird\Core\ModelWrapper::normalize($ctaUrl, WhatsAppInteractiveSendCtaUrl::class);
        return $this;
    }
    /**
     * The cards of a `carousel` message, 2 to 10, left to right. A carousel takes no header or footer of its own.
     * 
     *
     * @return list<WhatsAppInteractiveCardSend>|null
     */
    public function getCards(): ?array
    {
        return $this->cards;
    }
    /**
     * The cards of a `carousel` message, 2 to 10, left to right. A carousel takes no header or footer of its own.
     *
     * @param list<WhatsAppInteractiveCardSend>|null $cards
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
