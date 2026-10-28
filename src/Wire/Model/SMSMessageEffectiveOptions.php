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
     * `true` when the send may reach the recipient even if they are suppressed for the sender, including after replying STOP. Only `authentication` and `transactional` messages can set it. Absent otherwise.
     *
     * @var bool|null
     */
    protected $ignoreSuppression;
    /**
     * The callback URL that applies to this message, which receives its events instead of your webhook endpoints. Absent when the message has none, in which case its events go to your webhook subscriptions.
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
     * `true` when the send may reach the recipient even if they are suppressed for the sender, including after replying STOP. Only `authentication` and `transactional` messages can set it. Absent otherwise.
     *
     * @return bool|null
     */
    public function getIgnoreSuppression(): ?bool
    {
        return $this->ignoreSuppression;
    }
    /**
     * `true` when the send may reach the recipient even if they are suppressed for the sender, including after replying STOP. Only `authentication` and `transactional` messages can set it. Absent otherwise.
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
     * The callback URL that applies to this message, which receives its events instead of your webhook endpoints. Absent when the message has none, in which case its events go to your webhook subscriptions.
     * 
     *
     * @return string|null
     */
    public function getCallbackUrl(): ?string
    {
        return $this->callbackUrl;
    }
    /**
     * The callback URL that applies to this message, which receives its events instead of your webhook endpoints. Absent when the message has none, in which case its events go to your webhook subscriptions.
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
