<?php

namespace MessageBird\Wire\Model;

class AMBNativeInboundListPicker
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
     * Sections returned by Apple. Sections can include unselected options; preserve their titles and item grouping.
     *
     * @var list<AMBNativeInboundListPickerSection>|null
     */
    protected $sections;
    /**
     * Sections returned by Apple. Sections can include unselected options; preserve their titles and item grouping.
     *
     * @return list<AMBNativeInboundListPickerSection>|null
     */
    public function getSections(): ?array
    {
        return $this->sections;
    }
    /**
     * Sections returned by Apple. Sections can include unselected options; preserve their titles and item grouping.
     *
     * @param list<AMBNativeInboundListPickerSection>|null $sections
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
