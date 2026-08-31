<?php

namespace MessageBird\Wire\Model;

class WhatsAppInteractiveButtonSendQuickReply extends \ArrayObject
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
     * Your own handle for this button, echoed back on the reply. You choose the value and it is never shown to the recipient, so it can carry whatever your application needs to route the answer. Any characters, up to 256.
     * 
     *
     * @var string|null
     */
    protected $slug;
    /**
     * The button's label. It must differ from every other button's label in the same message, because the recipient's reply is identified to them by the label they tapped.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * Your own handle for this button, echoed back on the reply. You choose the value and it is never shown to the recipient, so it can carry whatever your application needs to route the answer. Any characters, up to 256.
     * 
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * Your own handle for this button, echoed back on the reply. You choose the value and it is never shown to the recipient, so it can carry whatever your application needs to route the answer. Any characters, up to 256.
     *
     * @param string|null $slug
     *
     * @return self
     */
    public function setSlug(?string $slug): self
    {
        $this->initialized['slug'] = true;
        $this->slug = $slug;
        return $this;
    }
    /**
     * The button's label. It must differ from every other button's label in the same message, because the recipient's reply is identified to them by the label they tapped.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The button's label. It must differ from every other button's label in the same message, because the recipient's reply is identified to them by the label they tapped.
     *
     * @param string|null $text
     *
     * @return self
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
}
