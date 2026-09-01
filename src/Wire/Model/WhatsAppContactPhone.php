<?php

namespace MessageBird\Wire\Model;

class WhatsAppContactPhone
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
     * The number as the card holds it, normalized to E.164 where we can parse it. A card is whatever the contact's device stored, so a number that no country's numbering plan accepts, an extension among them, is passed through exactly as it arrived rather than dropped. Parse defensively: most values are E.164 and none is guaranteed to be.
     * 
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * The label attached to this value, for example `CELL`, `Home` or `iPhone`. Free text: WhatsApp defines no vocabulary. A label on a received card is lowercased; one this workspace sent reads back exactly as sent.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * The number as the card holds it, normalized to E.164 where we can parse it. A card is whatever the contact's device stored, so a number that no country's numbering plan accepts, an extension among them, is passed through exactly as it arrived rather than dropped. Parse defensively: most values are E.164 and none is guaranteed to be.
     * 
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * The number as the card holds it, normalized to E.164 where we can parse it. A card is whatever the contact's device stored, so a number that no country's numbering plan accepts, an extension among them, is passed through exactly as it arrived rather than dropped. Parse defensively: most values are E.164 and none is guaranteed to be.
     *
     * @param string|null $phoneNumber
     *
     * @return self
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->initialized['phoneNumber'] = true;
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
    /**
     * The label attached to this value, for example `CELL`, `Home` or `iPhone`. Free text: WhatsApp defines no vocabulary. A label on a received card is lowercased; one this workspace sent reads back exactly as sent.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The label attached to this value, for example `CELL`, `Home` or `iPhone`. Free text: WhatsApp defines no vocabulary. A label on a received card is lowercased; one this workspace sent reads back exactly as sent.
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
}
