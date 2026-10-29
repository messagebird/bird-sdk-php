<?php

namespace MessageBird\Wire\Model;

/**
 * Supply exactly one of `id` or `slug`, optionally a language, and fill required placeholders through `components`.
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
