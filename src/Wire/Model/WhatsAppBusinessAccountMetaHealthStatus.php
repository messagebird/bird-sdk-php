<?php

namespace MessageBird\Wire\Model;

class WhatsAppBusinessAccountMetaHealthStatus extends \ArrayObject
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
     * @var string|null
     */
    protected $canSendMessage;
    /**
     * One entry per node Meta evaluated. Order is Meta's.
     *
     * @var list<WhatsAppMetaHealthEntity>|null
     */
    protected $entities;
    /**
     * @return string|null
     */
    public function getCanSendMessage(): ?string
    {
        return $this->canSendMessage;
    }
    /**
     * @param string|null $canSendMessage
     *
     * @return self
     */
    public function setCanSendMessage(?string $canSendMessage): self
    {
        $this->initialized['canSendMessage'] = true;
        $this->canSendMessage = $canSendMessage;
        return $this;
    }
    /**
     * One entry per node Meta evaluated. Order is Meta's.
     *
     * @return list<WhatsAppMetaHealthEntity>|null
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }
    /**
     * One entry per node Meta evaluated. Order is Meta's.
     *
     * @param list<WhatsAppMetaHealthEntity>|null $entities
     *
     * @return self
     */
    public function setEntities(?array $entities): self
    {
        $this->initialized['entities'] = true;
        $this->entities = $entities;
        return $this;
    }
}
