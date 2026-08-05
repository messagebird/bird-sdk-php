<?php

namespace MessageBird\Wire\Model;

class RealtimeChannelMember
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
     * An app-defined member id — the identity of your application's end user ("member"), assigned when your auth server authorizes them. Never a Bird user. Max 128 characters, restricted to URL-safe characters because member ids appear directly in API request paths. Broader than a channel name — allows `+ : @ . _ -` etc. for real identifiers (phone numbers, emails, `member:42`), but excludes `/ ? # %` and whitespace.
     *
     * @var string|null
     */
    protected $memberId;
    /**
     * An app-defined member id — the identity of your application's end user ("member"), assigned when your auth server authorizes them. Never a Bird user. Max 128 characters, restricted to URL-safe characters because member ids appear directly in API request paths. Broader than a channel name — allows `+ : @ . _ -` etc. for real identifiers (phone numbers, emails, `member:42`), but excludes `/ ? # %` and whitespace.
     *
     * @return string|null
     */
    public function getMemberId(): ?string
    {
        return $this->memberId;
    }
    /**
     * An app-defined member id — the identity of your application's end user ("member"), assigned when your auth server authorizes them. Never a Bird user. Max 128 characters, restricted to URL-safe characters because member ids appear directly in API request paths. Broader than a channel name — allows `+ : @ . _ -` etc. for real identifiers (phone numbers, emails, `member:42`), but excludes `/ ? # %` and whitespace.
     *
     * @param string|null $memberId
     *
     * @return self
     */
    public function setMemberId(?string $memberId): self
    {
        $this->initialized['memberId'] = true;
        $this->memberId = $memberId;
        return $this;
    }
}
