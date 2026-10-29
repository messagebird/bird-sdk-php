<?php

namespace MessageBird\Wire\Model;

class AMBNativeInboundQuickReply
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
     * Identifier selected by the customer.
     *
     * @var string|null
     */
    protected $selectedIdentifier;
    /**
     * Index reported by Apple.
     *
     * @var int|null
     */
    protected $selectedIndex;
    /**
     * Items returned by the customer device.
     *
     * @var list<AMBQuickReplyItem>|null
     */
    protected $items;
    /**
     * Identifier selected by the customer.
     *
     * @return string|null
     */
    public function getSelectedIdentifier(): ?string
    {
        return $this->selectedIdentifier;
    }
    /**
     * Identifier selected by the customer.
     *
     * @param string|null $selectedIdentifier
     *
     * @return self
     */
    public function setSelectedIdentifier(?string $selectedIdentifier): self
    {
        $this->initialized['selectedIdentifier'] = true;
        $this->selectedIdentifier = $selectedIdentifier;
        return $this;
    }
    /**
     * Index reported by Apple.
     *
     * @return int|null
     */
    public function getSelectedIndex(): ?int
    {
        return $this->selectedIndex;
    }
    /**
     * Index reported by Apple.
     *
     * @param int|null $selectedIndex
     *
     * @return self
     */
    public function setSelectedIndex(?int $selectedIndex): self
    {
        $this->initialized['selectedIndex'] = true;
        $this->selectedIndex = $selectedIndex;
        return $this;
    }
    /**
     * Items returned by the customer device.
     *
     * @return list<AMBQuickReplyItem>|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }
    /**
     * Items returned by the customer device.
     *
     * @param list<AMBQuickReplyItem>|null $items
     *
     * @return self
     */
    public function setItems(?array $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;
        return $this;
    }
}
