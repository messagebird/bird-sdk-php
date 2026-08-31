<?php

namespace MessageBird\Wire\Model;

class WhatsAppInteractiveList extends \ArrayObject
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
     * The groups of options in the menu, in the order shown.
     *
     * @var list<WhatsAppInteractiveListSection>|null
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
     * The groups of options in the menu, in the order shown.
     *
     * @return list<WhatsAppInteractiveListSection>|null
     */
    public function getSections(): ?array
    {
        return $this->sections;
    }
    /**
     * The groups of options in the menu, in the order shown.
     *
     * @param list<WhatsAppInteractiveListSection>|null $sections
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
