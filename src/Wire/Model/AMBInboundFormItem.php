<?php

namespace MessageBird\Wire\Model;

class AMBInboundFormItem
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
    protected $identifier;
    /**
     * Type of form page in an Apple Messages for Business interactive form:
     * 
     * - `select` means a single-choice or multiple-choice selection list.
     * - `picker` means a wheel picker over a list of items.
     * - `date_picker` means a date selector.
     * - `input` means a single-line or multi-line text field.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * Display value Apple returned, including any input prefix. May be empty for an optional input.
     *
     * @var string|null
     */
    protected $title;
    /**
     * Machine value Apple returned for the selection or input. May be empty for an optional input.
     *
     * @var string|null
     */
    protected $value;
    /**
     * @return string|null
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }
    /**
     * @param string|null $identifier
     *
     * @return self
     */
    public function setIdentifier(?string $identifier): self
    {
        $this->initialized['identifier'] = true;
        $this->identifier = $identifier;
        return $this;
    }
    /**
     * Type of form page in an Apple Messages for Business interactive form:
     * 
     * - `select` means a single-choice or multiple-choice selection list.
     * - `picker` means a wheel picker over a list of items.
     * - `date_picker` means a date selector.
     * - `input` means a single-line or multi-line text field.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
    * Type of form page in an Apple Messages for Business interactive form:
    
    - `select` means a single-choice or multiple-choice selection list.
    - `picker` means a wheel picker over a list of items.
    - `date_picker` means a date selector.
    - `input` means a single-line or multi-line text field.
    
    *
    * @param string|null $type
    *
    * @return self
    */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * Display value Apple returned, including any input prefix. May be empty for an optional input.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * Display value Apple returned, including any input prefix. May be empty for an optional input.
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
     * Machine value Apple returned for the selection or input. May be empty for an optional input.
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
    /**
     * Machine value Apple returned for the selection or input. May be empty for an optional input.
     *
     * @param string|null $value
     *
     * @return self
     */
    public function setValue(?string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
}
