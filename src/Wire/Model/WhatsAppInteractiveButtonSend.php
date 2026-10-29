<?php

namespace MessageBird\Wire\Model;

/**
 * Interactive or carousel button. Set `type` and its matching field.
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
     * Button kind; determines which field to supply.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Label and reply identifier for `quick_reply`.
     *
     * @var WhatsAppInteractiveButtonSendQuickReply|null
     */
    protected $quickReply;
    /**
     * Label and destination for `cta_url`.
     *
     * @var WhatsAppInteractiveButtonSendCtaUrl|null
     */
    protected $ctaUrl;
    /**
     * Button kind; determines which field to supply.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Button kind; determines which field to supply.
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
     * Label and reply identifier for `quick_reply`.
     *
     * @return WhatsAppInteractiveButtonSendQuickReply|null
     */
    public function getQuickReply(): ?WhatsAppInteractiveButtonSendQuickReply
    {
        return $this->quickReply;
    }
    /**
     * Label and reply identifier for `quick_reply`.
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
     * Label and destination for `cta_url`.
     *
     * @return WhatsAppInteractiveButtonSendCtaUrl|null
     */
    public function getCtaUrl(): ?WhatsAppInteractiveButtonSendCtaUrl
    {
        return $this->ctaUrl;
    }
    /**
     * Label and destination for `cta_url`.
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
