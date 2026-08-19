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
     * An app-defined member ID for your application's end user, assigned when your auth server authorizes them. Use up to 128 URL-safe characters because member IDs appear directly in API request paths. The value can include `+ : @ . _ -`, but not `/ ? # %` or whitespace.
     *
     * @var string|null
     */
    protected $memberId;
    /**
     * An app-defined member ID for your application's end user, assigned when your auth server authorizes them. Use up to 128 URL-safe characters because member IDs appear directly in API request paths. The value can include `+ : @ . _ -`, but not `/ ? # %` or whitespace.
     *
     * @return string|null
     */
    public function getMemberId(): ?string
    {
        return $this->memberId;
    }
    /**
     * An app-defined member ID for your application's end user, assigned when your auth server authorizes them. Use up to 128 URL-safe characters because member IDs appear directly in API request paths. The value can include `+ : @ . _ -`, but not `/ ? # %` or whitespace.
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
