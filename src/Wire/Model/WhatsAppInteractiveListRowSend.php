<?php

namespace MessageBird\Wire\Model;

/**
 * Menu option; selection returns `slug` in an inbound `interactive_reply`.
 */
class WhatsAppInteractiveListRowSend
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
     * Hidden reply identifier, echoed on selection. Any characters, up to 200.
     *
     * @var string|null
     */
    protected $slug;
    /**
     * Row label, unique across every section's rows; duplicates return `422` `WhatsAppInteractiveDuplicateLabel`.
     *
     * @var string|null
     */
    protected $text;
    /**
     * Detail shown below the label.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Hidden reply identifier, echoed on selection. Any characters, up to 200.
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * Hidden reply identifier, echoed on selection. Any characters, up to 200.
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
     * Row label, unique across every section's rows; duplicates return `422` `WhatsAppInteractiveDuplicateLabel`.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * Row label, unique across every section's rows; duplicates return `422` `WhatsAppInteractiveDuplicateLabel`.
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
     * Detail shown below the label.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Detail shown below the label.
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
