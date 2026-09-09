<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateLanguageSummary
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
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $language;
    /**
     * Language review and health status:
     * 
     * - `approved`: Passed review and can be sent.
     * - `pending`: Under review.
     * - `rejected`: Failed review.
     * - `paused` or `disabled`: Sending is suspended.
     * - `in_appeal`: A decision is being appealed.
     * - `pending_deletion`: Scheduled for deletion by Meta.
     * - `limit_exceeded`: Sending is blocked by a limit.
     * - `archived`: Reclaimed after 12 months without use; recoverable for 28 days.
     * - `deleted`: Permanently deleted.
     * - `submit_failed`: A submission or a deletion did not complete and will not be retried. `error.description` says why, and `error.meta_error_code` is set only where WhatsApp itself refused.
     * - `outcome_unknown`: A create or an edit reached WhatsApp but no response came back, so the outcome is still being resolved against WhatsApp. An unanswered deletion is retried instead of landing here. `error.description` says so, and `error.meta_error_code` is absent, since nothing was refused.
     * 
     * This is an open enum. Accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * A write counter, incremented every time the content it belongs to changes. It sits at 1 on content that has never been written through this API.
     * 
     *
     * @var int|null
     */
    protected $revision;
    /**
     * A hash over the serialized `components` this API surfaces, for telling whether a language differs without fetching it. It is comparable only within one version of this API: adding a field to the component shape changes every hash without the underlying content changing.
     * 
     *
     * @var string|null
     */
    protected $contentHash;
    /**
     * What to do next about this language, given the verdict it carries. Present on reads
     * that compute it: an empty list means there is nothing to do, and the field is absent
     * entirely on responses that do not report next actions.
     * 
     * Approval is per language, so this is where a rejection, a pause, or a reclaimed
     * language is answered. The template's own next actions cannot say, because they read
     * the aggregate.
     * 
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @param string|null $language
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->initialized['language'] = true;
        $this->language = $language;
        return $this;
    }
    /**
     * Language review and health status:
     * 
     * - `approved`: Passed review and can be sent.
     * - `pending`: Under review.
     * - `rejected`: Failed review.
     * - `paused` or `disabled`: Sending is suspended.
     * - `in_appeal`: A decision is being appealed.
     * - `pending_deletion`: Scheduled for deletion by Meta.
     * - `limit_exceeded`: Sending is blocked by a limit.
     * - `archived`: Reclaimed after 12 months without use; recoverable for 28 days.
     * - `deleted`: Permanently deleted.
     * - `submit_failed`: A submission or a deletion did not complete and will not be retried. `error.description` says why, and `error.meta_error_code` is set only where WhatsApp itself refused.
     * - `outcome_unknown`: A create or an edit reached WhatsApp but no response came back, so the outcome is still being resolved against WhatsApp. An unanswered deletion is retried instead of landing here. `error.description` says so, and `error.meta_error_code` is absent, since nothing was refused.
     * 
     * This is an open enum. Accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Language review and health status:
    
    - `approved`: Passed review and can be sent.
    - `pending`: Under review.
    - `rejected`: Failed review.
    - `paused` or `disabled`: Sending is suspended.
    - `in_appeal`: A decision is being appealed.
    - `pending_deletion`: Scheduled for deletion by Meta.
    - `limit_exceeded`: Sending is blocked by a limit.
    - `archived`: Reclaimed after 12 months without use; recoverable for 28 days.
    - `deleted`: Permanently deleted.
    - `submit_failed`: A submission or a deletion did not complete and will not be retried. `error.description` says why, and `error.meta_error_code` is set only where WhatsApp itself refused.
    - `outcome_unknown`: A create or an edit reached WhatsApp but no response came back, so the outcome is still being resolved against WhatsApp. An unanswered deletion is retried instead of landing here. `error.description` says so, and `error.meta_error_code` is absent, since nothing was refused.
    
    This is an open enum. Accept unrecognized values.
    
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
     * A write counter, incremented every time the content it belongs to changes. It sits at 1 on content that has never been written through this API.
     * 
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * A write counter, incremented every time the content it belongs to changes. It sits at 1 on content that has never been written through this API.
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
    /**
     * A hash over the serialized `components` this API surfaces, for telling whether a language differs without fetching it. It is comparable only within one version of this API: adding a field to the component shape changes every hash without the underlying content changing.
     * 
     *
     * @return string|null
     */
    public function getContentHash(): ?string
    {
        return $this->contentHash;
    }
    /**
     * A hash over the serialized `components` this API surfaces, for telling whether a language differs without fetching it. It is comparable only within one version of this API: adding a field to the component shape changes every hash without the underlying content changing.
     *
     * @param string|null $contentHash
     *
     * @return self
     */
    public function setContentHash(?string $contentHash): self
    {
        $this->initialized['contentHash'] = true;
        $this->contentHash = $contentHash;
        return $this;
    }
    /**
     * What to do next about this language, given the verdict it carries. Present on reads
     * that compute it: an empty list means there is nothing to do, and the field is absent
     * entirely on responses that do not report next actions.
     * 
     * Approval is per language, so this is where a rejection, a pause, or a reclaimed
     * language is answered. The template's own next actions cannot say, because they read
     * the aggregate.
     * 
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
    * What to do next about this language, given the verdict it carries. Present on reads
    that compute it: an empty list means there is nothing to do, and the field is absent
    entirely on responses that do not report next actions.
    
    Approval is per language, so this is where a rejection, a pause, or a reclaimed
    language is answered. The template's own next actions cannot say, because they read
    the aggregate.
    
    *
    * @param list<NextAction>|null $next
    *
    * @return self
    */
    public function setNext(?array $next): self
    {
        $this->initialized['next'] = true;
        $this->next = $next;
        return $this;
    }
}
