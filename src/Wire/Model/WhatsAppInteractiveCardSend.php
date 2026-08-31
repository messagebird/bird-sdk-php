<?php

namespace MessageBird\Wire\Model;

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
     * The card's own text, below its media, with at most two line breaks. Optional: a card can carry media and buttons alone.
     * 
     *
     * @var string|null
     */
    protected $bodyText;
    /**
     * The buttons under the card, in the order given. Either one `cta_url` button or up to three `quick_reply` buttons: the two kinds cannot be mixed on one card. Every card in the carousel must carry the same kinds in the same number, and a carousel whose cards disagree returns a `422` `WhatsAppInteractiveCarouselButtonsMismatch`.
     * 
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
     * @param WhatsAppInteractiveCardSendHeader|null $header
     *
     * @return self
     */
    public function setHeader(?WhatsAppInteractiveCardSendHeader $header): self
    {
        $this->initialized['header'] = true;
        $this->header = $header;
        return $this;
    }
    /**
     * The card's own text, below its media, with at most two line breaks. Optional: a card can carry media and buttons alone.
     * 
     *
     * @return string|null
     */
    public function getBodyText(): ?string
    {
        return $this->bodyText;
    }
    /**
     * The card's own text, below its media, with at most two line breaks. Optional: a card can carry media and buttons alone.
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
     * The buttons under the card, in the order given. Either one `cta_url` button or up to three `quick_reply` buttons: the two kinds cannot be mixed on one card. Every card in the carousel must carry the same kinds in the same number, and a carousel whose cards disagree returns a `422` `WhatsAppInteractiveCarouselButtonsMismatch`.
     * 
     *
     * @return list<WhatsAppInteractiveButtonSend>|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }
    /**
     * The buttons under the card, in the order given. Either one `cta_url` button or up to three `quick_reply` buttons: the two kinds cannot be mixed on one card. Every card in the carousel must carry the same kinds in the same number, and a carousel whose cards disagree returns a `422` `WhatsAppInteractiveCarouselButtonsMismatch`.
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
