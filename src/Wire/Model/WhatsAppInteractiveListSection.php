<?php

namespace MessageBird\Wire\Model;

class WhatsAppInteractiveListSection
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
     * The options in this group, in the order shown.
     *
     * @var list<WhatsAppInteractiveListRow>|null
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
     * The options in this group, in the order shown.
     *
     * @return list<WhatsAppInteractiveListRow>|null
     */
    public function getRows(): ?array
    {
        return $this->rows;
    }
    /**
     * The options in this group, in the order shown.
     *
     * @param list<WhatsAppInteractiveListRow>|null $rows
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
