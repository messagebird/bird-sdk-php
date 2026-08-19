<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageTemplateCardComponent
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
     * Which part of the card this fills in.
     * 
     * - `header`: the card's image or video.
     * - `body`: its text.
     * - `button`: a button's variable.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * The values that fill this part's placeholders, in placeholder order.
     *
     * @var list<WhatsAppMessageTemplateComponentParameter>|null
     */
    protected $parameters;
    /**
     * Which part of the card this fills in.
     * 
     * - `header`: the card's image or video.
     * - `body`: its text.
     * - `button`: a button's variable.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
    * Which part of the card this fills in.
    
    - `header`: the card's image or video.
    - `body`: its text.
    - `button`: a button's variable.
    
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
     * The values that fill this part's placeholders, in placeholder order.
     *
     * @return list<WhatsAppMessageTemplateComponentParameter>|null
     */
    public function getParameters(): ?array
    {
        return $this->parameters;
    }
    /**
     * The values that fill this part's placeholders, in placeholder order.
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
