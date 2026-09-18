<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessage
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
     * Whether the message was sent by the business (`outbound`) or received from the contact (`inbound`).
     *
     * @var string|null
     */
    protected $direction;
    /**
     * Sender of the message. On outbound messages, the business number it was sent from; on inbound, the WhatsApp contact.
     *
     * @var WhatsAppMessageFrom|null
     */
    protected $from;
    /**
     * Recipient of the message. On outbound messages, the WhatsApp contact; on inbound, the business number.
     *
     * @var WhatsAppMessageTo|null
     */
    protected $to;
    /**
     * The template the message was sent from. For authentication templates the filled-in values are not returned.
     *
     * @var WhatsAppMessageTemplate|null
     */
    protected $template;
    /**
     * Text the message carried.
     *
     * @var WhatsAppMessageText|null
     */
    protected $text;
    /**
     * Image the message carried.
     *
     * @var WhatsAppMessageImage|null
     */
    protected $image;
    /**
     * Video the message carried.
     *
     * @var WhatsAppMessageVideo|null
     */
    protected $video;
    /**
     * Audio the message carried.
     *
     * @var WhatsAppMessageAudio|null
     */
    protected $audio;
    /**
     * Sticker the message carried.
     *
     * @var WhatsAppMessageSticker|null
     */
    protected $sticker;
    /**
     * Document the message carried.
     *
     * @var WhatsAppMessageDocument|null
     */
    protected $document;
    /**
     * Location the message carried.
     *
     * @var WhatsAppMessageLocation|null
     */
    protected $location;
    /**
     * Contact cards on this message: cards the contact shared, either by tapping a button that asked for their number or by sending one from their address book, or the cards this workspace sent.
     * 
     *
     * @var list<WhatsAppContactCard>|null
     */
    protected $contactCards;
    /**
     * Interactive content the message carried. Outbound only: a contact cannot send one. A tap on a reply button or a list row reads back as `interactive_reply` on the contact's inbound message; a `cta_url` link sends nothing back, and the two request kinds are answered by an inbound `location` or `contact_cards` message.
     * 
     *
     * @var WhatsAppMessageInteractive|null
     */
    protected $interactive;
    /**
     * The message this one answers. On an inbound message it is what WhatsApp reports as the reply's target: a tap on a button or a list row, and equally a text or media message the contact sent as a quoted reply. An outbound message echoes the `in_reply_to_message_id` it was sent with. Absent when the message answers nothing, and absent on an inbound message whose target we cannot match to a message we hold, which is the case for one sent before this workspace started recording them or one already past the 15-day window we keep provider ids for.
     * 
     *
     * @var string|null
     */
    protected $inReplyToMessageId;
    /**
     * What the contact tapped, on a message answering an interactive message or a template's quick-reply button. Inbound only.
     * 
     *
     * @var WhatsAppMessageInteractiveReply|null
     */
    protected $interactiveReply;
    /**
     * Set when the contact sent content we do not model, naming the WhatsApp content type so the message is not silently empty. Inbound only.
     * 
     *
     * @var WhatsAppMessageUnsupported|null
     */
    protected $unsupported;
    /**
     * Emoji reactions standing on this message right now, one per sender. Absent when the message has none. A reaction that was replaced by a different emoji, or taken back, is not listed; the message's reaction log keeps that history. WhatsApp accepts a reaction on a message up to 30 days old, and we keep provider ids for 15, so a reaction placed on a message older than that cannot be matched to it and does not appear here.
     * 
     *
     * @var list<WhatsAppReaction>|null
     */
    protected $reactions;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * How many recipients a group send was addressed to, taken when the send
     * was accepted. It is the group's membership at that moment, not its
     * membership now: someone joining through the invite link while the message
     * is in flight does not receive it and does not change this count.
     * 
     * Absent on a one-to-one message, along with `delivered_count` and
     * `read_count`. A message with one recipient has no fan-out to report, and
     * its delivery is what `status`, `delivered_at` and `read_at` already say.
     * Absent for the same reason on a group message sent before Bird recorded
     * the count, and on a send to a group nobody had joined yet: there is no
     * denominator to report, and none can be recovered after the fact, since
     * membership has moved on. `to.group_id` is what tells a group message from
     * a one-to-one one in every case, including those two. With no denominator
     * to resolve against, `status` is read as stored, the way a one-to-one
     * message's is: it reaches `sent` when the message is handed to WhatsApp and
     * stops there, because delivery is confirmed per participant and a send with
     * no participants collects no confirmations.
     * 
     * It is also the denominator `status` is resolved against: on a group
     * message `status` reports the furthest point *every* recipient has
     * reached, so it turns `delivered` only once `delivered_count` equals this
     * number, and stays `sent` while some have confirmed and others have not.
     * `failed` and `rejected` are never per recipient: there is one hand-off to
     * the WhatsApp network and one way for that to be refused. `delivered_at`
     * and `read_at` are the first recipient's, not the last.
     * 
     *
     * @var int|null
     */
    protected $recipientCount;
    /**
     * How many of the `recipient_count` recipients WhatsApp has confirmed the
     * message reached. A recipient who reported only a read counts here too:
     * WhatsApp skips the delivery receipt when someone is already looking at
     * the chat, so waiting for one would leave that person uncounted for ever.
     * 
     * Absent on a one-to-one message, which has no fan-out to count, and on a
     * group message with no `recipient_count` to count against.
     * 
     *
     * @var int|null
     */
    protected $deliveredCount;
    /**
     * How many of the `recipient_count` recipients have opened the message.
     * Read receipts do not move `status`, which has no `read` value; they
     * surface here and in `read_at`.
     * 
     * Absent on a one-to-one message, which has no fan-out to count, and on a
     * group message with no `recipient_count` to count against.
     * 
     *
     * @var int|null
     */
    protected $readCount;
    /**
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @var WhatsAppError|null
     */
    protected $lastError;
    /**
     * When the message was accepted for delivery.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the message was handed to the WhatsApp network. Null until then.
     *
     * @var \DateTime|null
     */
    protected $sentAt;
    /**
     * When delivery was confirmed. Null until then.
     *
     * @var \DateTime|null
     */
    protected $deliveredAt;
    /**
     * When the message was read. On an outbound message this is the recipient opening it. On an inbound one it is when Bird acknowledged the message to WhatsApp for the business, which a read receipt sets. Null until then.
     * 
     *
     * @var \DateTime|null
     */
    protected $readAt;
    /**
     * What was charged for a message, split into the components that make it up. `null` until at least one component has been priced.
     * 
     *
     * @var MessageCost|null
     */
    protected $cost;
    /**
     * Structured `{name, value}` filter labels applied to this message.
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Arbitrary JSON metadata stored on the message.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
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
     * Whether the message was sent by the business (`outbound`) or received from the contact (`inbound`).
     *
     * @return string|null
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }
    /**
     * Whether the message was sent by the business (`outbound`) or received from the contact (`inbound`).
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
     * Sender of the message. On outbound messages, the business number it was sent from; on inbound, the WhatsApp contact.
     *
     * @return WhatsAppMessageFrom|null
     */
    public function getFrom(): ?WhatsAppMessageFrom
    {
        return $this->from;
    }
    /**
     * Sender of the message. On outbound messages, the business number it was sent from; on inbound, the WhatsApp contact.
     *
     * @param WhatsAppMessageFrom|null $from
     *
     * @return self
     */
    public function setFrom(?WhatsAppMessageFrom $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * Recipient of the message. On outbound messages, the WhatsApp contact; on inbound, the business number.
     *
     * @return WhatsAppMessageTo|null
     */
    public function getTo(): ?WhatsAppMessageTo
    {
        return $this->to;
    }
    /**
     * Recipient of the message. On outbound messages, the WhatsApp contact; on inbound, the business number.
     *
     * @param WhatsAppMessageTo|null $to
     *
     * @return self
     */
    public function setTo(?WhatsAppMessageTo $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * The template the message was sent from. For authentication templates the filled-in values are not returned.
     *
     * @return WhatsAppMessageTemplate|null
     */
    public function getTemplate(): ?WhatsAppMessageTemplate
    {
        return $this->template;
    }
    /**
     * The template the message was sent from. For authentication templates the filled-in values are not returned.
     *
     * @param WhatsAppMessageTemplate|null $template
     *
     * @return self
     */
    public function setTemplate(?WhatsAppMessageTemplate $template): self
    {
        $this->initialized['template'] = true;
        $this->template = $template;
        return $this;
    }
    /**
     * Text the message carried.
     *
     * @return WhatsAppMessageText|null
     */
    public function getText(): ?WhatsAppMessageText
    {
        return $this->text;
    }
    /**
     * Text the message carried.
     *
     * @param WhatsAppMessageText|null $text
     *
     * @return self
     */
    public function setText(?WhatsAppMessageText $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
    /**
     * Image the message carried.
     *
     * @return WhatsAppMessageImage|null
     */
    public function getImage(): ?WhatsAppMessageImage
    {
        return $this->image;
    }
    /**
     * Image the message carried.
     *
     * @param WhatsAppMessageImage|null $image
     *
     * @return self
     */
    public function setImage(?WhatsAppMessageImage $image): self
    {
        $this->initialized['image'] = true;
        $this->image = $image;
        return $this;
    }
    /**
     * Video the message carried.
     *
     * @return WhatsAppMessageVideo|null
     */
    public function getVideo(): ?WhatsAppMessageVideo
    {
        return $this->video;
    }
    /**
     * Video the message carried.
     *
     * @param WhatsAppMessageVideo|null $video
     *
     * @return self
     */
    public function setVideo(?WhatsAppMessageVideo $video): self
    {
        $this->initialized['video'] = true;
        $this->video = $video;
        return $this;
    }
    /**
     * Audio the message carried.
     *
     * @return WhatsAppMessageAudio|null
     */
    public function getAudio(): ?WhatsAppMessageAudio
    {
        return $this->audio;
    }
    /**
     * Audio the message carried.
     *
     * @param WhatsAppMessageAudio|null $audio
     *
     * @return self
     */
    public function setAudio(?WhatsAppMessageAudio $audio): self
    {
        $this->initialized['audio'] = true;
        $this->audio = $audio;
        return $this;
    }
    /**
     * Sticker the message carried.
     *
     * @return WhatsAppMessageSticker|null
     */
    public function getSticker(): ?WhatsAppMessageSticker
    {
        return $this->sticker;
    }
    /**
     * Sticker the message carried.
     *
     * @param WhatsAppMessageSticker|null $sticker
     *
     * @return self
     */
    public function setSticker(?WhatsAppMessageSticker $sticker): self
    {
        $this->initialized['sticker'] = true;
        $this->sticker = $sticker;
        return $this;
    }
    /**
     * Document the message carried.
     *
     * @return WhatsAppMessageDocument|null
     */
    public function getDocument(): ?WhatsAppMessageDocument
    {
        return $this->document;
    }
    /**
     * Document the message carried.
     *
     * @param WhatsAppMessageDocument|null $document
     *
     * @return self
     */
    public function setDocument(?WhatsAppMessageDocument $document): self
    {
        $this->initialized['document'] = true;
        $this->document = $document;
        return $this;
    }
    /**
     * Location the message carried.
     *
     * @return WhatsAppMessageLocation|null
     */
    public function getLocation(): ?WhatsAppMessageLocation
    {
        return $this->location;
    }
    /**
     * Location the message carried.
     *
     * @param WhatsAppMessageLocation|null $location
     *
     * @return self
     */
    public function setLocation(?WhatsAppMessageLocation $location): self
    {
        $this->initialized['location'] = true;
        $this->location = $location;
        return $this;
    }
    /**
     * Contact cards on this message: cards the contact shared, either by tapping a button that asked for their number or by sending one from their address book, or the cards this workspace sent.
     * 
     *
     * @return list<WhatsAppContactCard>|null
     */
    public function getContactCards(): ?array
    {
        return $this->contactCards;
    }
    /**
     * Contact cards on this message: cards the contact shared, either by tapping a button that asked for their number or by sending one from their address book, or the cards this workspace sent.
     *
     * @param list<WhatsAppContactCard>|null $contactCards
     *
     * @return self
     */
    public function setContactCards(?array $contactCards): self
    {
        $this->initialized['contactCards'] = true;
        $this->contactCards = $contactCards;
        return $this;
    }
    /**
     * Interactive content the message carried. Outbound only: a contact cannot send one. A tap on a reply button or a list row reads back as `interactive_reply` on the contact's inbound message; a `cta_url` link sends nothing back, and the two request kinds are answered by an inbound `location` or `contact_cards` message.
     * 
     *
     * @return WhatsAppMessageInteractive|null
     */
    public function getInteractive(): ?WhatsAppMessageInteractive
    {
        return $this->interactive;
    }
    /**
     * Interactive content the message carried. Outbound only: a contact cannot send one. A tap on a reply button or a list row reads back as `interactive_reply` on the contact's inbound message; a `cta_url` link sends nothing back, and the two request kinds are answered by an inbound `location` or `contact_cards` message.
     *
     * @param WhatsAppMessageInteractive|null $interactive
     *
     * @return self
     */
    public function setInteractive(?WhatsAppMessageInteractive $interactive): self
    {
        $this->initialized['interactive'] = true;
        $this->interactive = $interactive;
        return $this;
    }
    /**
     * The message this one answers. On an inbound message it is what WhatsApp reports as the reply's target: a tap on a button or a list row, and equally a text or media message the contact sent as a quoted reply. An outbound message echoes the `in_reply_to_message_id` it was sent with. Absent when the message answers nothing, and absent on an inbound message whose target we cannot match to a message we hold, which is the case for one sent before this workspace started recording them or one already past the 15-day window we keep provider ids for.
     * 
     *
     * @return string|null
     */
    public function getInReplyToMessageId(): ?string
    {
        return $this->inReplyToMessageId;
    }
    /**
     * The message this one answers. On an inbound message it is what WhatsApp reports as the reply's target: a tap on a button or a list row, and equally a text or media message the contact sent as a quoted reply. An outbound message echoes the `in_reply_to_message_id` it was sent with. Absent when the message answers nothing, and absent on an inbound message whose target we cannot match to a message we hold, which is the case for one sent before this workspace started recording them or one already past the 15-day window we keep provider ids for.
     *
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
     * What the contact tapped, on a message answering an interactive message or a template's quick-reply button. Inbound only.
     * 
     *
     * @return WhatsAppMessageInteractiveReply|null
     */
    public function getInteractiveReply(): ?WhatsAppMessageInteractiveReply
    {
        return $this->interactiveReply;
    }
    /**
     * What the contact tapped, on a message answering an interactive message or a template's quick-reply button. Inbound only.
     *
     * @param WhatsAppMessageInteractiveReply|null $interactiveReply
     *
     * @return self
     */
    public function setInteractiveReply(?WhatsAppMessageInteractiveReply $interactiveReply): self
    {
        $this->initialized['interactiveReply'] = true;
        $this->interactiveReply = $interactiveReply;
        return $this;
    }
    /**
     * Set when the contact sent content we do not model, naming the WhatsApp content type so the message is not silently empty. Inbound only.
     * 
     *
     * @return WhatsAppMessageUnsupported|null
     */
    public function getUnsupported(): ?WhatsAppMessageUnsupported
    {
        return $this->unsupported;
    }
    /**
     * Set when the contact sent content we do not model, naming the WhatsApp content type so the message is not silently empty. Inbound only.
     *
     * @param WhatsAppMessageUnsupported|null $unsupported
     *
     * @return self
     */
    public function setUnsupported(?WhatsAppMessageUnsupported $unsupported): self
    {
        $this->initialized['unsupported'] = true;
        $this->unsupported = $unsupported;
        return $this;
    }
    /**
     * Emoji reactions standing on this message right now, one per sender. Absent when the message has none. A reaction that was replaced by a different emoji, or taken back, is not listed; the message's reaction log keeps that history. WhatsApp accepts a reaction on a message up to 30 days old, and we keep provider ids for 15, so a reaction placed on a message older than that cannot be matched to it and does not appear here.
     * 
     *
     * @return list<WhatsAppReaction>|null
     */
    public function getReactions(): ?array
    {
        return $this->reactions;
    }
    /**
     * Emoji reactions standing on this message right now, one per sender. Absent when the message has none. A reaction that was replaced by a different emoji, or taken back, is not listed; the message's reaction log keeps that history. WhatsApp accepts a reaction on a message up to 30 days old, and we keep provider ids for 15, so a reaction placed on a message older than that cannot be matched to it and does not appear here.
     *
     * @param list<WhatsAppReaction>|null $reactions
     *
     * @return self
     */
    public function setReactions(?array $reactions): self
    {
        $this->initialized['reactions'] = true;
        $this->reactions = $reactions;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
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
     * How many recipients a group send was addressed to, taken when the send
     * was accepted. It is the group's membership at that moment, not its
     * membership now: someone joining through the invite link while the message
     * is in flight does not receive it and does not change this count.
     * 
     * Absent on a one-to-one message, along with `delivered_count` and
     * `read_count`. A message with one recipient has no fan-out to report, and
     * its delivery is what `status`, `delivered_at` and `read_at` already say.
     * Absent for the same reason on a group message sent before Bird recorded
     * the count, and on a send to a group nobody had joined yet: there is no
     * denominator to report, and none can be recovered after the fact, since
     * membership has moved on. `to.group_id` is what tells a group message from
     * a one-to-one one in every case, including those two. With no denominator
     * to resolve against, `status` is read as stored, the way a one-to-one
     * message's is: it reaches `sent` when the message is handed to WhatsApp and
     * stops there, because delivery is confirmed per participant and a send with
     * no participants collects no confirmations.
     * 
     * It is also the denominator `status` is resolved against: on a group
     * message `status` reports the furthest point *every* recipient has
     * reached, so it turns `delivered` only once `delivered_count` equals this
     * number, and stays `sent` while some have confirmed and others have not.
     * `failed` and `rejected` are never per recipient: there is one hand-off to
     * the WhatsApp network and one way for that to be refused. `delivered_at`
     * and `read_at` are the first recipient's, not the last.
     * 
     *
     * @return int|null
     */
    public function getRecipientCount(): ?int
    {
        return $this->recipientCount;
    }
    /**
    * How many recipients a group send was addressed to, taken when the send
    was accepted. It is the group's membership at that moment, not its
    membership now: someone joining through the invite link while the message
    is in flight does not receive it and does not change this count.
    
    Absent on a one-to-one message, along with `delivered_count` and
    `read_count`. A message with one recipient has no fan-out to report, and
    its delivery is what `status`, `delivered_at` and `read_at` already say.
    Absent for the same reason on a group message sent before Bird recorded
    the count, and on a send to a group nobody had joined yet: there is no
    denominator to report, and none can be recovered after the fact, since
    membership has moved on. `to.group_id` is what tells a group message from
    a one-to-one one in every case, including those two. With no denominator
    to resolve against, `status` is read as stored, the way a one-to-one
    message's is: it reaches `sent` when the message is handed to WhatsApp and
    stops there, because delivery is confirmed per participant and a send with
    no participants collects no confirmations.
    
    It is also the denominator `status` is resolved against: on a group
    message `status` reports the furthest point *every* recipient has
    reached, so it turns `delivered` only once `delivered_count` equals this
    number, and stays `sent` while some have confirmed and others have not.
    `failed` and `rejected` are never per recipient: there is one hand-off to
    the WhatsApp network and one way for that to be refused. `delivered_at`
    and `read_at` are the first recipient's, not the last.
    
    *
    * @param int|null $recipientCount
    *
    * @return self
    */
    public function setRecipientCount(?int $recipientCount): self
    {
        $this->initialized['recipientCount'] = true;
        $this->recipientCount = $recipientCount;
        return $this;
    }
    /**
     * How many of the `recipient_count` recipients WhatsApp has confirmed the
     * message reached. A recipient who reported only a read counts here too:
     * WhatsApp skips the delivery receipt when someone is already looking at
     * the chat, so waiting for one would leave that person uncounted for ever.
     * 
     * Absent on a one-to-one message, which has no fan-out to count, and on a
     * group message with no `recipient_count` to count against.
     * 
     *
     * @return int|null
     */
    public function getDeliveredCount(): ?int
    {
        return $this->deliveredCount;
    }
    /**
    * How many of the `recipient_count` recipients WhatsApp has confirmed the
    message reached. A recipient who reported only a read counts here too:
    WhatsApp skips the delivery receipt when someone is already looking at
    the chat, so waiting for one would leave that person uncounted for ever.
    
    Absent on a one-to-one message, which has no fan-out to count, and on a
    group message with no `recipient_count` to count against.
    
    *
    * @param int|null $deliveredCount
    *
    * @return self
    */
    public function setDeliveredCount(?int $deliveredCount): self
    {
        $this->initialized['deliveredCount'] = true;
        $this->deliveredCount = $deliveredCount;
        return $this;
    }
    /**
     * How many of the `recipient_count` recipients have opened the message.
     * Read receipts do not move `status`, which has no `read` value; they
     * surface here and in `read_at`.
     * 
     * Absent on a one-to-one message, which has no fan-out to count, and on a
     * group message with no `recipient_count` to count against.
     * 
     *
     * @return int|null
     */
    public function getReadCount(): ?int
    {
        return $this->readCount;
    }
    /**
    * How many of the `recipient_count` recipients have opened the message.
    Read receipts do not move `status`, which has no `read` value; they
    surface here and in `read_at`.
    
    Absent on a one-to-one message, which has no fan-out to count, and on a
    group message with no `recipient_count` to count against.
    
    *
    * @param int|null $readCount
    *
    * @return self
    */
    public function setReadCount(?int $readCount): self
    {
        $this->initialized['readCount'] = true;
        $this->readCount = $readCount;
        return $this;
    }
    /**
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @return WhatsAppError|null
     */
    public function getLastError(): ?WhatsAppError
    {
        return $this->lastError;
    }
    /**
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @param WhatsAppError|null $lastError
     *
     * @return self
     */
    public function setLastError(?WhatsAppError $lastError): self
    {
        $this->initialized['lastError'] = true;
        $this->lastError = $lastError;
        return $this;
    }
    /**
     * When the message was accepted for delivery.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the message was accepted for delivery.
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
     * When the message was handed to the WhatsApp network. Null until then.
     *
     * @return \DateTime|null
     */
    public function getSentAt(): ?\DateTime
    {
        return $this->sentAt;
    }
    /**
     * When the message was handed to the WhatsApp network. Null until then.
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
     * When delivery was confirmed. Null until then.
     *
     * @return \DateTime|null
     */
    public function getDeliveredAt(): ?\DateTime
    {
        return $this->deliveredAt;
    }
    /**
     * When delivery was confirmed. Null until then.
     *
     * @param \DateTime|null $deliveredAt
     *
     * @return self
     */
    public function setDeliveredAt(?\DateTime $deliveredAt): self
    {
        $this->initialized['deliveredAt'] = true;
        $this->deliveredAt = $deliveredAt;
        return $this;
    }
    /**
     * When the message was read. On an outbound message this is the recipient opening it. On an inbound one it is when Bird acknowledged the message to WhatsApp for the business, which a read receipt sets. Null until then.
     * 
     *
     * @return \DateTime|null
     */
    public function getReadAt(): ?\DateTime
    {
        return $this->readAt;
    }
    /**
     * When the message was read. On an outbound message this is the recipient opening it. On an inbound one it is when Bird acknowledged the message to WhatsApp for the business, which a read receipt sets. Null until then.
     *
     * @param \DateTime|null $readAt
     *
     * @return self
     */
    public function setReadAt(?\DateTime $readAt): self
    {
        $this->initialized['readAt'] = true;
        $this->readAt = $readAt;
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
     * Structured `{name, value}` filter labels applied to this message.
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Structured `{name, value}` filter labels applied to this message.
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
     * Arbitrary JSON metadata stored on the message.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Arbitrary JSON metadata stored on the message.
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
}
