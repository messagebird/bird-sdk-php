<?php

namespace MessageBird\Wire\Model;

class WhatsAppInteractiveCard
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
     * The image or video shown at the top of the card.
     *
     * @var WhatsAppInteractiveCardHeader|null
     */
    protected $header;
    /**
     * The card's own text. Absent when the card carried none.
     *
     * @var string|null
     */
    protected $bodyText;
    /**
     * The buttons the card offered, in the order shown.
     *
     * @var list<WhatsAppInteractiveButton>|null
     */
    protected $buttons;
    /**
     * The image or video shown at the top of the card.
     *
     * @return WhatsAppInteractiveCardHeader|null
     */
    public function getHeader(): ?WhatsAppInteractiveCardHeader
    {
        return $this->header;
    }
    /**
     * The image or video shown at the top of the card.
     *
     * @param WhatsAppInteractiveCardHeader|null $header
     *
     * @return self
     */
    public function setHeader(?WhatsAppInteractiveCardHeader $header): self
    {
        $this->initialized['header'] = true;
        $this->header = $header;
        return $this;
    }
    /**
     * The card's own text. Absent when the card carried none.
     *
     * @return string|null
     */
    public function getBodyText(): ?string
    {
        return $this->bodyText;
    }
    /**
     * The card's own text. Absent when the card carried none.
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
     * The buttons the card offered, in the order shown.
     *
     * @return list<WhatsAppInteractiveButton>|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }
    /**
     * The buttons the card offered, in the order shown.
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
}
