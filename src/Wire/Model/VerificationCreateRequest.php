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
     * The recipient to verify. Provide an `email`, a `phone_number`, or both; at least one is required. The addresses also identify the verification: a check must supply exactly the set used on the create call, so a verification created with both addresses is not found by either one alone.
     * 
     *
     * @var VerificationTo|null
     */
    protected $to;
    /**
     * Per-request overrides applied to this verification only. `language` picks one of Bird's built-in translations; a custom sender that carries its own template renders the language that template stocks instead. An email template pinned to a custom email sender falls back to its own default language rather than to English (Verify only accepts templates whose language settings fall back). A WhatsApp authentication template follows its own missing-language policy: it falls back to its default or, when set to fail, refuses the send for a language it does not stock. The requested tag stays fixed for the verification.
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
     * The recipient to verify. Provide an `email`, a `phone_number`, or both; at least one is required. The addresses also identify the verification: a check must supply exactly the set used on the create call, so a verification created with both addresses is not found by either one alone.
     * 
     *
     * @return VerificationTo|null
     */
    public function getTo(): ?VerificationTo
    {
        return $this->to;
    }
    /**
     * The recipient to verify. Provide an `email`, a `phone_number`, or both; at least one is required. The addresses also identify the verification: a check must supply exactly the set used on the create call, so a verification created with both addresses is not found by either one alone.
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
     * Per-request overrides applied to this verification only. `language` picks one of Bird's built-in translations; a custom sender that carries its own template renders the language that template stocks instead. An email template pinned to a custom email sender falls back to its own default language rather than to English (Verify only accepts templates whose language settings fall back). A WhatsApp authentication template follows its own missing-language policy: it falls back to its default or, when set to fail, refuses the send for a language it does not stock. The requested tag stays fixed for the verification.
     *
     * @return VerificationOptions|null
     */
    public function getOptions(): ?VerificationOptions
    {
        return $this->options;
    }
    /**
     * Per-request overrides applied to this verification only. `language` picks one of Bird's built-in translations; a custom sender that carries its own template renders the language that template stocks instead. An email template pinned to a custom email sender falls back to its own default language rather than to English (Verify only accepts templates whose language settings fall back). A WhatsApp authentication template follows its own missing-language policy: it falls back to its default or, when set to fail, refuses the send for a language it does not stock. The requested tag stays fixed for the verification.
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
