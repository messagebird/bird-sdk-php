<?php

namespace MessageBird\Wire\Model;

class AssetFolderUpdate
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
     * The folder's display name. Must be unique among folders sharing the same parent, compared without regard to case. Cannot contain `/`.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The folder to move this one into. Send null to move it to the top level of the library. A folder cannot be moved into itself or into one of its own subfolders.
     *
     * @var string|null
     */
    protected $parentId;
    /**
     * The folder's display name. Must be unique among folders sharing the same parent, compared without regard to case. Cannot contain `/`.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The folder's display name. Must be unique among folders sharing the same parent, compared without regard to case. Cannot contain `/`.
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
     * The folder to move this one into. Send null to move it to the top level of the library. A folder cannot be moved into itself or into one of its own subfolders.
     *
     * @return string|null
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }
    /**
     * The folder to move this one into. Send null to move it to the top level of the library. A folder cannot be moved into itself or into one of its own subfolders.
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
}
