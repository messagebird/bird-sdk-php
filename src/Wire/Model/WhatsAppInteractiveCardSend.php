<?php

namespace MessageBird\Wire\Model;

/**
 * Carousel card: media, optional text, and buttons. No footer. Array order determines display order.
 */
class WhatsAppInteractiveCardSend
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
     * The image or video at the top of the card.
     *
     * @var WhatsAppInteractiveCardSendHeader|null
     */
    protected $header;
    /**
     * Optional text below the media, with at most two line breaks.
     *
     * @var string|null
     */
    protected $bodyText;
    /**
     * One `cta_url` or up to three `quick_reply` buttons, in display order. Cards must match button kinds and count, or return `422` `WhatsAppInteractiveCardsButtonsMismatch`.
     *
     * @var list<WhatsAppInteractiveButtonSend>|null
     */
    protected $buttons;
    /**
     * The image or video at the top of the card.
     *
     * @return WhatsAppInteractiveCardSendHeader|null
     */
    public function getHeader(): ?WhatsAppInteractiveCardSendHeader
    {
        return $this->header;
    }
    /**
     * The image or video at the top of the card.
     *
     * @param WhatsAppInteractiveCardSendHeader|WhatsAppInteractiveCardHeaderSend|array|null $header
     *
     * @return self
     */
    public function setHeader($header): self
    {
        $this->initialized['header'] = true;
        $this->header = \MessageBird\Core\ModelWrapper::normalize($header, WhatsAppInteractiveCardSendHeader::class);
        return $this;
    }
    /**
     * Optional text below the media, with at most two line breaks.
     *
     * @return string|null
     */
    public function getBodyText(): ?string
    {
        return $this->bodyText;
    }
    /**
     * Optional text below the media, with at most two line breaks.
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
     * One `cta_url` or up to three `quick_reply` buttons, in display order. Cards must match button kinds and count, or return `422` `WhatsAppInteractiveCardsButtonsMismatch`.
     *
     * @return list<WhatsAppInteractiveButtonSend>|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }
    /**
     * One `cta_url` or up to three `quick_reply` buttons, in display order. Cards must match button kinds and count, or return `422` `WhatsAppInteractiveCardsButtonsMismatch`.
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
}
