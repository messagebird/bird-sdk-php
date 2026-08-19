<?php

namespace MessageBird\Wire\Model;

class ContactProperty extends \ArrayObject
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
     * The property key, used as the key in contact data and as the attribute in the `bird.contact.<key>` broadcast template variable. Lowercase letters, digits, and underscores, starting with a letter. Cannot be changed after creation.
     *
     * @var string|null
     */
    protected $key;
    /**
     * The value type every contact must use for a property. Cannot be changed after creation.
     * 
     * `datetime` values are RFC 3339 timestamps with an explicit offset. Examples include `2024-01-15T09:30:00Z` and `2024-01-15T11:30:00+02:00`. A bare date or a time with no offset is rejected. The value is normalized to UTC with second precision on write, so `2024-01-15T11:30:00+02:00` is stored and returned as `2024-01-15T09:30:00Z`, and any fractional seconds are dropped.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * Default used when a contact has no value for this property and the template does not supply an inline fallback. A string, number, boolean, or RFC 3339 datetime matching the declared type (strings up to `500` characters), or `null` when no fallback is set.
     *
     * @var mixed|null
     */
    protected $fallbackValue;
    /**
     * Whether the property is archived. An archived property is rejected in new contact writes and stops rendering in templates, but every value already stored on contacts is preserved. Reactivate it with unarchive.
     *
     * @var bool|null
     */
    protected $archived;
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
     * The property key, used as the key in contact data and as the attribute in the `bird.contact.<key>` broadcast template variable. Lowercase letters, digits, and underscores, starting with a letter. Cannot be changed after creation.
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }
    /**
     * The property key, used as the key in contact data and as the attribute in the `bird.contact.<key>` broadcast template variable. Lowercase letters, digits, and underscores, starting with a letter. Cannot be changed after creation.
     *
     * @param string|null $key
     *
     * @return self
     */
    public function setKey(?string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * The value type every contact must use for a property. Cannot be changed after creation.
     * 
     * `datetime` values are RFC 3339 timestamps with an explicit offset. Examples include `2024-01-15T09:30:00Z` and `2024-01-15T11:30:00+02:00`. A bare date or a time with no offset is rejected. The value is normalized to UTC with second precision on write, so `2024-01-15T11:30:00+02:00` is stored and returned as `2024-01-15T09:30:00Z`, and any fractional seconds are dropped.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
    * The value type every contact must use for a property. Cannot be changed after creation.
    
    `datetime` values are RFC 3339 timestamps with an explicit offset. Examples include `2024-01-15T09:30:00Z` and `2024-01-15T11:30:00+02:00`. A bare date or a time with no offset is rejected. The value is normalized to UTC with second precision on write, so `2024-01-15T11:30:00+02:00` is stored and returned as `2024-01-15T09:30:00Z`, and any fractional seconds are dropped.
    
    *
    * @param string|null $type
    *
    * @return self
    */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * Default used when a contact has no value for this property and the template does not supply an inline fallback. A string, number, boolean, or RFC 3339 datetime matching the declared type (strings up to `500` characters), or `null` when no fallback is set.
     *
     * @return mixed
     */
    public function getFallbackValue()
    {
        return $this->fallbackValue;
    }
    /**
     * Default used when a contact has no value for this property and the template does not supply an inline fallback. A string, number, boolean, or RFC 3339 datetime matching the declared type (strings up to `500` characters), or `null` when no fallback is set.
     *
     * @param mixed $fallbackValue
     *
     * @return self
     */
    public function setFallbackValue($fallbackValue): self
    {
        $this->initialized['fallbackValue'] = true;
        $this->fallbackValue = $fallbackValue;
        return $this;
    }
    /**
     * Whether the property is archived. An archived property is rejected in new contact writes and stops rendering in templates, but every value already stored on contacts is preserved. Reactivate it with unarchive.
     *
     * @return bool|null
     */
    public function getArchived(): ?bool
    {
        return $this->archived;
    }
    /**
     * Whether the property is archived. An archived property is rejected in new contact writes and stops rendering in templates, but every value already stored on contacts is preserved. Reactivate it with unarchive.
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
