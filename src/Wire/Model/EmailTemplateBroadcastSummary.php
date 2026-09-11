<?php

namespace MessageBird\Wire\Model;

class EmailTemplateBroadcastSummary
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
    protected $id;
    /**
     * Where the broadcast has got to. Only `scheduled` and `accepted` appear here: those are the two that have not pinned their content yet, so they are the ones blocking the delete. This list carries the status alone; the per-recipient totals live on the broadcast itself.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * When the broadcast is due to send, or null when it is not scheduled.
     *
     * @var \DateTime|null
     */
    protected $scheduledAt;
    /**
     * When the broadcast was created.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * Where the broadcast has got to. Only `scheduled` and `accepted` appear here: those are the two that have not pinned their content yet, so they are the ones blocking the delete. This list carries the status alone; the per-recipient totals live on the broadcast itself.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Where the broadcast has got to. Only `scheduled` and `accepted` appear here: those are the two that have not pinned their content yet, so they are the ones blocking the delete. This list carries the status alone; the per-recipient totals live on the broadcast itself.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * When the broadcast is due to send, or null when it is not scheduled.
     *
     * @return \DateTime|null
     */
    public function getScheduledAt(): ?\DateTime
    {
        return $this->scheduledAt;
    }
    /**
     * When the broadcast is due to send, or null when it is not scheduled.
     *
     * @param \DateTime|null $scheduledAt
     *
     * @return self
     */
    public function setScheduledAt(?\DateTime $scheduledAt): self
    {
        $this->initialized['scheduledAt'] = true;
        $this->scheduledAt = $scheduledAt;
        return $this;
    }
    /**
     * When the broadcast was created.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the broadcast was created.
     *
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
}
