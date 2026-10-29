<?php

namespace MessageBird\Wire\Model;

class AMBNativeInboundListPickerSection
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
     * Heading shown above this section's rows.
     *
     * @var string|null
     */
    protected $title;
    /**
     * Where this section sits relative to its siblings, ascending. Sections omitting it are laid out in list order, after any that specify one.
     *
     * @var int|null
     */
    protected $order;
    /**
     * The rows in this section.
     *
     * @var list<AMBListPickerItem>|null
     */
    protected $items;
    /**
     * Whether the customer can select more than one row in this section.
     *
     * @var bool|null
     */
    protected $multipleSelection = false;
    /**
     * Heading shown above this section's rows.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * Heading shown above this section's rows.
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
     * Where this section sits relative to its siblings, ascending. Sections omitting it are laid out in list order, after any that specify one.
     *
     * @return int|null
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }
    /**
     * Where this section sits relative to its siblings, ascending. Sections omitting it are laid out in list order, after any that specify one.
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
    /**
     * The rows in this section.
     *
     * @return list<AMBListPickerItem>|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }
    /**
     * The rows in this section.
     *
     * @param list<AMBListPickerItem>|null $items
     *
     * @return self
     */
    public function setItems(?array $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;
        return $this;
    }
    /**
     * Whether the customer can select more than one row in this section.
     *
     * @return bool|null
     */
    public function getMultipleSelection(): ?bool
    {
        return $this->multipleSelection;
    }
    /**
     * Whether the customer can select more than one row in this section.
     *
     * @param bool|null $multipleSelection
     *
     * @return self
     */
    public function setMultipleSelection(?bool $multipleSelection): self
    {
        $this->initialized['multipleSelection'] = true;
        $this->multipleSelection = $multipleSelection;
        return $this;
    }
}
