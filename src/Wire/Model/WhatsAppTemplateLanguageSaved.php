<?php

namespace MessageBird\Wire\Model;

/**
 * What a language write returns, enough to make the next write without re-reading.
 */
class WhatsAppTemplateLanguageSaved
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
     * The canonical form of the tag you addressed. Use it in later calls for this language.
     *
     * @var string|null
     */
    protected $language;
    /**
     * The language's new revision, to pass back on your next write.
     *
     * @var int|null
     */
    protected $revision;
    /**
     * A hash over the content as saved, so you can tell whether your next write would change anything without diffing the document.
     * 
     *
     * @var string|null
     */
    protected $contentHash;
    /**
     * When this language was last written.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * The canonical form of the tag you addressed. Use it in later calls for this language.
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * The canonical form of the tag you addressed. Use it in later calls for this language.
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
     * The language's new revision, to pass back on your next write.
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * The language's new revision, to pass back on your next write.
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
     * A hash over the content as saved, so you can tell whether your next write would change anything without diffing the document.
     * 
     *
     * @return string|null
     */
    public function getContentHash(): ?string
    {
        return $this->contentHash;
    }
    /**
     * A hash over the content as saved, so you can tell whether your next write would change anything without diffing the document.
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
     * When this language was last written.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When this language was last written.
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
