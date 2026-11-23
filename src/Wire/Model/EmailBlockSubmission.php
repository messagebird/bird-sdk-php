<?php

namespace MessageBird\Wire\Model;

/**
 * One block change put forward for publication. A change that needs no review is recorded already published.
 */
class EmailBlockSubmission
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
    protected $blockId;
    /**
     * Where a block change is in its lifecycle. `published` means its revisions are live. New values may be added; treat an unknown value as not yet live.
     *
     * @var string|null
     */
    protected $status;
    /**
     * Each included language, the draft revision it was taken from, and the snapshot frozen for it.
     *
     * @var list<EmailBlockSubmissionLanguage>|null
     */
    protected $languages;
    /**
     * The revisions that became live when this change was published.
     *
     * @var list<EmailBlockPublishedRevision>|null
     */
    protected $publishedRevisions;
    /**
     * @var \DateTime|null
     */
    protected $publishedAt;
    /**
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
    public function getBlockId(): ?string
    {
        return $this->blockId;
    }
    /**
     * @param string|null $blockId
     *
     * @return self
     */
    public function setBlockId(?string $blockId): self
    {
        $this->initialized['blockId'] = true;
        $this->blockId = $blockId;
        return $this;
    }
    /**
     * Where a block change is in its lifecycle. `published` means its revisions are live. New values may be added; treat an unknown value as not yet live.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Where a block change is in its lifecycle. `published` means its revisions are live. New values may be added; treat an unknown value as not yet live.
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
     * Each included language, the draft revision it was taken from, and the snapshot frozen for it.
     *
     * @return list<EmailBlockSubmissionLanguage>|null
     */
    public function getLanguages(): ?array
    {
        return $this->languages;
    }
    /**
     * Each included language, the draft revision it was taken from, and the snapshot frozen for it.
     *
     * @param list<EmailBlockSubmissionLanguage>|null $languages
     *
     * @return self
     */
    public function setLanguages(?array $languages): self
    {
        $this->initialized['languages'] = true;
        $this->languages = $languages;
        return $this;
    }
    /**
     * The revisions that became live when this change was published.
     *
     * @return list<EmailBlockPublishedRevision>|null
     */
    public function getPublishedRevisions(): ?array
    {
        return $this->publishedRevisions;
    }
    /**
     * The revisions that became live when this change was published.
     *
     * @param list<EmailBlockPublishedRevision>|null $publishedRevisions
     *
     * @return self
     */
    public function setPublishedRevisions(?array $publishedRevisions): self
    {
        $this->initialized['publishedRevisions'] = true;
        $this->publishedRevisions = $publishedRevisions;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getPublishedAt(): ?\DateTime
    {
        return $this->publishedAt;
    }
    /**
     * @param \DateTime|null $publishedAt
     *
     * @return self
     */
    public function setPublishedAt(?\DateTime $publishedAt): self
    {
        $this->initialized['publishedAt'] = true;
        $this->publishedAt = $publishedAt;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
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
