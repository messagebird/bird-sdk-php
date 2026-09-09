<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateLanguageState
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
     * On a template, where this language stands on the version currently in service. On a version, what that version's submission did with this language. Absent on a draft, which has not been submitted.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * When this language's content was last submitted to Meta. Null on a draft, which has not been submitted, and null for a built-in template's language, shipped already approved rather than submitted on your behalf.
     * 
     *
     * @var \DateTime|null
     */
    protected $submittedAt;
    /**
     * The next time you can edit this language, if Meta's one-edit-per-day limit on an approved language is currently spent. Null when an edit is allowed right now, though Meta also caps an approved language at ten edits per rolling 30 days: a null here does not guarantee an edit will succeed if you are close to that limit too.
     * 
     *
     * @var \DateTime|null
     */
    protected $editableAt;
    /**
     * Why Meta refused this content, present when `status` is `rejected`. Absent otherwise.
     * 
     *
     * @var WhatsAppTemplateLanguageStateRejection|null
     */
    protected $rejection;
    /**
     * Why the submission did not complete, present when `status` is `submit_failed` or `outcome_unknown`. Absent otherwise, including on a rejection, whose reason is in `rejection`.
     * 
     *
     * @var WhatsAppTemplateLanguageStateError|null
     */
    protected $error;
    /**
     * On a template, where this language stands on the version currently in service. On a version, what that version's submission did with this language. Absent on a draft, which has not been submitted.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * On a template, where this language stands on the version currently in service. On a version, what that version's submission did with this language. Absent on a draft, which has not been submitted.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * When this language's content was last submitted to Meta. Null on a draft, which has not been submitted, and null for a built-in template's language, shipped already approved rather than submitted on your behalf.
     * 
     *
     * @return \DateTime|null
     */
    public function getSubmittedAt(): ?\DateTime
    {
        return $this->submittedAt;
    }
    /**
     * When this language's content was last submitted to Meta. Null on a draft, which has not been submitted, and null for a built-in template's language, shipped already approved rather than submitted on your behalf.
     *
     * @param \DateTime|null $submittedAt
     *
     * @return self
     */
    public function setSubmittedAt(?\DateTime $submittedAt): self
    {
        $this->initialized['submittedAt'] = true;
        $this->submittedAt = $submittedAt;
        return $this;
    }
    /**
     * The next time you can edit this language, if Meta's one-edit-per-day limit on an approved language is currently spent. Null when an edit is allowed right now, though Meta also caps an approved language at ten edits per rolling 30 days: a null here does not guarantee an edit will succeed if you are close to that limit too.
     * 
     *
     * @return \DateTime|null
     */
    public function getEditableAt(): ?\DateTime
    {
        return $this->editableAt;
    }
    /**
     * The next time you can edit this language, if Meta's one-edit-per-day limit on an approved language is currently spent. Null when an edit is allowed right now, though Meta also caps an approved language at ten edits per rolling 30 days: a null here does not guarantee an edit will succeed if you are close to that limit too.
     *
     * @param \DateTime|null $editableAt
     *
     * @return self
     */
    public function setEditableAt(?\DateTime $editableAt): self
    {
        $this->initialized['editableAt'] = true;
        $this->editableAt = $editableAt;
        return $this;
    }
    /**
     * Why Meta refused this content, present when `status` is `rejected`. Absent otherwise.
     * 
     *
     * @return WhatsAppTemplateLanguageStateRejection|null
     */
    public function getRejection(): ?WhatsAppTemplateLanguageStateRejection
    {
        return $this->rejection;
    }
    /**
     * Why Meta refused this content, present when `status` is `rejected`. Absent otherwise.
     *
     * @param WhatsAppTemplateLanguageStateRejection|null $rejection
     *
     * @return self
     */
    public function setRejection(?WhatsAppTemplateLanguageStateRejection $rejection): self
    {
        $this->initialized['rejection'] = true;
        $this->rejection = $rejection;
        return $this;
    }
    /**
     * Why the submission did not complete, present when `status` is `submit_failed` or `outcome_unknown`. Absent otherwise, including on a rejection, whose reason is in `rejection`.
     * 
     *
     * @return WhatsAppTemplateLanguageStateError|null
     */
    public function getError(): ?WhatsAppTemplateLanguageStateError
    {
        return $this->error;
    }
    /**
     * Why the submission did not complete, present when `status` is `submit_failed` or `outcome_unknown`. Absent otherwise, including on a rejection, whose reason is in `rejection`.
     *
     * @param WhatsAppTemplateLanguageStateError|null $error
     *
     * @return self
     */
    public function setError(?WhatsAppTemplateLanguageStateError $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }
}
