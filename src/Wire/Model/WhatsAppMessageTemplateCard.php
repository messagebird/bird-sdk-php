<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageTemplateCard
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
     * The values that fill this card's blocks.
     *
     * @var list<WhatsAppMessageTemplateCardComponent>|null
     */
    protected $components;
    /**
     * The values that fill this card's blocks.
     *
     * @return list<WhatsAppMessageTemplateCardComponent>|null
     */
    public function getComponents(): ?array
    {
        return $this->components;
    }
    /**
     * The values that fill this card's blocks.
     *
     * @param list<WhatsAppMessageTemplateCardComponent>|null $components
     *
     * @return self
     */
    public function setComponents(?array $components): self
    {
        $this->initialized['components'] = true;
        $this->components = $components;
        return $this;
    }
}
