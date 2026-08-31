<?php

namespace MessageBird\Wire\Model;

class WhatsAppInteractiveButton
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
     * Which kind of button this is, and which field carries it.
     *
     * @var string|null
     */
    protected $type;
    /**
     * The button's label and the handle it sends back.
     *
     * @var WhatsAppInteractiveButtonQuickReply|null
     */
    protected $quickReply;
    /**
     * The button's label and the address it opens.
     *
     * @var WhatsAppInteractiveButtonCtaUrl|null
     */
    protected $ctaUrl;
    /**
     * Which kind of button this is, and which field carries it.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Which kind of button this is, and which field carries it.
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
     * The button's label and the handle it sends back.
     *
     * @return WhatsAppInteractiveButtonQuickReply|null
     */
    public function getQuickReply(): ?WhatsAppInteractiveButtonQuickReply
    {
        return $this->quickReply;
    }
    /**
     * The button's label and the handle it sends back.
     *
     * @param WhatsAppInteractiveButtonQuickReply|null $quickReply
     *
     * @return self
     */
    public function setQuickReply(?WhatsAppInteractiveButtonQuickReply $quickReply): self
    {
        $this->initialized['quickReply'] = true;
        $this->quickReply = $quickReply;
        return $this;
    }
    /**
     * The button's label and the address it opens.
     *
     * @return WhatsAppInteractiveButtonCtaUrl|null
     */
    public function getCtaUrl(): ?WhatsAppInteractiveButtonCtaUrl
    {
        return $this->ctaUrl;
    }
    /**
     * The button's label and the address it opens.
     *
     * @param WhatsAppInteractiveButtonCtaUrl|null $ctaUrl
     *
     * @return self
     */
    public function setCtaUrl(?WhatsAppInteractiveButtonCtaUrl $ctaUrl): self
    {
        $this->initialized['ctaUrl'] = true;
        $this->ctaUrl = $ctaUrl;
        return $this;
    }
}
