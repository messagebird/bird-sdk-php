<?php

namespace MessageBird\Wire\Model;

class EmailTemplateSubmitResult
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
     * Whether the version passed every check.
     *
     * @var bool|null
     */
    protected $valid;
    /**
     * Every problem found across the draft's languages. Empty when `valid` is `true`.
     * 
     *
     * @var list<EmailTemplateSubmitProblem>|null
     */
    protected $errors;
    /**
     * The version this submit created, or null when it was only a validation run and nothing got frozen. As soon as this is not null, sends already use that version. No further action is required to make it live.
     * 
     *
     * @var EmailTemplateSubmitResultVersion|null
     */
    protected $version;
    /**
     * The template this call addressed, as its id, even when you addressed it by slug. Send it back as `template_ref` on a follow-up call.
     * 
     *
     * @var string|null
     */
    protected $templateRef;
    /**
     * @var string|null
     */
    protected $versionId;
    /**
     * The worst severity across every finding the response was computed from, which
     * is the authoritative reading: a response that caps how many findings it lists
     * still accounts here for the ones it left out. Each response's `compatibility`
     * says which content it covered.
     * 
     * - `problem`: at least one finding is a `problem`.
     * - `warning`: every finding is a `warning`.
     * - `none`: there are no findings.
     * 
     *
     * @var string|null
     */
    protected $compatibilitySeverity;
    /**
     * What the draft's HTML uses that mail clients remove, ignore, or render inconsistently, across every language, in alphabetical order of language tag and then the order the patterns appear. Empty when nothing is worth reporting. Advisory, and separate from `errors`: a finding never fails a submit, so the version froze either way. Each finding names the `language` it is in, and its line and column count in that language's HTML, which the language read returns as `content.html`. At most 200 findings come back, the first 200 in that order, so a draft that reaches the cap can omit a later language's findings entirely rather than trimming each language: read a language's own findings from its read or its write. `compatibility_severity` is derived from every finding the draft produced, including any beyond those 200.
     * 
     *
     * @var list<EmailCompatibilityFinding>|null
     */
    protected $compatibility;
    /**
     * Whether the version passed every check.
     *
     * @return bool|null
     */
    public function getValid(): ?bool
    {
        return $this->valid;
    }
    /**
     * Whether the version passed every check.
     *
     * @param bool|null $valid
     *
     * @return self
     */
    public function setValid(?bool $valid): self
    {
        $this->initialized['valid'] = true;
        $this->valid = $valid;
        return $this;
    }
    /**
     * Every problem found across the draft's languages. Empty when `valid` is `true`.
     * 
     *
     * @return list<EmailTemplateSubmitProblem>|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }
    /**
     * Every problem found across the draft's languages. Empty when `valid` is `true`.
     *
     * @param list<EmailTemplateSubmitProblem>|null $errors
     *
     * @return self
     */
    public function setErrors(?array $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;
        return $this;
    }
    /**
     * The version this submit created, or null when it was only a validation run and nothing got frozen. As soon as this is not null, sends already use that version. No further action is required to make it live.
     * 
     *
     * @return EmailTemplateSubmitResultVersion|null
     */
    public function getVersion(): ?EmailTemplateSubmitResultVersion
    {
        return $this->version;
    }
    /**
     * The version this submit created, or null when it was only a validation run and nothing got frozen. As soon as this is not null, sends already use that version. No further action is required to make it live.
     *
     * @param EmailTemplateSubmitResultVersion|null $version
     *
     * @return self
     */
    public function setVersion(?EmailTemplateSubmitResultVersion $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;
        return $this;
    }
    /**
     * The template this call addressed, as its id, even when you addressed it by slug. Send it back as `template_ref` on a follow-up call.
     * 
     *
     * @return string|null
     */
    public function getTemplateRef(): ?string
    {
        return $this->templateRef;
    }
    /**
     * The template this call addressed, as its id, even when you addressed it by slug. Send it back as `template_ref` on a follow-up call.
     *
     * @param string|null $templateRef
     *
     * @return self
     */
    public function setTemplateRef(?string $templateRef): self
    {
        $this->initialized['templateRef'] = true;
        $this->templateRef = $templateRef;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getVersionId(): ?string
    {
        return $this->versionId;
    }
    /**
     * @param string|null $versionId
     *
     * @return self
     */
    public function setVersionId(?string $versionId): self
    {
        $this->initialized['versionId'] = true;
        $this->versionId = $versionId;
        return $this;
    }
    /**
     * The worst severity across every finding the response was computed from, which
     * is the authoritative reading: a response that caps how many findings it lists
     * still accounts here for the ones it left out. Each response's `compatibility`
     * says which content it covered.
     * 
     * - `problem`: at least one finding is a `problem`.
     * - `warning`: every finding is a `warning`.
     * - `none`: there are no findings.
     * 
     *
     * @return string|null
     */
    public function getCompatibilitySeverity(): ?string
    {
        return $this->compatibilitySeverity;
    }
    /**
    * The worst severity across every finding the response was computed from, which
    is the authoritative reading: a response that caps how many findings it lists
    still accounts here for the ones it left out. Each response's `compatibility`
    says which content it covered.
    
    - `problem`: at least one finding is a `problem`.
    - `warning`: every finding is a `warning`.
    - `none`: there are no findings.
    
    *
    * @param string|null $compatibilitySeverity
    *
    * @return self
    */
    public function setCompatibilitySeverity(?string $compatibilitySeverity): self
    {
        $this->initialized['compatibilitySeverity'] = true;
        $this->compatibilitySeverity = $compatibilitySeverity;
        return $this;
    }
    /**
     * What the draft's HTML uses that mail clients remove, ignore, or render inconsistently, across every language, in alphabetical order of language tag and then the order the patterns appear. Empty when nothing is worth reporting. Advisory, and separate from `errors`: a finding never fails a submit, so the version froze either way. Each finding names the `language` it is in, and its line and column count in that language's HTML, which the language read returns as `content.html`. At most 200 findings come back, the first 200 in that order, so a draft that reaches the cap can omit a later language's findings entirely rather than trimming each language: read a language's own findings from its read or its write. `compatibility_severity` is derived from every finding the draft produced, including any beyond those 200.
     * 
     *
     * @return list<EmailCompatibilityFinding>|null
     */
    public function getCompatibility(): ?array
    {
        return $this->compatibility;
    }
    /**
     * What the draft's HTML uses that mail clients remove, ignore, or render inconsistently, across every language, in alphabetical order of language tag and then the order the patterns appear. Empty when nothing is worth reporting. Advisory, and separate from `errors`: a finding never fails a submit, so the version froze either way. Each finding names the `language` it is in, and its line and column count in that language's HTML, which the language read returns as `content.html`. At most 200 findings come back, the first 200 in that order, so a draft that reaches the cap can omit a later language's findings entirely rather than trimming each language: read a language's own findings from its read or its write. `compatibility_severity` is derived from every finding the draft produced, including any beyond those 200.
     *
     * @param list<EmailCompatibilityFinding>|null $compatibility
     *
     * @return self
     */
    public function setCompatibility(?array $compatibility): self
    {
        $this->initialized['compatibility'] = true;
        $this->compatibility = $compatibility;
        return $this;
    }
}
