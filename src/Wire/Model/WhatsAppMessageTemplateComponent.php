<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageTemplateComponent
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
     * Which part of the template this fills in: `body` for the main text, `button` for a button's variable, `header` for the header. Bird manages header values itself, so a `header` entry supplied on a send is ignored.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * The values that fill this part's placeholders. A positional template takes them in `{{n}}` placeholder order; a template with named parameters requires each parameter's `name` to match one the template declares, and order then carries no meaning.
     * 
     *
     * @var list<WhatsAppMessageTemplateComponentParameter>|null
     */
    protected $parameters;
    /**
     * Which part of the template this fills in: `body` for the main text, `button` for a button's variable, `header` for the header. Bird manages header values itself, so a `header` entry supplied on a send is ignored.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Which part of the template this fills in: `body` for the main text, `button` for a button's variable, `header` for the header. Bird manages header values itself, so a `header` entry supplied on a send is ignored.
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
     * The values that fill this part's placeholders. A positional template takes them in `{{n}}` placeholder order; a template with named parameters requires each parameter's `name` to match one the template declares, and order then carries no meaning.
     * 
     *
     * @return list<WhatsAppMessageTemplateComponentParameter>|null
     */
    public function getParameters(): ?array
    {
        return $this->parameters;
    }
    /**
     * The values that fill this part's placeholders. A positional template takes them in `{{n}}` placeholder order; a template with named parameters requires each parameter's `name` to match one the template declares, and order then carries no meaning.
     *
     * @param list<WhatsAppMessageTemplateComponentParameter>|null $parameters
     *
     * @return self
     */
    public function setParameters(?array $parameters): self
    {
        $this->initialized['parameters'] = true;
        $this->parameters = $parameters;
        return $this;
    }
}
