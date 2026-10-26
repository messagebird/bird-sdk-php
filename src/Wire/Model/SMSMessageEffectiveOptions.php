<?php

namespace MessageBird\Wire\Model;

/**
 * The settings Bird applied to this message. Every option is reported, whether you set it on the send or took the default that was in force at the time.
 */
class SMSMessageEffectiveOptions
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
     * Whether Bird replaced characters outside the GSM-7 alphabet in this message's body with their closest equivalent before sending it. When `true`, `text` is the body as sent and `segments` describes that body.
     * 
     *
     * @var bool|null
     */
    protected $smartEncoding;
    /**
     * Preview feature: `true` when this message is excluded from any future quiet-hours delivery window. Absent otherwise.
     *
     * @var bool|null
     */
    protected $ignoreDeliveryWindow;
    /**
     * Preview feature: `true` when the send asked to skip opt-outs. Recorded only: every opt-out still applied. Absent otherwise.
     *
     * @var bool|null
     */
    protected $ignoreSuppression;
    /**
     * Preview feature: the callback URL the send recorded. Absent when it recorded none. Recorded only: status events go to your webhook subscriptions either way.
     * 
     *
     * @var string|null
     */
    protected $callbackUrl;
    /**
     * Whether Bird replaced characters outside the GSM-7 alphabet in this message's body with their closest equivalent before sending it. When `true`, `text` is the body as sent and `segments` describes that body.
     * 
     *
     * @return bool|null
     */
    public function getSmartEncoding(): ?bool
    {
        return $this->smartEncoding;
    }
    /**
     * Whether Bird replaced characters outside the GSM-7 alphabet in this message's body with their closest equivalent before sending it. When `true`, `text` is the body as sent and `segments` describes that body.
     *
     * @param bool|null $smartEncoding
     *
     * @return self
     */
    public function setSmartEncoding(?bool $smartEncoding): self
    {
        $this->initialized['smartEncoding'] = true;
        $this->smartEncoding = $smartEncoding;
        return $this;
    }
    /**
     * Preview feature: `true` when this message is excluded from any future quiet-hours delivery window. Absent otherwise.
     *
     * @return bool|null
     */
    public function getIgnoreDeliveryWindow(): ?bool
    {
        return $this->ignoreDeliveryWindow;
    }
    /**
     * Preview feature: `true` when this message is excluded from any future quiet-hours delivery window. Absent otherwise.
     *
     * @param bool|null $ignoreDeliveryWindow
     *
     * @return self
     */
    public function setIgnoreDeliveryWindow(?bool $ignoreDeliveryWindow): self
    {
        $this->initialized['ignoreDeliveryWindow'] = true;
        $this->ignoreDeliveryWindow = $ignoreDeliveryWindow;
        return $this;
    }
    /**
     * Preview feature: `true` when the send asked to skip opt-outs. Recorded only: every opt-out still applied. Absent otherwise.
     *
     * @return bool|null
     */
    public function getIgnoreSuppression(): ?bool
    {
        return $this->ignoreSuppression;
    }
    /**
     * Preview feature: `true` when the send asked to skip opt-outs. Recorded only: every opt-out still applied. Absent otherwise.
     *
     * @param bool|null $ignoreSuppression
     *
     * @return self
     */
    public function setIgnoreSuppression(?bool $ignoreSuppression): self
    {
        $this->initialized['ignoreSuppression'] = true;
        $this->ignoreSuppression = $ignoreSuppression;
        return $this;
    }
    /**
     * Preview feature: the callback URL the send recorded. Absent when it recorded none. Recorded only: status events go to your webhook subscriptions either way.
     * 
     *
     * @return string|null
     */
    public function getCallbackUrl(): ?string
    {
        return $this->callbackUrl;
    }
    /**
     * Preview feature: the callback URL the send recorded. Absent when it recorded none. Recorded only: status events go to your webhook subscriptions either way.
     *
     * @param string|null $callbackUrl
     *
     * @return self
     */
    public function setCallbackUrl(?string $callbackUrl): self
    {
        $this->initialized['callbackUrl'] = true;
        $this->callbackUrl = $callbackUrl;
        return $this;
    }
}
