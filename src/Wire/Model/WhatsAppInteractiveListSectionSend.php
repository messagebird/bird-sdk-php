<?php

namespace MessageBird\Wire\Model;

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
     * The options in this group. A message carries at most 10 rows across all its groups combined, so this per-group maximum is not additive: more than 10 in total returns a `422` `WhatsAppInteractiveLimitExceeded`. Row labels must be unique across the whole message too, not just within a group.
     * 
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
     * The options in this group. A message carries at most 10 rows across all its groups combined, so this per-group maximum is not additive: more than 10 in total returns a `422` `WhatsAppInteractiveLimitExceeded`. Row labels must be unique across the whole message too, not just within a group.
     * 
     *
     * @return list<WhatsAppInteractiveListRowSend>|null
     */
    public function getRows(): ?array
    {
        return $this->rows;
    }
    /**
     * The options in this group. A message carries at most 10 rows across all its groups combined, so this per-group maximum is not additive: more than 10 in total returns a `422` `WhatsAppInteractiveLimitExceeded`. Row labels must be unique across the whole message too, not just within a group.
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
