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
     * Which part of the template this fills in.
     * 
     * - `body`: the main text.
     * - `button`: one button's variable, a part per button; there is no `buttons` part.
     * - `header`: the header's text, media or location.
     * - `carousel`: the cards.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * Placeholder values in `{{n}}` order, or named. Required except for `carousel`, which uses `cards`. Omit button parts without variables.
     *
     * @var list<WhatsAppMessageTemplateComponentParameter>|null
     */
    protected $parameters;
    /**
     * For `carousel` only: one entry per approved card, in approval order.
     *
     * @var list<WhatsAppMessageTemplateCard>|null
     */
    protected $cards;
    /**
     * Which part of the template this fills in.
     * 
     * - `body`: the main text.
     * - `button`: one button's variable, a part per button; there is no `buttons` part.
     * - `header`: the header's text, media or location.
     * - `carousel`: the cards.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
    * Which part of the template this fills in.
    
    - `body`: the main text.
    - `button`: one button's variable, a part per button; there is no `buttons` part.
    - `header`: the header's text, media or location.
    - `carousel`: the cards.
    
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
     * Placeholder values in `{{n}}` order, or named. Required except for `carousel`, which uses `cards`. Omit button parts without variables.
     *
     * @return list<WhatsAppMessageTemplateComponentParameter>|null
     */
    public function getParameters(): ?array
    {
        return $this->parameters;
    }
    /**
     * Placeholder values in `{{n}}` order, or named. Required except for `carousel`, which uses `cards`. Omit button parts without variables.
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
    /**
     * For `carousel` only: one entry per approved card, in approval order.
     *
     * @return list<WhatsAppMessageTemplateCard>|null
     */
    public function getCards(): ?array
    {
        return $this->cards;
    }
    /**
     * For `carousel` only: one entry per approved card, in approval order.
     *
     * @param list<WhatsAppMessageTemplateCard>|null $cards
     *
     * @return self
     */
    public function setCards(?array $cards): self
    {
        $this->initialized['cards'] = true;
        $this->cards = $cards;
        return $this;
    }
}
