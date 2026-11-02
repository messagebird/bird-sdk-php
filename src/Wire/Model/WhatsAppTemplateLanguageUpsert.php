<?php

namespace MessageBird\Wire\Model;

/**
 * One language's content, as written to a draft.
 */
class WhatsAppTemplateLanguageUpsert
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
     * This language's maximum price. Omit it to keep the current one. A new language written without it uses Meta's standard rate. Send `null` to return to the standard rate. Changing only the price updates Meta without a new review. A send at a maximum price needs the business account's `marketing_messages_onboarding_status` to be `onboarded`. Otherwise it fails with WhatsApp error 131061.
     * 
     *
     * @var WhatsAppTemplateLanguageUpsertOptimizationSpec|null
     */
    protected $optimizationSpec;
    /**
     * How long WhatsApp keeps trying to deliver a message from this language, in seconds. WhatsApp drops a message it cannot deliver in that time. Omit it to keep the current value. Send `null` to use WhatsApp's default: 10 minutes for authentication, 30 days for utility and marketing. A new language written without it uses WhatsApp's default. The range depends on the language's `category`: 30 to 900 for authentication, 30 to 43200 for utility, and 43200 to 1209600 for marketing. A value outside 30 to 1209600 fails request validation; one inside it but outside the category's range fails with `WhatsAppTemplateTTLOutOfRange`. On a marketing template, the value applies while the business account's `marketing_messages_onboarding_status` is `onboarded`. Changing only this value updates WhatsApp without a new review.
     * 
     *
     * @var int|null
     */
    protected $messageSendTtlSeconds;
    /**
     * The template's content blocks for this language. Header, footer and buttons are optional. Every variable needs an example value, which is what Meta reviews against. May be omitted or empty on a draft; a body block is required before the language can be submitted.
     * 
     *
     * @var list<WhatsAppTemplateComponentWrite>|null
     */
    protected $components;
    /**
     * The revision you last read for this language, making the write a compare-and-set: a mismatch is refused with a conflict, leaving an edit you have not seen in place. Omit it for last-write-wins, which is what a single writer wants. Supplying it for a language that does not exist is also refused with a conflict rather than recreating the language. Inside a template's initial languages seed on create, a value here is refused, since no prior revision exists yet to compare against.
     * 
     *
     * @var int|null
     */
    protected $revision;
    /**
     * This language's maximum price. Omit it to keep the current one. A new language written without it uses Meta's standard rate. Send `null` to return to the standard rate. Changing only the price updates Meta without a new review. A send at a maximum price needs the business account's `marketing_messages_onboarding_status` to be `onboarded`. Otherwise it fails with WhatsApp error 131061.
     * 
     *
     * @return WhatsAppTemplateLanguageUpsertOptimizationSpec|null
     */
    public function getOptimizationSpec(): ?WhatsAppTemplateLanguageUpsertOptimizationSpec
    {
        return $this->optimizationSpec;
    }
    /**
     * This language's maximum price. Omit it to keep the current one. A new language written without it uses Meta's standard rate. Send `null` to return to the standard rate. Changing only the price updates Meta without a new review. A send at a maximum price needs the business account's `marketing_messages_onboarding_status` to be `onboarded`. Otherwise it fails with WhatsApp error 131061.
     *
     * @param WhatsAppTemplateLanguageUpsertOptimizationSpec|null $optimizationSpec
     *
     * @return self
     */
    public function setOptimizationSpec(?WhatsAppTemplateLanguageUpsertOptimizationSpec $optimizationSpec): self
    {
        $this->initialized['optimizationSpec'] = true;
        $this->optimizationSpec = $optimizationSpec;
        return $this;
    }
    /**
     * How long WhatsApp keeps trying to deliver a message from this language, in seconds. WhatsApp drops a message it cannot deliver in that time. Omit it to keep the current value. Send `null` to use WhatsApp's default: 10 minutes for authentication, 30 days for utility and marketing. A new language written without it uses WhatsApp's default. The range depends on the language's `category`: 30 to 900 for authentication, 30 to 43200 for utility, and 43200 to 1209600 for marketing. A value outside 30 to 1209600 fails request validation; one inside it but outside the category's range fails with `WhatsAppTemplateTTLOutOfRange`. On a marketing template, the value applies while the business account's `marketing_messages_onboarding_status` is `onboarded`. Changing only this value updates WhatsApp without a new review.
     * 
     *
     * @return int|null
     */
    public function getMessageSendTtlSeconds(): ?int
    {
        return $this->messageSendTtlSeconds;
    }
    /**
     * How long WhatsApp keeps trying to deliver a message from this language, in seconds. WhatsApp drops a message it cannot deliver in that time. Omit it to keep the current value. Send `null` to use WhatsApp's default: 10 minutes for authentication, 30 days for utility and marketing. A new language written without it uses WhatsApp's default. The range depends on the language's `category`: 30 to 900 for authentication, 30 to 43200 for utility, and 43200 to 1209600 for marketing. A value outside 30 to 1209600 fails request validation; one inside it but outside the category's range fails with `WhatsAppTemplateTTLOutOfRange`. On a marketing template, the value applies while the business account's `marketing_messages_onboarding_status` is `onboarded`. Changing only this value updates WhatsApp without a new review.
     *
     * @param int|null $messageSendTtlSeconds
     *
     * @return self
     */
    public function setMessageSendTtlSeconds(?int $messageSendTtlSeconds): self
    {
        $this->initialized['messageSendTtlSeconds'] = true;
        $this->messageSendTtlSeconds = $messageSendTtlSeconds;
        return $this;
    }
    /**
     * The template's content blocks for this language. Header, footer and buttons are optional. Every variable needs an example value, which is what Meta reviews against. May be omitted or empty on a draft; a body block is required before the language can be submitted.
     * 
     *
     * @return list<WhatsAppTemplateComponentWrite>|null
     */
    public function getComponents(): ?array
    {
        return $this->components;
    }
    /**
     * The template's content blocks for this language. Header, footer and buttons are optional. Every variable needs an example value, which is what Meta reviews against. May be omitted or empty on a draft; a body block is required before the language can be submitted.
     *
     * @param list<WhatsAppTemplateComponentWrite>|null $components
     *
     * @return self
     */
    public function setComponents(?array $components): self
    {
        $this->initialized['components'] = true;
        $this->components = $components;
        return $this;
    }
    /**
     * The revision you last read for this language, making the write a compare-and-set: a mismatch is refused with a conflict, leaving an edit you have not seen in place. Omit it for last-write-wins, which is what a single writer wants. Supplying it for a language that does not exist is also refused with a conflict rather than recreating the language. Inside a template's initial languages seed on create, a value here is refused, since no prior revision exists yet to compare against.
     * 
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * The revision you last read for this language, making the write a compare-and-set: a mismatch is refused with a conflict, leaving an edit you have not seen in place. Omit it for last-write-wins, which is what a single writer wants. Supplying it for a language that does not exist is also refused with a conflict rather than recreating the language. Inside a template's initial languages seed on create, a value here is refused, since no prior revision exists yet to compare against.
     *
     * @param int|null $revision
     *
     * @return self
     */
    public function setRevision(?int $revision): self
    {
        $this->initialized['revision'] = true;
        $this->revision = $revision;
        return $this;
    }
}
