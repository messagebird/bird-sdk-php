<?php

namespace MessageBird\Wire\Model;

class Contact extends \ArrayObject
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
    protected $id;
    /**
     * The contact's email address, stored trimmed and lowercased. Unique within the workspace.
     *
     * @var string|null
     */
    protected $email;
    /**
     * The contact's first name. Available in broadcast templates as the `contact.first_name` variable.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * The contact's last name. Available in broadcast templates as the `contact.last_name` variable.
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
     * Custom property values for this contact, available as template variables in broadcasts. Each key is a property created via the contact properties API, and each value is a string, number, boolean, or RFC 3339 datetime matching the property's declared type (strings up to 500 characters). Total size is capped at 2 KB serialized. Values stored under a property that was later archived remain readable here.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $data;
    /**
     * Channels this contact can be reached on, derived from the identifiers it has. A contact with an email address includes `email`. More values are added as a contact gains identifiers for other channels.
     * 
     *
     * @var list<string>|null
     */
    protected $channels;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The contact's email address, stored trimmed and lowercased. Unique within the workspace.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The contact's email address, stored trimmed and lowercased. Unique within the workspace.
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
     * The contact's first name. Available in broadcast templates as the `contact.first_name` variable.
     *
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }
    /**
     * The contact's first name. Available in broadcast templates as the `contact.first_name` variable.
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
     * The contact's last name. Available in broadcast templates as the `contact.last_name` variable.
     *
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }
    /**
     * The contact's last name. Available in broadcast templates as the `contact.last_name` variable.
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
     * Custom property values for this contact, available as template variables in broadcasts. Each key is a property created via the contact properties API, and each value is a string, number, boolean, or RFC 3339 datetime matching the property's declared type (strings up to 500 characters). Total size is capped at 2 KB serialized. Values stored under a property that was later archived remain readable here.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getData(): ?iterable
    {
        return $this->data;
    }
    /**
     * Custom property values for this contact, available as template variables in broadcasts. Each key is a property created via the contact properties API, and each value is a string, number, boolean, or RFC 3339 datetime matching the property's declared type (strings up to 500 characters). Total size is capped at 2 KB serialized. Values stored under a property that was later archived remain readable here.
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
    /**
     * Channels this contact can be reached on, derived from the identifiers it has. A contact with an email address includes `email`. More values are added as a contact gains identifiers for other channels.
     * 
     *
     * @return list<string>|null
     */
    public function getChannels(): ?array
    {
        return $this->channels;
    }
    /**
     * Channels this contact can be reached on, derived from the identifiers it has. A contact with an email address includes `email`. More values are added as a contact gains identifiers for other channels.
     *
     * @param list<string>|null $channels
     *
     * @return self
     */
    public function setChannels(?array $channels): self
    {
        $this->initialized['channels'] = true;
        $this->channels = $channels;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
