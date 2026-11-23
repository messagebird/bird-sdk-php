<?php

namespace MessageBird\Wire\Model;

/**
 * Retained published content for one exact block language.
 */
class EmailBlockRevision extends \ArrayObject
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
     * Publication number within this block language. A draft's `revision` is the value to send back when saving, not a publication number.
     *
     * @var int|null
     */
    protected $versionNumber;
    /**
     * Format used to save and render this section: 2 for a section written as HTML, 1 for one built in the Bird dashboard's visual editor.
     *
     * @var int|null
     */
    protected $serializerVersion;
    /**
     * How this language is edited. `html` content is written as HTML and can be changed through the API, CLI and MCP. `visual` content is built in the Bird dashboard's visual editor; outside the dashboard, a visual section can still be copied by duplicating its block or restoring a published revision. The mode follows from the stored content and cannot be set directly. New values may be added; treat an unknown value as content you cannot edit through the API, CLI or MCP.
     *
     * @var string|null
     */
    protected $authoringMode;
    /**
     * @var string|null
     */
    protected $sourceRevisionId;
    /**
     * @var Actor|null
     */
    protected $publishedBy;
    /**
     * @var \DateTime|null
     */
    protected $publishedAt;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * One self-contained email section. Version 2 is a section written as HTML and sends `fragment_html` alone; the API, SDKs, CLI and MCP write version 2. Version 1 is reserved for sections built in the Bird dashboard's visual editor, and only the dashboard saves it. A block language keeps the version it was created with.
     *
     * @var EmailBlockFragment|null
     */
    protected $fragment;
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
     * Publication number within this block language. A draft's `revision` is the value to send back when saving, not a publication number.
     *
     * @return int|null
     */
    public function getVersionNumber(): ?int
    {
        return $this->versionNumber;
    }
    /**
     * Publication number within this block language. A draft's `revision` is the value to send back when saving, not a publication number.
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
     * Format used to save and render this section: 2 for a section written as HTML, 1 for one built in the Bird dashboard's visual editor.
     *
     * @return int|null
     */
    public function getSerializerVersion(): ?int
    {
        return $this->serializerVersion;
    }
    /**
     * Format used to save and render this section: 2 for a section written as HTML, 1 for one built in the Bird dashboard's visual editor.
     *
     * @param int|null $serializerVersion
     *
     * @return self
     */
    public function setSerializerVersion(?int $serializerVersion): self
    {
        $this->initialized['serializerVersion'] = true;
        $this->serializerVersion = $serializerVersion;
        return $this;
    }
    /**
     * How this language is edited. `html` content is written as HTML and can be changed through the API, CLI and MCP. `visual` content is built in the Bird dashboard's visual editor; outside the dashboard, a visual section can still be copied by duplicating its block or restoring a published revision. The mode follows from the stored content and cannot be set directly. New values may be added; treat an unknown value as content you cannot edit through the API, CLI or MCP.
     *
     * @return string|null
     */
    public function getAuthoringMode(): ?string
    {
        return $this->authoringMode;
    }
    /**
     * How this language is edited. `html` content is written as HTML and can be changed through the API, CLI and MCP. `visual` content is built in the Bird dashboard's visual editor; outside the dashboard, a visual section can still be copied by duplicating its block or restoring a published revision. The mode follows from the stored content and cannot be set directly. New values may be added; treat an unknown value as content you cannot edit through the API, CLI or MCP.
     *
     * @param string|null $authoringMode
     *
     * @return self
     */
    public function setAuthoringMode(?string $authoringMode): self
    {
        $this->initialized['authoringMode'] = true;
        $this->authoringMode = $authoringMode;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getSourceRevisionId(): ?string
    {
        return $this->sourceRevisionId;
    }
    /**
     * @param string|null $sourceRevisionId
     *
     * @return self
     */
    public function setSourceRevisionId(?string $sourceRevisionId): self
    {
        $this->initialized['sourceRevisionId'] = true;
        $this->sourceRevisionId = $sourceRevisionId;
        return $this;
    }
    /**
     * @return Actor|null
     */
    public function getPublishedBy(): ?Actor
    {
        return $this->publishedBy;
    }
    /**
     * @param Actor|null $publishedBy
     *
     * @return self
     */
    public function setPublishedBy(?Actor $publishedBy): self
    {
        $this->initialized['publishedBy'] = true;
        $this->publishedBy = $publishedBy;
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
    /**
     * One self-contained email section. Version 2 is a section written as HTML and sends `fragment_html` alone; the API, SDKs, CLI and MCP write version 2. Version 1 is reserved for sections built in the Bird dashboard's visual editor, and only the dashboard saves it. A block language keeps the version it was created with.
     *
     * @return EmailBlockFragment|null
     */
    public function getFragment(): ?EmailBlockFragment
    {
        return $this->fragment;
    }
    /**
     * One self-contained email section. Version 2 is a section written as HTML and sends `fragment_html` alone; the API, SDKs, CLI and MCP write version 2. Version 1 is reserved for sections built in the Bird dashboard's visual editor, and only the dashboard saves it. A block language keeps the version it was created with.
     *
     * @param EmailBlockFragment|null $fragment
     *
     * @return self
     */
    public function setFragment(?EmailBlockFragment $fragment): self
    {
        $this->initialized['fragment'] = true;
        $this->fragment = $fragment;
        return $this;
    }
}
