<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageUnsupported extends \ArrayObject
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
     * The WhatsApp content type we did not model. `unsupported` is not a placeholder here: WhatsApp reports its own `unsupported` type for a message its own clients cannot render, and that arrives as this value. Open enum: WhatsApp adds content types over time, so treat an unrecognized value as a future type rather than an error.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * The WhatsApp content type we did not model. `unsupported` is not a placeholder here: WhatsApp reports its own `unsupported` type for a message its own clients cannot render, and that arrives as this value. Open enum: WhatsApp adds content types over time, so treat an unrecognized value as a future type rather than an error.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The WhatsApp content type we did not model. `unsupported` is not a placeholder here: WhatsApp reports its own `unsupported` type for a message its own clients cannot render, and that arrives as this value. Open enum: WhatsApp adds content types over time, so treat an unrecognized value as a future type rather than an error.
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
