<?php

namespace MessageBird\Wire\Model;

class SMSTemplateVersionLanguage
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
     * SMS template text, limited to 16 KiB of UTF-8 source. Blank text can be saved in a draft but cannot be published. Workspace templates support scalar variables, conditional text, and bounded filters. Loops, assignments, captures, partials, collections, and string-expanding filters are rejected.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * This language's revision counter.
     *
     * @var int|null
     */
    protected $revision;
    /**
     * A fingerprint of SMS template text, prefixed with its algorithm. Compare it within this API version to identify the exact source without transferring it.
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
     * SMS template text, limited to 16 KiB of UTF-8 source. Blank text can be saved in a draft but cannot be published. Workspace templates support scalar variables, conditional text, and bounded filters. Loops, assignments, captures, partials, collections, and string-expanding filters are rejected.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * SMS template text, limited to 16 KiB of UTF-8 source. Blank text can be saved in a draft but cannot be published. Workspace templates support scalar variables, conditional text, and bounded filters. Loops, assignments, captures, partials, collections, and string-expanding filters are rejected.
     *
     * @param string|null $text
     *
     * @return self
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
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
     * A fingerprint of SMS template text, prefixed with its algorithm. Compare it within this API version to identify the exact source without transferring it.
     * 
     *
     * @return string|null
     */
    public function getContentHash(): ?string
    {
        return $this->contentHash;
    }
    /**
     * A fingerprint of SMS template text, prefixed with its algorithm. Compare it within this API version to identify the exact source without transferring it.
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
