<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateVersionLanguage
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
     * This language's content in this version, in display order.
     *
     * @var list<WhatsAppTemplateComponent>|null
     */
    protected $components;
    /**
     * What this submission did with this language. Absent on a draft, which has not been submitted. Whether the language can be sent right now is a different question, answered by the template's `languages` summary.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Why Meta refused this content, present when `status` is `rejected`. Absent otherwise.
     * 
     *
     * @var WhatsAppTemplateVersionLanguageRejection|null
     */
    protected $rejection;
    /**
     * Why the submission did not complete, present when `status` is `submit_failed` or `outcome_unknown`. Absent otherwise, including on a rejection, whose reason is in `rejection`.
     * 
     *
     * @var WhatsAppTemplateVersionLanguageError|null
     */
    protected $error;
    /**
     * This language's content in this version, in display order.
     *
     * @return list<WhatsAppTemplateComponent>|null
     */
    public function getComponents(): ?array
    {
        return $this->components;
    }
    /**
     * This language's content in this version, in display order.
     *
     * @param list<WhatsAppTemplateComponent>|null $components
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
     * What this submission did with this language. Absent on a draft, which has not been submitted. Whether the language can be sent right now is a different question, answered by the template's `languages` summary.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * What this submission did with this language. Absent on a draft, which has not been submitted. Whether the language can be sent right now is a different question, answered by the template's `languages` summary.
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
     * Why Meta refused this content, present when `status` is `rejected`. Absent otherwise.
     * 
     *
     * @return WhatsAppTemplateVersionLanguageRejection|null
     */
    public function getRejection(): ?WhatsAppTemplateVersionLanguageRejection
    {
        return $this->rejection;
    }
    /**
     * Why Meta refused this content, present when `status` is `rejected`. Absent otherwise.
     *
     * @param WhatsAppTemplateVersionLanguageRejection|null $rejection
     *
     * @return self
     */
    public function setRejection(?WhatsAppTemplateVersionLanguageRejection $rejection): self
    {
        $this->initialized['rejection'] = true;
        $this->rejection = $rejection;
        return $this;
    }
    /**
     * Why the submission did not complete, present when `status` is `submit_failed` or `outcome_unknown`. Absent otherwise, including on a rejection, whose reason is in `rejection`.
     * 
     *
     * @return WhatsAppTemplateVersionLanguageError|null
     */
    public function getError(): ?WhatsAppTemplateVersionLanguageError
    {
        return $this->error;
    }
    /**
     * Why the submission did not complete, present when `status` is `submit_failed` or `outcome_unknown`. Absent otherwise, including on a rejection, whose reason is in `rejection`.
     *
     * @param WhatsAppTemplateVersionLanguageError|null $error
     *
     * @return self
     */
    public function setError(?WhatsAppTemplateVersionLanguageError $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }
}
