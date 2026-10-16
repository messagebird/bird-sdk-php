<?php

namespace MessageBird\Wire\Model;

/**
 * The parameters and variables a template's current published content uses in one exact language, across its subject, HTML and plain-text body. The HTML includes its inbox preview text. This describes the template and holds no parameter or contact values.
 */
class EmailTemplateParameters
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
     * An opaque value that changes when this content or the parameters and variables it uses change, including for built-in templates whose version ID stays the same. Compare it with an earlier value to tell whether they are still the same. Do not parse it.
     *
     * @var string|null
     */
    protected $requirementsFingerprint;
    /**
     * The parameters the broadcast supplies, sorted by name.
     *
     * @var list<EmailTemplateParameter>|null
     */
    protected $parameters;
    /**
     * The `bird.` variables Bird fills in, sorted by path.
     *
     * @var list<EmailTemplateVariable>|null
     */
    protected $variables;
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
     * An opaque value that changes when this content or the parameters and variables it uses change, including for built-in templates whose version ID stays the same. Compare it with an earlier value to tell whether they are still the same. Do not parse it.
     *
     * @return string|null
     */
    public function getRequirementsFingerprint(): ?string
    {
        return $this->requirementsFingerprint;
    }
    /**
     * An opaque value that changes when this content or the parameters and variables it uses change, including for built-in templates whose version ID stays the same. Compare it with an earlier value to tell whether they are still the same. Do not parse it.
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
     * The parameters the broadcast supplies, sorted by name.
     *
     * @return list<EmailTemplateParameter>|null
     */
    public function getParameters(): ?array
    {
        return $this->parameters;
    }
    /**
     * The parameters the broadcast supplies, sorted by name.
     *
     * @param list<EmailTemplateParameter>|null $parameters
     *
     * @return self
     */
    public function setParameters(?array $parameters): self
    {
        $this->initialized['parameters'] = true;
        $this->parameters = $parameters;
        return $this;
    }
    /**
     * The `bird.` variables Bird fills in, sorted by path.
     *
     * @return list<EmailTemplateVariable>|null
     */
    public function getVariables(): ?array
    {
        return $this->variables;
    }
    /**
     * The `bird.` variables Bird fills in, sorted by path.
     *
     * @param list<EmailTemplateVariable>|null $variables
     *
     * @return self
     */
    public function setVariables(?array $variables): self
    {
        $this->initialized['variables'] = true;
        $this->variables = $variables;
        return $this;
    }
}
