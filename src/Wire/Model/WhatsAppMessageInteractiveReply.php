<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageInteractiveReply extends \ArrayObject
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
     * Which kind of tap this reply came from, and which field carries it.
     *
     * @var string|null
     */
    protected $type;
    /**
     * The button the contact tapped, as you declared it. On a reply to a template's quick-reply button, `slug` is the button's payload, which WhatsApp sets to the button's own label.
     * 
     *
     * @var WhatsAppInteractiveReplyButton|null
     */
    protected $button;
    /**
     * The row the contact chose, as you declared it. `description` is present only when the row carried one.
     * 
     *
     * @var WhatsAppInteractiveReplyList|null
     */
    protected $list;
    /**
     * Which kind of tap this reply came from, and which field carries it.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Which kind of tap this reply came from, and which field carries it.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * The button the contact tapped, as you declared it. On a reply to a template's quick-reply button, `slug` is the button's payload, which WhatsApp sets to the button's own label.
     * 
     *
     * @return WhatsAppInteractiveReplyButton|null
     */
    public function getButton(): ?WhatsAppInteractiveReplyButton
    {
        return $this->button;
    }
    /**
     * The button the contact tapped, as you declared it. On a reply to a template's quick-reply button, `slug` is the button's payload, which WhatsApp sets to the button's own label.
     *
     * @param WhatsAppInteractiveReplyButton|null $button
     *
     * @return self
     */
    public function setButton(?WhatsAppInteractiveReplyButton $button): self
    {
        $this->initialized['button'] = true;
        $this->button = $button;
        return $this;
    }
    /**
     * The row the contact chose, as you declared it. `description` is present only when the row carried one.
     * 
     *
     * @return WhatsAppInteractiveReplyList|null
     */
    public function getList(): ?WhatsAppInteractiveReplyList
    {
        return $this->list;
    }
    /**
     * The row the contact chose, as you declared it. `description` is present only when the row carried one.
     *
     * @param WhatsAppInteractiveReplyList|null $list
     *
     * @return self
     */
    public function setList(?WhatsAppInteractiveReplyList $list): self
    {
        $this->initialized['list'] = true;
        $this->list = $list;
        return $this;
    }
}
