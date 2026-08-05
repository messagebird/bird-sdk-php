<?php

namespace MessageBird\Wire\Model;

class ShareDomainDnsRequest
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
     * Email recipients for the domain's current DNS records. The first address is the direct recipient and the rest are copied on the same email; duplicates are ignored. Any invalid address fails the whole request with `422`.
     *
     * @var list<string>|null
     */
    protected $emails;
    /**
     * Email recipients for the domain's current DNS records. The first address is the direct recipient and the rest are copied on the same email; duplicates are ignored. Any invalid address fails the whole request with `422`.
     *
     * @return list<string>|null
     */
    public function getEmails(): ?array
    {
        return $this->emails;
    }
    /**
     * Email recipients for the domain's current DNS records. The first address is the direct recipient and the rest are copied on the same email; duplicates are ignored. Any invalid address fails the whole request with `422`.
     *
     * @param list<string>|null $emails
     *
     * @return self
     */
    public function setEmails(?array $emails): self
    {
        $this->initialized['emails'] = true;
        $this->emails = $emails;
        return $this;
    }
}
