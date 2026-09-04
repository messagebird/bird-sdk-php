<?php

namespace MessageBird\Wire\Model;

class VoiceCallCost
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
     * Total charged, as a decimal string: the sum of the components below. Net of tax, which applies to your wallet balance rather than to an individual charge.
     * 
     *
     * @var string|null
     */
    protected $amount;
    /**
     * ISO 4217 three-letter currency code.
     *
     * @var string|null
     */
    protected $currencyCode;
    /**
     * What we charged to carry the call to the destination network, as a decimal string. `null` until this component is priced.
     * 
     *
     * @var string|null
     */
    protected $outboundAmount;
    /**
     * What we charged to receive the call from the originating network, as a decimal string. Only a call that arrived at your number can carry it. `null` until this component is priced.
     * 
     *
     * @var string|null
     */
    protected $inboundAmount;
    /**
     * What we charged for handling the call itself, as a decimal string. A call is charged for handling once, however many legs it has, so only one leg's record carries it. `null` until this component is priced.
     * 
     *
     * @var string|null
     */
    protected $callHandlingAmount;
    /**
     * What we charged to record the call, as a decimal string, billed per second over the same billable time as the rest of the call. `null` until this component is priced.
     * 
     *
     * @var string|null
     */
    protected $recordingAmount;
    /**
     * What we charged to transcribe the call's audio, as a decimal string, billed per second of recorded audio rather than for the length of the call. A transcript is produced after the call ends, so this can appear after the rest of the cost. `null` until this component is priced.
     * 
     *
     * @var string|null
     */
    protected $transcriptionAmount;
    /**
     * Total charged, as a decimal string: the sum of the components below. Net of tax, which applies to your wallet balance rather than to an individual charge.
     * 
     *
     * @return string|null
     */
    public function getAmount(): ?string
    {
        return $this->amount;
    }
    /**
     * Total charged, as a decimal string: the sum of the components below. Net of tax, which applies to your wallet balance rather than to an individual charge.
     *
     * @param string|null $amount
     *
     * @return self
     */
    public function setAmount(?string $amount): self
    {
        $this->initialized['amount'] = true;
        $this->amount = $amount;
        return $this;
    }
    /**
     * ISO 4217 three-letter currency code.
     *
     * @return string|null
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }
    /**
     * ISO 4217 three-letter currency code.
     *
     * @param string|null $currencyCode
     *
     * @return self
     */
    public function setCurrencyCode(?string $currencyCode): self
    {
        $this->initialized['currencyCode'] = true;
        $this->currencyCode = $currencyCode;
        return $this;
    }
    /**
     * What we charged to carry the call to the destination network, as a decimal string. `null` until this component is priced.
     * 
     *
     * @return string|null
     */
    public function getOutboundAmount(): ?string
    {
        return $this->outboundAmount;
    }
    /**
     * What we charged to carry the call to the destination network, as a decimal string. `null` until this component is priced.
     *
     * @param string|null $outboundAmount
     *
     * @return self
     */
    public function setOutboundAmount(?string $outboundAmount): self
    {
        $this->initialized['outboundAmount'] = true;
        $this->outboundAmount = $outboundAmount;
        return $this;
    }
    /**
     * What we charged to receive the call from the originating network, as a decimal string. Only a call that arrived at your number can carry it. `null` until this component is priced.
     * 
     *
     * @return string|null
     */
    public function getInboundAmount(): ?string
    {
        return $this->inboundAmount;
    }
    /**
     * What we charged to receive the call from the originating network, as a decimal string. Only a call that arrived at your number can carry it. `null` until this component is priced.
     *
     * @param string|null $inboundAmount
     *
     * @return self
     */
    public function setInboundAmount(?string $inboundAmount): self
    {
        $this->initialized['inboundAmount'] = true;
        $this->inboundAmount = $inboundAmount;
        return $this;
    }
    /**
     * What we charged for handling the call itself, as a decimal string. A call is charged for handling once, however many legs it has, so only one leg's record carries it. `null` until this component is priced.
     * 
     *
     * @return string|null
     */
    public function getCallHandlingAmount(): ?string
    {
        return $this->callHandlingAmount;
    }
    /**
     * What we charged for handling the call itself, as a decimal string. A call is charged for handling once, however many legs it has, so only one leg's record carries it. `null` until this component is priced.
     *
     * @param string|null $callHandlingAmount
     *
     * @return self
     */
    public function setCallHandlingAmount(?string $callHandlingAmount): self
    {
        $this->initialized['callHandlingAmount'] = true;
        $this->callHandlingAmount = $callHandlingAmount;
        return $this;
    }
    /**
     * What we charged to record the call, as a decimal string, billed per second over the same billable time as the rest of the call. `null` until this component is priced.
     * 
     *
     * @return string|null
     */
    public function getRecordingAmount(): ?string
    {
        return $this->recordingAmount;
    }
    /**
     * What we charged to record the call, as a decimal string, billed per second over the same billable time as the rest of the call. `null` until this component is priced.
     *
     * @param string|null $recordingAmount
     *
     * @return self
     */
    public function setRecordingAmount(?string $recordingAmount): self
    {
        $this->initialized['recordingAmount'] = true;
        $this->recordingAmount = $recordingAmount;
        return $this;
    }
    /**
     * What we charged to transcribe the call's audio, as a decimal string, billed per second of recorded audio rather than for the length of the call. A transcript is produced after the call ends, so this can appear after the rest of the cost. `null` until this component is priced.
     * 
     *
     * @return string|null
     */
    public function getTranscriptionAmount(): ?string
    {
        return $this->transcriptionAmount;
    }
    /**
     * What we charged to transcribe the call's audio, as a decimal string, billed per second of recorded audio rather than for the length of the call. A transcript is produced after the call ends, so this can appear after the rest of the cost. `null` until this component is priced.
     *
     * @param string|null $transcriptionAmount
     *
     * @return self
     */
    public function setTranscriptionAmount(?string $transcriptionAmount): self
    {
        $this->initialized['transcriptionAmount'] = true;
        $this->transcriptionAmount = $transcriptionAmount;
        return $this;
    }
}
