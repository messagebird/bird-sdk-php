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
     * Email address this entry refers to, in the normalized (trimmed and lowercased) form it was matched and stored as.
     *
     * @var string|null
     */
    protected $email;
    /**
     * What happened to this contact. `created` means a new contact was created for the address; `updated` means an existing contact with the address was updated; `failed` means the entry was rejected and `error` explains why. A failed entry does not affect the other entries in the request.
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
     * Email address this entry refers to, in the normalized (trimmed and lowercased) form it was matched and stored as.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Email address this entry refers to, in the normalized (trimmed and lowercased) form it was matched and stored as.
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
     * What happened to this contact. `created` means a new contact was created for the address; `updated` means an existing contact with the address was updated; `failed` means the entry was rejected and `error` explains why. A failed entry does not affect the other entries in the request.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * What happened to this contact. `created` means a new contact was created for the address; `updated` means an existing contact with the address was updated; `failed` means the entry was rejected and `error` explains why. A failed entry does not affect the other entries in the request.
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
