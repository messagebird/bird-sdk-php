<?php

namespace MessageBird\Wire\Model;

/**
 * A sign-in message template reference. Identify the template by `id` or `slug`. Supply exactly one reference, optionally select a language, and pass variable values in `parameters`.
 */
class AMBAuthenticationTemplate
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
     * The workspace or built-in sign-in message template to send, by its immutable slug. Read the template's live version to see its variables.
     * 
     *
     * @var string|null
     */
    protected $slug;
    /**
     * Which of the template's languages to send. When the template does not have the language you ask for, its `on_missing_language` setting decides whether the closest available language is sent instead or the request is rejected. Omit it to send the first of these the template has: the conversation's locale, the business's default locale, then the template's default language. A request that omits it is never rejected for its language, and `language_source_required` does not apply.
     * 
     *
     * @var string|null
     */
    protected $language;
    /**
     * Values for the template's variables, keyed by variable name. Read the live version to see the accepted keys and formats. A missing required key, an undeclared key, an invalid value, or a serialized object over 16 KiB returns `422`.
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
     * The workspace or built-in sign-in message template to send, by its immutable slug. Read the template's live version to see its variables.
     * 
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The workspace or built-in sign-in message template to send, by its immutable slug. Read the template's live version to see its variables.
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
     * Which of the template's languages to send. When the template does not have the language you ask for, its `on_missing_language` setting decides whether the closest available language is sent instead or the request is rejected. Omit it to send the first of these the template has: the conversation's locale, the business's default locale, then the template's default language. A request that omits it is never rejected for its language, and `language_source_required` does not apply.
     * 
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * Which of the template's languages to send. When the template does not have the language you ask for, its `on_missing_language` setting decides whether the closest available language is sent instead or the request is rejected. Omit it to send the first of these the template has: the conversation's locale, the business's default locale, then the template's default language. A request that omits it is never rejected for its language, and `language_source_required` does not apply.
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
     * Values for the template's variables, keyed by variable name. Read the live version to see the accepted keys and formats. A missing required key, an undeclared key, an invalid value, or a serialized object over 16 KiB returns `422`.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getParameters(): ?iterable
    {
        return $this->parameters;
    }
    /**
     * Values for the template's variables, keyed by variable name. Read the live version to see the accepted keys and formats. A missing required key, an undeclared key, an invalid value, or a serialized object over 16 KiB returns `422`.
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
