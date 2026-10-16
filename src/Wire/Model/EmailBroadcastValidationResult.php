<?php

namespace MessageBird\Wire\Model;

/**
 * Whether the broadcast's current template and inputs pass validation. Validation does not save, fix a template version or evaluate recipients.
 */
class EmailBroadcastValidationResult
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
     * Whether the current template and supplied broadcast inputs pass validation, including checks that the sender and audience can be used. Sending also checks permissions, limits, the audience's recipients and their values, so `true` does not guarantee the broadcast sends.
     *
     * @var bool|null
     */
    protected $readyForAdmission;
    /**
     * The published template version and language a validation or preview checked. It does not fix the version a later send uses.
     *
     * @var EmailBroadcastResolution|null
     */
    protected $resolution;
    /**
     * The problems found. Empty when `ready_for_admission` is true.
     *
     * @var list<EmailBroadcastParameterProblem>|null
     */
    protected $problems;
    /**
     * Names supplied in `template.parameters`, or in the selected language's `template.parameter_overrides` entry, that the selected content and envelope do not use. Rendering the selected content ignores them. With `template.parameter_overrides`, this can include a name in `base_parameters` that only the default language uses, and `template.parameters` must still hold its value.
     * 
     *
     * @var list<string>|null
     */
    protected $unusedParameters;
    /**
     * Input names `template.parameters` must hold, returned with `resolution`. Without `template.parameter_overrides` these are the inputs the selected language uses. With it they are every input the default language's content or the envelope uses, including names the selected language does not use.
     *
     * @var list<string>|null
     */
    protected $baseParameters;
    /**
     * Input names only the selected language uses, returned with `resolution`. Each may come from that language's entry in `template.parameter_overrides` or from `template.parameters`. Always empty without `template.parameter_overrides`.
     *
     * @var list<string>|null
     */
    protected $overrideParameters;
    /**
     * Whether the current template and supplied broadcast inputs pass validation, including checks that the sender and audience can be used. Sending also checks permissions, limits, the audience's recipients and their values, so `true` does not guarantee the broadcast sends.
     *
     * @return bool|null
     */
    public function getReadyForAdmission(): ?bool
    {
        return $this->readyForAdmission;
    }
    /**
     * Whether the current template and supplied broadcast inputs pass validation, including checks that the sender and audience can be used. Sending also checks permissions, limits, the audience's recipients and their values, so `true` does not guarantee the broadcast sends.
     *
     * @param bool|null $readyForAdmission
     *
     * @return self
     */
    public function setReadyForAdmission(?bool $readyForAdmission): self
    {
        $this->initialized['readyForAdmission'] = true;
        $this->readyForAdmission = $readyForAdmission;
        return $this;
    }
    /**
     * The published template version and language a validation or preview checked. It does not fix the version a later send uses.
     *
     * @return EmailBroadcastResolution|null
     */
    public function getResolution(): ?EmailBroadcastResolution
    {
        return $this->resolution;
    }
    /**
     * The published template version and language a validation or preview checked. It does not fix the version a later send uses.
     *
     * @param EmailBroadcastResolution|null $resolution
     *
     * @return self
     */
    public function setResolution(?EmailBroadcastResolution $resolution): self
    {
        $this->initialized['resolution'] = true;
        $this->resolution = $resolution;
        return $this;
    }
    /**
     * The problems found. Empty when `ready_for_admission` is true.
     *
     * @return list<EmailBroadcastParameterProblem>|null
     */
    public function getProblems(): ?array
    {
        return $this->problems;
    }
    /**
     * The problems found. Empty when `ready_for_admission` is true.
     *
     * @param list<EmailBroadcastParameterProblem>|null $problems
     *
     * @return self
     */
    public function setProblems(?array $problems): self
    {
        $this->initialized['problems'] = true;
        $this->problems = $problems;
        return $this;
    }
    /**
     * Names supplied in `template.parameters`, or in the selected language's `template.parameter_overrides` entry, that the selected content and envelope do not use. Rendering the selected content ignores them. With `template.parameter_overrides`, this can include a name in `base_parameters` that only the default language uses, and `template.parameters` must still hold its value.
     * 
     *
     * @return list<string>|null
     */
    public function getUnusedParameters(): ?array
    {
        return $this->unusedParameters;
    }
    /**
     * Names supplied in `template.parameters`, or in the selected language's `template.parameter_overrides` entry, that the selected content and envelope do not use. Rendering the selected content ignores them. With `template.parameter_overrides`, this can include a name in `base_parameters` that only the default language uses, and `template.parameters` must still hold its value.
     *
     * @param list<string>|null $unusedParameters
     *
     * @return self
     */
    public function setUnusedParameters(?array $unusedParameters): self
    {
        $this->initialized['unusedParameters'] = true;
        $this->unusedParameters = $unusedParameters;
        return $this;
    }
    /**
     * Input names `template.parameters` must hold, returned with `resolution`. Without `template.parameter_overrides` these are the inputs the selected language uses. With it they are every input the default language's content or the envelope uses, including names the selected language does not use.
     *
     * @return list<string>|null
     */
    public function getBaseParameters(): ?array
    {
        return $this->baseParameters;
    }
    /**
     * Input names `template.parameters` must hold, returned with `resolution`. Without `template.parameter_overrides` these are the inputs the selected language uses. With it they are every input the default language's content or the envelope uses, including names the selected language does not use.
     *
     * @param list<string>|null $baseParameters
     *
     * @return self
     */
    public function setBaseParameters(?array $baseParameters): self
    {
        $this->initialized['baseParameters'] = true;
        $this->baseParameters = $baseParameters;
        return $this;
    }
    /**
     * Input names only the selected language uses, returned with `resolution`. Each may come from that language's entry in `template.parameter_overrides` or from `template.parameters`. Always empty without `template.parameter_overrides`.
     *
     * @return list<string>|null
     */
    public function getOverrideParameters(): ?array
    {
        return $this->overrideParameters;
    }
    /**
     * Input names only the selected language uses, returned with `resolution`. Each may come from that language's entry in `template.parameter_overrides` or from `template.parameters`. Always empty without `template.parameter_overrides`.
     *
     * @param list<string>|null $overrideParameters
     *
     * @return self
     */
    public function setOverrideParameters(?array $overrideParameters): self
    {
        $this->initialized['overrideParameters'] = true;
        $this->overrideParameters = $overrideParameters;
        return $this;
    }
}
