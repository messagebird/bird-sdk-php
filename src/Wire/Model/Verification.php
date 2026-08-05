<?php

namespace MessageBird\Wire\Model;

class Verification extends \ArrayObject
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
     * @var string|null
     */
    protected $id;
    /**
     * The verification's current state: `pending` (the initial state, awaiting a correct passcode), `verified` (a correct passcode was submitted), `failed` (too many incorrect attempts), `expired` (the time window elapsed before a correct passcode), `canceled` (the verification was canceled before completing), or `blocked` (it was stopped by a fraud or abuse control).
     *
     * @var string|null
     */
    protected $status;
    /**
     * Why the verification reached its final state, or null while `pending` and once `verified`. See the enum for the values it can take.
     *
     * @var string|null
     */
    protected $reason;
    /**
     * The recipient to verify. Provide an `email_address`, a `phone_number`, or both; at least one is required. The addresses also identify the verification: a check must supply exactly the set used on the create call, so a verification created with both addresses is not found by either one alone.
     * 
     *
     * @var VerificationTo|null
     */
    protected $to;
    /**
     * The channels this verification uses to deliver the passcode, in attempt order: the first entry is tried first and later entries are fallbacks. An email recipient is verified over email; a phone recipient is verified over SMS.
     *
     * @var list<VerificationChannelEntry>|null
     */
    protected $channels;
    /**
     * The channel the most recent passcode was sent on, or null before the first send. Open enum; new channels may be added over time, so treat any unrecognized value as a future channel rather than an error.
     *
     * @var string|null
     */
    protected $lastChannel;
    /**
     * The key/value pairs attached when the verification was created.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * When the verification expires if no correct passcode is submitted first. After this time its status reports `expired`.
     *
     * @var \DateTime|null
     */
    protected $expiresAt;
    /**
     * When the verification was completed, or null if it is not yet verified.
     *
     * @var \DateTime|null
     */
    protected $verifiedAt;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The verification's current state: `pending` (the initial state, awaiting a correct passcode), `verified` (a correct passcode was submitted), `failed` (too many incorrect attempts), `expired` (the time window elapsed before a correct passcode), `canceled` (the verification was canceled before completing), or `blocked` (it was stopped by a fraud or abuse control).
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * The verification's current state: `pending` (the initial state, awaiting a correct passcode), `verified` (a correct passcode was submitted), `failed` (too many incorrect attempts), `expired` (the time window elapsed before a correct passcode), `canceled` (the verification was canceled before completing), or `blocked` (it was stopped by a fraud or abuse control).
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * Why the verification reached its final state, or null while `pending` and once `verified`. See the enum for the values it can take.
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
     * Why the verification reached its final state, or null while `pending` and once `verified`. See the enum for the values it can take.
     *
     * @param string|null $reason
     *
     * @return self
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
    /**
     * The recipient to verify. Provide an `email_address`, a `phone_number`, or both; at least one is required. The addresses also identify the verification: a check must supply exactly the set used on the create call, so a verification created with both addresses is not found by either one alone.
     * 
     *
     * @return VerificationTo|null
     */
    public function getTo(): ?VerificationTo
    {
        return $this->to;
    }
    /**
     * The recipient to verify. Provide an `email_address`, a `phone_number`, or both; at least one is required. The addresses also identify the verification: a check must supply exactly the set used on the create call, so a verification created with both addresses is not found by either one alone.
     *
     * @param VerificationTo|null $to
     *
     * @return self
     */
    public function setTo(?VerificationTo $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * The channels this verification uses to deliver the passcode, in attempt order: the first entry is tried first and later entries are fallbacks. An email recipient is verified over email; a phone recipient is verified over SMS.
     *
     * @return list<VerificationChannelEntry>|null
     */
    public function getChannels(): ?array
    {
        return $this->channels;
    }
    /**
     * The channels this verification uses to deliver the passcode, in attempt order: the first entry is tried first and later entries are fallbacks. An email recipient is verified over email; a phone recipient is verified over SMS.
     *
     * @param list<VerificationChannelEntry>|null $channels
     *
     * @return self
     */
    public function setChannels(?array $channels): self
    {
        $this->initialized['channels'] = true;
        $this->channels = $channels;
        return $this;
    }
    /**
     * The channel the most recent passcode was sent on, or null before the first send. Open enum; new channels may be added over time, so treat any unrecognized value as a future channel rather than an error.
     *
     * @return string|null
     */
    public function getLastChannel(): ?string
    {
        return $this->lastChannel;
    }
    /**
     * The channel the most recent passcode was sent on, or null before the first send. Open enum; new channels may be added over time, so treat any unrecognized value as a future channel rather than an error.
     *
     * @param string|null $lastChannel
     *
     * @return self
     */
    public function setLastChannel(?string $lastChannel): self
    {
        $this->initialized['lastChannel'] = true;
        $this->lastChannel = $lastChannel;
        return $this;
    }
    /**
     * The key/value pairs attached when the verification was created.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * The key/value pairs attached when the verification was created.
     *
     * @param array<string, mixed>|null $metadata
     *
     * @return self
     */
    public function setMetadata(?iterable $metadata): self
    {
        $this->initialized['metadata'] = true;
        $this->metadata = $metadata;
        return $this;
    }
    /**
     * When the verification expires if no correct passcode is submitted first. After this time its status reports `expired`.
     *
     * @return \DateTime|null
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }
    /**
     * When the verification expires if no correct passcode is submitted first. After this time its status reports `expired`.
     *
     * @param \DateTime|null $expiresAt
     *
     * @return self
     */
    public function setExpiresAt(?\DateTime $expiresAt): self
    {
        $this->initialized['expiresAt'] = true;
        $this->expiresAt = $expiresAt;
        return $this;
    }
    /**
     * When the verification was completed, or null if it is not yet verified.
     *
     * @return \DateTime|null
     */
    public function getVerifiedAt(): ?\DateTime
    {
        return $this->verifiedAt;
    }
    /**
     * When the verification was completed, or null if it is not yet verified.
     *
     * @param \DateTime|null $verifiedAt
     *
     * @return self
     */
    public function setVerifiedAt(?\DateTime $verifiedAt): self
    {
        $this->initialized['verifiedAt'] = true;
        $this->verifiedAt = $verifiedAt;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
