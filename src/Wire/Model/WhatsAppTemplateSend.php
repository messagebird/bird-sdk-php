<?php

namespace MessageBird\Wire\Model;

/**
 * A send-by-template reference. Identify the template by its `id` or its `slug` (supply exactly one), optionally name a language, and fill its placeholders through `components`.
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
     * The template to send, by its slug handle (for example `bird_otp`).
     *
     * @var string|null
     */
    protected $slug;
    /**
     * Which of the template's languages to send, as a BCP-47 tag (for example `en-US`; Meta's `en_US` is accepted too). Omit it for the template's default language, unless the template sets `language_source_required`. A language the template lacks is handled by its `on_missing_language` setting. The message is priced at the language it resolves to, which the accepted message echoes.
     * 
     *
     * @var string|null
     */
    protected $language;
    /**
     * Scales the language's maximum price for this message only. The effective bid is the language's `optimization_spec.bid_amount`, times its country multiplier, times this value. At least 0.01 and at most 100; 1 when omitted. Only a language with an `optimization_spec`, on a template still in the `marketing` category, accepts it.
     * 
     *
     * @var float|null
     */
    protected $bidMultiplier;
    /**
     * Values for the template's placeholders. Build it from the template language's `components`: each block's `example_parameters`, with real values, becomes that part's `parameters`. A template's `buttons` block becomes one `button` part per button that has `example_parameters`, in order; a `carousel` becomes one `cards` entry per card, built the same way. A `location` header always needs a part with a `location` parameter. Leave out other blocks without any.
     * 
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
     * The template to send, by its slug handle (for example `bird_otp`).
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The template to send, by its slug handle (for example `bird_otp`).
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
     * Which of the template's languages to send, as a BCP-47 tag (for example `en-US`; Meta's `en_US` is accepted too). Omit it for the template's default language, unless the template sets `language_source_required`. A language the template lacks is handled by its `on_missing_language` setting. The message is priced at the language it resolves to, which the accepted message echoes.
     * 
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * Which of the template's languages to send, as a BCP-47 tag (for example `en-US`; Meta's `en_US` is accepted too). Omit it for the template's default language, unless the template sets `language_source_required`. A language the template lacks is handled by its `on_missing_language` setting. The message is priced at the language it resolves to, which the accepted message echoes.
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
     * Scales the language's maximum price for this message only. The effective bid is the language's `optimization_spec.bid_amount`, times its country multiplier, times this value. At least 0.01 and at most 100; 1 when omitted. Only a language with an `optimization_spec`, on a template still in the `marketing` category, accepts it.
     * 
     *
     * @return float|null
     */
    public function getBidMultiplier(): ?float
    {
        return $this->bidMultiplier;
    }
    /**
     * Scales the language's maximum price for this message only. The effective bid is the language's `optimization_spec.bid_amount`, times its country multiplier, times this value. At least 0.01 and at most 100; 1 when omitted. Only a language with an `optimization_spec`, on a template still in the `marketing` category, accepts it.
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
     * Values for the template's placeholders. Build it from the template language's `components`: each block's `example_parameters`, with real values, becomes that part's `parameters`. A template's `buttons` block becomes one `button` part per button that has `example_parameters`, in order; a `carousel` becomes one `cards` entry per card, built the same way. A `location` header always needs a part with a `location` parameter. Leave out other blocks without any.
     * 
     *
     * @return list<WhatsAppMessageTemplateComponent>|null
     */
    public function getComponents(): ?array
    {
        return $this->components;
    }
    /**
     * Values for the template's placeholders. Build it from the template language's `components`: each block's `example_parameters`, with real values, becomes that part's `parameters`. A template's `buttons` block becomes one `button` part per button that has `example_parameters`, in order; a `carousel` becomes one `cards` entry per card, built the same way. A `location` header always needs a part with a `location` parameter. Leave out other blocks without any.
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
