<?php

namespace MessageBird\Wire\Model;

/**
 * Editable content for one exact language. No language fallback is applied.
 */
class EmailBlockLanguage extends \ArrayObject
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
     * Draft revision to send back when saving or publishing this language, as last returned. It is not a publication number; a published revision is a separate record numbered by `version_number`.
     *
     * @var int|null
     */
    protected $revision;
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
     * @var string|null
     */
    protected $publishedRevisionId;
    /**
     * One self-contained email section. Version 2 is a section written as HTML and sends `fragment_html` alone; the API, SDKs, CLI and MCP write version 2. Version 1 is reserved for sections built in the Bird dashboard's visual editor, and only the dashboard saves it. A block language keeps the version it was created with.
     *
     * @var EmailBlockFragment|null
     */
    protected $fragment;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
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
     * Draft revision to send back when saving or publishing this language, as last returned. It is not a publication number; a published revision is a separate record numbered by `version_number`.
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * Draft revision to send back when saving or publishing this language, as last returned. It is not a publication number; a published revision is a separate record numbered by `version_number`.
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
     * @return string|null
     */
    public function getPublishedRevisionId(): ?string
    {
        return $this->publishedRevisionId;
    }
    /**
     * @param string|null $publishedRevisionId
     *
     * @return self
     */
    public function setPublishedRevisionId(?string $publishedRevisionId): self
    {
        $this->initialized['publishedRevisionId'] = true;
        $this->publishedRevisionId = $publishedRevisionId;
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
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
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
