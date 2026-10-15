<?php

namespace MessageBird\Wire\Model;

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
     * Apple message families with Bird field naming and media URLs. Authentication and Apple Pay requests are created through their dedicated conversation endpoints.
     *
     * @var mixed|null
     */
    protected $content;
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
     * Apple message families with Bird field naming and media URLs. Authentication and Apple Pay requests are created through their dedicated conversation endpoints.
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * Apple message families with Bird field naming and media URLs. Authentication and Apple Pay requests are created through their dedicated conversation endpoints.
     *
     * @param mixed $content
     *
     * @return self
     */
    public function setContent($content): self
    {
        $this->initialized['content'] = true;
        $this->content = $content;
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
