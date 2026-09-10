<?php

namespace MessageBird\Wire\Model;

class WhatsAppReaction
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
     * The emoji, as WhatsApp sent it. It is not normalized, so two emoji that render identically can differ byte for byte and compare unequal.
     * 
     *
     * @var string|null
     */
    protected $emoji;
    /**
     * Who reacted. On a group message this is what tells one participant's reaction from another's. On a one-to-one message it is your business number on a reaction you placed and the contact on one they placed, which is why it is here rather than inferred from the message's `direction`.
     * 
     *
     * @var WhatsAppReactionFrom|null
     */
    protected $from;
    /**
     * The emoji, as WhatsApp sent it. It is not normalized, so two emoji that render identically can differ byte for byte and compare unequal.
     * 
     *
     * @return string|null
     */
    public function getEmoji(): ?string
    {
        return $this->emoji;
    }
    /**
     * The emoji, as WhatsApp sent it. It is not normalized, so two emoji that render identically can differ byte for byte and compare unequal.
     *
     * @param string|null $emoji
     *
     * @return self
     */
    public function setEmoji(?string $emoji): self
    {
        $this->initialized['emoji'] = true;
        $this->emoji = $emoji;
        return $this;
    }
    /**
     * Who reacted. On a group message this is what tells one participant's reaction from another's. On a one-to-one message it is your business number on a reaction you placed and the contact on one they placed, which is why it is here rather than inferred from the message's `direction`.
     * 
     *
     * @return WhatsAppReactionFrom|null
     */
    public function getFrom(): ?WhatsAppReactionFrom
    {
        return $this->from;
    }
    /**
     * Who reacted. On a group message this is what tells one participant's reaction from another's. On a one-to-one message it is your business number on a reaction you placed and the contact on one they placed, which is why it is here rather than inferred from the message's `direction`.
     *
     * @param WhatsAppReactionFrom|null $from
     *
     * @return self
     */
    public function setFrom(?WhatsAppReactionFrom $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
}
