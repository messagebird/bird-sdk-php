<?php

namespace MessageBird\Wire\Model;

class AMBMessageSendRequest
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
     * Apple business identifier of the brand sending the message. Read it from the business’s apple_business_id. The customer must have opened the conversation with this business.
     *
     * @var string|null
     */
    protected $from;
    /**
     * Apple’s opaque customer identifier for this business, available as the conversation’s opaque_user_id. The conversation must exist and be open.
     *
     * @var string|null
     */
    protected $to;
    /**
     * Who sent an outbound message:
     * 
     * - `operator`: A person, through a signed-in dashboard session.
     * - `automation`: A workflow or bot acting on the workspace's behalf,
     *   through a signed-in session.
     * - `api`: A direct API call, authenticated with an API key.
     * 
     * A credential can send only the sources it is permitted; naming one
     * outside that set is refused with a `422` `AMBMessageSourceNotPermitted`.
     * 
     * This is not `from`, which a send carries alongside it. That names
     * the brand the message goes out as; this names who composed it.
     * 
     *
     * @var string|null
     */
    protected $source;
    /**
     * Apple message families with Bird field naming and media URLs. Authentication and Apple Pay requests are created through their dedicated conversation endpoints.
     *
     * @var mixed|null
     */
    protected $content;
    /**
     * Free-form reporting label; it does not change sending or suppression policy, for example `order_update`. Omit it to send with the default empty category.
     *
     * @var string|null
     */
    protected $category;
    /**
     * Arbitrary JSON object for per-message context. Maximum 2 KB serialized. Top-level keys beginning with `__bird` are reserved. Returned in the send response, message reads and customer message webhooks.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * Structured `{name, value}` labels for filtering. Maximum 20 tags per send.
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Department identifier for this message.
     *
     * @var string|null
     */
    protected $group;
    /**
     * Purpose of this conversation.
     *
     * @var string|null
     */
    protected $intent;
    /**
     * Apple locale identifier, for example en_US. Defaults to the conversation locale.
     *
     * @var string|null
     */
    protected $locale;
    /**
     * Apple business identifier of the brand sending the message. Read it from the business’s apple_business_id. The customer must have opened the conversation with this business.
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * Apple business identifier of the brand sending the message. Read it from the business’s apple_business_id. The customer must have opened the conversation with this business.
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
     * Apple’s opaque customer identifier for this business, available as the conversation’s opaque_user_id. The conversation must exist and be open.
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Apple’s opaque customer identifier for this business, available as the conversation’s opaque_user_id. The conversation must exist and be open.
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
     * Who sent an outbound message:
     * 
     * - `operator`: A person, through a signed-in dashboard session.
     * - `automation`: A workflow or bot acting on the workspace's behalf,
     *   through a signed-in session.
     * - `api`: A direct API call, authenticated with an API key.
     * 
     * A credential can send only the sources it is permitted; naming one
     * outside that set is refused with a `422` `AMBMessageSourceNotPermitted`.
     * 
     * This is not `from`, which a send carries alongside it. That names
     * the brand the message goes out as; this names who composed it.
     * 
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
    * Who sent an outbound message:
    
    - `operator`: A person, through a signed-in dashboard session.
    - `automation`: A workflow or bot acting on the workspace's behalf,
     through a signed-in session.
    - `api`: A direct API call, authenticated with an API key.
    
    A credential can send only the sources it is permitted; naming one
    outside that set is refused with a `422` `AMBMessageSourceNotPermitted`.
    
    This is not `from`, which a send carries alongside it. That names
    the brand the message goes out as; this names who composed it.
    
    *
    * @param string|null $source
    *
    * @return self
    */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;
        return $this;
    }
    /**
     * Apple message families with Bird field naming and media URLs. Authentication and Apple Pay requests are created through their dedicated conversation endpoints.
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * Apple message families with Bird field naming and media URLs. Authentication and Apple Pay requests are created through their dedicated conversation endpoints.
     *
     * @param mixed $content
     *
     * @return self
     */
    public function setContent($content): self
    {
        $this->initialized['content'] = true;
        $this->content = $content;
        return $this;
    }
    /**
     * Free-form reporting label; it does not change sending or suppression policy, for example `order_update`. Omit it to send with the default empty category.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Free-form reporting label; it does not change sending or suppression policy, for example `order_update`. Omit it to send with the default empty category.
     *
     * @param string|null $category
     *
     * @return self
     */
    public function setCategory(?string $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;
        return $this;
    }
    /**
     * Arbitrary JSON object for per-message context. Maximum 2 KB serialized. Top-level keys beginning with `__bird` are reserved. Returned in the send response, message reads and customer message webhooks.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Arbitrary JSON object for per-message context. Maximum 2 KB serialized. Top-level keys beginning with `__bird` are reserved. Returned in the send response, message reads and customer message webhooks.
     *
     * @param array<string, mixed>|null $metadata
     *
     * @return self
     */
    public function setMetadata(?iterable $metadata): self
    {
        $this->initialized['metadata'] = true;
        $this->metadata = $metadata;
        return $this;
    }
    /**
     * Structured `{name, value}` labels for filtering. Maximum 20 tags per send.
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Structured `{name, value}` labels for filtering. Maximum 20 tags per send.
     *
     * @param list<Tag>|null $tags
     *
     * @return self
     */
    public function setTags(?array $tags): self
    {
        $this->initialized['tags'] = true;
        $this->tags = $tags;
        return $this;
    }
    /**
     * Department identifier for this message.
     *
     * @return string|null
     */
    public function getGroup(): ?string
    {
        return $this->group;
    }
    /**
     * Department identifier for this message.
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
     * Purpose of this conversation.
     *
     * @return string|null
     */
    public function getIntent(): ?string
    {
        return $this->intent;
    }
    /**
     * Purpose of this conversation.
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
     * Apple locale identifier, for example en_US. Defaults to the conversation locale.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }
    /**
     * Apple locale identifier, for example en_US. Defaults to the conversation locale.
     *
     * @param string|null $locale
     *
     * @return self
     */
    public function setLocale(?string $locale): self
    {
        $this->initialized['locale'] = true;
        $this->locale = $locale;
        return $this;
    }
}
