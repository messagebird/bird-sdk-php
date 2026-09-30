<?php

namespace MessageBird\Wire\Model;

class ContactBatchEntry
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
     * Email address, up to 254 characters. Trimmed and lowercased before matching. Invalid addresses fail this contact.
     *
     * @var string|null
     */
    protected $email;
    /**
     * Phone number with a country code, up to 32 characters. Spaces and punctuation are accepted. An empty string is treated as omitted.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * First name, up to 100 characters.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Last name, up to 100 characters.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Your identifier for the contact, up to 254 characters. Unique within the workspace when set.
     *
     * @var string|null
     */
    protected $externalId;
    /**
     * Custom contact property values. Keys must be registered and active; values must match their declared type. Strings can contain up to 500 characters and the serialized map is limited to 2 KB. Invalid values fail this contact. Null values remove keys when updating and are ignored when creating.
     *
     * @var array<string, mixed>|null
     */
    protected $data;
    /**
     * Email address, up to 254 characters. Trimmed and lowercased before matching. Invalid addresses fail this contact.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Email address, up to 254 characters. Trimmed and lowercased before matching. Invalid addresses fail this contact.
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
     * Phone number with a country code, up to 32 characters. Spaces and punctuation are accepted. An empty string is treated as omitted.
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * Phone number with a country code, up to 32 characters. Spaces and punctuation are accepted. An empty string is treated as omitted.
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
     * First name, up to 100 characters.
     *
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }
    /**
     * First name, up to 100 characters.
     *
     * @param string|null $firstName
     *
     * @return self
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;
        return $this;
    }
    /**
     * Last name, up to 100 characters.
     *
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }
    /**
     * Last name, up to 100 characters.
     *
     * @param string|null $lastName
     *
     * @return self
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;
        return $this;
    }
    /**
     * Your identifier for the contact, up to 254 characters. Unique within the workspace when set.
     *
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }
    /**
     * Your identifier for the contact, up to 254 characters. Unique within the workspace when set.
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
    /**
     * Custom contact property values. Keys must be registered and active; values must match their declared type. Strings can contain up to 500 characters and the serialized map is limited to 2 KB. Invalid values fail this contact. Null values remove keys when updating and are ignored when creating.
     *
     * @return array<string, mixed>|null
     */
    public function getData(): ?iterable
    {
        return $this->data;
    }
    /**
     * Custom contact property values. Keys must be registered and active; values must match their declared type. Strings can contain up to 500 characters and the serialized map is limited to 2 KB. Invalid values fail this contact. Null values remove keys when updating and are ignored when creating.
     *
     * @param array<string, mixed>|null $data
     *
     * @return self
     */
    public function setData(?iterable $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
