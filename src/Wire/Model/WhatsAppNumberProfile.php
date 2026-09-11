<?php

namespace MessageBird\Wire\Model;

class WhatsAppNumberProfile
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
     * The name WhatsApp verifies for this number. Once WhatsApp approves it, it appears at the top of a chat with this number; `display_name_status` is what says whether it has. Set when the number was connected, and changed from the dashboard or the CLI, as [WhatsApp phone numbers](/docs/guides/whatsapp/phone-number-setup) explains. This field still returns the current name until a requested change completes.
     * 
     *
     * @var string|null
     */
    protected $displayName;
    /**
     * Where WhatsApp's review of the display name stands. A name still under review is not yet shown at the top of a chat.
     * 
     *
     * @var string|null
     */
    protected $displayNameStatus;
    /**
     * The display name whose change has been requested, whether or not WhatsApp is reviewing it. Absent when no change is pending.
     * 
     *
     * @var string|null
     */
    protected $newDisplayName;
    /**
     * Where the requested display name stands with WhatsApp, including whether it is being reviewed or was accepted for immediate use without a review. Absent when no change is pending. If WhatsApp accepts the name it becomes `display_name`. Every other outcome leaves the number on the name it already had: `declined` is WhatsApp refusing the name, and `expired` is a request that no longer stands and has to be made again.
     * 
     *
     * @var string|null
     */
    protected $newDisplayNameStatus;
    /**
     * The username WhatsApp users can find this number by, without an `@`. Absent when the number has no username. Once set it cannot be removed through this API.
     * 
     *
     * @var string|null
     */
    protected $username;
    /**
     * Where the username stands with WhatsApp. Absent when the number has no username.
     * 
     *
     * @var string|null
     */
    protected $usernameStatus;
    /**
     * The short line shown under the business name in a chat.
     *
     * @var string|null
     */
    protected $about;
    /**
     * The business address shown on the profile.
     *
     * @var string|null
     */
    protected $address;
    /**
     * The longer description shown on the profile.
     *
     * @var string|null
     */
    protected $description;
    /**
     * The contact email shown on the profile.
     *
     * @var string|null
     */
    protected $email;
    /**
     * The industry WhatsApp shows on the profile.
     *
     * @var string|null
     */
    protected $vertical;
    /**
     * Up to two websites shown on the profile.
     *
     * @var list<string>|null
     */
    protected $websites;
    /**
     * A link to the profile picture WhatsApp currently shows. WhatsApp signs this link and it expires within days, so load it when you display it and never store it. It is served with permissive cross-origin headers, so a browser can load it directly.
     *
     * @var string|null
     */
    protected $profilePictureUrl;
    /**
     * The name WhatsApp verifies for this number. Once WhatsApp approves it, it appears at the top of a chat with this number; `display_name_status` is what says whether it has. Set when the number was connected, and changed from the dashboard or the CLI, as [WhatsApp phone numbers](/docs/guides/whatsapp/phone-number-setup) explains. This field still returns the current name until a requested change completes.
     * 
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * The name WhatsApp verifies for this number. Once WhatsApp approves it, it appears at the top of a chat with this number; `display_name_status` is what says whether it has. Set when the number was connected, and changed from the dashboard or the CLI, as [WhatsApp phone numbers](/docs/guides/whatsapp/phone-number-setup) explains. This field still returns the current name until a requested change completes.
     *
     * @param string|null $displayName
     *
     * @return self
     */
    public function setDisplayName(?string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * Where WhatsApp's review of the display name stands. A name still under review is not yet shown at the top of a chat.
     * 
     *
     * @return string|null
     */
    public function getDisplayNameStatus(): ?string
    {
        return $this->displayNameStatus;
    }
    /**
     * Where WhatsApp's review of the display name stands. A name still under review is not yet shown at the top of a chat.
     *
     * @param string|null $displayNameStatus
     *
     * @return self
     */
    public function setDisplayNameStatus(?string $displayNameStatus): self
    {
        $this->initialized['displayNameStatus'] = true;
        $this->displayNameStatus = $displayNameStatus;
        return $this;
    }
    /**
     * The display name whose change has been requested, whether or not WhatsApp is reviewing it. Absent when no change is pending.
     * 
     *
     * @return string|null
     */
    public function getNewDisplayName(): ?string
    {
        return $this->newDisplayName;
    }
    /**
     * The display name whose change has been requested, whether or not WhatsApp is reviewing it. Absent when no change is pending.
     *
     * @param string|null $newDisplayName
     *
     * @return self
     */
    public function setNewDisplayName(?string $newDisplayName): self
    {
        $this->initialized['newDisplayName'] = true;
        $this->newDisplayName = $newDisplayName;
        return $this;
    }
    /**
     * Where the requested display name stands with WhatsApp, including whether it is being reviewed or was accepted for immediate use without a review. Absent when no change is pending. If WhatsApp accepts the name it becomes `display_name`. Every other outcome leaves the number on the name it already had: `declined` is WhatsApp refusing the name, and `expired` is a request that no longer stands and has to be made again.
     * 
     *
     * @return string|null
     */
    public function getNewDisplayNameStatus(): ?string
    {
        return $this->newDisplayNameStatus;
    }
    /**
     * Where the requested display name stands with WhatsApp, including whether it is being reviewed or was accepted for immediate use without a review. Absent when no change is pending. If WhatsApp accepts the name it becomes `display_name`. Every other outcome leaves the number on the name it already had: `declined` is WhatsApp refusing the name, and `expired` is a request that no longer stands and has to be made again.
     *
     * @param string|null $newDisplayNameStatus
     *
     * @return self
     */
    public function setNewDisplayNameStatus(?string $newDisplayNameStatus): self
    {
        $this->initialized['newDisplayNameStatus'] = true;
        $this->newDisplayNameStatus = $newDisplayNameStatus;
        return $this;
    }
    /**
     * The username WhatsApp users can find this number by, without an `@`. Absent when the number has no username. Once set it cannot be removed through this API.
     * 
     *
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }
    /**
     * The username WhatsApp users can find this number by, without an `@`. Absent when the number has no username. Once set it cannot be removed through this API.
     *
     * @param string|null $username
     *
     * @return self
     */
    public function setUsername(?string $username): self
    {
        $this->initialized['username'] = true;
        $this->username = $username;
        return $this;
    }
    /**
     * Where the username stands with WhatsApp. Absent when the number has no username.
     * 
     *
     * @return string|null
     */
    public function getUsernameStatus(): ?string
    {
        return $this->usernameStatus;
    }
    /**
     * Where the username stands with WhatsApp. Absent when the number has no username.
     *
     * @param string|null $usernameStatus
     *
     * @return self
     */
    public function setUsernameStatus(?string $usernameStatus): self
    {
        $this->initialized['usernameStatus'] = true;
        $this->usernameStatus = $usernameStatus;
        return $this;
    }
    /**
     * The short line shown under the business name in a chat.
     *
     * @return string|null
     */
    public function getAbout(): ?string
    {
        return $this->about;
    }
    /**
     * The short line shown under the business name in a chat.
     *
     * @param string|null $about
     *
     * @return self
     */
    public function setAbout(?string $about): self
    {
        $this->initialized['about'] = true;
        $this->about = $about;
        return $this;
    }
    /**
     * The business address shown on the profile.
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * The business address shown on the profile.
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
     * The longer description shown on the profile.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * The longer description shown on the profile.
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
     * The contact email shown on the profile.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The contact email shown on the profile.
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
     * The industry WhatsApp shows on the profile.
     *
     * @return string|null
     */
    public function getVertical(): ?string
    {
        return $this->vertical;
    }
    /**
     * The industry WhatsApp shows on the profile.
     *
     * @param string|null $vertical
     *
     * @return self
     */
    public function setVertical(?string $vertical): self
    {
        $this->initialized['vertical'] = true;
        $this->vertical = $vertical;
        return $this;
    }
    /**
     * Up to two websites shown on the profile.
     *
     * @return list<string>|null
     */
    public function getWebsites(): ?array
    {
        return $this->websites;
    }
    /**
     * Up to two websites shown on the profile.
     *
     * @param list<string>|null $websites
     *
     * @return self
     */
    public function setWebsites(?array $websites): self
    {
        $this->initialized['websites'] = true;
        $this->websites = $websites;
        return $this;
    }
    /**
     * A link to the profile picture WhatsApp currently shows. WhatsApp signs this link and it expires within days, so load it when you display it and never store it. It is served with permissive cross-origin headers, so a browser can load it directly.
     *
     * @return string|null
     */
    public function getProfilePictureUrl(): ?string
    {
        return $this->profilePictureUrl;
    }
    /**
     * A link to the profile picture WhatsApp currently shows. WhatsApp signs this link and it expires within days, so load it when you display it and never store it. It is served with permissive cross-origin headers, so a browser can load it directly.
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
