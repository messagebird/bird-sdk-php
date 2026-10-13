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
     * The values for this part's placeholders, in `{{n}}` order unless the template names them. Send it on every part except `carousel`, which uses `cards`. Send no `button` part for a button that takes no value.
     * 
     *
     * @var list<WhatsAppMessageTemplateComponentParameter>|null
     */
    protected $parameters;
    /**
     * Values for each carousel card, one entry per card the template was approved with. Send it only on a `carousel` part.
     * 
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
     * The values for this part's placeholders, in `{{n}}` order unless the template names them. Send it on every part except `carousel`, which uses `cards`. Send no `button` part for a button that takes no value.
     * 
     *
     * @return list<WhatsAppMessageTemplateComponentParameter>|null
     */
    public function getParameters(): ?array
    {
        return $this->parameters;
    }
    /**
     * The values for this part's placeholders, in `{{n}}` order unless the template names them. Send it on every part except `carousel`, which uses `cards`. Send no `button` part for a button that takes no value.
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
     * Values for each carousel card, one entry per card the template was approved with. Send it only on a `carousel` part.
     * 
     *
     * @return list<WhatsAppMessageTemplateCard>|null
     */
    public function getCards(): ?array
    {
        return $this->cards;
    }
    /**
     * Values for each carousel card, one entry per card the template was approved with. Send it only on a `carousel` part.
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
