<?php

namespace MessageBird\Wire\Model;

class ContactUpsertResultItem
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
     * The identifiers a batch entry supplied, in the normalized form used for matching. A field is `null` when the entry did not include it. These values identify the request entry and do not represent the contact's current state.
     *
     * @var ContactUpsertEntry|null
     */
    protected $entry;
    /**
     * Which identifier matched a batch entry to an existing contact. `null` when the entry created a new contact.
     *
     * @var string|null
     */
    protected $matchedOn;
    /**
     * What happened to this contact.
     * 
     * - `created`: a new contact was created for the address.
     * - `updated`: an existing contact with the address was updated.
     * - `failed`: the entry was rejected and `error` explains why. A failed entry
     *   does not affect the other entries in the request.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * @var string|null
     */
    protected $contactId;
    /**
     * @var ContactUpsertError|null
     */
    protected $error;
    /**
     * The identifiers a batch entry supplied, in the normalized form used for matching. A field is `null` when the entry did not include it. These values identify the request entry and do not represent the contact's current state.
     *
     * @return ContactUpsertEntry|null
     */
    public function getEntry(): ?ContactUpsertEntry
    {
        return $this->entry;
    }
    /**
     * The identifiers a batch entry supplied, in the normalized form used for matching. A field is `null` when the entry did not include it. These values identify the request entry and do not represent the contact's current state.
     *
     * @param ContactUpsertEntry|null $entry
     *
     * @return self
     */
    public function setEntry(?ContactUpsertEntry $entry): self
    {
        $this->initialized['entry'] = true;
        $this->entry = $entry;
        return $this;
    }
    /**
     * Which identifier matched a batch entry to an existing contact. `null` when the entry created a new contact.
     *
     * @return string|null
     */
    public function getMatchedOn(): ?string
    {
        return $this->matchedOn;
    }
    /**
     * Which identifier matched a batch entry to an existing contact. `null` when the entry created a new contact.
     *
     * @param string|null $matchedOn
     *
     * @return self
     */
    public function setMatchedOn(?string $matchedOn): self
    {
        $this->initialized['matchedOn'] = true;
        $this->matchedOn = $matchedOn;
        return $this;
    }
    /**
     * What happened to this contact.
     * 
     * - `created`: a new contact was created for the address.
     * - `updated`: an existing contact with the address was updated.
     * - `failed`: the entry was rejected and `error` explains why. A failed entry
     *   does not affect the other entries in the request.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * What happened to this contact.
    
    - `created`: a new contact was created for the address.
    - `updated`: an existing contact with the address was updated.
    - `failed`: the entry was rejected and `error` explains why. A failed entry
     does not affect the other entries in the request.
    
    *
    * @param string|null $status
    *
    * @return self
    */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getContactId(): ?string
    {
        return $this->contactId;
    }
    /**
     * @param string|null $contactId
     *
     * @return self
     */
    public function setContactId(?string $contactId): self
    {
        $this->initialized['contactId'] = true;
        $this->contactId = $contactId;
        return $this;
    }
    /**
     * @return ContactUpsertError|null
     */
    public function getError(): ?ContactUpsertError
    {
        return $this->error;
    }
    /**
     * @param ContactUpsertError|null $error
     *
     * @return self
     */
    public function setError(?ContactUpsertError $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }
}
