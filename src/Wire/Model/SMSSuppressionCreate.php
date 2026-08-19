<?php

namespace MessageBird\Wire\Model;

class SMSSuppressionCreate
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
     * The subscriber to stop messaging, in E.164 format.
     *
     * @var string|null
     */
    protected $destination;
    /**
     * The sender to stop. Your other senders keep reaching this subscriber, so stopping every one of them means one call per sender.
     * 
     *
     * @var string|null
     */
    protected $originator;
    /**
     * The subscriber to stop messaging, in E.164 format.
     *
     * @return string|null
     */
    public function getDestination(): ?string
    {
        return $this->destination;
    }
    /**
     * The subscriber to stop messaging, in E.164 format.
     *
     * @param string|null $destination
     *
     * @return self
     */
    public function setDestination(?string $destination): self
    {
        $this->initialized['destination'] = true;
        $this->destination = $destination;
        return $this;
    }
    /**
     * The sender to stop. Your other senders keep reaching this subscriber, so stopping every one of them means one call per sender.
     * 
     *
     * @return string|null
     */
    public function getOriginator(): ?string
    {
        return $this->originator;
    }
    /**
     * The sender to stop. Your other senders keep reaching this subscriber, so stopping every one of them means one call per sender.
     *
     * @param string|null $originator
     *
     * @return self
     */
    public function setOriginator(?string $originator): self
    {
        $this->initialized['originator'] = true;
        $this->originator = $originator;
        return $this;
    }
}
