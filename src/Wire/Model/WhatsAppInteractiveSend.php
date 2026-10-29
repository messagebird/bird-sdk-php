<?php

namespace MessageBird\Wire\Model;

/**
 * Set `type` and its matching field: `buttons`, `list`, `cta_url`, or `cards`. `location_request_message` and `request_contact_info` take only `body_text`.
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
     * Message kind; determines which content field to supply.
     *
     * @var string|null
     */
    protected $type;
    /**
     * For `list`: text only. For `button` and `cta_url`: text, image, video, or document. Unsupported for carousel and request kinds.
     *
     * @var WhatsAppInteractiveSendHeader|null
     */
    protected $header;
    /**
     * Required main text. Maximum 1024 characters, or 4096 for `list`.
     *
     * @var string|null
     */
    protected $bodyText;
    /**
     * Small print below the body. Unsupported for carousel and request kinds.
     *
     * @var string|null
     */
    protected $footerText;
    /**
     * Ordered `quick_reply` buttons for `button` messages. Labels must be unique within the message.
     *
     * @var list<WhatsAppInteractiveButtonSend>|null
     */
    protected $buttons;
    /**
     * Menu for a `list` message.
     *
     * @var WhatsAppInteractiveSendList|null
     */
    protected $list;
    /**
     * Link button for a `cta_url` message.
     *
     * @var WhatsAppInteractiveSendCtaUrl|null
     */
    protected $ctaUrl;
    /**
     * 2–10 carousel cards, in display order. No message-level header or footer.
     *
     * @var list<WhatsAppInteractiveCardSend>|null
     */
    protected $cards;
    /**
     * Message kind; determines which content field to supply.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Message kind; determines which content field to supply.
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
     * For `list`: text only. For `button` and `cta_url`: text, image, video, or document. Unsupported for carousel and request kinds.
     *
     * @return WhatsAppInteractiveSendHeader|null
     */
    public function getHeader(): ?WhatsAppInteractiveSendHeader
    {
        return $this->header;
    }
    /**
     * For `list`: text only. For `button` and `cta_url`: text, image, video, or document. Unsupported for carousel and request kinds.
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
     * Required main text. Maximum 1024 characters, or 4096 for `list`.
     *
     * @return string|null
     */
    public function getBodyText(): ?string
    {
        return $this->bodyText;
    }
    /**
     * Required main text. Maximum 1024 characters, or 4096 for `list`.
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
     * Small print below the body. Unsupported for carousel and request kinds.
     *
     * @return string|null
     */
    public function getFooterText(): ?string
    {
        return $this->footerText;
    }
    /**
     * Small print below the body. Unsupported for carousel and request kinds.
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
     * Ordered `quick_reply` buttons for `button` messages. Labels must be unique within the message.
     *
     * @return list<WhatsAppInteractiveButtonSend>|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }
    /**
     * Ordered `quick_reply` buttons for `button` messages. Labels must be unique within the message.
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
     * Menu for a `list` message.
     *
     * @return WhatsAppInteractiveSendList|null
     */
    public function getList(): ?WhatsAppInteractiveSendList
    {
        return $this->list;
    }
    /**
     * Menu for a `list` message.
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
     * Link button for a `cta_url` message.
     *
     * @return WhatsAppInteractiveSendCtaUrl|null
     */
    public function getCtaUrl(): ?WhatsAppInteractiveSendCtaUrl
    {
        return $this->ctaUrl;
    }
    /**
     * Link button for a `cta_url` message.
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
     * 2–10 carousel cards, in display order. No message-level header or footer.
     *
     * @return list<WhatsAppInteractiveCardSend>|null
     */
    public function getCards(): ?array
    {
        return $this->cards;
    }
    /**
     * 2–10 carousel cards, in display order. No message-level header or footer.
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
