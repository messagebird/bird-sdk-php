<?php

namespace MessageBird\Wire\Model;

class AMBInboundFormSelection
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
    protected $pageIdentifier;
    /**
     * Page title returned by Apple. Empty when the page has no title.
     *
     * @var string|null
     */
    protected $title;
    /**
     * @var string|null
     */
    protected $subtitle;
    /**
     * @var list<AMBInboundFormItem>|null
     */
    protected $items;
    /**
     * @return string|null
     */
    public function getPageIdentifier(): ?string
    {
        return $this->pageIdentifier;
    }
    /**
     * @param string|null $pageIdentifier
     *
     * @return self
     */
    public function setPageIdentifier(?string $pageIdentifier): self
    {
        $this->initialized['pageIdentifier'] = true;
        $this->pageIdentifier = $pageIdentifier;
        return $this;
    }
    /**
     * Page title returned by Apple. Empty when the page has no title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * Page title returned by Apple. Empty when the page has no title.
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
     * @return string|null
     */
    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }
    /**
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
     * @return list<AMBInboundFormItem>|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }
    /**
     * @param list<AMBInboundFormItem>|null $items
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
