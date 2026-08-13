<?php

namespace MessageBird\Wire\Model;

class ContactUpsertEntry
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
     * Email address this entry carried, trimmed and lowercased. Null when the entry carried none.
     *
     * @var string|null
     */
    protected $email;
    /**
     * Phone number this entry carried, in its normalized international form. Null when the entry carried none. A row rejected for an invalid phone echoes the value as sent, trimmed, since no normalized form exists.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * Your own identifier for this entry, when the entry supplied one.
     *
     * @var string|null
     */
    protected $externalId;
    /**
     * Email address this entry carried, trimmed and lowercased. Null when the entry carried none.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Email address this entry carried, trimmed and lowercased. Null when the entry carried none.
     *
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
     * Phone number this entry carried, in its normalized international form. Null when the entry carried none. A row rejected for an invalid phone echoes the value as sent, trimmed, since no normalized form exists.
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * Phone number this entry carried, in its normalized international form. Null when the entry carried none. A row rejected for an invalid phone echoes the value as sent, trimmed, since no normalized form exists.
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
     * Your own identifier for this entry, when the entry supplied one.
     *
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }
    /**
     * Your own identifier for this entry, when the entry supplied one.
     *
     * @param string|null $externalId
     *
     * @return self
     */
    public function setExternalId(?string $externalId): self
    {
        $this->initialized['externalId'] = true;
        $this->externalId = $externalId;
        return $this;
    }
}
