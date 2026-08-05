<?php

namespace MessageBird\Wire\Model;

class WhatsAppEventList
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
     * Timeline events for this WhatsApp message, in chronological order. The timeline is bounded and returned in full; this list is not paginated.
     *
     * @var list<WhatsAppEvent>|null
     */
    protected $data;
    /**
     * Timeline events for this WhatsApp message, in chronological order. The timeline is bounded and returned in full; this list is not paginated.
     *
     * @return list<WhatsAppEvent>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Timeline events for this WhatsApp message, in chronological order. The timeline is bounded and returned in full; this list is not paginated.
     *
     * @param list<WhatsAppEvent>|null $data
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
