<?php

namespace MessageBird\Wire\Model;

class ContactUpdateRequest
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
     * New email address for the contact. Trimmed and lowercased before it is stored and checked for uniqueness. Must not be in use by another contact in the workspace. Omit to keep the current address; set to null to remove it, as long as the contact keeps at least one identifier.
     *
     * @var string|null
     */
    protected $email;
    /**
     * New phone number for the contact, in E.164 format with the leading `+` and country code. Spaces and punctuation are accepted and stripped. Stored in its canonical form, which may differ from what you send, and unique within the workspace. Omit to keep the current number; set to null to remove it, as long as the contact keeps at least one identifier. An empty string behaves as null.
     *
     * @var string|null
     */
    protected $phone;
    /**
     * The contact's first name. Set to null to clear.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * The contact's last name. Set to null to clear.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Your own identifier for this contact. Unique within the workspace when set. Set to null to clear.
     *
     * @var string|null
     */
    protected $externalId;
    /**
     * Custom property values to change, merged into the contact's existing data. Keys you supply are set, keys set to null are removed, and keys you omit are left unchanged. Each key must be a property created via the contact properties API, and each value must be a string, number, boolean, or RFC 3339 datetime matching the property's declared type (strings up to 500 characters); writing an unregistered or archived key returns a validation error. The merged result is capped at 2 KB serialized.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $data;
    /**
     * New email address for the contact. Trimmed and lowercased before it is stored and checked for uniqueness. Must not be in use by another contact in the workspace. Omit to keep the current address; set to null to remove it, as long as the contact keeps at least one identifier.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * New email address for the contact. Trimmed and lowercased before it is stored and checked for uniqueness. Must not be in use by another contact in the workspace. Omit to keep the current address; set to null to remove it, as long as the contact keeps at least one identifier.
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
     * New phone number for the contact, in E.164 format with the leading `+` and country code. Spaces and punctuation are accepted and stripped. Stored in its canonical form, which may differ from what you send, and unique within the workspace. Omit to keep the current number; set to null to remove it, as long as the contact keeps at least one identifier. An empty string behaves as null.
     *
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }
    /**
     * New phone number for the contact, in E.164 format with the leading `+` and country code. Spaces and punctuation are accepted and stripped. Stored in its canonical form, which may differ from what you send, and unique within the workspace. Omit to keep the current number; set to null to remove it, as long as the contact keeps at least one identifier. An empty string behaves as null.
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
     * The contact's first name. Set to null to clear.
     *
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }
    /**
     * The contact's first name. Set to null to clear.
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
     * The contact's last name. Set to null to clear.
     *
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }
    /**
     * The contact's last name. Set to null to clear.
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
     * Your own identifier for this contact. Unique within the workspace when set. Set to null to clear.
     *
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }
    /**
     * Your own identifier for this contact. Unique within the workspace when set. Set to null to clear.
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
     * Custom property values to change, merged into the contact's existing data. Keys you supply are set, keys set to null are removed, and keys you omit are left unchanged. Each key must be a property created via the contact properties API, and each value must be a string, number, boolean, or RFC 3339 datetime matching the property's declared type (strings up to 500 characters); writing an unregistered or archived key returns a validation error. The merged result is capped at 2 KB serialized.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getData(): ?iterable
    {
        return $this->data;
    }
    /**
     * Custom property values to change, merged into the contact's existing data. Keys you supply are set, keys set to null are removed, and keys you omit are left unchanged. Each key must be a property created via the contact properties API, and each value must be a string, number, boolean, or RFC 3339 datetime matching the property's declared type (strings up to 500 characters); writing an unregistered or archived key returns a validation error. The merged result is capped at 2 KB serialized.
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
