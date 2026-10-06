<?php

namespace MessageBird\Wire\Model;

class EsimSubscriberCreate
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
    protected $contactId;
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
}
