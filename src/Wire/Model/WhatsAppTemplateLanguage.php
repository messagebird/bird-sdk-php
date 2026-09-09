<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateLanguage
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
     * This language's content blocks, in display order, exactly as submitted or as they stand in the draft.
     *
     * @var list<WhatsAppTemplateComponent>|null
     */
    protected $components;
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
     * @var string|null
     */
    protected $contentHash;
    /**
     * Meta's content classification for a template.
     * 
     * - `authentication`: delivers one-time passcodes.
     * - `utility`: delivers transaction-triggered updates (receipts, order status).
     * - `marketing`: carries promotional content.
     * 
     * The category determines the sender number and price. This is an open enum.
     * Accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $category;
    /**
     * Meta's content classification for a template.
     * 
     * - `authentication`: delivers one-time passcodes.
     * - `utility`: delivers transaction-triggered updates (receipts, order status).
     * - `marketing`: carries promotional content.
     * 
     * The category determines the sender number and price. This is an open enum.
     * Accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $previousCategory;
    /**
     * Meta's quality rating for one language, with the rating it moved from and when it moved. Present only once Meta has rated the language, and only on the version currently in service. A superseded version's content carries no rating.
     * 
     *
     * @var WhatsAppTemplateQuality|null
     */
    protected $quality;
    /**
     * Why Meta refused this content, present when `status` is `rejected`. Absent otherwise.
     * 
     *
     * @var WhatsAppTemplateLanguageRejection|null
     */
    protected $rejection;
    /**
     * Why the submission did not complete, present when `status` is `submit_failed` or `outcome_unknown`. Absent otherwise, including on a rejection, whose reason is in `rejection`.
     * 
     *
     * @var WhatsAppTemplateLanguageError|null
     */
    protected $error;
    /**
     * When this content was submitted to Meta. Null on a draft, which has not been submitted, and null for a built-in template's language, which Bird ships already approved rather than submitting on your behalf.
     * 
     *
     * @var \DateTime|null
     */
    protected $submittedAt;
    /**
     * When Meta approved this exact content. It is a permanent mark on the content rather than a status, so a later pause or archival does not clear it. Null for a built-in template's language, whose approval predates Bird holding a date for it.
     * 
     *
     * @var \DateTime|null
     */
    protected $approvedAt;
    /**
     * When this language last changed. Null for a built-in template's language, which Bird ships rather than stores.
     * 
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * The workspace member who last wrote this language. Always null for a built-in template's language: nobody in the workspace authored it.
     * 
     *
     * @var string|null
     */
    protected $updatedBy;
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
     * This language's content blocks, in display order, exactly as submitted or as they stand in the draft.
     *
     * @return list<WhatsAppTemplateComponent>|null
     */
    public function getComponents(): ?array
    {
        return $this->components;
    }
    /**
     * This language's content blocks, in display order, exactly as submitted or as they stand in the draft.
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
     * @return string|null
     */
    public function getContentHash(): ?string
    {
        return $this->contentHash;
    }
    /**
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
     * Meta's content classification for a template.
     * 
     * - `authentication`: delivers one-time passcodes.
     * - `utility`: delivers transaction-triggered updates (receipts, order status).
     * - `marketing`: carries promotional content.
     * 
     * The category determines the sender number and price. This is an open enum.
     * Accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
    * Meta's content classification for a template.
    
    - `authentication`: delivers one-time passcodes.
    - `utility`: delivers transaction-triggered updates (receipts, order status).
    - `marketing`: carries promotional content.
    
    The category determines the sender number and price. This is an open enum.
    Accept unrecognized values.
    
    *
    * @param string|null $category
    *
    * @return self
    */
    public function setCategory(?string $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;
        return $this;
    }
    /**
     * Meta's content classification for a template.
     * 
     * - `authentication`: delivers one-time passcodes.
     * - `utility`: delivers transaction-triggered updates (receipts, order status).
     * - `marketing`: carries promotional content.
     * 
     * The category determines the sender number and price. This is an open enum.
     * Accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getPreviousCategory(): ?string
    {
        return $this->previousCategory;
    }
    /**
    * Meta's content classification for a template.
    
    - `authentication`: delivers one-time passcodes.
    - `utility`: delivers transaction-triggered updates (receipts, order status).
    - `marketing`: carries promotional content.
    
    The category determines the sender number and price. This is an open enum.
    Accept unrecognized values.
    
    *
    * @param string|null $previousCategory
    *
    * @return self
    */
    public function setPreviousCategory(?string $previousCategory): self
    {
        $this->initialized['previousCategory'] = true;
        $this->previousCategory = $previousCategory;
        return $this;
    }
    /**
     * Meta's quality rating for one language, with the rating it moved from and when it moved. Present only once Meta has rated the language, and only on the version currently in service. A superseded version's content carries no rating.
     * 
     *
     * @return WhatsAppTemplateQuality|null
     */
    public function getQuality(): ?WhatsAppTemplateQuality
    {
        return $this->quality;
    }
    /**
     * Meta's quality rating for one language, with the rating it moved from and when it moved. Present only once Meta has rated the language, and only on the version currently in service. A superseded version's content carries no rating.
     *
     * @param WhatsAppTemplateQuality|null $quality
     *
     * @return self
     */
    public function setQuality(?WhatsAppTemplateQuality $quality): self
    {
        $this->initialized['quality'] = true;
        $this->quality = $quality;
        return $this;
    }
    /**
     * Why Meta refused this content, present when `status` is `rejected`. Absent otherwise.
     * 
     *
     * @return WhatsAppTemplateLanguageRejection|null
     */
    public function getRejection(): ?WhatsAppTemplateLanguageRejection
    {
        return $this->rejection;
    }
    /**
     * Why Meta refused this content, present when `status` is `rejected`. Absent otherwise.
     *
     * @param WhatsAppTemplateLanguageRejection|null $rejection
     *
     * @return self
     */
    public function setRejection(?WhatsAppTemplateLanguageRejection $rejection): self
    {
        $this->initialized['rejection'] = true;
        $this->rejection = $rejection;
        return $this;
    }
    /**
     * Why the submission did not complete, present when `status` is `submit_failed` or `outcome_unknown`. Absent otherwise, including on a rejection, whose reason is in `rejection`.
     * 
     *
     * @return WhatsAppTemplateLanguageError|null
     */
    public function getError(): ?WhatsAppTemplateLanguageError
    {
        return $this->error;
    }
    /**
     * Why the submission did not complete, present when `status` is `submit_failed` or `outcome_unknown`. Absent otherwise, including on a rejection, whose reason is in `rejection`.
     *
     * @param WhatsAppTemplateLanguageError|null $error
     *
     * @return self
     */
    public function setError(?WhatsAppTemplateLanguageError $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }
    /**
     * When this content was submitted to Meta. Null on a draft, which has not been submitted, and null for a built-in template's language, which Bird ships already approved rather than submitting on your behalf.
     * 
     *
     * @return \DateTime|null
     */
    public function getSubmittedAt(): ?\DateTime
    {
        return $this->submittedAt;
    }
    /**
     * When this content was submitted to Meta. Null on a draft, which has not been submitted, and null for a built-in template's language, which Bird ships already approved rather than submitting on your behalf.
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
     * When Meta approved this exact content. It is a permanent mark on the content rather than a status, so a later pause or archival does not clear it. Null for a built-in template's language, whose approval predates Bird holding a date for it.
     * 
     *
     * @return \DateTime|null
     */
    public function getApprovedAt(): ?\DateTime
    {
        return $this->approvedAt;
    }
    /**
     * When Meta approved this exact content. It is a permanent mark on the content rather than a status, so a later pause or archival does not clear it. Null for a built-in template's language, whose approval predates Bird holding a date for it.
     *
     * @param \DateTime|null $approvedAt
     *
     * @return self
     */
    public function setApprovedAt(?\DateTime $approvedAt): self
    {
        $this->initialized['approvedAt'] = true;
        $this->approvedAt = $approvedAt;
        return $this;
    }
    /**
     * When this language last changed. Null for a built-in template's language, which Bird ships rather than stores.
     * 
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When this language last changed. Null for a built-in template's language, which Bird ships rather than stores.
     *
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
    /**
     * The workspace member who last wrote this language. Always null for a built-in template's language: nobody in the workspace authored it.
     * 
     *
     * @return string|null
     */
    public function getUpdatedBy(): ?string
    {
        return $this->updatedBy;
    }
    /**
     * The workspace member who last wrote this language. Always null for a built-in template's language: nobody in the workspace authored it.
     *
     * @param string|null $updatedBy
     *
     * @return self
     */
    public function setUpdatedBy(?string $updatedBy): self
    {
        $this->initialized['updatedBy'] = true;
        $this->updatedBy = $updatedBy;
        return $this;
    }
}
