<?php

namespace MessageBird\Wire\Model;

class WhatsAppAgentNotificationCreate
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
     * The business phone number whose agent should act on the notification, in E.164 format (for example `+13124495648`), the same form a message's `from` takes. It must be a number this workspace has connected and that runs an agent.
     * 
     *
     * @var string|null
     */
    protected $from;
    /**
     * The contact the notification is about: a phone number in E.164 format (for example `+14155551234`), or the contact's business-scoped user ID (for example `US.13491208655302741918`), the same forms a message's `to` accepts. A phone number is normalized before the call reaches WhatsApp, so spacing does not matter. WhatsApp documents a phone number for this call; a business-scoped user ID is passed through as given.
     * 
     *
     * @var string|null
     */
    protected $to;
    /**
     * Your own name for what happened, such as `payment_received` or `order_shipped`. The agent reads it as the kind of thing that happened, so keep one name per kind. WhatsApp calls this the event type.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * What happened, in a sentence the agent can tell the contact.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Details the agent may draw on when it writes to the contact, as one JSON string. WhatsApp passes it to the agent unchanged and does not read it itself.
     * 
     *
     * @var string|null
     */
    protected $payload;
    /**
     * The business phone number whose agent should act on the notification, in E.164 format (for example `+13124495648`), the same form a message's `from` takes. It must be a number this workspace has connected and that runs an agent.
     * 
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * The business phone number whose agent should act on the notification, in E.164 format (for example `+13124495648`), the same form a message's `from` takes. It must be a number this workspace has connected and that runs an agent.
     *
     * @param string|null $from
     *
     * @return self
     */
    public function setFrom(?string $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * The contact the notification is about: a phone number in E.164 format (for example `+14155551234`), or the contact's business-scoped user ID (for example `US.13491208655302741918`), the same forms a message's `to` accepts. A phone number is normalized before the call reaches WhatsApp, so spacing does not matter. WhatsApp documents a phone number for this call; a business-scoped user ID is passed through as given.
     * 
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * The contact the notification is about: a phone number in E.164 format (for example `+14155551234`), or the contact's business-scoped user ID (for example `US.13491208655302741918`), the same forms a message's `to` accepts. A phone number is normalized before the call reaches WhatsApp, so spacing does not matter. WhatsApp documents a phone number for this call; a business-scoped user ID is passed through as given.
     *
     * @param string|null $to
     *
     * @return self
     */
    public function setTo(?string $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * Your own name for what happened, such as `payment_received` or `order_shipped`. The agent reads it as the kind of thing that happened, so keep one name per kind. WhatsApp calls this the event type.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Your own name for what happened, such as `payment_received` or `order_shipped`. The agent reads it as the kind of thing that happened, so keep one name per kind. WhatsApp calls this the event type.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * What happened, in a sentence the agent can tell the contact.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * What happened, in a sentence the agent can tell the contact.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * Details the agent may draw on when it writes to the contact, as one JSON string. WhatsApp passes it to the agent unchanged and does not read it itself.
     * 
     *
     * @return string|null
     */
    public function getPayload(): ?string
    {
        return $this->payload;
    }
    /**
     * Details the agent may draw on when it writes to the contact, as one JSON string. WhatsApp passes it to the agent unchanged and does not read it itself.
     *
     * @param string|null $payload
     *
     * @return self
     */
    public function setPayload(?string $payload): self
    {
        $this->initialized['payload'] = true;
        $this->payload = $payload;
        return $this;
    }
}
