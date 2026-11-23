<?php

namespace MessageBird\Wire\Model;

/**
 * A reusable email section with independently editable languages.
 */
class EmailBlock extends \ArrayObject
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
     * Name for people choosing the block, such as when linking it into a template.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Optional notes for people maintaining the block. Omitted when empty.
     *
     * @var string|null
     */
    protected $description;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $sourceLanguage;
    /**
     * Metadata revision to send when editing or duplicating this block.
     *
     * @var int|null
     */
    protected $revision;
    /**
     * @var Actor|null
     */
    protected $createdBy;
    /**
     * Present when the block is archived. Retained published content remains readable.
     *
     * @var \DateTime|null
     */
    protected $archivedAt;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
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
     * Name for people choosing the block, such as when linking it into a template.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name for people choosing the block, such as when linking it into a template.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Optional notes for people maintaining the block. Omitted when empty.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Optional notes for people maintaining the block. Omitted when empty.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @return string|null
     */
    public function getSourceLanguage(): ?string
    {
        return $this->sourceLanguage;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @param string|null $sourceLanguage
     *
     * @return self
     */
    public function setSourceLanguage(?string $sourceLanguage): self
    {
        $this->initialized['sourceLanguage'] = true;
        $this->sourceLanguage = $sourceLanguage;
        return $this;
    }
    /**
     * Metadata revision to send when editing or duplicating this block.
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * Metadata revision to send when editing or duplicating this block.
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
     * @return Actor|null
     */
    public function getCreatedBy(): ?Actor
    {
        return $this->createdBy;
    }
    /**
     * @param Actor|null $createdBy
     *
     * @return self
     */
    public function setCreatedBy(?Actor $createdBy): self
    {
        $this->initialized['createdBy'] = true;
        $this->createdBy = $createdBy;
        return $this;
    }
    /**
     * Present when the block is archived. Retained published content remains readable.
     *
     * @return \DateTime|null
     */
    public function getArchivedAt(): ?\DateTime
    {
        return $this->archivedAt;
    }
    /**
     * Present when the block is archived. Retained published content remains readable.
     *
     * @param \DateTime|null $archivedAt
     *
     * @return self
     */
    public function setArchivedAt(?\DateTime $archivedAt): self
    {
        $this->initialized['archivedAt'] = true;
        $this->archivedAt = $archivedAt;
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
