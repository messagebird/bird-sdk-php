<?php

namespace MessageBird\Wire\Model;

class EsimOfferPhone extends \ArrayObject
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
     * How the plan provides a phone number.
     * 
     * - `always`: a phone number is included with each eSIM purchased from the offer.
     * - `on_request`: reserved for offers with an optional phone number; currently unavailable.
     * 
     *
     * @var string|null
     */
    protected $included;
    /**
     * The eSIM can receive calls on its phone number.
     *
     * @var bool|null
     */
    protected $voiceInbound;
    /**
     * The eSIM can place calls.
     *
     * @var bool|null
     */
    protected $voiceOutbound;
    /**
     * The eSIM can receive text messages on its phone number.
     *
     * @var bool|null
     */
    protected $smsInbound;
    /**
     * The eSIM can send text messages.
     *
     * @var bool|null
     */
    protected $smsOutbound;
    /**
     * How the plan provides a phone number.
     * 
     * - `always`: a phone number is included with each eSIM purchased from the offer.
     * - `on_request`: reserved for offers with an optional phone number; currently unavailable.
     * 
     *
     * @return string|null
     */
    public function getIncluded(): ?string
    {
        return $this->included;
    }
    /**
    * How the plan provides a phone number.
    
    - `always`: a phone number is included with each eSIM purchased from the offer.
    - `on_request`: reserved for offers with an optional phone number; currently unavailable.
    
    *
    * @param string|null $included
    *
    * @return self
    */
    public function setIncluded(?string $included): self
    {
        $this->initialized['included'] = true;
        $this->included = $included;
        return $this;
    }
    /**
     * The eSIM can receive calls on its phone number.
     *
     * @return bool|null
     */
    public function getVoiceInbound(): ?bool
    {
        return $this->voiceInbound;
    }
    /**
     * The eSIM can receive calls on its phone number.
     *
     * @param bool|null $voiceInbound
     *
     * @return self
     */
    public function setVoiceInbound(?bool $voiceInbound): self
    {
        $this->initialized['voiceInbound'] = true;
        $this->voiceInbound = $voiceInbound;
        return $this;
    }
    /**
     * The eSIM can place calls.
     *
     * @return bool|null
     */
    public function getVoiceOutbound(): ?bool
    {
        return $this->voiceOutbound;
    }
    /**
     * The eSIM can place calls.
     *
     * @param bool|null $voiceOutbound
     *
     * @return self
     */
    public function setVoiceOutbound(?bool $voiceOutbound): self
    {
        $this->initialized['voiceOutbound'] = true;
        $this->voiceOutbound = $voiceOutbound;
        return $this;
    }
    /**
     * The eSIM can receive text messages on its phone number.
     *
     * @return bool|null
     */
    public function getSmsInbound(): ?bool
    {
        return $this->smsInbound;
    }
    /**
     * The eSIM can receive text messages on its phone number.
     *
     * @param bool|null $smsInbound
     *
     * @return self
     */
    public function setSmsInbound(?bool $smsInbound): self
    {
        $this->initialized['smsInbound'] = true;
        $this->smsInbound = $smsInbound;
        return $this;
    }
    /**
     * The eSIM can send text messages.
     *
     * @return bool|null
     */
    public function getSmsOutbound(): ?bool
    {
        return $this->smsOutbound;
    }
    /**
     * The eSIM can send text messages.
     *
     * @param bool|null $smsOutbound
     *
     * @return self
     */
    public function setSmsOutbound(?bool $smsOutbound): self
    {
        $this->initialized['smsOutbound'] = true;
        $this->smsOutbound = $smsOutbound;
        return $this;
    }
}
