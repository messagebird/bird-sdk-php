<?php

namespace MessageBird\Wire\Model;

/**
 * One problem with a broadcast's template inputs. A diagnostic names the input or field it is about and never includes its value.
 */
class EmailBroadcastParameterProblem
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
     * How a broadcast input diagnostic affects sending.
     * 
     * - `error`: the broadcast cannot send until the problem is fixed.
     * 
     *
     * @var string|null
     */
    protected $severity;
    /**
     * A JSON pointer to the request or broadcast field the problem is about, such as `/template/parameters/first_name` or `/from`. Absent when the problem is not about one field.
     *
     * @var string|null
     */
    protected $pointer;
    /**
     * The part of the email where the input is used.
     * 
     * - `subject`: the subject line.
     * - `html`: the HTML body, including its inbox preview text.
     * - `text`: the plain-text body.
     * - `from_name`: the sender display name.
     * - `reply_to`: the reply-to addresses.
     * 
     * A custom header is reported as `header:` followed by the header name as the broadcast sets it, for example `header:X-Campaign`.
     * 
     *
     * @var string|null
     */
    protected $site;
    /**
     * The rendering limit that was exceeded, such as `output_bytes` or `nesting`, when `code` is `render_budget_exceeded`. It is reported with `limit` on problems from sending a broadcast, in `failure_parameters`.
     *
     * @var string|null
     */
    protected $budget;
    /**
     * The value of the limit named by `budget`.
     *
     * @var int|null
     */
    protected $limit;
    /**
     * @var string|null
     */
    protected $contactId;
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
     * How a broadcast input diagnostic affects sending.
     * 
     * - `error`: the broadcast cannot send until the problem is fixed.
     * 
     *
     * @return string|null
     */
    public function getSeverity(): ?string
    {
        return $this->severity;
    }
    /**
    * How a broadcast input diagnostic affects sending.
    
    - `error`: the broadcast cannot send until the problem is fixed.
    
    *
    * @param string|null $severity
    *
    * @return self
    */
    public function setSeverity(?string $severity): self
    {
        $this->initialized['severity'] = true;
        $this->severity = $severity;
        return $this;
    }
    /**
     * A JSON pointer to the request or broadcast field the problem is about, such as `/template/parameters/first_name` or `/from`. Absent when the problem is not about one field.
     *
     * @return string|null
     */
    public function getPointer(): ?string
    {
        return $this->pointer;
    }
    /**
     * A JSON pointer to the request or broadcast field the problem is about, such as `/template/parameters/first_name` or `/from`. Absent when the problem is not about one field.
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
     * The part of the email where the input is used.
     * 
     * - `subject`: the subject line.
     * - `html`: the HTML body, including its inbox preview text.
     * - `text`: the plain-text body.
     * - `from_name`: the sender display name.
     * - `reply_to`: the reply-to addresses.
     * 
     * A custom header is reported as `header:` followed by the header name as the broadcast sets it, for example `header:X-Campaign`.
     * 
     *
     * @return string|null
     */
    public function getSite(): ?string
    {
        return $this->site;
    }
    /**
    * The part of the email where the input is used.
    
    - `subject`: the subject line.
    - `html`: the HTML body, including its inbox preview text.
    - `text`: the plain-text body.
    - `from_name`: the sender display name.
    - `reply_to`: the reply-to addresses.
    
    A custom header is reported as `header:` followed by the header name as the broadcast sets it, for example `header:X-Campaign`.
    
    *
    * @param string|null $site
    *
    * @return self
    */
    public function setSite(?string $site): self
    {
        $this->initialized['site'] = true;
        $this->site = $site;
        return $this;
    }
    /**
     * The rendering limit that was exceeded, such as `output_bytes` or `nesting`, when `code` is `render_budget_exceeded`. It is reported with `limit` on problems from sending a broadcast, in `failure_parameters`.
     *
     * @return string|null
     */
    public function getBudget(): ?string
    {
        return $this->budget;
    }
    /**
     * The rendering limit that was exceeded, such as `output_bytes` or `nesting`, when `code` is `render_budget_exceeded`. It is reported with `limit` on problems from sending a broadcast, in `failure_parameters`.
     *
     * @param string|null $budget
     *
     * @return self
     */
    public function setBudget(?string $budget): self
    {
        $this->initialized['budget'] = true;
        $this->budget = $budget;
        return $this;
    }
    /**
     * The value of the limit named by `budget`.
     *
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }
    /**
     * The value of the limit named by `budget`.
     *
     * @param int|null $limit
     *
     * @return self
     */
    public function setLimit(?int $limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = $limit;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getContactId(): ?string
    {
        return $this->contactId;
    }
    /**
     * @param string|null $contactId
     *
     * @return self
     */
    public function setContactId(?string $contactId): self
    {
        $this->initialized['contactId'] = true;
        $this->contactId = $contactId;
        return $this;
    }
}
