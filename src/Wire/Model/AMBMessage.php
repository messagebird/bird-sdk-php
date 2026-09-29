<?php

namespace MessageBird\Wire\Model;

class AMBMessage
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
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $conversationId;
    /**
     * @var string|null
     */
    protected $businessAccountId;
    /**
     * Apple business identifier on outbound messages, or the customer's opaque Apple identifier on inbound messages. Omitted when that address is unavailable on a historical record.
     *
     * @var string|null
     */
    protected $from;
    /**
     * Customer's opaque Apple identifier on outbound messages, or the Apple business identifier on inbound messages. Omitted when that address is unavailable on a historical record.
     *
     * @var string|null
     */
    protected $to;
    /**
     * Whether a message was sent by the business or received from the customer:
     * 
     * - `outbound`: A reply the business sent into the conversation.
     * - `inbound`: A message the customer sent.
     * 
     *
     * @var string|null
     */
    protected $direction;
    /**
     * Send status:
     * 
     * - `accepted`: Accepted and queued for delivery to Apple.
     * - `sent`: Handed to Apple. There is no delivery or read receipt on this
     *   channel, so `sent` is the furthest an outbound message's status
     *   advances.
     * - `send_failed`: Sending stopped because of a business or conversation
     *   restriction, a recipient opt-out, an Apple refusal, or exhausted attempts.
     *   An earlier attempt may have reached Apple if its response or the local
     *   record of success was lost. See `last_error` for why sending stopped.
     * - `rejected`: Refused by Bird before any send attempt and never charged:
     *   the destination has no price, the wallet could not fund the send, or the
     *   content cannot be sent yet. See `last_error`.
     * - `received`: Received as an inbound message.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Derived message classification for filtering and statistics. Send requests use the native content.type families. Create Apple Pay and authentication requests through the conversation payment and authentication operations.
     * 
     * - text: Text, optionally with a subject.
     * - attachment: One or more files, images, audio clips, or videos.
     * - rich_link: A link with a preview card.
     * - quick_reply: Two to five reply choices.
     * - list_picker: A grouped menu of choices.
     * - time_picker: Appointment time slots; a reply may contain only a selected label.
     * - form: A multi-page form.
     * - imessage_app: A custom iMessage app interaction on a compatible device.
     * - interactive: An opaque interactive reference whose subtype is unknown.
     * - apple_pay: An Apple Pay request created through the conversation payment operations.
     * - authenticate: An identity verification request created through the conversation authentication operations.
     *
     * @var string|null
     */
    protected $kind;
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
     * Native message content. Outgoing interactions contain requests; incoming interactions contain replies.
     *
     * @var mixed|null
     */
    protected $content;
    /**
     * @var string|null
     */
    protected $inReplyToMessageId;
    /**
     * Locale for this message, preserved in Apple’s format, for example en_US. Outbound messages use the request override, then the conversation locale, then the business default. Inbound messages preserve the locale in Apple’s callback. Null when unknown.
     *
     * @var string|null
     */
    protected $locale;
    /**
     * The category this message was sent with, for reporting only. It does not affect sending or suppression policy, or select an Apple department or purpose. Defaults to an empty string when a send names no category. Absent on an inbound message, which has no category to report.
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
     * Structured `{name, value}` filter labels applied to this message. Absent on an inbound message.
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * What was charged for a message, split into the components that make it up. `null` until at least one component has been priced.
     * 
     *
     * @var MessageCost|null
     */
    protected $cost;
    /**
     * Failure detail for a message or invitation that could not be sent or was rejected.
     *
     * @var AMBError|null
     */
    protected $lastError;
    /**
     * The moment this message was accepted (outbound) or received (inbound). This is the timestamp the outbound statistics families bucket and attribute on; there is no separate `accepted_at` field.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the selected sending outcome occurred. Null unless the current status is `sent` and the message is outbound. For older messages without a retained sending event, the stored record time is used.
     *
     * @var \DateTime|null
     */
    protected $sentAt;
    /**
     * Reusable Apple content reference. Supply the decryption key, or the signed bid and data_ref_sig returned by Apple.
     *
     * @var AMBRichLinkReference|null
     */
    protected $dataRef;
    /**
     * Apple department identifier carried by this message. Omitted when absent from the message or unavailable on a historical record.
     *
     * @var string|null
     */
    protected $group;
    /**
     * Apple purpose identifier carried by this message. Omitted when absent from the message or unavailable on a historical record.
     *
     * @var string|null
     */
    protected $intent;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
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
     * @return string|null
     */
    public function getConversationId(): ?string
    {
        return $this->conversationId;
    }
    /**
     * @param string|null $conversationId
     *
     * @return self
     */
    public function setConversationId(?string $conversationId): self
    {
        $this->initialized['conversationId'] = true;
        $this->conversationId = $conversationId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getBusinessAccountId(): ?string
    {
        return $this->businessAccountId;
    }
    /**
     * @param string|null $businessAccountId
     *
     * @return self
     */
    public function setBusinessAccountId(?string $businessAccountId): self
    {
        $this->initialized['businessAccountId'] = true;
        $this->businessAccountId = $businessAccountId;
        return $this;
    }
    /**
     * Apple business identifier on outbound messages, or the customer's opaque Apple identifier on inbound messages. Omitted when that address is unavailable on a historical record.
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * Apple business identifier on outbound messages, or the customer's opaque Apple identifier on inbound messages. Omitted when that address is unavailable on a historical record.
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
     * Customer's opaque Apple identifier on outbound messages, or the Apple business identifier on inbound messages. Omitted when that address is unavailable on a historical record.
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Customer's opaque Apple identifier on outbound messages, or the Apple business identifier on inbound messages. Omitted when that address is unavailable on a historical record.
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
     * Whether a message was sent by the business or received from the customer:
     * 
     * - `outbound`: A reply the business sent into the conversation.
     * - `inbound`: A message the customer sent.
     * 
     *
     * @return string|null
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }
    /**
    * Whether a message was sent by the business or received from the customer:
    
    - `outbound`: A reply the business sent into the conversation.
    - `inbound`: A message the customer sent.
    
    *
    * @param string|null $direction
    *
    * @return self
    */
    public function setDirection(?string $direction): self
    {
        $this->initialized['direction'] = true;
        $this->direction = $direction;
        return $this;
    }
    /**
     * Send status:
     * 
     * - `accepted`: Accepted and queued for delivery to Apple.
     * - `sent`: Handed to Apple. There is no delivery or read receipt on this
     *   channel, so `sent` is the furthest an outbound message's status
     *   advances.
     * - `send_failed`: Sending stopped because of a business or conversation
     *   restriction, a recipient opt-out, an Apple refusal, or exhausted attempts.
     *   An earlier attempt may have reached Apple if its response or the local
     *   record of success was lost. See `last_error` for why sending stopped.
     * - `rejected`: Refused by Bird before any send attempt and never charged:
     *   the destination has no price, the wallet could not fund the send, or the
     *   content cannot be sent yet. See `last_error`.
     * - `received`: Received as an inbound message.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Send status:
    
    - `accepted`: Accepted and queued for delivery to Apple.
    - `sent`: Handed to Apple. There is no delivery or read receipt on this
     channel, so `sent` is the furthest an outbound message's status
     advances.
    - `send_failed`: Sending stopped because of a business or conversation
     restriction, a recipient opt-out, an Apple refusal, or exhausted attempts.
     An earlier attempt may have reached Apple if its response or the local
     record of success was lost. See `last_error` for why sending stopped.
    - `rejected`: Refused by Bird before any send attempt and never charged:
     the destination has no price, the wallet could not fund the send, or the
     content cannot be sent yet. See `last_error`.
    - `received`: Received as an inbound message.
    
    *
    * @param string|null $status
    *
    * @return self
    */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * Derived message classification for filtering and statistics. Send requests use the native content.type families. Create Apple Pay and authentication requests through the conversation payment and authentication operations.
     * 
     * - text: Text, optionally with a subject.
     * - attachment: One or more files, images, audio clips, or videos.
     * - rich_link: A link with a preview card.
     * - quick_reply: Two to five reply choices.
     * - list_picker: A grouped menu of choices.
     * - time_picker: Appointment time slots; a reply may contain only a selected label.
     * - form: A multi-page form.
     * - imessage_app: A custom iMessage app interaction on a compatible device.
     * - interactive: An opaque interactive reference whose subtype is unknown.
     * - apple_pay: An Apple Pay request created through the conversation payment operations.
     * - authenticate: An identity verification request created through the conversation authentication operations.
     *
     * @return string|null
     */
    public function getKind(): ?string
    {
        return $this->kind;
    }
    /**
    * Derived message classification for filtering and statistics. Send requests use the native content.type families. Create Apple Pay and authentication requests through the conversation payment and authentication operations.
    
    - text: Text, optionally with a subject.
    - attachment: One or more files, images, audio clips, or videos.
    - rich_link: A link with a preview card.
    - quick_reply: Two to five reply choices.
    - list_picker: A grouped menu of choices.
    - time_picker: Appointment time slots; a reply may contain only a selected label.
    - form: A multi-page form.
    - imessage_app: A custom iMessage app interaction on a compatible device.
    - interactive: An opaque interactive reference whose subtype is unknown.
    - apple_pay: An Apple Pay request created through the conversation payment operations.
    - authenticate: An identity verification request created through the conversation authentication operations.
    *
    * @param string|null $kind
    *
    * @return self
    */
    public function setKind(?string $kind): self
    {
        $this->initialized['kind'] = true;
        $this->kind = $kind;
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
     * Native message content. Outgoing interactions contain requests; incoming interactions contain replies.
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * Native message content. Outgoing interactions contain requests; incoming interactions contain replies.
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
     * @return string|null
     */
    public function getInReplyToMessageId(): ?string
    {
        return $this->inReplyToMessageId;
    }
    /**
     * @param string|null $inReplyToMessageId
     *
     * @return self
     */
    public function setInReplyToMessageId(?string $inReplyToMessageId): self
    {
        $this->initialized['inReplyToMessageId'] = true;
        $this->inReplyToMessageId = $inReplyToMessageId;
        return $this;
    }
    /**
     * Locale for this message, preserved in Apple’s format, for example en_US. Outbound messages use the request override, then the conversation locale, then the business default. Inbound messages preserve the locale in Apple’s callback. Null when unknown.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }
    /**
     * Locale for this message, preserved in Apple’s format, for example en_US. Outbound messages use the request override, then the conversation locale, then the business default. Inbound messages preserve the locale in Apple’s callback. Null when unknown.
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
     * The category this message was sent with, for reporting only. It does not affect sending or suppression policy, or select an Apple department or purpose. Defaults to an empty string when a send names no category. Absent on an inbound message, which has no category to report.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * The category this message was sent with, for reporting only. It does not affect sending or suppression policy, or select an Apple department or purpose. Defaults to an empty string when a send names no category. Absent on an inbound message, which has no category to report.
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
     * Structured `{name, value}` filter labels applied to this message. Absent on an inbound message.
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Structured `{name, value}` filter labels applied to this message. Absent on an inbound message.
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
     * What was charged for a message, split into the components that make it up. `null` until at least one component has been priced.
     * 
     *
     * @return MessageCost|null
     */
    public function getCost(): ?MessageCost
    {
        return $this->cost;
    }
    /**
     * What was charged for a message, split into the components that make it up. `null` until at least one component has been priced.
     *
     * @param MessageCost|null $cost
     *
     * @return self
     */
    public function setCost(?MessageCost $cost): self
    {
        $this->initialized['cost'] = true;
        $this->cost = $cost;
        return $this;
    }
    /**
     * Failure detail for a message or invitation that could not be sent or was rejected.
     *
     * @return AMBError|null
     */
    public function getLastError(): ?AMBError
    {
        return $this->lastError;
    }
    /**
     * Failure detail for a message or invitation that could not be sent or was rejected.
     *
     * @param AMBError|null $lastError
     *
     * @return self
     */
    public function setLastError(?AMBError $lastError): self
    {
        $this->initialized['lastError'] = true;
        $this->lastError = $lastError;
        return $this;
    }
    /**
     * The moment this message was accepted (outbound) or received (inbound). This is the timestamp the outbound statistics families bucket and attribute on; there is no separate `accepted_at` field.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * The moment this message was accepted (outbound) or received (inbound). This is the timestamp the outbound statistics families bucket and attribute on; there is no separate `accepted_at` field.
     *
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * When the selected sending outcome occurred. Null unless the current status is `sent` and the message is outbound. For older messages without a retained sending event, the stored record time is used.
     *
     * @return \DateTime|null
     */
    public function getSentAt(): ?\DateTime
    {
        return $this->sentAt;
    }
    /**
     * When the selected sending outcome occurred. Null unless the current status is `sent` and the message is outbound. For older messages without a retained sending event, the stored record time is used.
     *
     * @param \DateTime|null $sentAt
     *
     * @return self
     */
    public function setSentAt(?\DateTime $sentAt): self
    {
        $this->initialized['sentAt'] = true;
        $this->sentAt = $sentAt;
        return $this;
    }
    /**
     * Reusable Apple content reference. Supply the decryption key, or the signed bid and data_ref_sig returned by Apple.
     *
     * @return AMBRichLinkReference|null
     */
    public function getDataRef(): ?AMBRichLinkReference
    {
        return $this->dataRef;
    }
    /**
     * Reusable Apple content reference. Supply the decryption key, or the signed bid and data_ref_sig returned by Apple.
     *
     * @param AMBRichLinkReference|null $dataRef
     *
     * @return self
     */
    public function setDataRef(?AMBRichLinkReference $dataRef): self
    {
        $this->initialized['dataRef'] = true;
        $this->dataRef = $dataRef;
        return $this;
    }
    /**
     * Apple department identifier carried by this message. Omitted when absent from the message or unavailable on a historical record.
     *
     * @return string|null
     */
    public function getGroup(): ?string
    {
        return $this->group;
    }
    /**
     * Apple department identifier carried by this message. Omitted when absent from the message or unavailable on a historical record.
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
     * Apple purpose identifier carried by this message. Omitted when absent from the message or unavailable on a historical record.
     *
     * @return string|null
     */
    public function getIntent(): ?string
    {
        return $this->intent;
    }
    /**
     * Apple purpose identifier carried by this message. Omitted when absent from the message or unavailable on a historical record.
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
}
