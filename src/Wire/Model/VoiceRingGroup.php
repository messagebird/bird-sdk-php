<?php

namespace MessageBird\Wire\Model;

/**
 * A set of workspace users that an inbound call rings in the browser phone. Every workspace also has a default group, which rings the workspace's online users and cannot be changed.
 */
class VoiceRingGroup
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
     * The ring group's name.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Whether this is the workspace's default group, which rings the users who are online in the browser phone.
     * 
     *
     * @var bool|null
     */
    protected $isDefault;
    /**
     * How many of the group's members are connected to the browser phone and accepting calls, read live. A member on a call counts, though a call to the group skips them until it ends. For the default group, the count includes every connected user who accepts calls.
     *
     * @var int|null
     */
    protected $onlineMemberCount;
    /**
     * When the ring group was created. Null for the default group.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the ring group's name or members last changed. Null for the default group.
     *
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
     * The ring group's name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The ring group's name.
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
    /**
     * Whether this is the workspace's default group, which rings the users who are online in the browser phone.
     * 
     *
     * @return bool|null
     */
    public function getIsDefault(): ?bool
    {
        return $this->isDefault;
    }
    /**
     * Whether this is the workspace's default group, which rings the users who are online in the browser phone.
     *
     * @param bool|null $isDefault
     *
     * @return self
     */
    public function setIsDefault(?bool $isDefault): self
    {
        $this->initialized['isDefault'] = true;
        $this->isDefault = $isDefault;
        return $this;
    }
    /**
     * How many of the group's members are connected to the browser phone and accepting calls, read live. A member on a call counts, though a call to the group skips them until it ends. For the default group, the count includes every connected user who accepts calls.
     *
     * @return int|null
     */
    public function getOnlineMemberCount(): ?int
    {
        return $this->onlineMemberCount;
    }
    /**
     * How many of the group's members are connected to the browser phone and accepting calls, read live. A member on a call counts, though a call to the group skips them until it ends. For the default group, the count includes every connected user who accepts calls.
     *
     * @param int|null $onlineMemberCount
     *
     * @return self
     */
    public function setOnlineMemberCount(?int $onlineMemberCount): self
    {
        $this->initialized['onlineMemberCount'] = true;
        $this->onlineMemberCount = $onlineMemberCount;
        return $this;
    }
    /**
     * When the ring group was created. Null for the default group.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the ring group was created. Null for the default group.
     *
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
     * When the ring group's name or members last changed. Null for the default group.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the ring group's name or members last changed. Null for the default group.
     *
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
