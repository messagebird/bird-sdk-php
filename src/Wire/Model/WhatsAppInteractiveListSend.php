<?php

namespace MessageBird\Wire\Model;

/**
 * Button-opened menu; selecting an option sends a reply.
 */
class WhatsAppInteractiveListSend
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
     * The label of the button that opens the menu.
     *
     * @var string|null
     */
    protected $buttonText;
    /**
     * Sections in display order. At most 10 rows total, with labels unique across the message.
     *
     * @var list<WhatsAppInteractiveListSectionSend>|null
     */
    protected $sections;
    /**
     * The label of the button that opens the menu.
     *
     * @return string|null
     */
    public function getButtonText(): ?string
    {
        return $this->buttonText;
    }
    /**
     * The label of the button that opens the menu.
     *
     * @param string|null $buttonText
     *
     * @return self
     */
    public function setButtonText(?string $buttonText): self
    {
        $this->initialized['buttonText'] = true;
        $this->buttonText = $buttonText;
        return $this;
    }
    /**
     * Sections in display order. At most 10 rows total, with labels unique across the message.
     *
     * @return list<WhatsAppInteractiveListSectionSend>|null
     */
    public function getSections(): ?array
    {
        return $this->sections;
    }
    /**
     * Sections in display order. At most 10 rows total, with labels unique across the message.
     *
     * @param list<WhatsAppInteractiveListSectionSend>|null $sections
     *
     * @return self
     */
    public function setSections(?array $sections): self
    {
        $this->initialized['sections'] = true;
        $this->sections = $sections;
        return $this;
    }
}
