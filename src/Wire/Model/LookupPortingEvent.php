<?php

namespace MessageBird\Wire\Model;

class LookupPortingEvent
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
     * When the move was recorded, null when the record carries no date.
     *
     * @var \DateTime|null
     */
    protected $occurredAt;
    /**
     * What the record describes, as the number's registry reports it. Registries use their own short codes rather than a shared vocabulary, so treat this as a label to display rather than a value to branch on.
     *
     * @var string|null
     */
    protected $action;
    /**
     * When the move was recorded, null when the record carries no date.
     *
     * @return \DateTime|null
     */
    public function getOccurredAt(): ?\DateTime
    {
        return $this->occurredAt;
    }
    /**
     * When the move was recorded, null when the record carries no date.
     *
     * @param \DateTime|null $occurredAt
     *
     * @return self
     */
    public function setOccurredAt(?\DateTime $occurredAt): self
    {
        $this->initialized['occurredAt'] = true;
        $this->occurredAt = $occurredAt;
        return $this;
    }
    /**
     * What the record describes, as the number's registry reports it. Registries use their own short codes rather than a shared vocabulary, so treat this as a label to display rather than a value to branch on.
     *
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }
    /**
     * What the record describes, as the number's registry reports it. Registries use their own short codes rather than a shared vocabulary, so treat this as a label to display rather than a value to branch on.
     *
     * @param string|null $action
     *
     * @return self
     */
    public function setAction(?string $action): self
    {
        $this->initialized['action'] = true;
        $this->action = $action;
        return $this;
    }
}
