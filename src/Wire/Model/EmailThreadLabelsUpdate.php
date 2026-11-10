<?php

namespace MessageBird\Wire\Model;

/**
 * Custom labels to add or remove, or the full set to replace them with. Send `set` on its own; combining it with `add` or `remove` returns 422. System names are refused; use read and folder for thread state. Reserved names are refused too, except a label the conversation already carries from before its name was reserved, which can still be removed, and kept in a `set` in any casing. The resulting custom-label set must contain at most 20 labels; larger sets return 422. A custom name added or set that the workspace does not have yet becomes a workspace label that stays after it is removed from every conversation; once the workspace has 100 labels, a write that would create one more is refused with `E17058`. Custom label names match the workspace's labels in any casing, so adding `Urgent` where the workspace has `urgent` applies `urgent`, and responses return the workspace's spelling.
 */
class EmailThreadLabelsUpdate
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
     * Labels to apply.
     *
     * @var list<string>|null
     */
    protected $add;
    /**
     * Labels to take off.
     *
     * @var list<string>|null
     */
    protected $remove;
    /**
     * The custom labels the conversation should carry, replacing all of its current ones. An empty array removes every custom label.
     *
     * @var list<string>|null
     */
    protected $set;
    /**
     * Labels to apply.
     *
     * @return list<string>|null
     */
    public function getAdd(): ?array
    {
        return $this->add;
    }
    /**
     * Labels to apply.
     *
     * @param list<string>|null $add
     *
     * @return self
     */
    public function setAdd(?array $add): self
    {
        $this->initialized['add'] = true;
        $this->add = $add;
        return $this;
    }
    /**
     * Labels to take off.
     *
     * @return list<string>|null
     */
    public function getRemove(): ?array
    {
        return $this->remove;
    }
    /**
     * Labels to take off.
     *
     * @param list<string>|null $remove
     *
     * @return self
     */
    public function setRemove(?array $remove): self
    {
        $this->initialized['remove'] = true;
        $this->remove = $remove;
        return $this;
    }
    /**
     * The custom labels the conversation should carry, replacing all of its current ones. An empty array removes every custom label.
     *
     * @return list<string>|null
     */
    public function getSet(): ?array
    {
        return $this->set;
    }
    /**
     * The custom labels the conversation should carry, replacing all of its current ones. An empty array removes every custom label.
     *
     * @param list<string>|null $set
     *
     * @return self
     */
    public function setSet(?array $set): self
    {
        $this->initialized['set'] = true;
        $this->set = $set;
        return $this;
    }
}
