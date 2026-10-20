<?php

namespace MessageBird\Wire\Model;

class SMSSenderCreate
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
     * The kind of sender to create. Only `alpha` (an alphanumeric sender string) is customer-creatable. Dedicated numbers become senders when you allocate them from inventory. This endpoint cannot create their senders.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * The alphanumeric sender string to create, for example "BIRD". 3–11 letters, digits, spaces, dashes, underscores, or dots, at least one of them a letter, and no separator at either end.
     * 
     *
     * @var string|null
     */
    protected $sender;
    /**
     * The kind of sender to create. Only `alpha` (an alphanumeric sender string) is customer-creatable. Dedicated numbers become senders when you allocate them from inventory. This endpoint cannot create their senders.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The kind of sender to create. Only `alpha` (an alphanumeric sender string) is customer-creatable. Dedicated numbers become senders when you allocate them from inventory. This endpoint cannot create their senders.
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
    /**
     * The alphanumeric sender string to create, for example "BIRD". 3–11 letters, digits, spaces, dashes, underscores, or dots, at least one of them a letter, and no separator at either end.
     * 
     *
     * @return string|null
     */
    public function getSender(): ?string
    {
        return $this->sender;
    }
    /**
     * The alphanumeric sender string to create, for example "BIRD". 3–11 letters, digits, spaces, dashes, underscores, or dots, at least one of them a letter, and no separator at either end.
     *
     * @param string|null $sender
     *
     * @return self
     */
    public function setSender(?string $sender): self
    {
        $this->initialized['sender'] = true;
        $this->sender = $sender;
        return $this;
    }
}
