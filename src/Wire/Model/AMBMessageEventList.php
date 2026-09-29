<?php

namespace MessageBird\Wire\Model;

class AMBMessageEventList
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
     * The message's events, oldest first. Not paginated: a message's timeline is bounded and returned in full.
     * 
     *
     * @var list<AMBMessageEvent>|null
     */
    protected $data;
    /**
     * The message's events, oldest first. Not paginated: a message's timeline is bounded and returned in full.
     * 
     *
     * @return list<AMBMessageEvent>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * The message's events, oldest first. Not paginated: a message's timeline is bounded and returned in full.
     *
     * @param list<AMBMessageEvent>|null $data
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
