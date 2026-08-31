<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageInteractive extends \ArrayObject
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
     * @var WhatsAppInteractiveHeader|null
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
     * @var WhatsAppInteractiveList|null
     */
    protected $list;
    /**
     * The link button the message offered.
     *
     * @var WhatsAppInteractiveCtaUrl|null
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
     * @return WhatsAppInteractiveHeader|null
     */
    public function getHeader(): ?WhatsAppInteractiveHeader
    {
        return $this->header;
    }
    /**
     * What was shown above the body. Absent when the message carried no header.
     *
     * @param WhatsAppInteractiveHeader|null $header
     *
     * @return self
     */
    public function setHeader(?WhatsAppInteractiveHeader $header): self
    {
        $this->initialized['header'] = true;
        $this->header = $header;
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
     * @return WhatsAppInteractiveList|null
     */
    public function getList(): ?WhatsAppInteractiveList
    {
        return $this->list;
    }
    /**
     * The menu the message offered.
     *
     * @param WhatsAppInteractiveList|null $list
     *
     * @return self
     */
    public function setList(?WhatsAppInteractiveList $list): self
    {
        $this->initialized['list'] = true;
        $this->list = $list;
        return $this;
    }
    /**
     * The link button the message offered.
     *
     * @return WhatsAppInteractiveCtaUrl|null
     */
    public function getCtaUrl(): ?WhatsAppInteractiveCtaUrl
    {
        return $this->ctaUrl;
    }
    /**
     * The link button the message offered.
     *
     * @param WhatsAppInteractiveCtaUrl|null $ctaUrl
     *
     * @return self
     */
    public function setCtaUrl(?WhatsAppInteractiveCtaUrl $ctaUrl): self
    {
        $this->initialized['ctaUrl'] = true;
        $this->ctaUrl = $ctaUrl;
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
