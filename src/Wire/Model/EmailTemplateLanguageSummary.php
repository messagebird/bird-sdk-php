<?php

namespace MessageBird\Wire\Model;

class EmailTemplateLanguageSummary
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
     * This language's revision counter, to send back when you save it. It counts only this language's own changes.
     * 
     *
     * @var int|null
     */
    protected $revision;
    /**
     * A hash over this language's content, prefixed with the algorithm that produced it (`sha256:`), so the algorithm can change without the field becoming ambiguous. It tells you whether a language differs without transferring the content, and is comparable only within one version of this API. Null for a language saved before fingerprints were recorded.
     * 
     *
     * @var string|null
     */
    protected $contentHash;
    /**
     * When this language was last saved. Null if that is not recorded.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Whether this language has an HTML body.
     *
     * @var bool|null
     */
    protected $hasHtml;
    /**
     * Whether this language has a plain-text body.
     *
     * @var bool|null
     */
    protected $hasText;
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
     * This language's revision counter, to send back when you save it. It counts only this language's own changes.
     * 
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * This language's revision counter, to send back when you save it. It counts only this language's own changes.
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
     * A hash over this language's content, prefixed with the algorithm that produced it (`sha256:`), so the algorithm can change without the field becoming ambiguous. It tells you whether a language differs without transferring the content, and is comparable only within one version of this API. Null for a language saved before fingerprints were recorded.
     * 
     *
     * @return string|null
     */
    public function getContentHash(): ?string
    {
        return $this->contentHash;
    }
    /**
     * A hash over this language's content, prefixed with the algorithm that produced it (`sha256:`), so the algorithm can change without the field becoming ambiguous. It tells you whether a language differs without transferring the content, and is comparable only within one version of this API. Null for a language saved before fingerprints were recorded.
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
     * When this language was last saved. Null if that is not recorded.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When this language was last saved. Null if that is not recorded.
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
     * Whether this language has an HTML body.
     *
     * @return bool|null
     */
    public function getHasHtml(): ?bool
    {
        return $this->hasHtml;
    }
    /**
     * Whether this language has an HTML body.
     *
     * @param bool|null $hasHtml
     *
     * @return self
     */
    public function setHasHtml(?bool $hasHtml): self
    {
        $this->initialized['hasHtml'] = true;
        $this->hasHtml = $hasHtml;
        return $this;
    }
    /**
     * Whether this language has a plain-text body.
     *
     * @return bool|null
     */
    public function getHasText(): ?bool
    {
        return $this->hasText;
    }
    /**
     * Whether this language has a plain-text body.
     *
     * @param bool|null $hasText
     *
     * @return self
     */
    public function setHasText(?bool $hasText): self
    {
        $this->initialized['hasText'] = true;
        $this->hasText = $hasText;
        return $this;
    }
}
