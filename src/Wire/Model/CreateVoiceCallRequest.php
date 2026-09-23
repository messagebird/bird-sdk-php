<?php

namespace MessageBird\Wire\Model;

class CreateVoiceCallRequest
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
     * Canonical E.164 phone number, with a leading plus sign and four to fifteen digits.
     *
     * @var string|null
     */
    protected $from;
    /**
     * Canonical E.164 phone number, with a leading plus sign and four to fifteen digits.
     *
     * @var string|null
     */
    protected $to;
    /**
     * Maximum ringing time for the original dialing attempt, shared across routing candidates.
     *
     * @var int|null
     */
    protected $ringingTimeoutSeconds = 30;
    /**
     * @var CreateVoiceCallSequenceRequest|null
     */
    protected $sequence;
    /**
     * Canonical E.164 phone number, with a leading plus sign and four to fifteen digits.
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * Canonical E.164 phone number, with a leading plus sign and four to fifteen digits.
     *
     * @param string|null $from
     *
     * @return self
     */
    public function setFrom(?string $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * Canonical E.164 phone number, with a leading plus sign and four to fifteen digits.
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Canonical E.164 phone number, with a leading plus sign and four to fifteen digits.
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
     * Maximum ringing time for the original dialing attempt, shared across routing candidates.
     *
     * @return int|null
     */
    public function getRingingTimeoutSeconds(): ?int
    {
        return $this->ringingTimeoutSeconds;
    }
    /**
     * Maximum ringing time for the original dialing attempt, shared across routing candidates.
     *
     * @param int|null $ringingTimeoutSeconds
     *
     * @return self
     */
    public function setRingingTimeoutSeconds(?int $ringingTimeoutSeconds): self
    {
        $this->initialized['ringingTimeoutSeconds'] = true;
        $this->ringingTimeoutSeconds = $ringingTimeoutSeconds;
        return $this;
    }
    /**
     * @return CreateVoiceCallSequenceRequest|null
     */
    public function getSequence(): ?CreateVoiceCallSequenceRequest
    {
        return $this->sequence;
    }
    /**
     * @param CreateVoiceCallSequenceRequest|null $sequence
     *
     * @return self
     */
    public function setSequence(?CreateVoiceCallSequenceRequest $sequence): self
    {
        $this->initialized['sequence'] = true;
        $this->sequence = $sequence;
        return $this;
    }
}
