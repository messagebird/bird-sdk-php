<?php

namespace MessageBird\Wire\Model;

/**
 * A label in the workspace catalogue. Its `id` is accepted by every operation that takes a `label_id` and stays the same when the label is renamed.
 */
class Label extends \ArrayObject
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
     * The label name, unique in the workspace regardless of case. No commas, control characters, or leading or trailing whitespace. System names such as `inbox`, `sent`, `unread`, `open` or `assigned` are reserved.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The label colour as a `#RRGGBB` hex value, or `null` when none is set.
     *
     * @var string|null
     */
    protected $color;
    /**
     * When to apply the label, or `null` when none is set.
     *
     * @var string|null
     */
    protected $description;
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
     * The label name, unique in the workspace regardless of case. No commas, control characters, or leading or trailing whitespace. System names such as `inbox`, `sent`, `unread`, `open` or `assigned` are reserved.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The label name, unique in the workspace regardless of case. No commas, control characters, or leading or trailing whitespace. System names such as `inbox`, `sent`, `unread`, `open` or `assigned` are reserved.
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
     * The label colour as a `#RRGGBB` hex value, or `null` when none is set.
     *
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }
    /**
     * The label colour as a `#RRGGBB` hex value, or `null` when none is set.
     *
     * @param string|null $color
     *
     * @return self
     */
    public function setColor(?string $color): self
    {
        $this->initialized['color'] = true;
        $this->color = $color;
        return $this;
    }
    /**
     * When to apply the label, or `null` when none is set.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * When to apply the label, or `null` when none is set.
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
