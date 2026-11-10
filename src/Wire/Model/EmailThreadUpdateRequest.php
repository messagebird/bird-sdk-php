<?php

namespace MessageBird\Wire\Model;

/**
 * Changes to apply to a thread. Omitted fields are left unchanged. Folder changes accept inbox, archive or spam and reject trashed threads with 422; first use [Restore a thread from trash](/docs/api/reference/restore-email-thread). Read and custom-label updates remain available in trash.
 */
class EmailThreadUpdateRequest
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
     * Mark all retained received messages read or unread. Includes trash, spam and blocked messages; unread_count continues to exclude them.
     *
     * @var bool|null
     */
    protected $read;
    /**
     * Folder a caller can choose through PATCH. Use DELETE to move a thread to trash and [Restore a thread from trash](/docs/api/reference/restore-email-thread) (POST /v1/email/threads/{thread_id}/restore) to recover it.
     *
     * @var string|null
     */
    protected $folder;
    /**
     * Custom labels to add or remove, or the full set to replace them with. Send `set` on its own; combining it with `add` or `remove` returns 422. System names are refused; use read and folder for thread state. Reserved names are refused too, except a label the conversation already carries from before its name was reserved, which can still be removed, and kept in a `set` in any casing. The resulting custom-label set must contain at most 20 labels; larger sets return 422. A custom name added or set that the workspace does not have yet becomes a workspace label that stays after it is removed from every conversation; once the workspace has 100 labels, a write that would create one more is refused with `E17058`. Custom label names match the workspace's labels in any casing, so adding `Urgent` where the workspace has `urgent` applies `urgent`, and responses return the workspace's spelling.
     *
     * @var EmailThreadLabelsUpdate|null
     */
    protected $labels;
    /**
     * Contact to link this conversation to, or null to unlink the current contact.
     *
     * @var string|null
     */
    protected $contactId;
    /**
     * Mark all retained received messages read or unread. Includes trash, spam and blocked messages; unread_count continues to exclude them.
     *
     * @return bool|null
     */
    public function getRead(): ?bool
    {
        return $this->read;
    }
    /**
     * Mark all retained received messages read or unread. Includes trash, spam and blocked messages; unread_count continues to exclude them.
     *
     * @param bool|null $read
     *
     * @return self
     */
    public function setRead(?bool $read): self
    {
        $this->initialized['read'] = true;
        $this->read = $read;
        return $this;
    }
    /**
     * Folder a caller can choose through PATCH. Use DELETE to move a thread to trash and [Restore a thread from trash](/docs/api/reference/restore-email-thread) (POST /v1/email/threads/{thread_id}/restore) to recover it.
     *
     * @return string|null
     */
    public function getFolder(): ?string
    {
        return $this->folder;
    }
    /**
     * Folder a caller can choose through PATCH. Use DELETE to move a thread to trash and [Restore a thread from trash](/docs/api/reference/restore-email-thread) (POST /v1/email/threads/{thread_id}/restore) to recover it.
     *
     * @param string|null $folder
     *
     * @return self
     */
    public function setFolder(?string $folder): self
    {
        $this->initialized['folder'] = true;
        $this->folder = $folder;
        return $this;
    }
    /**
     * Custom labels to add or remove, or the full set to replace them with. Send `set` on its own; combining it with `add` or `remove` returns 422. System names are refused; use read and folder for thread state. Reserved names are refused too, except a label the conversation already carries from before its name was reserved, which can still be removed, and kept in a `set` in any casing. The resulting custom-label set must contain at most 20 labels; larger sets return 422. A custom name added or set that the workspace does not have yet becomes a workspace label that stays after it is removed from every conversation; once the workspace has 100 labels, a write that would create one more is refused with `E17058`. Custom label names match the workspace's labels in any casing, so adding `Urgent` where the workspace has `urgent` applies `urgent`, and responses return the workspace's spelling.
     *
     * @return EmailThreadLabelsUpdate|null
     */
    public function getLabels(): ?EmailThreadLabelsUpdate
    {
        return $this->labels;
    }
    /**
     * Custom labels to add or remove, or the full set to replace them with. Send `set` on its own; combining it with `add` or `remove` returns 422. System names are refused; use read and folder for thread state. Reserved names are refused too, except a label the conversation already carries from before its name was reserved, which can still be removed, and kept in a `set` in any casing. The resulting custom-label set must contain at most 20 labels; larger sets return 422. A custom name added or set that the workspace does not have yet becomes a workspace label that stays after it is removed from every conversation; once the workspace has 100 labels, a write that would create one more is refused with `E17058`. Custom label names match the workspace's labels in any casing, so adding `Urgent` where the workspace has `urgent` applies `urgent`, and responses return the workspace's spelling.
     *
     * @param EmailThreadLabelsUpdate|null $labels
     *
     * @return self
     */
    public function setLabels(?EmailThreadLabelsUpdate $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;
        return $this;
    }
    /**
     * Contact to link this conversation to, or null to unlink the current contact.
     *
     * @return string|null
     */
    public function getContactId(): ?string
    {
        return $this->contactId;
    }
    /**
     * Contact to link this conversation to, or null to unlink the current contact.
     *
     * @param string|null $contactId
     *
     * @return self
     */
    public function setContactId(?string $contactId): self
    {
        $this->initialized['contactId'] = true;
        $this->contactId = $contactId;
        return $this;
    }
}
