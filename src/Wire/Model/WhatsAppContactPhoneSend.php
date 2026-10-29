<?php

namespace MessageBird\Wire\Model;

/**
 * One phone number to put on a contact card.
 */
class WhatsAppContactPhoneSend
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
     * E.164 enables a chat button; other formats show an invite button.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * Free-text label shown beside the number, sent verbatim.
     *
     * @var string|null
     */
    protected $type;
    /**
     * E.164 enables a chat button; other formats show an invite button.
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * E.164 enables a chat button; other formats show an invite button.
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
     * Free-text label shown beside the number, sent verbatim.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Free-text label shown beside the number, sent verbatim.
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
