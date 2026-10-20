<?php

namespace MessageBird\Wire\Model;

class ComplianceRequirementField
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
     * Parent field grouping this named document. Absent for an ordinary field.
     *
     * @var string|null
     */
    protected $parentKey;
    /**
     * Stable document key within the parent field. Absent for an ordinary field.
     *
     * @var string|null
     */
    protected $documentKey;
    /**
     * Display name of the parent field grouping this document. Absent for an ordinary field.
     *
     * @var string|null
     */
    protected $parentLabel;
    /**
     * The parent field's own description, shared by every document in the group. Each document's `help_text` describes that document alone. Absent for an ordinary field and when the parent has no description.
     * 
     *
     * @var string|null
     */
    protected $parentHelpText;
    /**
     * Identifies this requirement. Use it as the key when you submit a value.
     *
     * @var string|null
     */
    protected $key;
    /**
     * What to call this requirement when you ask someone for it.
     *
     * @var string|null
     */
    protected $label;
    /**
     * Guidance on what a good answer looks like, including anything the destination country expects. `null` when the label speaks for itself.
     * 
     *
     * @var string|null
     */
    protected $helpText;
    /**
     * @var string|null
     */
    protected $dataType;
    /**
     * Whether an answer is needed before the registration can be approved. Optional requirements are still reviewed when you supply them.
     * 
     *
     * @var bool|null
     */
    protected $required;
    /**
     * A stable key grouping related requirements together. Use it to keep your own grouping consistent across requests; use section_label for what to show someone.
     * 
     *
     * @var string|null
     */
    protected $section;
    /**
     * What to call this requirement's group when you present it.
     *
     * @var string|null
     */
    protected $sectionLabel;
    /**
     * The accepted values, already resolved, when the data type is `enum`. Empty for every other type.
     * 
     *
     * @var list<ComplianceRequirementFieldOption>|null
     */
    protected $options;
    /**
     * @var ComplianceRequirementFieldValidation|null
     */
    protected $validation;
    /**
     * A blank form to download, complete and upload back, for requirements that need a signed document. `null` when the requirement has no form to download.
     * 
     *
     * @var string|null
     */
    protected $templateUrl;
    /**
     * How many answers this requirement takes, when it takes more than one. `null` for a requirement answered once, which is most of them. Where it is set, answer with `values` or `attachment_ids` and read your answer back from the same pair; `value` and `attachment_id` stay `null`. Order is kept as you send it, and it is part of the answer: a keyword list beginning with `STOP` is not the same declaration as one ending with it.
     * 
     *
     * @var int|null
     */
    protected $maxItems;
    /**
     * Your answer, for a requirement answered inline. Every answer travels as a string whatever its data type, so a number reads back as `"1500"` and a yes-or-no as `"true"`. Use the data type to parse it. `null` for a requirement that takes a document, and before you have answered.
     * 
     *
     * @var string|null
     */
    protected $value;
    /**
     * `true` when `value` comes from the party this registration is for. Accept it as it stands or replace it; either way it becomes your answer when you submit. Only a requirement that asks about the party is ever prefilled.
     * 
     *
     * @var bool|null
     */
    protected $prefilled;
    /**
     * The document you supplied, for a requirement that takes one. `null` otherwise.
     * 
     *
     * @var string|null
     */
    protected $attachmentId;
    /**
     * Your answers, for a requirement that takes several and is answered inline. Set only when `max_items` is, and `null` otherwise, including before you have answered. Each answer travels as a string whatever the data type, the same as `value`.
     * 
     *
     * @var list<string>|null
     */
    protected $values;
    /**
     * The documents you supplied, for a requirement that takes several. Set only when `max_items` is and the requirement takes documents, and `null` otherwise.
     * 
     *
     * @var list<string>|null
     */
    protected $attachmentIds;
    /**
     * @var string|null
     */
    protected $state;
    /**
     * When this was decided. `null` while no decision has been made.
     *
     * @var \DateTime|null
     */
    protected $decidedAt;
    /**
     * When this answer goes stale and must be supplied again. `null` when it does not expire.
     *
     * @var \DateTime|null
     */
    protected $expiresAt;
    /**
     * Whether you may replace this accepted answer to correct the submission after external verification. This permission does not change its `state` or `reason`. Submit only answers whose content or attachment identity you change.
     * 
     *
     * @var bool|null
     */
    protected $editableForVerifierRepair;
    /**
     * Why this requirement was rejected, when it was. `null` otherwise.
     *
     * @var string|null
     */
    protected $reason;
    /**
     * Parent field grouping this named document. Absent for an ordinary field.
     *
     * @return string|null
     */
    public function getParentKey(): ?string
    {
        return $this->parentKey;
    }
    /**
     * Parent field grouping this named document. Absent for an ordinary field.
     *
     * @param string|null $parentKey
     *
     * @return self
     */
    public function setParentKey(?string $parentKey): self
    {
        $this->initialized['parentKey'] = true;
        $this->parentKey = $parentKey;
        return $this;
    }
    /**
     * Stable document key within the parent field. Absent for an ordinary field.
     *
     * @return string|null
     */
    public function getDocumentKey(): ?string
    {
        return $this->documentKey;
    }
    /**
     * Stable document key within the parent field. Absent for an ordinary field.
     *
     * @param string|null $documentKey
     *
     * @return self
     */
    public function setDocumentKey(?string $documentKey): self
    {
        $this->initialized['documentKey'] = true;
        $this->documentKey = $documentKey;
        return $this;
    }
    /**
     * Display name of the parent field grouping this document. Absent for an ordinary field.
     *
     * @return string|null
     */
    public function getParentLabel(): ?string
    {
        return $this->parentLabel;
    }
    /**
     * Display name of the parent field grouping this document. Absent for an ordinary field.
     *
     * @param string|null $parentLabel
     *
     * @return self
     */
    public function setParentLabel(?string $parentLabel): self
    {
        $this->initialized['parentLabel'] = true;
        $this->parentLabel = $parentLabel;
        return $this;
    }
    /**
     * The parent field's own description, shared by every document in the group. Each document's `help_text` describes that document alone. Absent for an ordinary field and when the parent has no description.
     * 
     *
     * @return string|null
     */
    public function getParentHelpText(): ?string
    {
        return $this->parentHelpText;
    }
    /**
     * The parent field's own description, shared by every document in the group. Each document's `help_text` describes that document alone. Absent for an ordinary field and when the parent has no description.
     *
     * @param string|null $parentHelpText
     *
     * @return self
     */
    public function setParentHelpText(?string $parentHelpText): self
    {
        $this->initialized['parentHelpText'] = true;
        $this->parentHelpText = $parentHelpText;
        return $this;
    }
    /**
     * Identifies this requirement. Use it as the key when you submit a value.
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }
    /**
     * Identifies this requirement. Use it as the key when you submit a value.
     *
     * @param string|null $key
     *
     * @return self
     */
    public function setKey(?string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * What to call this requirement when you ask someone for it.
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
    /**
     * What to call this requirement when you ask someone for it.
     *
     * @param string|null $label
     *
     * @return self
     */
    public function setLabel(?string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;
        return $this;
    }
    /**
     * Guidance on what a good answer looks like, including anything the destination country expects. `null` when the label speaks for itself.
     * 
     *
     * @return string|null
     */
    public function getHelpText(): ?string
    {
        return $this->helpText;
    }
    /**
     * Guidance on what a good answer looks like, including anything the destination country expects. `null` when the label speaks for itself.
     *
     * @param string|null $helpText
     *
     * @return self
     */
    public function setHelpText(?string $helpText): self
    {
        $this->initialized['helpText'] = true;
        $this->helpText = $helpText;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getDataType(): ?string
    {
        return $this->dataType;
    }
    /**
     * @param string|null $dataType
     *
     * @return self
     */
    public function setDataType(?string $dataType): self
    {
        $this->initialized['dataType'] = true;
        $this->dataType = $dataType;
        return $this;
    }
    /**
     * Whether an answer is needed before the registration can be approved. Optional requirements are still reviewed when you supply them.
     * 
     *
     * @return bool|null
     */
    public function getRequired(): ?bool
    {
        return $this->required;
    }
    /**
     * Whether an answer is needed before the registration can be approved. Optional requirements are still reviewed when you supply them.
     *
     * @param bool|null $required
     *
     * @return self
     */
    public function setRequired(?bool $required): self
    {
        $this->initialized['required'] = true;
        $this->required = $required;
        return $this;
    }
    /**
     * A stable key grouping related requirements together. Use it to keep your own grouping consistent across requests; use section_label for what to show someone.
     * 
     *
     * @return string|null
     */
    public function getSection(): ?string
    {
        return $this->section;
    }
    /**
     * A stable key grouping related requirements together. Use it to keep your own grouping consistent across requests; use section_label for what to show someone.
     *
     * @param string|null $section
     *
     * @return self
     */
    public function setSection(?string $section): self
    {
        $this->initialized['section'] = true;
        $this->section = $section;
        return $this;
    }
    /**
     * What to call this requirement's group when you present it.
     *
     * @return string|null
     */
    public function getSectionLabel(): ?string
    {
        return $this->sectionLabel;
    }
    /**
     * What to call this requirement's group when you present it.
     *
     * @param string|null $sectionLabel
     *
     * @return self
     */
    public function setSectionLabel(?string $sectionLabel): self
    {
        $this->initialized['sectionLabel'] = true;
        $this->sectionLabel = $sectionLabel;
        return $this;
    }
    /**
     * The accepted values, already resolved, when the data type is `enum`. Empty for every other type.
     * 
     *
     * @return list<ComplianceRequirementFieldOption>|null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }
    /**
     * The accepted values, already resolved, when the data type is `enum`. Empty for every other type.
     *
     * @param list<ComplianceRequirementFieldOption>|null $options
     *
     * @return self
     */
    public function setOptions(?array $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;
        return $this;
    }
    /**
     * @return ComplianceRequirementFieldValidation|null
     */
    public function getValidation(): ?ComplianceRequirementFieldValidation
    {
        return $this->validation;
    }
    /**
     * @param ComplianceRequirementFieldValidation|ComplianceFieldValidation|array|null $validation
     *
     * @return self
     */
    public function setValidation($validation): self
    {
        $this->initialized['validation'] = true;
        $this->validation = \MessageBird\Core\ModelWrapper::normalize($validation, ComplianceRequirementFieldValidation::class);
        return $this;
    }
    /**
     * A blank form to download, complete and upload back, for requirements that need a signed document. `null` when the requirement has no form to download.
     * 
     *
     * @return string|null
     */
    public function getTemplateUrl(): ?string
    {
        return $this->templateUrl;
    }
    /**
     * A blank form to download, complete and upload back, for requirements that need a signed document. `null` when the requirement has no form to download.
     *
     * @param string|null $templateUrl
     *
     * @return self
     */
    public function setTemplateUrl(?string $templateUrl): self
    {
        $this->initialized['templateUrl'] = true;
        $this->templateUrl = $templateUrl;
        return $this;
    }
    /**
     * How many answers this requirement takes, when it takes more than one. `null` for a requirement answered once, which is most of them. Where it is set, answer with `values` or `attachment_ids` and read your answer back from the same pair; `value` and `attachment_id` stay `null`. Order is kept as you send it, and it is part of the answer: a keyword list beginning with `STOP` is not the same declaration as one ending with it.
     * 
     *
     * @return int|null
     */
    public function getMaxItems(): ?int
    {
        return $this->maxItems;
    }
    /**
     * How many answers this requirement takes, when it takes more than one. `null` for a requirement answered once, which is most of them. Where it is set, answer with `values` or `attachment_ids` and read your answer back from the same pair; `value` and `attachment_id` stay `null`. Order is kept as you send it, and it is part of the answer: a keyword list beginning with `STOP` is not the same declaration as one ending with it.
     *
     * @param int|null $maxItems
     *
     * @return self
     */
    public function setMaxItems(?int $maxItems): self
    {
        $this->initialized['maxItems'] = true;
        $this->maxItems = $maxItems;
        return $this;
    }
    /**
     * Your answer, for a requirement answered inline. Every answer travels as a string whatever its data type, so a number reads back as `"1500"` and a yes-or-no as `"true"`. Use the data type to parse it. `null` for a requirement that takes a document, and before you have answered.
     * 
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
    /**
     * Your answer, for a requirement answered inline. Every answer travels as a string whatever its data type, so a number reads back as `"1500"` and a yes-or-no as `"true"`. Use the data type to parse it. `null` for a requirement that takes a document, and before you have answered.
     *
     * @param string|null $value
     *
     * @return self
     */
    public function setValue(?string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
    /**
     * `true` when `value` comes from the party this registration is for. Accept it as it stands or replace it; either way it becomes your answer when you submit. Only a requirement that asks about the party is ever prefilled.
     * 
     *
     * @return bool|null
     */
    public function getPrefilled(): ?bool
    {
        return $this->prefilled;
    }
    /**
     * `true` when `value` comes from the party this registration is for. Accept it as it stands or replace it; either way it becomes your answer when you submit. Only a requirement that asks about the party is ever prefilled.
     *
     * @param bool|null $prefilled
     *
     * @return self
     */
    public function setPrefilled(?bool $prefilled): self
    {
        $this->initialized['prefilled'] = true;
        $this->prefilled = $prefilled;
        return $this;
    }
    /**
     * The document you supplied, for a requirement that takes one. `null` otherwise.
     * 
     *
     * @return string|null
     */
    public function getAttachmentId(): ?string
    {
        return $this->attachmentId;
    }
    /**
     * The document you supplied, for a requirement that takes one. `null` otherwise.
     *
     * @param string|null $attachmentId
     *
     * @return self
     */
    public function setAttachmentId(?string $attachmentId): self
    {
        $this->initialized['attachmentId'] = true;
        $this->attachmentId = $attachmentId;
        return $this;
    }
    /**
     * Your answers, for a requirement that takes several and is answered inline. Set only when `max_items` is, and `null` otherwise, including before you have answered. Each answer travels as a string whatever the data type, the same as `value`.
     * 
     *
     * @return list<string>|null
     */
    public function getValues(): ?array
    {
        return $this->values;
    }
    /**
     * Your answers, for a requirement that takes several and is answered inline. Set only when `max_items` is, and `null` otherwise, including before you have answered. Each answer travels as a string whatever the data type, the same as `value`.
     *
     * @param list<string>|null $values
     *
     * @return self
     */
    public function setValues(?array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;
        return $this;
    }
    /**
     * The documents you supplied, for a requirement that takes several. Set only when `max_items` is and the requirement takes documents, and `null` otherwise.
     * 
     *
     * @return list<string>|null
     */
    public function getAttachmentIds(): ?array
    {
        return $this->attachmentIds;
    }
    /**
     * The documents you supplied, for a requirement that takes several. Set only when `max_items` is and the requirement takes documents, and `null` otherwise.
     *
     * @param list<string>|null $attachmentIds
     *
     * @return self
     */
    public function setAttachmentIds(?array $attachmentIds): self
    {
        $this->initialized['attachmentIds'] = true;
        $this->attachmentIds = $attachmentIds;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * @param string|null $state
     *
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
    /**
     * When this was decided. `null` while no decision has been made.
     *
     * @return \DateTime|null
     */
    public function getDecidedAt(): ?\DateTime
    {
        return $this->decidedAt;
    }
    /**
     * When this was decided. `null` while no decision has been made.
     *
     * @param \DateTime|null $decidedAt
     *
     * @return self
     */
    public function setDecidedAt(?\DateTime $decidedAt): self
    {
        $this->initialized['decidedAt'] = true;
        $this->decidedAt = $decidedAt;
        return $this;
    }
    /**
     * When this answer goes stale and must be supplied again. `null` when it does not expire.
     *
     * @return \DateTime|null
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }
    /**
     * When this answer goes stale and must be supplied again. `null` when it does not expire.
     *
     * @param \DateTime|null $expiresAt
     *
     * @return self
     */
    public function setExpiresAt(?\DateTime $expiresAt): self
    {
        $this->initialized['expiresAt'] = true;
        $this->expiresAt = $expiresAt;
        return $this;
    }
    /**
     * Whether you may replace this accepted answer to correct the submission after external verification. This permission does not change its `state` or `reason`. Submit only answers whose content or attachment identity you change.
     * 
     *
     * @return bool|null
     */
    public function getEditableForVerifierRepair(): ?bool
    {
        return $this->editableForVerifierRepair;
    }
    /**
     * Whether you may replace this accepted answer to correct the submission after external verification. This permission does not change its `state` or `reason`. Submit only answers whose content or attachment identity you change.
     *
     * @param bool|null $editableForVerifierRepair
     *
     * @return self
     */
    public function setEditableForVerifierRepair(?bool $editableForVerifierRepair): self
    {
        $this->initialized['editableForVerifierRepair'] = true;
        $this->editableForVerifierRepair = $editableForVerifierRepair;
        return $this;
    }
    /**
     * Why this requirement was rejected, when it was. `null` otherwise.
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
     * Why this requirement was rejected, when it was. `null` otherwise.
     *
     * @param string|null $reason
     *
     * @return self
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
}
