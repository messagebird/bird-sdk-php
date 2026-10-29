<?php

namespace MessageBird\Wire\Model;

/**
 * One language's content and revision metadata within a version.
 */
class AMBTemplateVersionLanguage
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
     * Stored text and files. Includes its `{{ variable }}` placeholders.
     *
     * @var AMBTemplateVersionLanguageText|null
     */
    protected $text;
    /**
     * Stored link preview. Includes its `{{ variable }}` placeholders.
     *
     * @var AMBTemplateVersionLanguageRichLink|null
     */
    protected $richLink;
    /**
     * Stored interaction. Includes its `{{ variable }}` placeholders.
     *
     * @var AMBTemplateVersionLanguageInteractive|null
     */
    protected $interactive;
    /**
     * This language's revision counter.
     *
     * @var int|null
     */
    protected $revision;
    /**
     * A fingerprint of Apple Messages template content, prefixed with its algorithm. Compare it within this API version to identify the exact source without transferring it.
     * 
     *
     * @var string|null
     */
    protected $contentHash;
    /**
     * When this language was last saved. Null for a built-in template.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Stored text and files. Includes its `{{ variable }}` placeholders.
     *
     * @return AMBTemplateVersionLanguageText|null
     */
    public function getText(): ?AMBTemplateVersionLanguageText
    {
        return $this->text;
    }
    /**
     * Stored text and files. Includes its `{{ variable }}` placeholders.
     *
     * @param AMBTemplateVersionLanguageText|AMBText|array|null $text
     *
     * @return self
     */
    public function setText($text): self
    {
        $this->initialized['text'] = true;
        $this->text = \MessageBird\Core\ModelWrapper::normalize($text, AMBTemplateVersionLanguageText::class);
        return $this;
    }
    /**
     * Stored link preview. Includes its `{{ variable }}` placeholders.
     *
     * @return AMBTemplateVersionLanguageRichLink|null
     */
    public function getRichLink(): ?AMBTemplateVersionLanguageRichLink
    {
        return $this->richLink;
    }
    /**
     * Stored link preview. Includes its `{{ variable }}` placeholders.
     *
     * @param AMBTemplateVersionLanguageRichLink|AMBRichLink|array|null $richLink
     *
     * @return self
     */
    public function setRichLink($richLink): self
    {
        $this->initialized['richLink'] = true;
        $this->richLink = \MessageBird\Core\ModelWrapper::normalize($richLink, AMBTemplateVersionLanguageRichLink::class);
        return $this;
    }
    /**
     * Stored interaction. Includes its `{{ variable }}` placeholders.
     *
     * @return AMBTemplateVersionLanguageInteractive|null
     */
    public function getInteractive(): ?AMBTemplateVersionLanguageInteractive
    {
        return $this->interactive;
    }
    /**
     * Stored interaction. Includes its `{{ variable }}` placeholders.
     *
     * @param AMBTemplateVersionLanguageInteractive|AMBInteractive|array|null $interactive
     *
     * @return self
     */
    public function setInteractive($interactive): self
    {
        $this->initialized['interactive'] = true;
        $this->interactive = \MessageBird\Core\ModelWrapper::normalize($interactive, AMBTemplateVersionLanguageInteractive::class);
        return $this;
    }
    /**
     * This language's revision counter.
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * This language's revision counter.
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
     * A fingerprint of Apple Messages template content, prefixed with its algorithm. Compare it within this API version to identify the exact source without transferring it.
     * 
     *
     * @return string|null
     */
    public function getContentHash(): ?string
    {
        return $this->contentHash;
    }
    /**
     * A fingerprint of Apple Messages template content, prefixed with its algorithm. Compare it within this API version to identify the exact source without transferring it.
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
     * When this language was last saved. Null for a built-in template.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When this language was last saved. Null for a built-in template.
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
}
