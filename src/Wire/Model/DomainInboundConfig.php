<?php

namespace MessageBird\Wire\Model;

class DomainInboundConfig
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
     * Set `true` to enable receiving on this domain, `false` to disable it. Read `receiving.state` to follow the request: `disabling` while receiving is turning off, `disable_failed` if the latest attempt failed, and `disabled` when it is off. Retry a failed request with `false`. Before deleting the domain or workspace, poll the domain until `capabilities.inbound.status` is `not_configured`. Its MX records remain in `dns_records` as optional. Receiving with an assigned workspace is managed there. Disabling from a sibling workspace returns `403`; re-enabling does not move the assigned receiver. A sibling also receives `403` if it re-enables while a request to turn off receiving is pending or has failed. `receiving.managed_elsewhere` identifies this restriction before a request. Older setups without a recorded receiver can be disabled from an authorized workspace sharing the domain; re-enabling records that workspace as the receiver.
     * 
     *
     * @var bool|null
     */
    protected $enabled;
    /**
     * Set `true` to enable receiving on this domain, `false` to disable it. Read `receiving.state` to follow the request: `disabling` while receiving is turning off, `disable_failed` if the latest attempt failed, and `disabled` when it is off. Retry a failed request with `false`. Before deleting the domain or workspace, poll the domain until `capabilities.inbound.status` is `not_configured`. Its MX records remain in `dns_records` as optional. Receiving with an assigned workspace is managed there. Disabling from a sibling workspace returns `403`; re-enabling does not move the assigned receiver. A sibling also receives `403` if it re-enables while a request to turn off receiving is pending or has failed. `receiving.managed_elsewhere` identifies this restriction before a request. Older setups without a recorded receiver can be disabled from an authorized workspace sharing the domain; re-enabling records that workspace as the receiver.
     * 
     *
     * @return bool|null
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }
    /**
     * Set `true` to enable receiving on this domain, `false` to disable it. Read `receiving.state` to follow the request: `disabling` while receiving is turning off, `disable_failed` if the latest attempt failed, and `disabled` when it is off. Retry a failed request with `false`. Before deleting the domain or workspace, poll the domain until `capabilities.inbound.status` is `not_configured`. Its MX records remain in `dns_records` as optional. Receiving with an assigned workspace is managed there. Disabling from a sibling workspace returns `403`; re-enabling does not move the assigned receiver. A sibling also receives `403` if it re-enables while a request to turn off receiving is pending or has failed. `receiving.managed_elsewhere` identifies this restriction before a request. Older setups without a recorded receiver can be disabled from an authorized workspace sharing the domain; re-enabling records that workspace as the receiver.
     *
     * @param bool|null $enabled
     *
     * @return self
     */
    public function setEnabled(?bool $enabled): self
    {
        $this->initialized['enabled'] = true;
        $this->enabled = $enabled;
        return $this;
    }
}
