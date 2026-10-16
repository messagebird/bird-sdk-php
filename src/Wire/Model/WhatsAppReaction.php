<?php

namespace MessageBird\Wire\Model;

/**
 * An emoji reaction standing on a message. One entry per sender: reacting again replaces that sender's entry rather than adding one, and removing a reaction drops it from the list. A one-to-one message therefore carries at most two, one for the contact and one for your business number. This is the folded current state, so it names no single change; the message's reaction log is what records how each one arrived.
 */
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
     * @param WhatsAppReactionFrom|WhatsAppAddress|array|null $from
     *
     * @return self
     */
    public function setFrom($from): self
    {
        $this->initialized['from'] = true;
        $this->from = \MessageBird\Core\ModelWrapper::normalize($from, WhatsAppReactionFrom::class);
        return $this;
    }
}
