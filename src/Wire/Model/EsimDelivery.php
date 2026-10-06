<?php

namespace MessageBird\Wire\Model;

class EsimDelivery
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
     * Recipient address. An email address for the email channel, an E.164 phone number for the sms channel.
     *
     * @var string|null
     */
    protected $to;
    /**
     * Channel the install credentials are delivered over.
     *
     * @var string|null
     */
    protected $channel;
    /**
     * Language for the message. Falls back to the closest available language, then English.
     *
     * @var string|null
     */
    protected $locale;
    /**
     * Recipient address. An email address for the email channel, an E.164 phone number for the sms channel.
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Recipient address. An email address for the email channel, an E.164 phone number for the sms channel.
     *
     * @param string|null $to
     *
     * @return self
     */
    public function setTo(?string $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * Channel the install credentials are delivered over.
     *
     * @return string|null
     */
    public function getChannel(): ?string
    {
        return $this->channel;
    }
    /**
     * Channel the install credentials are delivered over.
     *
     * @param string|null $channel
     *
     * @return self
     */
    public function setChannel(?string $channel): self
    {
        $this->initialized['channel'] = true;
        $this->channel = $channel;
        return $this;
    }
    /**
     * Language for the message. Falls back to the closest available language, then English.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }
    /**
     * Language for the message. Falls back to the closest available language, then English.
     *
     * @param string|null $locale
     *
     * @return self
     */
    public function setLocale(?string $locale): self
    {
        $this->initialized['locale'] = true;
        $this->locale = $locale;
        return $this;
    }
}
