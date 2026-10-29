<?php

namespace MessageBird\Wire\Model;

class AMBQuickReplyItem
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
     * Opaque choice identifier returned in interactive_data.data.quick_reply.selected_identifier.
     *
     * @var string|null
     */
    protected $identifier;
    /**
     * Label shown on the button.
     *
     * @var string|null
     */
    protected $title;
    /**
     * Opaque choice identifier returned in interactive_data.data.quick_reply.selected_identifier.
     *
     * @return string|null
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }
    /**
     * Opaque choice identifier returned in interactive_data.data.quick_reply.selected_identifier.
     *
     * @param string|null $identifier
     *
     * @return self
     */
    public function setIdentifier(?string $identifier): self
    {
        $this->initialized['identifier'] = true;
        $this->identifier = $identifier;
        return $this;
    }
    /**
     * Label shown on the button.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * Label shown on the button.
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
}
