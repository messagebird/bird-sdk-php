<?php

namespace MessageBird\Wire\Model;

class AssetReference
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
     * What kind of resource this is. New kinds appear as other products start using the media library, so treat an unfamiliar value as a resource this client does not know how to link to rather than as an error.
     *
     * @var string|null
     */
    protected $resourceType;
    /**
     * The resource's own identifier, carrying that resource's prefix (`emt_` for an email template), for linking straight to it.
     *
     * @var string|null
     */
    protected $resourceId;
    /**
     * The resource's current display name, read when you list references.
     *
     * @var string|null
     */
    protected $resourceName;
    /**
     * Which copy of a resource uses an asset.
     * 
     * - `draft`: it is not reaching anyone yet.
     * - `published`: the change has to be published before recipients see it.
     * - `both`: the asset is used in both copies.
     * 
     *
     * @var string|null
     */
    protected $usage;
    /**
     * What kind of resource this is. New kinds appear as other products start using the media library, so treat an unfamiliar value as a resource this client does not know how to link to rather than as an error.
     *
     * @return string|null
     */
    public function getResourceType(): ?string
    {
        return $this->resourceType;
    }
    /**
     * What kind of resource this is. New kinds appear as other products start using the media library, so treat an unfamiliar value as a resource this client does not know how to link to rather than as an error.
     *
     * @param string|null $resourceType
     *
     * @return self
     */
    public function setResourceType(?string $resourceType): self
    {
        $this->initialized['resourceType'] = true;
        $this->resourceType = $resourceType;
        return $this;
    }
    /**
     * The resource's own identifier, carrying that resource's prefix (`emt_` for an email template), for linking straight to it.
     *
     * @return string|null
     */
    public function getResourceId(): ?string
    {
        return $this->resourceId;
    }
    /**
     * The resource's own identifier, carrying that resource's prefix (`emt_` for an email template), for linking straight to it.
     *
     * @param string|null $resourceId
     *
     * @return self
     */
    public function setResourceId(?string $resourceId): self
    {
        $this->initialized['resourceId'] = true;
        $this->resourceId = $resourceId;
        return $this;
    }
    /**
     * The resource's current display name, read when you list references.
     *
     * @return string|null
     */
    public function getResourceName(): ?string
    {
        return $this->resourceName;
    }
    /**
     * The resource's current display name, read when you list references.
     *
     * @param string|null $resourceName
     *
     * @return self
     */
    public function setResourceName(?string $resourceName): self
    {
        $this->initialized['resourceName'] = true;
        $this->resourceName = $resourceName;
        return $this;
    }
    /**
     * Which copy of a resource uses an asset.
     * 
     * - `draft`: it is not reaching anyone yet.
     * - `published`: the change has to be published before recipients see it.
     * - `both`: the asset is used in both copies.
     * 
     *
     * @return string|null
     */
    public function getUsage(): ?string
    {
        return $this->usage;
    }
    /**
    * Which copy of a resource uses an asset.
    
    - `draft`: it is not reaching anyone yet.
    - `published`: the change has to be published before recipients see it.
    - `both`: the asset is used in both copies.
    
    *
    * @param string|null $usage
    *
    * @return self
    */
    public function setUsage(?string $usage): self
    {
        $this->initialized['usage'] = true;
        $this->usage = $usage;
        return $this;
    }
}
