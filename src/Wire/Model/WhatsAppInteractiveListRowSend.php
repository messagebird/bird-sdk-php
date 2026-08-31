<?php

namespace MessageBird\Wire\Model;

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
     * Your own handle for this option, echoed back on the reply. You choose the value and it is never shown to the recipient. Any characters, up to 200.
     * 
     *
     * @var string|null
     */
    protected $slug;
    /**
     * The option's label, shown as the row's title in the menu. It must differ from every other row's label and from every button's label in the same message, not merely within its own group; a repeat returns a `422` `WhatsAppInteractiveDuplicateLabel`.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * A second line under the label, for detail that will not fit in it.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Your own handle for this option, echoed back on the reply. You choose the value and it is never shown to the recipient. Any characters, up to 200.
     * 
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * Your own handle for this option, echoed back on the reply. You choose the value and it is never shown to the recipient. Any characters, up to 200.
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
     * The option's label, shown as the row's title in the menu. It must differ from every other row's label and from every button's label in the same message, not merely within its own group; a repeat returns a `422` `WhatsAppInteractiveDuplicateLabel`.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The option's label, shown as the row's title in the menu. It must differ from every other row's label and from every button's label in the same message, not merely within its own group; a repeat returns a `422` `WhatsAppInteractiveDuplicateLabel`.
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
     * A second line under the label, for detail that will not fit in it.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * A second line under the label, for detail that will not fit in it.
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
