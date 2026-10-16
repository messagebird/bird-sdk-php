<?php

namespace MessageBird\Wire\Model;

/**
 * The published template version and language a validation or preview checked. It does not fix the version a later send uses.
 */
class EmailBroadcastResolution
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
    protected $templateId;
    /**
     * @var string|null
     */
    protected $observedVersionId;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $requestedLanguage;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $effectiveLanguage;
    /**
     * An opaque value that changes when the checked version, its content or the inputs it uses change. Compare it with an earlier value to tell whether the requirements are still the same. Do not parse it.
     *
     * @var string|null
     */
    protected $requirementsFingerprint;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $defaultLanguage;
    /**
     * @return string|null
     */
    public function getTemplateId(): ?string
    {
        return $this->templateId;
    }
    /**
     * @param string|null $templateId
     *
     * @return self
     */
    public function setTemplateId(?string $templateId): self
    {
        $this->initialized['templateId'] = true;
        $this->templateId = $templateId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getObservedVersionId(): ?string
    {
        return $this->observedVersionId;
    }
    /**
     * @param string|null $observedVersionId
     *
     * @return self
     */
    public function setObservedVersionId(?string $observedVersionId): self
    {
        $this->initialized['observedVersionId'] = true;
        $this->observedVersionId = $observedVersionId;
        return $this;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @return string|null
     */
    public function getRequestedLanguage(): ?string
    {
        return $this->requestedLanguage;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @param string|null $requestedLanguage
     *
     * @return self
     */
    public function setRequestedLanguage(?string $requestedLanguage): self
    {
        $this->initialized['requestedLanguage'] = true;
        $this->requestedLanguage = $requestedLanguage;
        return $this;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @return string|null
     */
    public function getEffectiveLanguage(): ?string
    {
        return $this->effectiveLanguage;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @param string|null $effectiveLanguage
     *
     * @return self
     */
    public function setEffectiveLanguage(?string $effectiveLanguage): self
    {
        $this->initialized['effectiveLanguage'] = true;
        $this->effectiveLanguage = $effectiveLanguage;
        return $this;
    }
    /**
     * An opaque value that changes when the checked version, its content or the inputs it uses change. Compare it with an earlier value to tell whether the requirements are still the same. Do not parse it.
     *
     * @return string|null
     */
    public function getRequirementsFingerprint(): ?string
    {
        return $this->requirementsFingerprint;
    }
    /**
     * An opaque value that changes when the checked version, its content or the inputs it uses change. Compare it with an earlier value to tell whether the requirements are still the same. Do not parse it.
     *
     * @param string|null $requirementsFingerprint
     *
     * @return self
     */
    public function setRequirementsFingerprint(?string $requirementsFingerprint): self
    {
        $this->initialized['requirementsFingerprint'] = true;
        $this->requirementsFingerprint = $requirementsFingerprint;
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
}
