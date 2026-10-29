<?php

namespace MessageBird\Wire\Model;

class AMBNativeFormData
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
     * Identifier of the first page to show.
     *
     * @var string|null
     */
    protected $startPageIdentifier;
    /**
     * Whether Apple marks the submitted response as private.
     *
     * @var bool|null
     */
    protected $private = false;
    /**
     * Whether Apple shows a summary before the customer submits.
     *
     * @var bool|null
     */
    protected $showSummary = false;
    /**
     * @var AMBFormSplash|null
     */
    protected $splash;
    /**
     * Form pages referenced by the start page and navigation identifiers.
     *
     * @var list<mixed>|null
     */
    protected $pages;
    /**
     * Identifier of the first page to show.
     *
     * @return string|null
     */
    public function getStartPageIdentifier(): ?string
    {
        return $this->startPageIdentifier;
    }
    /**
     * Identifier of the first page to show.
     *
     * @param string|null $startPageIdentifier
     *
     * @return self
     */
    public function setStartPageIdentifier(?string $startPageIdentifier): self
    {
        $this->initialized['startPageIdentifier'] = true;
        $this->startPageIdentifier = $startPageIdentifier;
        return $this;
    }
    /**
     * Whether Apple marks the submitted response as private.
     *
     * @return bool|null
     */
    public function getPrivate(): ?bool
    {
        return $this->private;
    }
    /**
     * Whether Apple marks the submitted response as private.
     *
     * @param bool|null $private
     *
     * @return self
     */
    public function setPrivate(?bool $private): self
    {
        $this->initialized['private'] = true;
        $this->private = $private;
        return $this;
    }
    /**
     * Whether Apple shows a summary before the customer submits.
     *
     * @return bool|null
     */
    public function getShowSummary(): ?bool
    {
        return $this->showSummary;
    }
    /**
     * Whether Apple shows a summary before the customer submits.
     *
     * @param bool|null $showSummary
     *
     * @return self
     */
    public function setShowSummary(?bool $showSummary): self
    {
        $this->initialized['showSummary'] = true;
        $this->showSummary = $showSummary;
        return $this;
    }
    /**
     * @return AMBFormSplash|null
     */
    public function getSplash(): ?AMBFormSplash
    {
        return $this->splash;
    }
    /**
     * @param AMBFormSplash|null $splash
     *
     * @return self
     */
    public function setSplash(?AMBFormSplash $splash): self
    {
        $this->initialized['splash'] = true;
        $this->splash = $splash;
        return $this;
    }
    /**
     * Form pages referenced by the start page and navigation identifiers.
     *
     * @return list<mixed>|null
     */
    public function getPages(): ?array
    {
        return $this->pages;
    }
    /**
     * Form pages referenced by the start page and navigation identifiers.
     *
     * @param list<mixed>|null $pages
     *
     * @return self
     */
    public function setPages(?array $pages): self
    {
        $this->initialized['pages'] = true;
        $this->pages = $pages;
        return $this;
    }
}
