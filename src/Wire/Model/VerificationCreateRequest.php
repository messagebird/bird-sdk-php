<?php

namespace MessageBird\Wire\Model;

class VerificationCreateRequest
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
     * The recipient to verify. Provide an `email_address`, a `phone_number`, or both; at least one is required. The addresses also identify the verification: a check must supply exactly the set used on the create call, so a verification created with both addresses is not found by either one alone.
     * 
     *
     * @var VerificationTo|null
     */
    protected $to;
    /**
     * Per-request overrides applied to this verification only.
     *
     * @var VerificationOptions|null
     */
    protected $options;
    /**
     * Optional key/value pairs to attach to the verification, for example a correlation id. Returned on the verification.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
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
     * Per-request overrides applied to this verification only.
     *
     * @return VerificationOptions|null
     */
    public function getOptions(): ?VerificationOptions
    {
        return $this->options;
    }
    /**
     * Per-request overrides applied to this verification only.
     *
     * @param VerificationOptions|null $options
     *
     * @return self
     */
    public function setOptions(?VerificationOptions $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;
        return $this;
    }
    /**
     * Optional key/value pairs to attach to the verification, for example a correlation id. Returned on the verification.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Optional key/value pairs to attach to the verification, for example a correlation id. Returned on the verification.
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
}
