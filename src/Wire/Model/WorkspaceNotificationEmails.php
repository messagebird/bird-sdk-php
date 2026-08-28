<?php

namespace MessageBird\Wire\Model;

class WorkspaceNotificationEmails
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
     * Addresses for operational notifications about this workspace (sending domain authentication failures, webhook endpoint degradation). When empty, these notifications go to the organization owners. Maximum 10 addresses.
     *
     * @var list<string>|null
     */
    protected $operational;
    /**
     * Addresses for operational notifications about this workspace (sending domain authentication failures, webhook endpoint degradation). When empty, these notifications go to the organization owners. Maximum 10 addresses.
     *
     * @return list<string>|null
     */
    public function getOperational(): ?array
    {
        return $this->operational;
    }
    /**
     * Addresses for operational notifications about this workspace (sending domain authentication failures, webhook endpoint degradation). When empty, these notifications go to the organization owners. Maximum 10 addresses.
     *
     * @param list<string>|null $operational
     *
     * @return self
     */
    public function setOperational(?array $operational): self
    {
        $this->initialized['operational'] = true;
        $this->operational = $operational;
        return $this;
    }
}
