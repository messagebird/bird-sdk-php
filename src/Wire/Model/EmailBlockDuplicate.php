<?php

namespace MessageBird\Wire\Model;

/**
 * Copy all current draft languages into a new unpublished block.
 */
class EmailBlockDuplicate
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
     * Source metadata revision last read. A change while copying returns 409.
     *
     * @var int|null
     */
    protected $revision;
    /**
     * Name for the new block.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Source metadata revision last read. A change while copying returns 409.
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * Source metadata revision last read. A change while copying returns 409.
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
     * Name for the new block.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name for the new block.
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
}
