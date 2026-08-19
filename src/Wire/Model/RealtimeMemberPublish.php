<?php

namespace MessageBird\Wire\Model;

class RealtimeMemberPublish
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
     * The event name clients bind to. Application event names are free-form; the `bird:` and `bird_internal:` prefixes are reserved for the protocol and rejected.
     *
     * @var string|null
     */
    protected $event;
    /**
     * Arbitrary JSON payload delivered as the event data: an object, array, or scalar. Cap: 10 KB serialized.
     *
     * @var mixed|null
     */
    protected $data;
    /**
     * The event name clients bind to. Application event names are free-form; the `bird:` and `bird_internal:` prefixes are reserved for the protocol and rejected.
     *
     * @return string|null
     */
    public function getEvent(): ?string
    {
        return $this->event;
    }
    /**
     * The event name clients bind to. Application event names are free-form; the `bird:` and `bird_internal:` prefixes are reserved for the protocol and rejected.
     *
     * @param string|null $event
     *
     * @return self
     */
    public function setEvent(?string $event): self
    {
        $this->initialized['event'] = true;
        $this->event = $event;
        return $this;
    }
    /**
     * Arbitrary JSON payload delivered as the event data: an object, array, or scalar. Cap: 10 KB serialized.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
    /**
     * Arbitrary JSON payload delivered as the event data: an object, array, or scalar. Cap: 10 KB serialized.
     *
     * @param mixed $data
     *
     * @return self
     */
    public function setData($data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
