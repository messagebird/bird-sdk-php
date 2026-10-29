<?php

namespace MessageBird\Wire\Model;

class AMBNativeQuickReply
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
     * Text used for the device notification and shown in the transcript after the customer chooses an item. To introduce the choices, send `text` alongside `interactive`; it arrives first as its own bubble.
     *
     * @var string|null
     */
    protected $summaryText;
    /**
     * The buttons offered to the customer. Apple requires between two and five; outside that range the request is refused with a `422` `AMBQuickReplyItemsInvalid`. For more choices, send `list_picker` content instead.
     *
     * @var list<AMBQuickReplyItem>|null
     */
    protected $items;
    /**
     * Text used for the device notification and shown in the transcript after the customer chooses an item. To introduce the choices, send `text` alongside `interactive`; it arrives first as its own bubble.
     *
     * @return string|null
     */
    public function getSummaryText(): ?string
    {
        return $this->summaryText;
    }
    /**
     * Text used for the device notification and shown in the transcript after the customer chooses an item. To introduce the choices, send `text` alongside `interactive`; it arrives first as its own bubble.
     *
     * @param string|null $summaryText
     *
     * @return self
     */
    public function setSummaryText(?string $summaryText): self
    {
        $this->initialized['summaryText'] = true;
        $this->summaryText = $summaryText;
        return $this;
    }
    /**
     * The buttons offered to the customer. Apple requires between two and five; outside that range the request is refused with a `422` `AMBQuickReplyItemsInvalid`. For more choices, send `list_picker` content instead.
     *
     * @return list<AMBQuickReplyItem>|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }
    /**
     * The buttons offered to the customer. Apple requires between two and five; outside that range the request is refused with a `422` `AMBQuickReplyItemsInvalid`. For more choices, send `list_picker` content instead.
     *
     * @param list<AMBQuickReplyItem>|null $items
     *
     * @return self
     */
    public function setItems(?array $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;
        return $this;
    }
}
