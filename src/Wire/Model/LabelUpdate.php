<?php

namespace MessageBird\Wire\Model;

/**
 * Fields to change. Omitted fields are left unchanged; `null` clears `color` or `description`. A body with none of `name`, `color` or `description` is refused; one that resends current values is accepted.
 */
class LabelUpdate
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
     * The label name, unique in the workspace regardless of case. No commas, control characters, or leading or trailing whitespace. System names such as `inbox`, `sent`, `unread`, `open` or `assigned` are reserved.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The new colour, or `null` to remove it.
     *
     * @var string|null
     */
    protected $color;
    /**
     * The new description, or `null` to remove it.
     *
     * @var string|null
     */
    protected $description;
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
     * The new colour, or `null` to remove it.
     *
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }
    /**
     * The new colour, or `null` to remove it.
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
     * The new description, or `null` to remove it.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * The new description, or `null` to remove it.
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
}
