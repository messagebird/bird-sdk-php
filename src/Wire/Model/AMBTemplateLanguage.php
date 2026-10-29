<?php

namespace MessageBird\Wire\Model;

/**
 * One language's full Apple Messages template content and revision metadata.
 */
class AMBTemplateLanguage
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
     * Stored text and files. Includes its `{{ variable }}` placeholders.
     *
     * @var AMBTemplateLanguageText|null
     */
    protected $text;
    /**
     * Stored link preview. Includes its `{{ variable }}` placeholders.
     *
     * @var AMBTemplateLanguageRichLink|null
     */
    protected $richLink;
    /**
     * Stored interaction. Includes its `{{ variable }}` placeholders.
     *
     * @var AMBTemplateLanguageInteractive|null
     */
    protected $interactive;
    /**
     * This language's revision counter, used for concurrent-edit checks on draft writes.
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
     * Stored text and files. Includes its `{{ variable }}` placeholders.
     *
     * @return AMBTemplateLanguageText|null
     */
    public function getText(): ?AMBTemplateLanguageText
    {
        return $this->text;
    }
    /**
     * Stored text and files. Includes its `{{ variable }}` placeholders.
     *
     * @param AMBTemplateLanguageText|AMBText|array|null $text
     *
     * @return self
     */
    public function setText($text): self
    {
        $this->initialized['text'] = true;
        $this->text = \MessageBird\Core\ModelWrapper::normalize($text, AMBTemplateLanguageText::class);
        return $this;
    }
    /**
     * Stored link preview. Includes its `{{ variable }}` placeholders.
     *
     * @return AMBTemplateLanguageRichLink|null
     */
    public function getRichLink(): ?AMBTemplateLanguageRichLink
    {
        return $this->richLink;
    }
    /**
     * Stored link preview. Includes its `{{ variable }}` placeholders.
     *
     * @param AMBTemplateLanguageRichLink|AMBRichLink|array|null $richLink
     *
     * @return self
     */
    public function setRichLink($richLink): self
    {
        $this->initialized['richLink'] = true;
        $this->richLink = \MessageBird\Core\ModelWrapper::normalize($richLink, AMBTemplateLanguageRichLink::class);
        return $this;
    }
    /**
     * Stored interaction. Includes its `{{ variable }}` placeholders.
     *
     * @return AMBTemplateLanguageInteractive|null
     */
    public function getInteractive(): ?AMBTemplateLanguageInteractive
    {
        return $this->interactive;
    }
    /**
     * Stored interaction. Includes its `{{ variable }}` placeholders.
     *
     * @param AMBTemplateLanguageInteractive|AMBInteractive|array|null $interactive
     *
     * @return self
     */
    public function setInteractive($interactive): self
    {
        $this->initialized['interactive'] = true;
        $this->interactive = \MessageBird\Core\ModelWrapper::normalize($interactive, AMBTemplateLanguageInteractive::class);
        return $this;
    }
    /**
     * This language's revision counter, used for concurrent-edit checks on draft writes.
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * This language's revision counter, used for concurrent-edit checks on draft writes.
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
