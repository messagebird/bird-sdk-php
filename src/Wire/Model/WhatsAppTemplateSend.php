<?php

namespace MessageBird\Wire\Model;

/**
 * Supply exactly one of `id` or `slug`, optionally a language, and fill required placeholders through `parameters` or `components`.
 */
class WhatsAppTemplateSend
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
     * Template slug, such as `bird_otp`.
     *
     * @var string|null
     */
    protected $slug;
    /**
     * BCP-47 tag (`en-US`; `en_US` also accepted). Defaults to the template's default language unless `language_source_required` is set. Missing variants follow `on_missing_language`. The resolved language determines pricing and is echoed in the accepted message.
     *
     * @var string|null
     */
    protected $language;
    /**
     * Multiplies `optimization_spec.bid_amount` × country multiplier for this message. Range 0.01–100; default 1. Requires `optimization_spec` on a marketing template language.
     *
     * @var float|null
     */
    protected $bidMultiplier;
    /**
     * The template's inputs as one map, instead of `components`. Each key is a name in the version's `variables`: a placeholder's own name, or its number (`1`, `2`) for a numbered placeholder, `header_url` (or `header_url_1`, `header_url_2` for a carousel card), `header_filename`, `header_location` and `code` for values with no placeholder, `button_url` (or `button_url_1`, `button_url_2` for a carousel card) for a numbered URL suffix, or an input a parameter binding reads. A media header left out, or whose value is empty, sends the template's approved sample; a template without one, such as one imported from WhatsApp, needs its media URL. A value is a string, number or boolean, except `header_location`, an object with `latitude` and `longitude`, and optionally `name` and `address`. Keys the language does not use are ignored, and `bird` is reserved. At most 16 KB. Send `parameters` or `components`, not both. A template with parameter bindings, or with named variables in a card or a button URL, takes only `parameters`.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $parameters;
    /**
     * Copy each language component's `example_parameters` into that part's `parameters`, replacing examples with real values. Map `buttons` to one `button` part per button with examples, in order; map `carousel` to `cards`, built likewise. A location header requires a `location` parameter. Omit other blocks without examples.
     *
     * @var list<WhatsAppMessageTemplateComponent>|null
     */
    protected $components;
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
     * Template slug, such as `bird_otp`.
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * Template slug, such as `bird_otp`.
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
     * BCP-47 tag (`en-US`; `en_US` also accepted). Defaults to the template's default language unless `language_source_required` is set. Missing variants follow `on_missing_language`. The resolved language determines pricing and is echoed in the accepted message.
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * BCP-47 tag (`en-US`; `en_US` also accepted). Defaults to the template's default language unless `language_source_required` is set. Missing variants follow `on_missing_language`. The resolved language determines pricing and is echoed in the accepted message.
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
     * Multiplies `optimization_spec.bid_amount` × country multiplier for this message. Range 0.01–100; default 1. Requires `optimization_spec` on a marketing template language.
     *
     * @return float|null
     */
    public function getBidMultiplier(): ?float
    {
        return $this->bidMultiplier;
    }
    /**
     * Multiplies `optimization_spec.bid_amount` × country multiplier for this message. Range 0.01–100; default 1. Requires `optimization_spec` on a marketing template language.
     *
     * @param float|null $bidMultiplier
     *
     * @return self
     */
    public function setBidMultiplier(?float $bidMultiplier): self
    {
        $this->initialized['bidMultiplier'] = true;
        $this->bidMultiplier = $bidMultiplier;
        return $this;
    }
    /**
     * The template's inputs as one map, instead of `components`. Each key is a name in the version's `variables`: a placeholder's own name, or its number (`1`, `2`) for a numbered placeholder, `header_url` (or `header_url_1`, `header_url_2` for a carousel card), `header_filename`, `header_location` and `code` for values with no placeholder, `button_url` (or `button_url_1`, `button_url_2` for a carousel card) for a numbered URL suffix, or an input a parameter binding reads. A media header left out, or whose value is empty, sends the template's approved sample; a template without one, such as one imported from WhatsApp, needs its media URL. A value is a string, number or boolean, except `header_location`, an object with `latitude` and `longitude`, and optionally `name` and `address`. Keys the language does not use are ignored, and `bird` is reserved. At most 16 KB. Send `parameters` or `components`, not both. A template with parameter bindings, or with named variables in a card or a button URL, takes only `parameters`.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getParameters(): ?iterable
    {
        return $this->parameters;
    }
    /**
     * The template's inputs as one map, instead of `components`. Each key is a name in the version's `variables`: a placeholder's own name, or its number (`1`, `2`) for a numbered placeholder, `header_url` (or `header_url_1`, `header_url_2` for a carousel card), `header_filename`, `header_location` and `code` for values with no placeholder, `button_url` (or `button_url_1`, `button_url_2` for a carousel card) for a numbered URL suffix, or an input a parameter binding reads. A media header left out, or whose value is empty, sends the template's approved sample; a template without one, such as one imported from WhatsApp, needs its media URL. A value is a string, number or boolean, except `header_location`, an object with `latitude` and `longitude`, and optionally `name` and `address`. Keys the language does not use are ignored, and `bird` is reserved. At most 16 KB. Send `parameters` or `components`, not both. A template with parameter bindings, or with named variables in a card or a button URL, takes only `parameters`.
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
    /**
     * Copy each language component's `example_parameters` into that part's `parameters`, replacing examples with real values. Map `buttons` to one `button` part per button with examples, in order; map `carousel` to `cards`, built likewise. A location header requires a `location` parameter. Omit other blocks without examples.
     *
     * @return list<WhatsAppMessageTemplateComponent>|null
     */
    public function getComponents(): ?array
    {
        return $this->components;
    }
    /**
     * Copy each language component's `example_parameters` into that part's `parameters`, replacing examples with real values. Map `buttons` to one `button` part per button with examples, in order; map `carousel` to `cards`, built likewise. A location header requires a `location` parameter. Omit other blocks without examples.
     *
     * @param list<WhatsAppMessageTemplateComponent>|null $components
     *
     * @return self
     */
    public function setComponents(?array $components): self
    {
        $this->initialized['components'] = true;
        $this->components = $components;
        return $this;
    }
}
