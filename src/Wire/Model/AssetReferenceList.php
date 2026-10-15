<?php

namespace MessageBird\Wire\Model;

class AssetReferenceList
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
     * @var list<AssetReference>|null
     */
    protected $data;
    /**
     * True when more resources use this asset than one response can carry, so the list is a partial answer. Replace the asset's usages you can see, then list again to find the rest.
     *
     * @var bool|null
     */
    protected $truncated;
    /**
     * @return list<AssetReference>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * @param list<AssetReference>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
    /**
     * True when more resources use this asset than one response can carry, so the list is a partial answer. Replace the asset's usages you can see, then list again to find the rest.
     *
     * @return bool|null
     */
    public function getTruncated(): ?bool
    {
        return $this->truncated;
    }
    /**
     * True when more resources use this asset than one response can carry, so the list is a partial answer. Replace the asset's usages you can see, then list again to find the rest.
     *
     * @param bool|null $truncated
     *
     * @return self
     */
    public function setTruncated(?bool $truncated): self
    {
        $this->initialized['truncated'] = true;
        $this->truncated = $truncated;
        return $this;
    }
}
