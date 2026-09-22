<?php

namespace MessageBird\Wire\Model;

class EmailTemplateCreate
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
     * The template's workspace-unique handle, and a stable alternative to the template ID when sending by template. It can contain lowercase letters, numbers, hyphens, and underscores. It is fixed at creation, so pick it deliberately. Two prefixes are rejected: `bird_`, reserved for our built-in templates, and `emt_`, the template ID format, which a slug could never be distinguished from.
     * 
     *
     * @var string|null
     */
    protected $slug;
    /**
     * The template's display name, shown wherever the template is listed. You can change it any time. It defaults to the slug if you do not set one.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * What the template is for, in your own words.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Whether the template is for `transactional` email or `marketing` email.
     *
     * @var string|null
     */
    protected $category;
    /**
     * The authoring format the template is written in, fixed at creation.
     * `html` is finished markup you provide, optionally personalized with
     * Liquid. Liquid supports variables, filters, and control flow such
     * as `{% if %}` conditionals and `{% for %}` loops. A few constructs are
     * rejected when you submit, and the error names exactly what to change:
     * 
     * - Partial includes (`{% include %}`, `{% render %}`).
     * - The `increment`, `decrement`, and `ifchanged` tags.
     * - The `money`, `format_date`, `format_time`, `json`, `inspect`, and `type` filters.
     * - Comparing against `empty`/`blank` (use `.size == 0` instead).
     * - Blocks nested far deeper than real email markup needs.
     * 
     * A broadcast's template additionally cannot use a `{% for %}` loop,
     * because a broadcast supplies one value per contact property, so there
     * is nothing to iterate. Send with the messages API instead if the
     * template needs one.
     * 
     *
     * @var string|null
     */
    protected $source;
    /**
     * The initial draft's content, keyed by language tag in BCP-47 form such as
     * `en` or `pt-BR`. A template holds up to 25 languages, and a send picks one
     * of them.
     * 
     * Omit this to create an empty draft and add content later.
     * 
     *
     * @var array<string, EmailTemplateLanguageContent>|null
     */
    protected $languages;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $defaultLanguage;
    /**
     * What a send does when it asks for a language this template does not carry. Defaults to `fallback` on email.
     * 
     *
     * @var string|null
     */
    protected $onMissingLanguage = 'fallback';
    /**
     * Whether a send has to name a language. Set it to true to reject a send that names none instead of serving the default language. Pair it with `on_missing_language: fail` when every send must pick a language deliberately: on its own, `fail` is bypassed by naming no language at all. A broadcast must select a template language when this is set. Defaults to false.
     * 
     *
     * @var bool|null
     */
    protected $languageSourceRequired = false;
    /**
     * The template's workspace-unique handle, and a stable alternative to the template ID when sending by template. It can contain lowercase letters, numbers, hyphens, and underscores. It is fixed at creation, so pick it deliberately. Two prefixes are rejected: `bird_`, reserved for our built-in templates, and `emt_`, the template ID format, which a slug could never be distinguished from.
     * 
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The template's workspace-unique handle, and a stable alternative to the template ID when sending by template. It can contain lowercase letters, numbers, hyphens, and underscores. It is fixed at creation, so pick it deliberately. Two prefixes are rejected: `bird_`, reserved for our built-in templates, and `emt_`, the template ID format, which a slug could never be distinguished from.
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
     * The template's display name, shown wherever the template is listed. You can change it any time. It defaults to the slug if you do not set one.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The template's display name, shown wherever the template is listed. You can change it any time. It defaults to the slug if you do not set one.
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
     * What the template is for, in your own words.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * What the template is for, in your own words.
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
     * Whether the template is for `transactional` email or `marketing` email.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Whether the template is for `transactional` email or `marketing` email.
     *
     * @param string|null $category
     *
     * @return self
     */
    public function setCategory(?string $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;
        return $this;
    }
    /**
     * The authoring format the template is written in, fixed at creation.
     * `html` is finished markup you provide, optionally personalized with
     * Liquid. Liquid supports variables, filters, and control flow such
     * as `{% if %}` conditionals and `{% for %}` loops. A few constructs are
     * rejected when you submit, and the error names exactly what to change:
     * 
     * - Partial includes (`{% include %}`, `{% render %}`).
     * - The `increment`, `decrement`, and `ifchanged` tags.
     * - The `money`, `format_date`, `format_time`, `json`, `inspect`, and `type` filters.
     * - Comparing against `empty`/`blank` (use `.size == 0` instead).
     * - Blocks nested far deeper than real email markup needs.
     * 
     * A broadcast's template additionally cannot use a `{% for %}` loop,
     * because a broadcast supplies one value per contact property, so there
     * is nothing to iterate. Send with the messages API instead if the
     * template needs one.
     * 
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
    * The authoring format the template is written in, fixed at creation.
    `html` is finished markup you provide, optionally personalized with
    Liquid. Liquid supports variables, filters, and control flow such
    as `{% if %}` conditionals and `{% for %}` loops. A few constructs are
    rejected when you submit, and the error names exactly what to change:
    
    - Partial includes (`{% include %}`, `{% render %}`).
    - The `increment`, `decrement`, and `ifchanged` tags.
    - The `money`, `format_date`, `format_time`, `json`, `inspect`, and `type` filters.
    - Comparing against `empty`/`blank` (use `.size == 0` instead).
    - Blocks nested far deeper than real email markup needs.
    
    A broadcast's template additionally cannot use a `{% for %}` loop,
    because a broadcast supplies one value per contact property, so there
    is nothing to iterate. Send with the messages API instead if the
    template needs one.
    
    *
    * @param string|null $source
    *
    * @return self
    */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;
        return $this;
    }
    /**
     * The initial draft's content, keyed by language tag in BCP-47 form such as
     * `en` or `pt-BR`. A template holds up to 25 languages, and a send picks one
     * of them.
     * 
     * Omit this to create an empty draft and add content later.
     * 
     *
     * @return array<string, EmailTemplateLanguageContent>|null
     */
    public function getLanguages(): ?iterable
    {
        return $this->languages;
    }
    /**
    * The initial draft's content, keyed by language tag in BCP-47 form such as
    `en` or `pt-BR`. A template holds up to 25 languages, and a send picks one
    of them.
    
    Omit this to create an empty draft and add content later.
    
    *
    * @param array<string, EmailTemplateLanguageContent>|null $languages
    *
    * @return self
    */
    public function setLanguages(?iterable $languages): self
    {
        $this->initialized['languages'] = true;
        $this->languages = $languages;
        return $this;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @return string|null
     */
    public function getDefaultLanguage(): ?string
    {
        return $this->defaultLanguage;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @param string|null $defaultLanguage
     *
     * @return self
     */
    public function setDefaultLanguage(?string $defaultLanguage): self
    {
        $this->initialized['defaultLanguage'] = true;
        $this->defaultLanguage = $defaultLanguage;
        return $this;
    }
    /**
     * What a send does when it asks for a language this template does not carry. Defaults to `fallback` on email.
     * 
     *
     * @return string|null
     */
    public function getOnMissingLanguage(): ?string
    {
        return $this->onMissingLanguage;
    }
    /**
     * What a send does when it asks for a language this template does not carry. Defaults to `fallback` on email.
     *
     * @param string|null $onMissingLanguage
     *
     * @return self
     */
    public function setOnMissingLanguage(?string $onMissingLanguage): self
    {
        $this->initialized['onMissingLanguage'] = true;
        $this->onMissingLanguage = $onMissingLanguage;
        return $this;
    }
    /**
     * Whether a send has to name a language. Set it to true to reject a send that names none instead of serving the default language. Pair it with `on_missing_language: fail` when every send must pick a language deliberately: on its own, `fail` is bypassed by naming no language at all. A broadcast must select a template language when this is set. Defaults to false.
     * 
     *
     * @return bool|null
     */
    public function getLanguageSourceRequired(): ?bool
    {
        return $this->languageSourceRequired;
    }
    /**
     * Whether a send has to name a language. Set it to true to reject a send that names none instead of serving the default language. Pair it with `on_missing_language: fail` when every send must pick a language deliberately: on its own, `fail` is bypassed by naming no language at all. A broadcast must select a template language when this is set. Defaults to false.
     *
     * @param bool|null $languageSourceRequired
     *
     * @return self
     */
    public function setLanguageSourceRequired(?bool $languageSourceRequired): self
    {
        $this->initialized['languageSourceRequired'] = true;
        $this->languageSourceRequired = $languageSourceRequired;
        return $this;
    }
}
