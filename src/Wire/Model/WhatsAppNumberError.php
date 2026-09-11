<?php

namespace MessageBird\Wire\Model;

class WhatsAppNumberError extends \ArrayObject
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
     * Standardized failure reason.
     *
     * @var string|null
     */
    protected $code;
    /**
     * Why the connection failed: WhatsApp's own words, in the language of the account it refused, when WhatsApp answered; our own explanation when the number was refused before WhatsApp was asked; a generic sentence when WhatsApp refused without giving a reason. Absent when the attempt failed without ever reaching WhatsApp, which leaves `code` as the only account of the failure. Show it to the person who owns the number; never match on its text.
     *
     * @var string|null
     */
    protected $description;
    /**
     * WhatsApp's most specific code for the refusal: its error subcode where it sent one, otherwise its top-level code. Null when WhatsApp did not provide a code. Treat it as an opaque string.
     *
     * @var string|null
     */
    protected $metaErrorCode;
    /**
     * Standardized failure reason.
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * Standardized failure reason.
     *
     * @param string|null $code
     *
     * @return self
     */
    public function setCode(?string $code): self
    {
        $this->initialized['code'] = true;
        $this->code = $code;
        return $this;
    }
    /**
     * Why the connection failed: WhatsApp's own words, in the language of the account it refused, when WhatsApp answered; our own explanation when the number was refused before WhatsApp was asked; a generic sentence when WhatsApp refused without giving a reason. Absent when the attempt failed without ever reaching WhatsApp, which leaves `code` as the only account of the failure. Show it to the person who owns the number; never match on its text.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Why the connection failed: WhatsApp's own words, in the language of the account it refused, when WhatsApp answered; our own explanation when the number was refused before WhatsApp was asked; a generic sentence when WhatsApp refused without giving a reason. Absent when the attempt failed without ever reaching WhatsApp, which leaves `code` as the only account of the failure. Show it to the person who owns the number; never match on its text.
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
     * WhatsApp's most specific code for the refusal: its error subcode where it sent one, otherwise its top-level code. Null when WhatsApp did not provide a code. Treat it as an opaque string.
     *
     * @return string|null
     */
    public function getMetaErrorCode(): ?string
    {
        return $this->metaErrorCode;
    }
    /**
     * WhatsApp's most specific code for the refusal: its error subcode where it sent one, otherwise its top-level code. Null when WhatsApp did not provide a code. Treat it as an opaque string.
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
