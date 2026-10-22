<?php

namespace MessageBird\Wire\Model;

/**
 * Options for a submit. Every field is optional, so an empty body submits the draft as it stands.
 */
class WhatsAppTemplateSubmit
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
     * Check the draft without submitting it. Every language is checked and every problem reported, but nothing is frozen and nothing is sent to WhatsApp. A clean result does not guarantee WhatsApp approval: WhatsApp offers no way to ask in advance, so it can still refuse a submission these checks passed. Use a different idempotency key for the validation and the submission. Reusing one key with different request bodies is rejected.
     * 
     *
     * @var bool|null
     */
    protected $validateOnly = false;
    /**
     * Check the draft without submitting it. Every language is checked and every problem reported, but nothing is frozen and nothing is sent to WhatsApp. A clean result does not guarantee WhatsApp approval: WhatsApp offers no way to ask in advance, so it can still refuse a submission these checks passed. Use a different idempotency key for the validation and the submission. Reusing one key with different request bodies is rejected.
     * 
     *
     * @return bool|null
     */
    public function getValidateOnly(): ?bool
    {
        return $this->validateOnly;
    }
    /**
     * Check the draft without submitting it. Every language is checked and every problem reported, but nothing is frozen and nothing is sent to WhatsApp. A clean result does not guarantee WhatsApp approval: WhatsApp offers no way to ask in advance, so it can still refuse a submission these checks passed. Use a different idempotency key for the validation and the submission. Reusing one key with different request bodies is rejected.
     *
     * @param bool|null $validateOnly
     *
     * @return self
     */
    public function setValidateOnly(?bool $validateOnly): self
    {
        $this->initialized['validateOnly'] = true;
        $this->validateOnly = $validateOnly;
        return $this;
    }
}
