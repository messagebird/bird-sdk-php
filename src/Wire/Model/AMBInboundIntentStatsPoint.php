<?php

namespace MessageBird\Wire\Model;

class AMBInboundIntentStatsPoint
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
     * The intent these messages arrived under, as configured in the business's entry points. Intents are workspace-defined and have no fixed vocabulary.
     *
     * @var string|null
     */
    protected $intent;
    /**
     * Distinct messages received under this intent in the period.
     *
     * @var int|null
     */
    protected $received;
    /**
     * The intent these messages arrived under, as configured in the business's entry points. Intents are workspace-defined and have no fixed vocabulary.
     *
     * @return string|null
     */
    public function getIntent(): ?string
    {
        return $this->intent;
    }
    /**
     * The intent these messages arrived under, as configured in the business's entry points. Intents are workspace-defined and have no fixed vocabulary.
     *
     * @param string|null $intent
     *
     * @return self
     */
    public function setIntent(?string $intent): self
    {
        $this->initialized['intent'] = true;
        $this->intent = $intent;
        return $this;
    }
    /**
     * Distinct messages received under this intent in the period.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct messages received under this intent in the period.
     *
     * @param int|null $received
     *
     * @return self
     */
    public function setReceived(?int $received): self
    {
        $this->initialized['received'] = true;
        $this->received = $received;
        return $this;
    }
}
