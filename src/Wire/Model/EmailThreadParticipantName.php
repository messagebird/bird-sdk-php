<?php

namespace MessageBird\Wire\Model;

/**
 * A conversation participant's display name.
 */
class EmailThreadParticipantName
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
     * Participant address, as listed in the conversation's `participants`.
     *
     * @var string|null
     */
    protected $address;
    /**
     * Display name for this participant, such as `Ada Lovelace`. It is not verified.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Participant address, as listed in the conversation's `participants`.
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * Participant address, as listed in the conversation's `participants`.
     *
     * @param string|null $address
     *
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;
        return $this;
    }
    /**
     * Display name for this participant, such as `Ada Lovelace`. It is not verified.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Display name for this participant, such as `Ada Lovelace`. It is not verified.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
}
