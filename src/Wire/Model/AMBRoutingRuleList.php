<?php

namespace MessageBird\Wire\Model;

class AMBRoutingRuleList
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
     * The workspace's routing rules, optionally filtered by business, highest precedence first and ties broken by `id`. Rules are evaluated within their business in this order. The set is returned in full; this list is not paginated.
     * 
     *
     * @var list<AMBRoutingRule>|null
     */
    protected $data;
    /**
     * The workspace's routing rules, optionally filtered by business, highest precedence first and ties broken by `id`. Rules are evaluated within their business in this order. The set is returned in full; this list is not paginated.
     * 
     *
     * @return list<AMBRoutingRule>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * The workspace's routing rules, optionally filtered by business, highest precedence first and ties broken by `id`. Rules are evaluated within their business in this order. The set is returned in full; this list is not paginated.
     *
     * @param list<AMBRoutingRule>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
