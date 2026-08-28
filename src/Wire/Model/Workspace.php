<?php

namespace MessageBird\Wire\Model;

class Workspace extends \ArrayObject
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
     * @var string|null
     */
    protected $organizationId;
    /**
     * @var string|null
     */
    protected $name;
    /**
     * @var WorkspaceNotificationEmails|null
     */
    protected $notificationEmails;
    /**
     * HTTPS URL to the current workspace logo. `null` when unset.
     *
     * @var string|null
     */
    protected $logoUrl;
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
     * @return string|null
     */
    public function getOrganizationId(): ?string
    {
        return $this->organizationId;
    }
    /**
     * @param string|null $organizationId
     *
     * @return self
     */
    public function setOrganizationId(?string $organizationId): self
    {
        $this->initialized['organizationId'] = true;
        $this->organizationId = $organizationId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
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
    /**
     * @return WorkspaceNotificationEmails|null
     */
    public function getNotificationEmails(): ?WorkspaceNotificationEmails
    {
        return $this->notificationEmails;
    }
    /**
     * @param WorkspaceNotificationEmails|null $notificationEmails
     *
     * @return self
     */
    public function setNotificationEmails(?WorkspaceNotificationEmails $notificationEmails): self
    {
        $this->initialized['notificationEmails'] = true;
        $this->notificationEmails = $notificationEmails;
        return $this;
    }
    /**
     * HTTPS URL to the current workspace logo. `null` when unset.
     *
     * @return string|null
     */
    public function getLogoUrl(): ?string
    {
        return $this->logoUrl;
    }
    /**
     * HTTPS URL to the current workspace logo. `null` when unset.
     *
     * @param string|null $logoUrl
     *
     * @return self
     */
    public function setLogoUrl(?string $logoUrl): self
    {
        $this->initialized['logoUrl'] = true;
        $this->logoUrl = $logoUrl;
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
