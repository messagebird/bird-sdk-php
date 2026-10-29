<?php

namespace MessageBird\Wire\Model;

class WorkspaceRateLimitList
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
     * @var list<WorkspaceRateLimit>|null
     */
    protected $data;
    /**
     * @return list<WorkspaceRateLimit>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * @param list<WorkspaceRateLimit>|null $data
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
