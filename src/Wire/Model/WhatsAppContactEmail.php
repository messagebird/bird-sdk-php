<?php

namespace MessageBird\Wire\Model;

/**
 * One email address on a shared contact card.
 */
class WhatsAppContactEmail
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
    protected $email;
    /**
     * The label attached to this value, for example `CELL`, `Home` or `iPhone`. Free text: WhatsApp defines no vocabulary. A label on a received card is lowercased; one this workspace sent reads back exactly as sent.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;
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
