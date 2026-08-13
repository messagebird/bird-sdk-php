<?php

namespace MessageBird\Wire\Model;

class EmailMessageBatchItem
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
    protected $id;
    /**
     * Initial status of this message in the batch.
     *
     * @var string|null
     */
    protected $status;
    /**
     * Resolved category for this batch item.
     *
     * @var string|null
     */
    protected $category;
    /**
     * The template language this item asked for, in canonical form. Null when the item named no language or used no template. Every item in a batch resolves its own template reference, so this and `resolved_language` can differ from item to item.
     * 
     *
     * @var string|null
     */
    protected $requestedLanguage;
    /**
     * The template language this item was actually delivered in, in canonical form. Null when the item used no template. A value here differing from `requested_language` means the template did not have the language asked for and its `on_missing_language` policy chose this one.
     * 
     *
     * @var string|null
     */
    protected $resolvedLanguage;
    /**
     * The template this item rendered from, or null for an item that supplied its content inline.
     * 
     *
     * @var string|null
     */
    protected $templateId;
    /**
     * The exact template version this item rendered from, or null for an inline item. Record it if you need to reproduce what was sent: a template's live version changes every time you submit it.
     * 
     *
     * @var string|null
     */
    protected $templateVersionId;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * Initial status of this message in the batch.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Initial status of this message in the batch.
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
     * Resolved category for this batch item.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Resolved category for this batch item.
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
     * The template language this item asked for, in canonical form. Null when the item named no language or used no template. Every item in a batch resolves its own template reference, so this and `resolved_language` can differ from item to item.
     * 
     *
     * @return string|null
     */
    public function getRequestedLanguage(): ?string
    {
        return $this->requestedLanguage;
    }
    /**
     * The template language this item asked for, in canonical form. Null when the item named no language or used no template. Every item in a batch resolves its own template reference, so this and `resolved_language` can differ from item to item.
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
     * The template language this item was actually delivered in, in canonical form. Null when the item used no template. A value here differing from `requested_language` means the template did not have the language asked for and its `on_missing_language` policy chose this one.
     * 
     *
     * @return string|null
     */
    public function getResolvedLanguage(): ?string
    {
        return $this->resolvedLanguage;
    }
    /**
     * The template language this item was actually delivered in, in canonical form. Null when the item used no template. A value here differing from `requested_language` means the template did not have the language asked for and its `on_missing_language` policy chose this one.
     *
     * @param string|null $resolvedLanguage
     *
     * @return self
     */
    public function setResolvedLanguage(?string $resolvedLanguage): self
    {
        $this->initialized['resolvedLanguage'] = true;
        $this->resolvedLanguage = $resolvedLanguage;
        return $this;
    }
    /**
     * The template this item rendered from, or null for an item that supplied its content inline.
     * 
     *
     * @return string|null
     */
    public function getTemplateId(): ?string
    {
        return $this->templateId;
    }
    /**
     * The template this item rendered from, or null for an item that supplied its content inline.
     *
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
     * The exact template version this item rendered from, or null for an inline item. Record it if you need to reproduce what was sent: a template's live version changes every time you submit it.
     * 
     *
     * @return string|null
     */
    public function getTemplateVersionId(): ?string
    {
        return $this->templateVersionId;
    }
    /**
     * The exact template version this item rendered from, or null for an inline item. Record it if you need to reproduce what was sent: a template's live version changes every time you submit it.
     *
     * @param string|null $templateVersionId
     *
     * @return self
     */
    public function setTemplateVersionId(?string $templateVersionId): self
    {
        $this->initialized['templateVersionId'] = true;
        $this->templateVersionId = $templateVersionId;
        return $this;
    }
}
