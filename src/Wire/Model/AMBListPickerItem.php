<?php

namespace MessageBird\Wire\Model;

class AMBListPickerItem
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
     * Opaque item identifier returned in interactive_data.data.list_picker.sections.
     *
     * @var string|null
     */
    protected $identifier;
    /**
     * Label shown on the row.
     *
     * @var string|null
     */
    protected $title;
    /**
     * Secondary line shown under the title.
     *
     * @var string|null
     */
    protected $subtitle;
    /**
     * Identifier of an image in interactive_data.data.images, shown next to this row. A key with no matching entry in `images` is refused with a `422` `AMBInteractiveImageInvalid`.
     *
     * @var string|null
     */
    protected $imageIdentifier;
    /**
     * Position within the section, ascending. Defaults to the row's array position.
     *
     * @var int|null
     */
    protected $order;
    /**
     * Opaque item identifier returned in interactive_data.data.list_picker.sections.
     *
     * @return string|null
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }
    /**
     * Opaque item identifier returned in interactive_data.data.list_picker.sections.
     *
     * @param string|null $identifier
     *
     * @return self
     */
    public function setIdentifier(?string $identifier): self
    {
        $this->initialized['identifier'] = true;
        $this->identifier = $identifier;
        return $this;
    }
    /**
     * Label shown on the row.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * Label shown on the row.
     *
     * @param string|null $title
     *
     * @return self
     */
    public function setTitle(?string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;
        return $this;
    }
    /**
     * Secondary line shown under the title.
     *
     * @return string|null
     */
    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }
    /**
     * Secondary line shown under the title.
     *
     * @param string|null $subtitle
     *
     * @return self
     */
    public function setSubtitle(?string $subtitle): self
    {
        $this->initialized['subtitle'] = true;
        $this->subtitle = $subtitle;
        return $this;
    }
    /**
     * Identifier of an image in interactive_data.data.images, shown next to this row. A key with no matching entry in `images` is refused with a `422` `AMBInteractiveImageInvalid`.
     *
     * @return string|null
     */
    public function getImageIdentifier(): ?string
    {
        return $this->imageIdentifier;
    }
    /**
     * Identifier of an image in interactive_data.data.images, shown next to this row. A key with no matching entry in `images` is refused with a `422` `AMBInteractiveImageInvalid`.
     *
     * @param string|null $imageIdentifier
     *
     * @return self
     */
    public function setImageIdentifier(?string $imageIdentifier): self
    {
        $this->initialized['imageIdentifier'] = true;
        $this->imageIdentifier = $imageIdentifier;
        return $this;
    }
    /**
     * Position within the section, ascending. Defaults to the row's array position.
     *
     * @return int|null
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }
    /**
     * Position within the section, ascending. Defaults to the row's array position.
     *
     * @param int|null $order
     *
     * @return self
     */
    public function setOrder(?int $order): self
    {
        $this->initialized['order'] = true;
        $this->order = $order;
        return $this;
    }
}
