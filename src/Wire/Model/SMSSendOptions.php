<?php

namespace MessageBird\Wire\Model;

/**
 * Settings that change how Bird processes this message. Each option applies to this send only; omit one to use the value of the messaging profile in `messaging_profile_id`, or its default when the profile sets none.
 */
class SMSSendOptions
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
     * Replace characters outside the GSM-7 alphabet with their closest GSM-7 equivalent before sending: typically curly quotes, dashes, ellipses, fullwidth forms, and non-breaking spaces.
     * 
     * One such character forces the whole body into `UCS2`, which more than halves the characters that fit in a segment, so replacing them often lowers the segment count and the cost.
     * 
     * Disabled by default, because it alters the body you composed. The replacement is all-or-nothing: a body that still holds a character outside the alphabet afterwards, such as an emoji or a non-Latin script, is sent exactly as you supplied it. Read the message back to see what was applied: `text` is the body as sent.
     * 
     *
     * @var bool|null
     */
    protected $smartEncoding = false;
    /**
     * Send this message even if the recipient is suppressed for the sender, including after replying STOP. Bird skips every suppression reason and records the flag on the message; communication preferences the recipient revoked still apply. Only `authentication` and `transactional` messages can use it; setting it to `true` on a `marketing` or `service` message returns `422`. Bird must enable it for your workspace first; until then, a message that uses it is refused with `422`. Omit it to use the setting of the messaging profile in `messaging_profile_id`.
     * 
     *
     * @var bool|null
     */
    protected $ignoreSuppression = false;
    /**
     * An HTTPS URL that receives this message's events instead of your webhook endpoints. It must be a public address: a private, loopback or link-local host returns `422`. Bird fixes the URL when it accepts the message, so later profile changes do not reroute it. Each event is a signed POST, retried on failure, and signed with your workspace callback signing secret, which `rotateWebhookCallbackSigningSecret` creates and returns once. While a URL applies, this message's events skip your plain webhook endpoints, and a failed callback never falls back to them. MCP Events subscriptions and connector endpoints still receive them. The `callback_events` of the messaging profile in `messaging_profile_id` choose which events go to the URL. Omit the field to use the callback URL of that profile; send `null` to send this message's events to your webhook subscriptions.
     * 
     *
     * @var string|null
     */
    protected $callbackUrl;
    /**
     * Preview feature: link click tracking. Defaults to `false`. Currently unavailable; setting this to `true` returns `422 SMSUnsupportedFeature`.
     *
     * @var bool|null
     */
    protected $trackClicks;
    /**
     * Preview feature: per-segment price ceiling. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @var float|null
     */
    protected $maxPricePerSegment;
    /**
     * Replace characters outside the GSM-7 alphabet with their closest GSM-7 equivalent before sending: typically curly quotes, dashes, ellipses, fullwidth forms, and non-breaking spaces.
     * 
     * One such character forces the whole body into `UCS2`, which more than halves the characters that fit in a segment, so replacing them often lowers the segment count and the cost.
     * 
     * Disabled by default, because it alters the body you composed. The replacement is all-or-nothing: a body that still holds a character outside the alphabet afterwards, such as an emoji or a non-Latin script, is sent exactly as you supplied it. Read the message back to see what was applied: `text` is the body as sent.
     * 
     *
     * @return bool|null
     */
    public function getSmartEncoding(): ?bool
    {
        return $this->smartEncoding;
    }
    /**
    * Replace characters outside the GSM-7 alphabet with their closest GSM-7 equivalent before sending: typically curly quotes, dashes, ellipses, fullwidth forms, and non-breaking spaces.
    
    One such character forces the whole body into `UCS2`, which more than halves the characters that fit in a segment, so replacing them often lowers the segment count and the cost.
    
    Disabled by default, because it alters the body you composed. The replacement is all-or-nothing: a body that still holds a character outside the alphabet afterwards, such as an emoji or a non-Latin script, is sent exactly as you supplied it. Read the message back to see what was applied: `text` is the body as sent.
    
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
     * Send this message even if the recipient is suppressed for the sender, including after replying STOP. Bird skips every suppression reason and records the flag on the message; communication preferences the recipient revoked still apply. Only `authentication` and `transactional` messages can use it; setting it to `true` on a `marketing` or `service` message returns `422`. Bird must enable it for your workspace first; until then, a message that uses it is refused with `422`. Omit it to use the setting of the messaging profile in `messaging_profile_id`.
     * 
     *
     * @return bool|null
     */
    public function getIgnoreSuppression(): ?bool
    {
        return $this->ignoreSuppression;
    }
    /**
     * Send this message even if the recipient is suppressed for the sender, including after replying STOP. Bird skips every suppression reason and records the flag on the message; communication preferences the recipient revoked still apply. Only `authentication` and `transactional` messages can use it; setting it to `true` on a `marketing` or `service` message returns `422`. Bird must enable it for your workspace first; until then, a message that uses it is refused with `422`. Omit it to use the setting of the messaging profile in `messaging_profile_id`.
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
     * An HTTPS URL that receives this message's events instead of your webhook endpoints. It must be a public address: a private, loopback or link-local host returns `422`. Bird fixes the URL when it accepts the message, so later profile changes do not reroute it. Each event is a signed POST, retried on failure, and signed with your workspace callback signing secret, which `rotateWebhookCallbackSigningSecret` creates and returns once. While a URL applies, this message's events skip your plain webhook endpoints, and a failed callback never falls back to them. MCP Events subscriptions and connector endpoints still receive them. The `callback_events` of the messaging profile in `messaging_profile_id` choose which events go to the URL. Omit the field to use the callback URL of that profile; send `null` to send this message's events to your webhook subscriptions.
     * 
     *
     * @return string|null
     */
    public function getCallbackUrl(): ?string
    {
        return $this->callbackUrl;
    }
    /**
     * An HTTPS URL that receives this message's events instead of your webhook endpoints. It must be a public address: a private, loopback or link-local host returns `422`. Bird fixes the URL when it accepts the message, so later profile changes do not reroute it. Each event is a signed POST, retried on failure, and signed with your workspace callback signing secret, which `rotateWebhookCallbackSigningSecret` creates and returns once. While a URL applies, this message's events skip your plain webhook endpoints, and a failed callback never falls back to them. MCP Events subscriptions and connector endpoints still receive them. The `callback_events` of the messaging profile in `messaging_profile_id` choose which events go to the URL. Omit the field to use the callback URL of that profile; send `null` to send this message's events to your webhook subscriptions.
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
    /**
     * Preview feature: link click tracking. Defaults to `false`. Currently unavailable; setting this to `true` returns `422 SMSUnsupportedFeature`.
     *
     * @return bool|null
     */
    public function getTrackClicks(): ?bool
    {
        return $this->trackClicks;
    }
    /**
     * Preview feature: link click tracking. Defaults to `false`. Currently unavailable; setting this to `true` returns `422 SMSUnsupportedFeature`.
     *
     * @param bool|null $trackClicks
     *
     * @return self
     */
    public function setTrackClicks(?bool $trackClicks): self
    {
        $this->initialized['trackClicks'] = true;
        $this->trackClicks = $trackClicks;
        return $this;
    }
    /**
     * Preview feature: per-segment price ceiling. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @return float|null
     */
    public function getMaxPricePerSegment(): ?float
    {
        return $this->maxPricePerSegment;
    }
    /**
     * Preview feature: per-segment price ceiling. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @param float|null $maxPricePerSegment
     *
     * @return self
     */
    public function setMaxPricePerSegment(?float $maxPricePerSegment): self
    {
        $this->initialized['maxPricePerSegment'] = true;
        $this->maxPricePerSegment = $maxPricePerSegment;
        return $this;
    }
}
