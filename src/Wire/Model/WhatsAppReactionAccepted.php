<?php

namespace MessageBird\Wire\Model;

/**
 * A reaction as accepted, which WhatsApp has not applied yet and may still refuse. It names the reaction-log entry the request created, so a caller that places two changes on one message can tell which entry is which; read the message's `reactions` for what currently stands, or its reaction log for what became of this one.
 */
class WhatsAppReactionAccepted
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
     * @var string|null
     */
    protected $id;
    /**
     * The emoji as accepted, echoing the one the request carried.
     *
     * @var string|null
     */
    protected $emoji;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The emoji as accepted, echoing the one the request carried.
     *
     * @return string|null
     */
    public function getEmoji(): ?string
    {
        return $this->emoji;
    }
    /**
     * The emoji as accepted, echoing the one the request carried.
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
