<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateCard
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
     * This card's content blocks, in display order.
     *
     * @var list<WhatsAppTemplateCardComponent>|null
     */
    protected $components;
    /**
     * This card's content blocks, in display order.
     *
     * @return list<WhatsAppTemplateCardComponent>|null
     */
    public function getComponents(): ?array
    {
        return $this->components;
    }
    /**
     * This card's content blocks, in display order.
     *
     * @param list<WhatsAppTemplateCardComponent>|null $components
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
