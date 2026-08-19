<?php

namespace MessageBird\Wire\Model;

class SMSEventList
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
     * Timeline events for this SMS message, in chronological order. The bounded timeline is returned in full and is not paginated.
     *
     * @var list<SMSEvent>|null
     */
    protected $data;
    /**
     * Timeline events for this SMS message, in chronological order. The bounded timeline is returned in full and is not paginated.
     *
     * @return list<SMSEvent>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Timeline events for this SMS message, in chronological order. The bounded timeline is returned in full and is not paginated.
     *
     * @param list<SMSEvent>|null $data
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
