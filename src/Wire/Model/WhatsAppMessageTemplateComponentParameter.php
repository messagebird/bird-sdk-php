<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageTemplateComponentParameter
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
     * The kind of value this parameter carries. `text` is the only kind today.
     *
     * @var string|null
     */
    protected $type;
    /**
     * The value substituted into the placeholder, as a plain string.
     *
     * @var string|null
     */
    protected $text;
    /**
     * Required when the template declares named parameters: the placeholder this value fills (for example `first_name`), matching exactly one of the names the template declares. Name every parameter in that case; order does not matter once names are supplied. Omit this field for a positional template, which takes its values in `{{n}}` order instead. Sending the wrong set of names, or leaving one out that the template requires, returns a `422` `WhatsAppTemplateParameterMismatch`.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * The kind of value this parameter carries. `text` is the only kind today.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The kind of value this parameter carries. `text` is the only kind today.
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
     * The value substituted into the placeholder, as a plain string.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The value substituted into the placeholder, as a plain string.
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
     * Required when the template declares named parameters: the placeholder this value fills (for example `first_name`), matching exactly one of the names the template declares. Name every parameter in that case; order does not matter once names are supplied. Omit this field for a positional template, which takes its values in `{{n}}` order instead. Sending the wrong set of names, or leaving one out that the template requires, returns a `422` `WhatsAppTemplateParameterMismatch`.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Required when the template declares named parameters: the placeholder this value fills (for example `first_name`), matching exactly one of the names the template declares. Name every parameter in that case; order does not matter once names are supplied. Omit this field for a positional template, which takes its values in `{{n}}` order instead. Sending the wrong set of names, or leaving one out that the template requires, returns a `422` `WhatsAppTemplateParameterMismatch`.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
}
