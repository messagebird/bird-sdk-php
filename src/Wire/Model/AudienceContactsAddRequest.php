<?php

namespace MessageBird\Wire\Model;

class AudienceContactsAddRequest
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
     * Contacts to add to the audience. Adding a contact that is already a member has no effect and keeps its original join time. Duplicate IDs in the list are collapsed. If any ID does not exist in the workspace, the whole request fails with a validation error and no contacts are added.
     *
     * @var list<string>|null
     */
    protected $contactIds;
    /**
     * Contacts to add to the audience. Adding a contact that is already a member has no effect and keeps its original join time. Duplicate IDs in the list are collapsed. If any ID does not exist in the workspace, the whole request fails with a validation error and no contacts are added.
     *
     * @return list<string>|null
     */
    public function getContactIds(): ?array
    {
        return $this->contactIds;
    }
    /**
     * Contacts to add to the audience. Adding a contact that is already a member has no effect and keeps its original join time. Duplicate IDs in the list are collapsed. If any ID does not exist in the workspace, the whole request fails with a validation error and no contacts are added.
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
