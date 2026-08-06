<?php

namespace MessageBird\Wire\Model;

class ContactCreateRequest
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
     * The contact's email address. Trimmed and lowercased before it is stored and checked for uniqueness. Unique within the workspace. Supply an email address, a phone number, or both.
     *
     * @var string|null
     */
    protected $email;
    /**
     * The contact's phone number in E.164 format, including the leading `+` and country code. Spaces and punctuation are accepted and stripped; the number is stored in its canonical form, which may differ from what you send, and is unique within the workspace. An empty string is treated as if the field were omitted. Supply an email address, a phone number, or both.
     *
     * @var string|null
     */
    protected $phone;
    /**
     * The contact's first name.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * The contact's last name.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Your own identifier for this contact, such as a user ID in your system. Unique within the workspace when set.
     *
     * @var string|null
     */
    protected $externalId;
    /**
     * Custom property values for this contact. Each key must be a property created via the contact properties API, and each value must be a string, number, boolean, or RFC 3339 datetime matching the property's declared type (strings up to 500 characters); a null value is ignored. Unregistered or archived keys are rejected with a validation error. Total size is capped at 2 KB serialized.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $data;
    /**
     * The contact's email address. Trimmed and lowercased before it is stored and checked for uniqueness. Unique within the workspace. Supply an email address, a phone number, or both.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The contact's email address. Trimmed and lowercased before it is stored and checked for uniqueness. Unique within the workspace. Supply an email address, a phone number, or both.
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
     * The contact's phone number in E.164 format, including the leading `+` and country code. Spaces and punctuation are accepted and stripped; the number is stored in its canonical form, which may differ from what you send, and is unique within the workspace. An empty string is treated as if the field were omitted. Supply an email address, a phone number, or both.
     *
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }
    /**
     * The contact's phone number in E.164 format, including the leading `+` and country code. Spaces and punctuation are accepted and stripped; the number is stored in its canonical form, which may differ from what you send, and is unique within the workspace. An empty string is treated as if the field were omitted. Supply an email address, a phone number, or both.
     *
     * @param string|null $phone
     *
     * @return self
     */
    public function setPhone(?string $phone): self
    {
        $this->initialized['phone'] = true;
        $this->phone = $phone;
        return $this;
    }
    /**
     * The contact's first name.
     *
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }
    /**
     * The contact's first name.
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
     * The contact's last name.
     *
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }
    /**
     * The contact's last name.
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
     * Your own identifier for this contact, such as a user ID in your system. Unique within the workspace when set.
     *
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }
    /**
     * Your own identifier for this contact, such as a user ID in your system. Unique within the workspace when set.
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
     * Custom property values for this contact. Each key must be a property created via the contact properties API, and each value must be a string, number, boolean, or RFC 3339 datetime matching the property's declared type (strings up to 500 characters); a null value is ignored. Unregistered or archived keys are rejected with a validation error. Total size is capped at 2 KB serialized.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getData(): ?iterable
    {
        return $this->data;
    }
    /**
     * Custom property values for this contact. Each key must be a property created via the contact properties API, and each value must be a string, number, boolean, or RFC 3339 datetime matching the property's declared type (strings up to 500 characters); a null value is ignored. Unregistered or archived keys are rejected with a validation error. Total size is capped at 2 KB serialized.
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
