<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateLanguageStateError extends \ArrayObject
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
     * Human-readable explanation of why the submission did not complete.
     *
     * @var string|null
     */
    protected $description;
    /**
     * WhatsApp's most specific code for the refusal: its error subcode when it sent one, otherwise its top-level code. Opaque, treat it as a string. Absent when the failure was Bird's own verdict rather than a WhatsApp refusal.
     * 
     *
     * @var string|null
     */
    protected $metaErrorCode;
    /**
     * Human-readable explanation of why the submission did not complete.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Human-readable explanation of why the submission did not complete.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * WhatsApp's most specific code for the refusal: its error subcode when it sent one, otherwise its top-level code. Opaque, treat it as a string. Absent when the failure was Bird's own verdict rather than a WhatsApp refusal.
     * 
     *
     * @return string|null
     */
    public function getMetaErrorCode(): ?string
    {
        return $this->metaErrorCode;
    }
    /**
     * WhatsApp's most specific code for the refusal: its error subcode when it sent one, otherwise its top-level code. Opaque, treat it as a string. Absent when the failure was Bird's own verdict rather than a WhatsApp refusal.
     *
     * @param string|null $metaErrorCode
     *
     * @return self
     */
    public function setMetaErrorCode(?string $metaErrorCode): self
    {
        $this->initialized['metaErrorCode'] = true;
        $this->metaErrorCode = $metaErrorCode;
        return $this;
    }
}
