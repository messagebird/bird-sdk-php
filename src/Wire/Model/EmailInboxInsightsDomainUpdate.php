<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsDomainUpdate
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
     * Whether the workspace wants this domain monitored. Enabling enrolls it with eDataSource; disabling removes only the workspace preference and preserves vendor enrollment and measurement history. Verified ownership governs report access.
     * 
     *
     * @var bool|null
     */
    protected $monitored;
    /**
     * Whether the workspace wants this domain monitored. Enabling enrolls it with eDataSource; disabling removes only the workspace preference and preserves vendor enrollment and measurement history. Verified ownership governs report access.
     * 
     *
     * @return bool|null
     */
    public function getMonitored(): ?bool
    {
        return $this->monitored;
    }
    /**
     * Whether the workspace wants this domain monitored. Enabling enrolls it with eDataSource; disabling removes only the workspace preference and preserves vendor enrollment and measurement history. Verified ownership governs report access.
     *
     * @param bool|null $monitored
     *
     * @return self
     */
    public function setMonitored(?bool $monitored): self
    {
        $this->initialized['monitored'] = true;
        $this->monitored = $monitored;
        return $this;
    }
}
