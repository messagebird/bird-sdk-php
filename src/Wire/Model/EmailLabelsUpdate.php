<?php

namespace MessageBird\Wire\Model;

/**
 * Label changes to apply. Labels in `add` are applied and labels in `remove` are taken off; other labels are left untouched. Adding a label that is already present, or removing one that is not, has no effect. `set` instead replaces every custom label and leaves system labels as they are; send it on its own, since combining it with `add` or `remove` returns 422. On a message, adding or removing `unread` flips read state. Adding or removing `trash` moves it to or out of the trash. Placement labels cannot be applied to a message; use `folder` on [Update a thread](/docs/api/reference/update-email-thread) (`PATCH /v1/email/threads/{thread_id}`) to move its conversation. A sent message cannot use unread. Custom labels are 1-64 characters with no commas, control characters, or leading or trailing whitespace. System label names and a small reserved set (`all`, `archived`, `assigned`, `closed`, `deleted`, `draft`, `drafts`, `flagged`, `important`, `junk`, `muted`, `none`, `open`, `outbox`, `pinned`, `read`, `scheduled`, `snoozed`, `starred`) cannot be applied as custom labels, in any casing. A label applied before its name was reserved can still be removed, added again under the same name with no effect, and kept in a `set` in any casing. A conversation or message has at most 20 labels, system labels included. A custom name added or set that the workspace does not have yet becomes a workspace label that stays after it is removed from every conversation; once the workspace has 100 labels, a write that would create one more is refused with `E17058`. A name in both `add` and `remove` is removed and does not count as added. Custom label names match the workspace's labels in any casing: adding `Urgent` where the workspace has `urgent` applies `urgent`, and responses return the workspace's spelling.
 */
class EmailLabelsUpdate
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
     * The custom labels the message should carry, replacing all of its current ones; system labels such as `unread` and `trash` are unchanged. An empty array removes every custom label.
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
     * The custom labels the message should carry, replacing all of its current ones; system labels such as `unread` and `trash` are unchanged. An empty array removes every custom label.
     *
     * @return list<string>|null
     */
    public function getSet(): ?array
    {
        return $this->set;
    }
    /**
     * The custom labels the message should carry, replacing all of its current ones; system labels such as `unread` and `trash` are unchanged. An empty array removes every custom label.
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
