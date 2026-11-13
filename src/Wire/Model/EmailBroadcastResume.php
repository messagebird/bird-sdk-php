<?php

namespace MessageBird\Wire\Model;

class EmailBroadcastResume
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
     * Acknowledgment that the message reaches the remaining recipients later than intended. It is required to resume a broadcast that started sending at least 24 hours ago. Before setting it, read the broadcast's `started_at` and have a reviewer with `email_management:read` read its template by `template.id` to check `scope`, then, for a workspace template or one the template read reports deleted (`404`), its pinned version using `template.id` and `template.version_id`. Workspace versions retain the original content. A built-in template (`scope: system`) shows current catalogue content, and only the template read returns `scope`. Broadcasts with frozen content keep it, but older broadcasts can read the catalogue again when resumed. Neither a current lookup nor an earlier message alone proves what remaining recipients will receive. Leave the broadcast paused unless you can verify that content. Ask an authorized teammate if you lack that permission. It does not skip the funds or concurrent-broadcast checks.
     *
     * @var bool|null
     */
    protected $confirm;
    /**
     * Acknowledgment that the message reaches the remaining recipients later than intended. It is required to resume a broadcast that started sending at least 24 hours ago. Before setting it, read the broadcast's `started_at` and have a reviewer with `email_management:read` read its template by `template.id` to check `scope`, then, for a workspace template or one the template read reports deleted (`404`), its pinned version using `template.id` and `template.version_id`. Workspace versions retain the original content. A built-in template (`scope: system`) shows current catalogue content, and only the template read returns `scope`. Broadcasts with frozen content keep it, but older broadcasts can read the catalogue again when resumed. Neither a current lookup nor an earlier message alone proves what remaining recipients will receive. Leave the broadcast paused unless you can verify that content. Ask an authorized teammate if you lack that permission. It does not skip the funds or concurrent-broadcast checks.
     *
     * @return bool|null
     */
    public function getConfirm(): ?bool
    {
        return $this->confirm;
    }
    /**
     * Acknowledgment that the message reaches the remaining recipients later than intended. It is required to resume a broadcast that started sending at least 24 hours ago. Before setting it, read the broadcast's `started_at` and have a reviewer with `email_management:read` read its template by `template.id` to check `scope`, then, for a workspace template or one the template read reports deleted (`404`), its pinned version using `template.id` and `template.version_id`. Workspace versions retain the original content. A built-in template (`scope: system`) shows current catalogue content, and only the template read returns `scope`. Broadcasts with frozen content keep it, but older broadcasts can read the catalogue again when resumed. Neither a current lookup nor an earlier message alone proves what remaining recipients will receive. Leave the broadcast paused unless you can verify that content. Ask an authorized teammate if you lack that permission. It does not skip the funds or concurrent-broadcast checks.
     *
     * @param bool|null $confirm
     *
     * @return self
     */
    public function setConfirm(?bool $confirm): self
    {
        $this->initialized['confirm'] = true;
        $this->confirm = $confirm;
        return $this;
    }
}
