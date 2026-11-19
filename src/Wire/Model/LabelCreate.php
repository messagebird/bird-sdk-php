<?php

namespace MessageBird\Wire\Model;

class LabelCreate
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
     * The label colour as a `#RRGGBB` hex value.
     *
     * @var string|null
     */
    protected $color;
    /**
     * When to apply the label. People and agents read it when they decide which label fits.
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
     * The label colour as a `#RRGGBB` hex value.
     *
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }
    /**
     * The label colour as a `#RRGGBB` hex value.
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
     * When to apply the label. People and agents read it when they decide which label fits.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * When to apply the label. People and agents read it when they decide which label fits.
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
