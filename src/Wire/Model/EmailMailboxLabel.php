<?php

namespace MessageBird\Wire\Model;

class EmailMailboxLabel
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
     * The label name, as it appears on conversations and messages.
     *
     * @var string|null
     */
    protected $name;
    /**
     * `system` labels are built in and carry state — the placements `inbox`, `archive`, `spam`, `blocked`, and `sent`, plus `trash` and `unread`. `custom` labels are the workspace's own tags.
     *
     * @var string|null
     */
    protected $type;
    /**
     * The label name, as it appears on conversations and messages.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The label name, as it appears on conversations and messages.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * `system` labels are built in and carry state — the placements `inbox`, `archive`, `spam`, `blocked`, and `sent`, plus `trash` and `unread`. `custom` labels are the workspace's own tags.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * `system` labels are built in and carry state — the placements `inbox`, `archive`, `spam`, `blocked`, and `sent`, plus `trash` and `unread`. `custom` labels are the workspace's own tags.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
}
