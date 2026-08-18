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
     * The template to send, by its slug handle (for example `bird_otp_verification`). Browse the available templates and their variables with the templates endpoint.
     * 
     *
     * @var string|null
     */
    protected $slug;
    /**
     * Deprecated: use `slug` instead. Resolved as a slug first, and only if that finds nothing, matched against the template's display name.
     * 
     *
     * @deprecated
     *
     * @var string|null
     */
    protected $name;
    /**
     * Which of the template's languages to send. Omit it to send the template's default language, unless the template sets `language_source_required`, in which case a send naming no language is rejected. When the template does not carry the language you ask for, its own `on_missing_language` setting decides whether the closest available language is sent instead or the send is rejected.
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
     * The template to send, by its slug handle (for example `bird_otp_verification`). Browse the available templates and their variables with the templates endpoint.
     * 
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The template to send, by its slug handle (for example `bird_otp_verification`). Browse the available templates and their variables with the templates endpoint.
     *
     * @param string|null $slug
     *
     * @return self
     */
    public function setSlug(?string $slug): self
    {
        $this->initialized['slug'] = true;
        $this->slug = $slug;
        return $this;
    }
    /**
     * Deprecated: use `slug` instead. Resolved as a slug first, and only if that finds nothing, matched against the template's display name.
     * 
     *
     * @deprecated
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Deprecated: use `slug` instead. Resolved as a slug first, and only if that finds nothing, matched against the template's display name.
     *
     * @param string|null $name
     *
     * @deprecated
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
     * Which of the template's languages to send. Omit it to send the template's default language, unless the template sets `language_source_required`, in which case a send naming no language is rejected. When the template does not carry the language you ask for, its own `on_missing_language` setting decides whether the closest available language is sent instead or the send is rejected.
     * 
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * Which of the template's languages to send. Omit it to send the template's default language, unless the template sets `language_source_required`, in which case a send naming no language is rejected. When the template does not carry the language you ask for, its own `on_missing_language` setting decides whether the closest available language is sent instead or the send is rejected.
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
