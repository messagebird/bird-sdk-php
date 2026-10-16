<?php

namespace MessageBird\Wire\Model;

/**
 * Why a broadcast stopped because its template inputs could not be prepared or rendered. It names fields and contacts and never includes input or contact values.
 */
class EmailBroadcastFailureParameters
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
     * What a broadcast input diagnostic found.
     * 
     * - `parameter_json_invalid`: the request body or an input map is not valid JSON.
     * - `parameter_map_invalid`: `template.parameters` or `template.parameter_overrides` is not a JSON object of input names.
     * - `parameter_name_invalid`: an input name is not a bare name outside the `bird` namespace.
     * - `parameter_value_unsupported`: an input value is an object or a list. Values must be a string, number, boolean or null.
     * - `parameter_duplicate_key`: an input name, or two spellings of one language tag, appears twice.
     * - `parameter_bytes_exceeded`: an input map is larger than 16384 UTF-8 bytes.
     * - `parameter_names_exceeded`: `template.parameters` and every language together hold more than 128 distinct names.
     * - `parameter_depth_exceeded`: an input value is nested too deeply.
     * - `parameter_language_invalid`: a `template.parameter_overrides` key is not a valid BCP-47 language tag.
     * - `parameter_required`: the template or envelope uses an input that has no value.
     * - `sensitive_input_unsupported`: the template uses an input it marks sensitive, which a broadcast cannot supply.
     * - `render_profile_unsupported`: the template uses a Liquid operation that rendering with broadcast inputs does not support.
     * - `rendered_envelope_invalid`: the rendered subject, sender name, reply-to addresses or a header is not valid for an email, for example because it contains a line break.
     * - `contact_property_unknown`: the template reads a contact property this workspace has not defined.
     * - `template_unavailable`: the broadcast has no template, or its template no longer exists or has no published version.
     * - `language_unavailable`: the published version has no content in the selected language.
     * - `sender_unavailable`: the broadcast cannot send from its `from` address or IP pool.
     * - `audience_unavailable`: the broadcast's audience cannot be used for this send.
     * - `recipient_render_failed`: content could not be rendered for a recipient while the broadcast was sending.
     * - `render_budget_exceeded`: rendering went over a limit, named by `budget` with its `limit`.
     * - `transport_missing`: the saved content of a prepared broadcast is unavailable. Contact Bird support.
     * - `transport_invalid`: the saved content of a prepared broadcast no longer matches what was prepared. Contact Bird support.
     * 
     *
     * @var string|null
     */
    protected $code;
    /**
     * Where a broadcast input diagnostic was found.
     * 
     * - `request`: in the inputs this request supplied, before the template was checked.
     * - `validation`: while checking the inputs against the current published template, as validate, preview and send do.
     * - `execution`: while the broadcast was being prepared or sent. This phase appears on `failure_parameters`.
     * 
     *
     * @var string|null
     */
    protected $phase;
    /**
     * A JSON pointer to the broadcast field the failure is about, such as `/template/parameters/first_name` or `/template`.
     *
     * @var string|null
     */
    protected $pointer;
    /**
     * @var string|null
     */
    protected $observedVersionId;
    /**
     * Up to 20 of the problems found. A recipient problem names its contact in `contact_id`.
     *
     * @var list<EmailBroadcastParameterProblem>|null
     */
    protected $problems;
    /**
     * How many recipients failed to render, including those not listed in `problems`. It can be `0` when the broadcast failed while it was being prepared, before any recipient was rendered.
     *
     * @var int|null
     */
    protected $failureCount;
    /**
     * What a broadcast input diagnostic found.
     * 
     * - `parameter_json_invalid`: the request body or an input map is not valid JSON.
     * - `parameter_map_invalid`: `template.parameters` or `template.parameter_overrides` is not a JSON object of input names.
     * - `parameter_name_invalid`: an input name is not a bare name outside the `bird` namespace.
     * - `parameter_value_unsupported`: an input value is an object or a list. Values must be a string, number, boolean or null.
     * - `parameter_duplicate_key`: an input name, or two spellings of one language tag, appears twice.
     * - `parameter_bytes_exceeded`: an input map is larger than 16384 UTF-8 bytes.
     * - `parameter_names_exceeded`: `template.parameters` and every language together hold more than 128 distinct names.
     * - `parameter_depth_exceeded`: an input value is nested too deeply.
     * - `parameter_language_invalid`: a `template.parameter_overrides` key is not a valid BCP-47 language tag.
     * - `parameter_required`: the template or envelope uses an input that has no value.
     * - `sensitive_input_unsupported`: the template uses an input it marks sensitive, which a broadcast cannot supply.
     * - `render_profile_unsupported`: the template uses a Liquid operation that rendering with broadcast inputs does not support.
     * - `rendered_envelope_invalid`: the rendered subject, sender name, reply-to addresses or a header is not valid for an email, for example because it contains a line break.
     * - `contact_property_unknown`: the template reads a contact property this workspace has not defined.
     * - `template_unavailable`: the broadcast has no template, or its template no longer exists or has no published version.
     * - `language_unavailable`: the published version has no content in the selected language.
     * - `sender_unavailable`: the broadcast cannot send from its `from` address or IP pool.
     * - `audience_unavailable`: the broadcast's audience cannot be used for this send.
     * - `recipient_render_failed`: content could not be rendered for a recipient while the broadcast was sending.
     * - `render_budget_exceeded`: rendering went over a limit, named by `budget` with its `limit`.
     * - `transport_missing`: the saved content of a prepared broadcast is unavailable. Contact Bird support.
     * - `transport_invalid`: the saved content of a prepared broadcast no longer matches what was prepared. Contact Bird support.
     * 
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
    * What a broadcast input diagnostic found.
    
    - `parameter_json_invalid`: the request body or an input map is not valid JSON.
    - `parameter_map_invalid`: `template.parameters` or `template.parameter_overrides` is not a JSON object of input names.
    - `parameter_name_invalid`: an input name is not a bare name outside the `bird` namespace.
    - `parameter_value_unsupported`: an input value is an object or a list. Values must be a string, number, boolean or null.
    - `parameter_duplicate_key`: an input name, or two spellings of one language tag, appears twice.
    - `parameter_bytes_exceeded`: an input map is larger than 16384 UTF-8 bytes.
    - `parameter_names_exceeded`: `template.parameters` and every language together hold more than 128 distinct names.
    - `parameter_depth_exceeded`: an input value is nested too deeply.
    - `parameter_language_invalid`: a `template.parameter_overrides` key is not a valid BCP-47 language tag.
    - `parameter_required`: the template or envelope uses an input that has no value.
    - `sensitive_input_unsupported`: the template uses an input it marks sensitive, which a broadcast cannot supply.
    - `render_profile_unsupported`: the template uses a Liquid operation that rendering with broadcast inputs does not support.
    - `rendered_envelope_invalid`: the rendered subject, sender name, reply-to addresses or a header is not valid for an email, for example because it contains a line break.
    - `contact_property_unknown`: the template reads a contact property this workspace has not defined.
    - `template_unavailable`: the broadcast has no template, or its template no longer exists or has no published version.
    - `language_unavailable`: the published version has no content in the selected language.
    - `sender_unavailable`: the broadcast cannot send from its `from` address or IP pool.
    - `audience_unavailable`: the broadcast's audience cannot be used for this send.
    - `recipient_render_failed`: content could not be rendered for a recipient while the broadcast was sending.
    - `render_budget_exceeded`: rendering went over a limit, named by `budget` with its `limit`.
    - `transport_missing`: the saved content of a prepared broadcast is unavailable. Contact Bird support.
    - `transport_invalid`: the saved content of a prepared broadcast no longer matches what was prepared. Contact Bird support.
    
    *
    * @param string|null $code
    *
    * @return self
    */
    public function setCode(?string $code): self
    {
        $this->initialized['code'] = true;
        $this->code = $code;
        return $this;
    }
    /**
     * Where a broadcast input diagnostic was found.
     * 
     * - `request`: in the inputs this request supplied, before the template was checked.
     * - `validation`: while checking the inputs against the current published template, as validate, preview and send do.
     * - `execution`: while the broadcast was being prepared or sent. This phase appears on `failure_parameters`.
     * 
     *
     * @return string|null
     */
    public function getPhase(): ?string
    {
        return $this->phase;
    }
    /**
    * Where a broadcast input diagnostic was found.
    
    - `request`: in the inputs this request supplied, before the template was checked.
    - `validation`: while checking the inputs against the current published template, as validate, preview and send do.
    - `execution`: while the broadcast was being prepared or sent. This phase appears on `failure_parameters`.
    
    *
    * @param string|null $phase
    *
    * @return self
    */
    public function setPhase(?string $phase): self
    {
        $this->initialized['phase'] = true;
        $this->phase = $phase;
        return $this;
    }
    /**
     * A JSON pointer to the broadcast field the failure is about, such as `/template/parameters/first_name` or `/template`.
     *
     * @return string|null
     */
    public function getPointer(): ?string
    {
        return $this->pointer;
    }
    /**
     * A JSON pointer to the broadcast field the failure is about, such as `/template/parameters/first_name` or `/template`.
     *
     * @param string|null $pointer
     *
     * @return self
     */
    public function setPointer(?string $pointer): self
    {
        $this->initialized['pointer'] = true;
        $this->pointer = $pointer;
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
     * Up to 20 of the problems found. A recipient problem names its contact in `contact_id`.
     *
     * @return list<EmailBroadcastParameterProblem>|null
     */
    public function getProblems(): ?array
    {
        return $this->problems;
    }
    /**
     * Up to 20 of the problems found. A recipient problem names its contact in `contact_id`.
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
     * How many recipients failed to render, including those not listed in `problems`. It can be `0` when the broadcast failed while it was being prepared, before any recipient was rendered.
     *
     * @return int|null
     */
    public function getFailureCount(): ?int
    {
        return $this->failureCount;
    }
    /**
     * How many recipients failed to render, including those not listed in `problems`. It can be `0` when the broadcast failed while it was being prepared, before any recipient was rendered.
     *
     * @param int|null $failureCount
     *
     * @return self
     */
    public function setFailureCount(?int $failureCount): self
    {
        $this->initialized['failureCount'] = true;
        $this->failureCount = $failureCount;
        return $this;
    }
}
