<?php

namespace MessageBird\Wire\Model;

class WhatsAppReactionUpsert
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
     * The emoji to place, as the character itself. Replaces your existing reaction on this message if you have one. To take a reaction back entirely, delete it rather than sending an empty value. WhatsApp takes exactly one emoji, so a value carrying more than one is refused with a `422` rather than sent. The length cap is generous because a single joined emoji is many code points: a couple-kissing one carrying two skin tones is ten, which is why the cap alone cannot express the limit.
     * 
     *
     * @var string|null
     */
    protected $emoji;
    /**
     * The emoji to place, as the character itself. Replaces your existing reaction on this message if you have one. To take a reaction back entirely, delete it rather than sending an empty value. WhatsApp takes exactly one emoji, so a value carrying more than one is refused with a `422` rather than sent. The length cap is generous because a single joined emoji is many code points: a couple-kissing one carrying two skin tones is ten, which is why the cap alone cannot express the limit.
     * 
     *
     * @return string|null
     */
    public function getEmoji(): ?string
    {
        return $this->emoji;
    }
    /**
     * The emoji to place, as the character itself. Replaces your existing reaction on this message if you have one. To take a reaction back entirely, delete it rather than sending an empty value. WhatsApp takes exactly one emoji, so a value carrying more than one is refused with a `422` rather than sent. The length cap is generous because a single joined emoji is many code points: a couple-kissing one carrying two skin tones is ten, which is why the cap alone cannot express the limit.
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
}
