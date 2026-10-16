<?php

namespace MessageBird\Wire\Model;

/**
 * Meta's own messaging health for this account. `can_send_message` is Meta's aggregate: `blocked` if any entity is blocked, else `limited` if any is limited, else `available`. Read `entities` to see which node carries the verdict and why.
 */
class WhatsAppMetaHealthStatus
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
