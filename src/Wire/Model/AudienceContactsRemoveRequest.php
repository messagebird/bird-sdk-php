<?php

namespace MessageBird\Wire\Model;

class AudienceContactsRemoveRequest
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
     * Contacts to remove from the audience. Removing a contact that is not a member has no effect; duplicate IDs in the list are collapsed. If any ID does not exist in the workspace, the whole request fails with a validation error and no memberships are removed.
     *
     * @var list<string>|null
     */
    protected $contactIds;
    /**
     * Contacts to remove from the audience. Removing a contact that is not a member has no effect; duplicate IDs in the list are collapsed. If any ID does not exist in the workspace, the whole request fails with a validation error and no memberships are removed.
     *
     * @return list<string>|null
     */
    public function getContactIds(): ?array
    {
        return $this->contactIds;
    }
    /**
     * Contacts to remove from the audience. Removing a contact that is not a member has no effect; duplicate IDs in the list are collapsed. If any ID does not exist in the workspace, the whole request fails with a validation error and no memberships are removed.
     *
     * @param list<string>|null $contactIds
     *
     * @return self
     */
    public function setContactIds(?array $contactIds): self
    {
        $this->initialized['contactIds'] = true;
        $this->contactIds = $contactIds;
        return $this;
    }
}
