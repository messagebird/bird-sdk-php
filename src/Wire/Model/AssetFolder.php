<?php

namespace MessageBird\Wire\Model;

/**
 * A folder in the workspace's media library. Folders organize assets for the people browsing them and never appear in an asset's URL, so moving an asset between folders leaves every message that already embeds it untouched.
 */
class AssetFolder extends \ArrayObject
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
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @var string|null
     */
    protected $id;
    /**
     * The folder's display name. Unique among folders sharing the same parent, compared without regard to case.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The folder this one sits in, or null when it sits at the top level of the library.
     *
     * @var string|null
     */
    protected $parentId;
    /**
     * The folder's location written out from the top level, such as `/Marketing/Logos`. Provided so a caller can display a folder without walking its parents.
     *
     * @var string|null
     */
    protected $path;
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
     * The folder's display name. Unique among folders sharing the same parent, compared without regard to case.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The folder's display name. Unique among folders sharing the same parent, compared without regard to case.
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
     * The folder this one sits in, or null when it sits at the top level of the library.
     *
     * @return string|null
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }
    /**
     * The folder this one sits in, or null when it sits at the top level of the library.
     *
     * @param string|null $parentId
     *
     * @return self
     */
    public function setParentId(?string $parentId): self
    {
        $this->initialized['parentId'] = true;
        $this->parentId = $parentId;
        return $this;
    }
    /**
     * The folder's location written out from the top level, such as `/Marketing/Logos`. Provided so a caller can display a folder without walking its parents.
     *
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }
    /**
     * The folder's location written out from the top level, such as `/Marketing/Logos`. Provided so a caller can display a folder without walking its parents.
     *
     * @param string|null $path
     *
     * @return self
     */
    public function setPath(?string $path): self
    {
        $this->initialized['path'] = true;
        $this->path = $path;
        return $this;
    }
}
