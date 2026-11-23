<?php

namespace MessageBird\Wire\Model;

/**
 * Change block metadata without changing its content or publication state.
 */
class EmailBlockUpdate
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
     * Metadata revision last read. A concurrent change returns 409.
     *
     * @var int|null
     */
    protected $revision;
    /**
     * New name for the block.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Replacement maintenance notes. Send an empty string to clear them.
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
     * Archive or unarchive the block. Archiving retains its content and history.
     *
     * @var bool|null
     */
    protected $archived;
    /**
     * Metadata revision last read. A concurrent change returns 409.
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * Metadata revision last read. A concurrent change returns 409.
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
     * New name for the block.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * New name for the block.
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
     * Replacement maintenance notes. Send an empty string to clear them.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Replacement maintenance notes. Send an empty string to clear them.
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
     * Archive or unarchive the block. Archiving retains its content and history.
     *
     * @return bool|null
     */
    public function getArchived(): ?bool
    {
        return $this->archived;
    }
    /**
     * Archive or unarchive the block. Archiving retains its content and history.
     *
     * @param bool|null $archived
     *
     * @return self
     */
    public function setArchived(?bool $archived): self
    {
        $this->initialized['archived'] = true;
        $this->archived = $archived;
        return $this;
    }
}
