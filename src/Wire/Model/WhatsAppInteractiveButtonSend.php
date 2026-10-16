<?php

namespace MessageBird\Wire\Model;

/**
 * One button on an interactive message or on a carousel card. `type` names the kind and the field that carries it, so a button kind WhatsApp adds later arrives as another `type` here rather than as a new shape somewhere else.
 */
class WhatsAppInteractiveButtonSend
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
     * The button's label and the handle it sends back. Send this on a `quick_reply` button.
     *
     * @var WhatsAppInteractiveButtonSendQuickReply|null
     */
    protected $quickReply;
    /**
     * The button's label and the address it opens. Send this on a `cta_url` button.
     *
     * @var WhatsAppInteractiveButtonSendCtaUrl|null
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
     * The button's label and the handle it sends back. Send this on a `quick_reply` button.
     *
     * @return WhatsAppInteractiveButtonSendQuickReply|null
     */
    public function getQuickReply(): ?WhatsAppInteractiveButtonSendQuickReply
    {
        return $this->quickReply;
    }
    /**
     * The button's label and the handle it sends back. Send this on a `quick_reply` button.
     *
     * @param WhatsAppInteractiveButtonSendQuickReply|WhatsAppInteractiveQuickReplyButtonSend|array|null $quickReply
     *
     * @return self
     */
    public function setQuickReply($quickReply): self
    {
        $this->initialized['quickReply'] = true;
        $this->quickReply = \MessageBird\Core\ModelWrapper::normalize($quickReply, WhatsAppInteractiveButtonSendQuickReply::class);
        return $this;
    }
    /**
     * The button's label and the address it opens. Send this on a `cta_url` button.
     *
     * @return WhatsAppInteractiveButtonSendCtaUrl|null
     */
    public function getCtaUrl(): ?WhatsAppInteractiveButtonSendCtaUrl
    {
        return $this->ctaUrl;
    }
    /**
     * The button's label and the address it opens. Send this on a `cta_url` button.
     *
     * @param WhatsAppInteractiveButtonSendCtaUrl|WhatsAppInteractiveCtaUrlSend|array|null $ctaUrl
     *
     * @return self
     */
    public function setCtaUrl($ctaUrl): self
    {
        $this->initialized['ctaUrl'] = true;
        $this->ctaUrl = \MessageBird\Core\ModelWrapper::normalize($ctaUrl, WhatsAppInteractiveButtonSendCtaUrl::class);
        return $this;
    }
}
