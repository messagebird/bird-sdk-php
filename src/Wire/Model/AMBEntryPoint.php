<?php

namespace MessageBird\Wire\Model;

class AMBEntryPoint
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
     * Identifier for this entry point, chosen by you and unique within the business's entry points. A conversation opened through this entry point carries it as `entry_point`.
     *
     * @var string|null
     */
    protected $id;
    /**
     * The group value Apple reports on a conversation opened through this entry point. Matched against the `group` the first inbound message carries.
     *
     * @var string|null
     */
    protected $group;
    /**
     * The intent value Apple reports on a conversation opened through this entry point. Matched against the `intent` the first inbound message carries, together with `group`.
     *
     * @var string|null
     */
    protected $intent;
    /**
     * The message text pre-filled for the customer when they open a conversation through this entry point.
     *
     * @var string|null
     */
    protected $body;
    /**
     * Identifier for this entry point, chosen by you and unique within the business's entry points. A conversation opened through this entry point carries it as `entry_point`.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Identifier for this entry point, chosen by you and unique within the business's entry points. A conversation opened through this entry point carries it as `entry_point`.
     *
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
     * The group value Apple reports on a conversation opened through this entry point. Matched against the `group` the first inbound message carries.
     *
     * @return string|null
     */
    public function getGroup(): ?string
    {
        return $this->group;
    }
    /**
     * The group value Apple reports on a conversation opened through this entry point. Matched against the `group` the first inbound message carries.
     *
     * @param string|null $group
     *
     * @return self
     */
    public function setGroup(?string $group): self
    {
        $this->initialized['group'] = true;
        $this->group = $group;
        return $this;
    }
    /**
     * The intent value Apple reports on a conversation opened through this entry point. Matched against the `intent` the first inbound message carries, together with `group`.
     *
     * @return string|null
     */
    public function getIntent(): ?string
    {
        return $this->intent;
    }
    /**
     * The intent value Apple reports on a conversation opened through this entry point. Matched against the `intent` the first inbound message carries, together with `group`.
     *
     * @param string|null $intent
     *
     * @return self
     */
    public function setIntent(?string $intent): self
    {
        $this->initialized['intent'] = true;
        $this->intent = $intent;
        return $this;
    }
    /**
     * The message text pre-filled for the customer when they open a conversation through this entry point.
     *
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }
    /**
     * The message text pre-filled for the customer when they open a conversation through this entry point.
     *
     * @param string|null $body
     *
     * @return self
     */
    public function setBody(?string $body): self
    {
        $this->initialized['body'] = true;
        $this->body = $body;
        return $this;
    }
}
