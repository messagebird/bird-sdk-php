<?php

namespace MessageBird\Wire\Model;

/**
 * A message to send. Supply `text`, `rich_link` or `interactive` (the last two optionally with `text` sent first as its own bubble), or `template` (a stored template, whose category is derived).
 */
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
     * Apple’s opaque customer identifier for this business, available as the conversation’s recipient.opaque_user_id. The conversation must exist and its native status must be open.
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
     * A text message. Alongside `rich_link` or `interactive`, it is sent first as its own text bubble, in the same message.
     *
     * @var AMBMessageSendRequestText|null
     */
    protected $text;
    /**
     * A link with a preview card.
     *
     * @var AMBMessageSendRequestRichLink|null
     */
    protected $richLink;
    /**
     * Something for the customer to tap, such as quick replies, a list picker, a time picker, a form or a custom iMessage app.
     *
     * @var AMBMessageSendRequestInteractive|null
     */
    protected $interactive;
    /**
     * Send using a stored template instead of `text`, `rich_link` or `interactive`. The category is derived from the template, so `category` is rejected alongside it.
     * 
     *
     * @var AMBMessageSendRequestTemplate|null
     */
    protected $template;
    /**
     * Free-form reporting label; it does not change sending or suppression policy, for example `order_update`. Omit it to send with the default empty category. Rejected alongside `template`, where the category is derived from the template.
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
     * An identifier you want to find this message by, such as an order or ticket number, matched exactly by the message list's `reference` filter. Set it only when you need to search on it, and put any other data in `metadata`. Stored on the message, returned on reads and echoed in webhook payloads. Several messages can share one.
     * 
     *
     * @var string|null
     */
    protected $reference;
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
     * Send the first part without the typing indicator and one-second pause Bird otherwise shows before it. Set it only after you sent `typing_start` with the conversation typing operation, so the customer already sees typing. A first part that Apple accepts clears that indicator when it arrives. If Bird accepts the message but it fails before then, such as a failed send or a rejection during processing, Bird sends `typing_end` instead. If the request itself returns an error, nothing is sent, so send `typing_end` yourself. When Bird splits the message into several parts, such as text around a link, the parts after the first keep their typing indicator.
     * 
     *
     * @var bool|null
     */
    protected $skipTyping = false;
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
     * Apple’s opaque customer identifier for this business, available as the conversation’s recipient.opaque_user_id. The conversation must exist and its native status must be open.
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Apple’s opaque customer identifier for this business, available as the conversation’s recipient.opaque_user_id. The conversation must exist and its native status must be open.
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
     * A text message. Alongside `rich_link` or `interactive`, it is sent first as its own text bubble, in the same message.
     *
     * @return AMBMessageSendRequestText|null
     */
    public function getText(): ?AMBMessageSendRequestText
    {
        return $this->text;
    }
    /**
     * A text message. Alongside `rich_link` or `interactive`, it is sent first as its own text bubble, in the same message.
     *
     * @param AMBMessageSendRequestText|AMBText|array|null $text
     *
     * @return self
     */
    public function setText($text): self
    {
        $this->initialized['text'] = true;
        $this->text = \MessageBird\Core\ModelWrapper::normalize($text, AMBMessageSendRequestText::class);
        return $this;
    }
    /**
     * A link with a preview card.
     *
     * @return AMBMessageSendRequestRichLink|null
     */
    public function getRichLink(): ?AMBMessageSendRequestRichLink
    {
        return $this->richLink;
    }
    /**
     * A link with a preview card.
     *
     * @param AMBMessageSendRequestRichLink|AMBRichLink|array|null $richLink
     *
     * @return self
     */
    public function setRichLink($richLink): self
    {
        $this->initialized['richLink'] = true;
        $this->richLink = \MessageBird\Core\ModelWrapper::normalize($richLink, AMBMessageSendRequestRichLink::class);
        return $this;
    }
    /**
     * Something for the customer to tap, such as quick replies, a list picker, a time picker, a form or a custom iMessage app.
     *
     * @return AMBMessageSendRequestInteractive|null
     */
    public function getInteractive(): ?AMBMessageSendRequestInteractive
    {
        return $this->interactive;
    }
    /**
     * Something for the customer to tap, such as quick replies, a list picker, a time picker, a form or a custom iMessage app.
     *
     * @param AMBMessageSendRequestInteractive|AMBInteractive|array|null $interactive
     *
     * @return self
     */
    public function setInteractive($interactive): self
    {
        $this->initialized['interactive'] = true;
        $this->interactive = \MessageBird\Core\ModelWrapper::normalize($interactive, AMBMessageSendRequestInteractive::class);
        return $this;
    }
    /**
     * Send using a stored template instead of `text`, `rich_link` or `interactive`. The category is derived from the template, so `category` is rejected alongside it.
     * 
     *
     * @return AMBMessageSendRequestTemplate|null
     */
    public function getTemplate(): ?AMBMessageSendRequestTemplate
    {
        return $this->template;
    }
    /**
     * Send using a stored template instead of `text`, `rich_link` or `interactive`. The category is derived from the template, so `category` is rejected alongside it.
     *
     * @param AMBMessageSendRequestTemplate|AMBTemplateSend|array|null $template
     *
     * @return self
     */
    public function setTemplate($template): self
    {
        $this->initialized['template'] = true;
        $this->template = \MessageBird\Core\ModelWrapper::normalize($template, AMBMessageSendRequestTemplate::class);
        return $this;
    }
    /**
     * Free-form reporting label; it does not change sending or suppression policy, for example `order_update`. Omit it to send with the default empty category. Rejected alongside `template`, where the category is derived from the template.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Free-form reporting label; it does not change sending or suppression policy, for example `order_update`. Omit it to send with the default empty category. Rejected alongside `template`, where the category is derived from the template.
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
     * An identifier you want to find this message by, such as an order or ticket number, matched exactly by the message list's `reference` filter. Set it only when you need to search on it, and put any other data in `metadata`. Stored on the message, returned on reads and echoed in webhook payloads. Several messages can share one.
     * 
     *
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }
    /**
     * An identifier you want to find this message by, such as an order or ticket number, matched exactly by the message list's `reference` filter. Set it only when you need to search on it, and put any other data in `metadata`. Stored on the message, returned on reads and echoed in webhook payloads. Several messages can share one.
     *
     * @param string|null $reference
     *
     * @return self
     */
    public function setReference(?string $reference): self
    {
        $this->initialized['reference'] = true;
        $this->reference = $reference;
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
    /**
     * Send the first part without the typing indicator and one-second pause Bird otherwise shows before it. Set it only after you sent `typing_start` with the conversation typing operation, so the customer already sees typing. A first part that Apple accepts clears that indicator when it arrives. If Bird accepts the message but it fails before then, such as a failed send or a rejection during processing, Bird sends `typing_end` instead. If the request itself returns an error, nothing is sent, so send `typing_end` yourself. When Bird splits the message into several parts, such as text around a link, the parts after the first keep their typing indicator.
     * 
     *
     * @return bool|null
     */
    public function getSkipTyping(): ?bool
    {
        return $this->skipTyping;
    }
    /**
     * Send the first part without the typing indicator and one-second pause Bird otherwise shows before it. Set it only after you sent `typing_start` with the conversation typing operation, so the customer already sees typing. A first part that Apple accepts clears that indicator when it arrives. If Bird accepts the message but it fails before then, such as a failed send or a rejection during processing, Bird sends `typing_end` instead. If the request itself returns an error, nothing is sent, so send `typing_end` yourself. When Bird splits the message into several parts, such as text around a link, the parts after the first keep their typing indicator.
     *
     * @param bool|null $skipTyping
     *
     * @return self
     */
    public function setSkipTyping(?bool $skipTyping): self
    {
        $this->initialized['skipTyping'] = true;
        $this->skipTyping = $skipTyping;
        return $this;
    }
}
