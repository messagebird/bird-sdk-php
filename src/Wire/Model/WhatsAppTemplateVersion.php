<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateVersion
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
     * @var string|null
     */
    protected $templateId;
    /**
     * The version's sequence number, assigned when it is submitted. Null on a draft, which has not been submitted and has no place in the sequence yet.
     * 
     *
     * @var int|null
     */
    protected $versionNumber;
    /**
     * When this version was submitted to Meta. Null on a draft, which has not been submitted, and null for a built-in template's version, which Bird ships already approved rather than submitting on your behalf.
     * 
     *
     * @var \DateTime|null
     */
    protected $submittedAt;
    /**
     * This version's content, keyed by BCP-47 language tag, with what its submission did with each language.
     * 
     *
     * @var array<string, WhatsAppTemplateVersionLanguage>|null
     */
    protected $languages;
    /**
     * When the version was opened. Null for a built-in template's version, which Bird ships rather than stores.
     * 
     *
     * @var \DateTime|null
     */
    protected $createdAt;
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
     * @return string|null
     */
    public function getTemplateId(): ?string
    {
        return $this->templateId;
    }
    /**
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
     * The version's sequence number, assigned when it is submitted. Null on a draft, which has not been submitted and has no place in the sequence yet.
     * 
     *
     * @return int|null
     */
    public function getVersionNumber(): ?int
    {
        return $this->versionNumber;
    }
    /**
     * The version's sequence number, assigned when it is submitted. Null on a draft, which has not been submitted and has no place in the sequence yet.
     *
     * @param int|null $versionNumber
     *
     * @return self
     */
    public function setVersionNumber(?int $versionNumber): self
    {
        $this->initialized['versionNumber'] = true;
        $this->versionNumber = $versionNumber;
        return $this;
    }
    /**
     * When this version was submitted to Meta. Null on a draft, which has not been submitted, and null for a built-in template's version, which Bird ships already approved rather than submitting on your behalf.
     * 
     *
     * @return \DateTime|null
     */
    public function getSubmittedAt(): ?\DateTime
    {
        return $this->submittedAt;
    }
    /**
     * When this version was submitted to Meta. Null on a draft, which has not been submitted, and null for a built-in template's version, which Bird ships already approved rather than submitting on your behalf.
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
     * This version's content, keyed by BCP-47 language tag, with what its submission did with each language.
     * 
     *
     * @return array<string, WhatsAppTemplateVersionLanguage>|null
     */
    public function getLanguages(): ?iterable
    {
        return $this->languages;
    }
    /**
     * This version's content, keyed by BCP-47 language tag, with what its submission did with each language.
     *
     * @param array<string, WhatsAppTemplateVersionLanguage>|null $languages
     *
     * @return self
     */
    public function setLanguages(?iterable $languages): self
    {
        $this->initialized['languages'] = true;
        $this->languages = $languages;
        return $this;
    }
    /**
     * When the version was opened. Null for a built-in template's version, which Bird ships rather than stores.
     * 
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the version was opened. Null for a built-in template's version, which Bird ships rather than stores.
     *
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
}
