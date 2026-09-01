<?php

namespace MessageBird\Wire\Model;

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
     * The number to show. Send it in E.164 to get a card the recipient can message from; any other form still renders, with an invite button.
     * 
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * A label for the number, shown beside it. Free text: WhatsApp defines no vocabulary, and the label is sent exactly as written.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * The number to show. Send it in E.164 to get a card the recipient can message from; any other form still renders, with an invite button.
     * 
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * The number to show. Send it in E.164 to get a card the recipient can message from; any other form still renders, with an invite button.
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
     * A label for the number, shown beside it. Free text: WhatsApp defines no vocabulary, and the label is sent exactly as written.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * A label for the number, shown beside it. Free text: WhatsApp defines no vocabulary, and the label is sent exactly as written.
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
