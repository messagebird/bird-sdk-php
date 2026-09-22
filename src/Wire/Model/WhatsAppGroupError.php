<?php

namespace MessageBird\Wire\Model;

class WhatsAppGroupError
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
     * WhatsApp's own explanation of the refusal, passed through. Show it to the person who asked for the change; never match on its text. Carries Bird's own words instead when the failure was Bird's verdict, such as a confirmation that never arrived.
     * 
     *
     * @var string|null
     */
    protected $description;
    /**
     * WhatsApp's most specific code for the refusal: its error subcode where it sent one, otherwise its top-level code. Treat it as an opaque string. Null when the failure was Bird's own verdict rather than a WhatsApp refusal.
     * 
     *
     * @var string|null
     */
    protected $metaErrorCode;
    /**
     * WhatsApp's own explanation of the refusal, passed through. Show it to the person who asked for the change; never match on its text. Carries Bird's own words instead when the failure was Bird's verdict, such as a confirmation that never arrived.
     * 
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * WhatsApp's own explanation of the refusal, passed through. Show it to the person who asked for the change; never match on its text. Carries Bird's own words instead when the failure was Bird's verdict, such as a confirmation that never arrived.
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
     * WhatsApp's most specific code for the refusal: its error subcode where it sent one, otherwise its top-level code. Treat it as an opaque string. Null when the failure was Bird's own verdict rather than a WhatsApp refusal.
     * 
     *
     * @return string|null
     */
    public function getMetaErrorCode(): ?string
    {
        return $this->metaErrorCode;
    }
    /**
     * WhatsApp's most specific code for the refusal: its error subcode where it sent one, otherwise its top-level code. Treat it as an opaque string. Null when the failure was Bird's own verdict rather than a WhatsApp refusal.
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
