<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsDomain
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
     * The sending domain, lowercased, as it appears in your sending domains.
     *
     * @var string|null
     */
    protected $domain;
    /**
     * Whether Inbox Insights reports on this domain. Switching it off stops the reporting and keeps the measurement history, so switching it back on restores the full history rather than starting again.
     * 
     *
     * @var bool|null
     */
    protected $monitored;
    /**
     * The sending domain, lowercased, as it appears in your sending domains.
     *
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }
    /**
     * The sending domain, lowercased, as it appears in your sending domains.
     *
     * @param string|null $domain
     *
     * @return self
     */
    public function setDomain(?string $domain): self
    {
        $this->initialized['domain'] = true;
        $this->domain = $domain;
        return $this;
    }
    /**
     * Whether Inbox Insights reports on this domain. Switching it off stops the reporting and keeps the measurement history, so switching it back on restores the full history rather than starting again.
     * 
     *
     * @return bool|null
     */
    public function getMonitored(): ?bool
    {
        return $this->monitored;
    }
    /**
     * Whether Inbox Insights reports on this domain. Switching it off stops the reporting and keeps the measurement history, so switching it back on restores the full history rather than starting again.
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
