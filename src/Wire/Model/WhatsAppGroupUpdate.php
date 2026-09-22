<?php

namespace MessageBird\Wire\Model;

class WhatsAppGroupUpdate
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
     * A new name for the group. Participants see the change in the group's chat.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * A new description for the group. Send `null` to clear it; an empty string is a `422` rather than a second way to clear.
     *
     * @var string|null
     */
    protected $description;
    /**
     * A new picture for the group, naming a file in your workspace's media library. WhatsApp takes a square JPEG of at least 192 by 192 pixels and up to 5 MB; anything else returns a `422`. Sending `null` clears the picture Bird stores, and an empty string is a `422` rather than a second way to clear it; WhatsApp has no operation for removing a group's photo, so the one participants see stays until another picture replaces it.
     * 
     *
     * @var string|null
     */
    protected $profilePictureUrl;
    /**
     * A new name for the group. Participants see the change in the group's chat.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * A new name for the group. Participants see the change in the group's chat.
     *
     * @param string|null $subject
     *
     * @return self
     */
    public function setSubject(?string $subject): self
    {
        $this->initialized['subject'] = true;
        $this->subject = $subject;
        return $this;
    }
    /**
     * A new description for the group. Send `null` to clear it; an empty string is a `422` rather than a second way to clear.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * A new description for the group. Send `null` to clear it; an empty string is a `422` rather than a second way to clear.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * A new picture for the group, naming a file in your workspace's media library. WhatsApp takes a square JPEG of at least 192 by 192 pixels and up to 5 MB; anything else returns a `422`. Sending `null` clears the picture Bird stores, and an empty string is a `422` rather than a second way to clear it; WhatsApp has no operation for removing a group's photo, so the one participants see stays until another picture replaces it.
     * 
     *
     * @return string|null
     */
    public function getProfilePictureUrl(): ?string
    {
        return $this->profilePictureUrl;
    }
    /**
     * A new picture for the group, naming a file in your workspace's media library. WhatsApp takes a square JPEG of at least 192 by 192 pixels and up to 5 MB; anything else returns a `422`. Sending `null` clears the picture Bird stores, and an empty string is a `422` rather than a second way to clear it; WhatsApp has no operation for removing a group's photo, so the one participants see stays until another picture replaces it.
     *
     * @param string|null $profilePictureUrl
     *
     * @return self
     */
    public function setProfilePictureUrl(?string $profilePictureUrl): self
    {
        $this->initialized['profilePictureUrl'] = true;
        $this->profilePictureUrl = $profilePictureUrl;
        return $this;
    }
}
