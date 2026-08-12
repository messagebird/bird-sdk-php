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
     * Which part of the template this fills in: `body` for the main text, `button` for a button's variable, `header` for the header's text, media or location, `carousel` for the cards.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * The values that fill this part's placeholders. A positional template takes them in `{{n}}` placeholder order; a template with named parameters requires each parameter's `name` to match one the template declares, and order then carries no meaning. Send it on every part except `carousel`, which carries its values on `cards`.
     * 
     *
     * @var list<WhatsAppMessageTemplateComponentParameter>|null
     */
    protected $parameters;
    /**
     * The values that fill each card of a carousel. Send it only on a `carousel` part. A carousel sends exactly the number of cards its template was approved with, so every card needs an entry.
     * 
     *
     * @var list<WhatsAppMessageTemplateCard>|null
     */
    protected $cards;
    /**
     * Which part of the template this fills in: `body` for the main text, `button` for a button's variable, `header` for the header's text, media or location, `carousel` for the cards.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Which part of the template this fills in: `body` for the main text, `button` for a button's variable, `header` for the header's text, media or location, `carousel` for the cards.
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
     * The values that fill this part's placeholders. A positional template takes them in `{{n}}` placeholder order; a template with named parameters requires each parameter's `name` to match one the template declares, and order then carries no meaning. Send it on every part except `carousel`, which carries its values on `cards`.
     * 
     *
     * @return list<WhatsAppMessageTemplateComponentParameter>|null
     */
    public function getParameters(): ?array
    {
        return $this->parameters;
    }
    /**
     * The values that fill this part's placeholders. A positional template takes them in `{{n}}` placeholder order; a template with named parameters requires each parameter's `name` to match one the template declares, and order then carries no meaning. Send it on every part except `carousel`, which carries its values on `cards`.
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
     * The values that fill each card of a carousel. Send it only on a `carousel` part. A carousel sends exactly the number of cards its template was approved with, so every card needs an entry.
     * 
     *
     * @return list<WhatsAppMessageTemplateCard>|null
     */
    public function getCards(): ?array
    {
        return $this->cards;
    }
    /**
     * The values that fill each card of a carousel. Send it only on a `carousel` part. A carousel sends exactly the number of cards its template was approved with, so every card needs an entry.
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
