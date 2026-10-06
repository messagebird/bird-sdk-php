<?php

namespace MessageBird\Wire\Model;

class EsimUpdate
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
     * Free-text label for your own reference. Null clears it.
     *
     * @var string|null
     */
    protected $displayName;
    /**
     * Replaces the eSIM's tags.
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Replaces the eSIM's metadata. Maximum 2 KB serialized.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * Free-text label for your own reference. Null clears it.
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * Free-text label for your own reference. Null clears it.
     *
     * @param string|null $displayName
     *
     * @return self
     */
    public function setDisplayName(?string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * Replaces the eSIM's tags.
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Replaces the eSIM's tags.
     *
     * @param list<Tag>|null $tags
     *
     * @return self
     */
    public function setTags(?array $tags): self
    {
        $this->initialized['tags'] = true;
        $this->tags = $tags;
        return $this;
    }
    /**
     * Replaces the eSIM's metadata. Maximum 2 KB serialized.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Replaces the eSIM's metadata. Maximum 2 KB serialized.
     *
     * @param array<string, mixed>|null $metadata
     *
     * @return self
     */
    public function setMetadata(?iterable $metadata): self
    {
        $this->initialized['metadata'] = true;
        $this->metadata = $metadata;
        return $this;
    }
}
