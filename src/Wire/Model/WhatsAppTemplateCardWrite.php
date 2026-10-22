<?php

namespace MessageBird\Wire\Model;

/**
 * One card in a carousel, as written to a draft.
 */
class WhatsAppTemplateCardWrite
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
     * This card's content blocks, in display order. A card carries a `header` showing an image or a video, and optionally a `body` and a `buttons` block. Every card in the carousel must carry the same blocks, and the same buttons, in the same order, so a card with body text means every card needs body text. May be omitted or empty on a draft; a header block is required before submission.
     * 
     *
     * @var list<WhatsAppTemplateCardComponentWrite>|null
     */
    protected $components;
    /**
     * This card's content blocks, in display order. A card carries a `header` showing an image or a video, and optionally a `body` and a `buttons` block. Every card in the carousel must carry the same blocks, and the same buttons, in the same order, so a card with body text means every card needs body text. May be omitted or empty on a draft; a header block is required before submission.
     * 
     *
     * @return list<WhatsAppTemplateCardComponentWrite>|null
     */
    public function getComponents(): ?array
    {
        return $this->components;
    }
    /**
     * This card's content blocks, in display order. A card carries a `header` showing an image or a video, and optionally a `body` and a `buttons` block. Every card in the carousel must carry the same blocks, and the same buttons, in the same order, so a card with body text means every card needs body text. May be omitted or empty on a draft; a header block is required before submission.
     *
     * @param list<WhatsAppTemplateCardComponentWrite>|null $components
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
