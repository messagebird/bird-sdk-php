<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageSendRequestInteractive extends \ArrayObject
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
     * Optional content above the body. A `list` accepts a `text` header only; `button` and `cta_url` also accept an image, video or document. A `carousel` accepts none: its cards carry their own media. Neither request kind accepts one.
     * 
     *
     * @var WhatsAppInteractiveSendHeader|null
     */
    protected $header;
    /**
     * The message's main text, required on every kind, and the whole message on `location_request_message` and `request_contact_info`. The WhatsApp client turns any URL it contains into a clickable link. Only a `list` may use the full length; the other kinds cap it at 1024 characters.
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
     * The buttons to show, in the order given. Send this on a `button` message, where every button is a `quick_reply`. Every label must be unique within the message; a repeat returns a `422` `WhatsAppInteractiveDuplicateLabel`.
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
     * The cards to show, in the order they appear, left to right. Send this on a `carousel` message, with between 2 and 10 cards. The message's own `body_text` introduces them; a carousel carries no header and no footer of its own.
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
     * Optional content above the body. A `list` accepts a `text` header only; `button` and `cta_url` also accept an image, video or document. A `carousel` accepts none: its cards carry their own media. Neither request kind accepts one.
     * 
     *
     * @return WhatsAppInteractiveSendHeader|null
     */
    public function getHeader(): ?WhatsAppInteractiveSendHeader
    {
        return $this->header;
    }
    /**
     * Optional content above the body. A `list` accepts a `text` header only; `button` and `cta_url` also accept an image, video or document. A `carousel` accepts none: its cards carry their own media. Neither request kind accepts one.
     *
     * @param WhatsAppInteractiveSendHeader|null $header
     *
     * @return self
     */
    public function setHeader(?WhatsAppInteractiveSendHeader $header): self
    {
        $this->initialized['header'] = true;
        $this->header = $header;
        return $this;
    }
    /**
     * The message's main text, required on every kind, and the whole message on `location_request_message` and `request_contact_info`. The WhatsApp client turns any URL it contains into a clickable link. Only a `list` may use the full length; the other kinds cap it at 1024 characters.
     * 
     *
     * @return string|null
     */
    public function getBodyText(): ?string
    {
        return $this->bodyText;
    }
    /**
     * The message's main text, required on every kind, and the whole message on `location_request_message` and `request_contact_info`. The WhatsApp client turns any URL it contains into a clickable link. Only a `list` may use the full length; the other kinds cap it at 1024 characters.
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
     * The buttons to show, in the order given. Send this on a `button` message, where every button is a `quick_reply`. Every label must be unique within the message; a repeat returns a `422` `WhatsAppInteractiveDuplicateLabel`.
     * 
     *
     * @return list<WhatsAppInteractiveButtonSend>|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }
    /**
     * The buttons to show, in the order given. Send this on a `button` message, where every button is a `quick_reply`. Every label must be unique within the message; a repeat returns a `422` `WhatsAppInteractiveDuplicateLabel`.
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
     * @param WhatsAppInteractiveSendList|null $list
     *
     * @return self
     */
    public function setList(?WhatsAppInteractiveSendList $list): self
    {
        $this->initialized['list'] = true;
        $this->list = $list;
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
     * @param WhatsAppInteractiveSendCtaUrl|null $ctaUrl
     *
     * @return self
     */
    public function setCtaUrl(?WhatsAppInteractiveSendCtaUrl $ctaUrl): self
    {
        $this->initialized['ctaUrl'] = true;
        $this->ctaUrl = $ctaUrl;
        return $this;
    }
    /**
     * The cards to show, in the order they appear, left to right. Send this on a `carousel` message, with between 2 and 10 cards. The message's own `body_text` introduces them; a carousel carries no header and no footer of its own.
     * 
     *
     * @return list<WhatsAppInteractiveCardSend>|null
     */
    public function getCards(): ?array
    {
        return $this->cards;
    }
    /**
     * The cards to show, in the order they appear, left to right. Send this on a `carousel` message, with between 2 and 10 cards. The message's own `body_text` introduces them; a carousel carries no header and no footer of its own.
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
