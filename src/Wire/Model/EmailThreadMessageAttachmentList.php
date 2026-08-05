<?php

namespace MessageBird\Wire\Model;

class EmailThreadMessageAttachmentList
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
     * @var list<EmailThreadMessageAttachment>|null
     */
    protected $data;
    /**
     * @return list<EmailThreadMessageAttachment>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * @param list<EmailThreadMessageAttachment>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
