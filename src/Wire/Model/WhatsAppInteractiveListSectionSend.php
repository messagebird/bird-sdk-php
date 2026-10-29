<?php

namespace MessageBird\Wire\Model;

/**
 * Menu section. A title is required even for a single section.
 */
class WhatsAppInteractiveListSectionSend
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
     * The group's heading, shown above its rows.
     *
     * @var string|null
     */
    protected $title;
    /**
     * At most 10 rows across the message (`422` `WhatsAppInteractiveLimitExceeded` otherwise). Labels must be unique across sections.
     *
     * @var list<WhatsAppInteractiveListRowSend>|null
     */
    protected $rows;
    /**
     * The group's heading, shown above its rows.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * The group's heading, shown above its rows.
     *
     * @param string|null $title
     *
     * @return self
     */
    public function setTitle(?string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;
        return $this;
    }
    /**
     * At most 10 rows across the message (`422` `WhatsAppInteractiveLimitExceeded` otherwise). Labels must be unique across sections.
     *
     * @return list<WhatsAppInteractiveListRowSend>|null
     */
    public function getRows(): ?array
    {
        return $this->rows;
    }
    /**
     * At most 10 rows across the message (`422` `WhatsAppInteractiveLimitExceeded` otherwise). Labels must be unique across sections.
     *
     * @param list<WhatsAppInteractiveListRowSend>|null $rows
     *
     * @return self
     */
    public function setRows(?array $rows): self
    {
        $this->initialized['rows'] = true;
        $this->rows = $rows;
        return $this;
    }
}
