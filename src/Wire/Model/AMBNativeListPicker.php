<?php

namespace MessageBird\Wire\Model;

class AMBNativeListPicker
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
     * The menu's sections, each with its own heading and rows.
     *
     * @var list<AMBListPickerSection>|null
     */
    protected $sections;
    /**
     * The menu's sections, each with its own heading and rows.
     *
     * @return list<AMBListPickerSection>|null
     */
    public function getSections(): ?array
    {
        return $this->sections;
    }
    /**
     * The menu's sections, each with its own heading and rows.
     *
     * @param list<AMBListPickerSection>|null $sections
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
