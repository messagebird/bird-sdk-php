<?php

namespace MessageBird\Wire\Model;

/**
 * Label changes to apply. Labels in `add` are applied and labels in `remove` are taken off; other labels are left untouched. Adding a label that is already present, or removing one that is not, has no effect. System labels express state changes. On a conversation, adding `spam` files it as spam. Adding `archive` files it away without deleting it. Adding `inbox`, or removing `spam`, `blocked`, or `archive`, returns it to the inbox. Removing `unread` marks all retained received messages as read in one call. On a message, adding or removing `unread` flips read state. Adding or removing `trash` moves it to or out of the trash. The API rejects changes that contradict this model. A request cannot add more than one placement label. It cannot add `blocked`, because blocking a sender is a receive-rule decision. Removing `inbox` requires adding a destination. A conversation cannot add `trash` or `unread`; removing `unread` is the mark-all-read shortcut, and `trash` uses the `DELETE` verb. A message cannot use placement labels; move its conversation instead. A sent message cannot use `unread`. Custom labels are 1-64 characters with no commas, control characters, or leading or trailing whitespace. System label names and a small reserved set (`all`, `archived`, `deleted`, `draft`, `drafts`, `flagged`, `important`, `junk`, `muted`, `none`, `outbox`, `pinned`, `read`, `scheduled`, `snoozed`, `starred`) cannot be used as custom labels, in any casing. A conversation or message has at most 20 labels, system labels included.
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
}
