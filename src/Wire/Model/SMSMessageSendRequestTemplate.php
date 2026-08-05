<?php

namespace MessageBird\Wire\Model;

class SMSMessageSendRequestTemplate extends \ArrayObject
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
     * The template to send, by its name handle (for example `bird_otp_verification`). Browse the available templates and their variables with the templates endpoint.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * Which of the template's localized bodies to send, as a BCP-47 tag. Falls back to the closest available language, then English, when the exact tag is not stocked. Omit for English.
     * 
     *
     * @var string|null
     */
    protected $language;
    /**
     * Values for the template's variables, keyed by variable name. The accepted keys and their formats are fixed per template (the template's `variables` on the templates endpoint). A missing required variable, an undeclared key, a value that does not match its variable's format, or a serialized payload over 16 KB each return a `422`.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $parameters;
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
     * The template to send, by its name handle (for example `bird_otp_verification`). Browse the available templates and their variables with the templates endpoint.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The template to send, by its name handle (for example `bird_otp_verification`). Browse the available templates and their variables with the templates endpoint.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Which of the template's localized bodies to send, as a BCP-47 tag. Falls back to the closest available language, then English, when the exact tag is not stocked. Omit for English.
     * 
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * Which of the template's localized bodies to send, as a BCP-47 tag. Falls back to the closest available language, then English, when the exact tag is not stocked. Omit for English.
     *
     * @param string|null $language
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->initialized['language'] = true;
        $this->language = $language;
        return $this;
    }
    /**
     * Values for the template's variables, keyed by variable name. The accepted keys and their formats are fixed per template (the template's `variables` on the templates endpoint). A missing required variable, an undeclared key, a value that does not match its variable's format, or a serialized payload over 16 KB each return a `422`.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getParameters(): ?iterable
    {
        return $this->parameters;
    }
    /**
     * Values for the template's variables, keyed by variable name. The accepted keys and their formats are fixed per template (the template's `variables` on the templates endpoint). A missing required variable, an undeclared key, a value that does not match its variable's format, or a serialized payload over 16 KB each return a `422`.
     *
     * @param array<string, mixed>|null $parameters
     *
     * @return self
     */
    public function setParameters(?iterable $parameters): self
    {
        $this->initialized['parameters'] = true;
        $this->parameters = $parameters;
        return $this;
    }
}
