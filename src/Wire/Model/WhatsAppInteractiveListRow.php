<?php

namespace MessageBird\Wire\Model;

class WhatsAppInteractiveListRow
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
     * The handle the row carries back, never shown to the recipient.
     *
     * @var string|null
     */
    protected $slug;
    /**
     * The row's label, shown as its title in the menu.
     *
     * @var string|null
     */
    protected $text;
    /**
     * The second line under the label. Absent when the row carried none.
     *
     * @var string|null
     */
    protected $description;
    /**
     * The handle the row carries back, never shown to the recipient.
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * The handle the row carries back, never shown to the recipient.
     *
     * @param string|null $slug
     *
     * @return self
     */
    public function setSlug(?string $slug): self
    {
        $this->initialized['slug'] = true;
        $this->slug = $slug;
        return $this;
    }
    /**
     * The row's label, shown as its title in the menu.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The row's label, shown as its title in the menu.
     *
     * @param string|null $text
     *
     * @return self
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
    /**
     * The second line under the label. Absent when the row carried none.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * The second line under the label. Absent when the row carried none.
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
