<?php

namespace MessageBird\Wire\Model;

class EmailThreadMessage
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
     * Message ID. Received messages have a `rem_` ID, sent messages an `em_` ID: the same IDs used by the received-message and sent-message logs.
     * 
     *
     * @var string|null
     */
    protected $id;
    /**
     * Which way the message went. `inbound` means you received it, `outbound` means you sent it.
     *
     * @var string|null
     */
    protected $direction;
    /**
     * Channel this message lives on. Always `email`.
     *
     * @var string|null
     */
    protected $channel;
    /**
     * @var string|null
     */
    protected $threadId;
    /**
     * Sender address.
     *
     * @var string|null
     */
    protected $from;
    /**
     * Recipient addresses on the To line.
     *
     * @var list<string>|null
     */
    protected $to;
    /**
     * Recipient addresses on the Cc line. Empty when the message had none.
     *
     * @var list<string>|null
     */
    protected $cc;
    /**
     * Address the message was actually delivered to, when it differs from the mailbox address (for example mail routed in from another address). Null for sent messages and for mail addressed directly to the mailbox.
     * 
     *
     * @var string|null
     */
    protected $deliveredTo;
    /**
     * Message subject. Null when the message had no subject.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * Short plain-text preview of the message body.
     *
     * @var string|null
     */
    protected $preview;
    /**
     * Plain-text content of the message with quoted history stripped. Readable for the mailbox's full retention tier, in both directions. Always present when fetching a single message. On list endpoints it is included only when the request sets `include=extracted_text`. Null when no text could be extracted.
     * 
     *
     * @var string|null
     */
    protected $extractedText;
    /**
     * Labels on this message. A received message always has exactly one placement label:
     * 
     * - `inbox`: Accepted mail.
     * - `archive`: The message's conversation was filed away.
     * - `spam`: The message failed sender authentication.
     * - `blocked`: The message was rejected by the mailbox's receive policy or rules.
     * 
     * A received message also has `unread` until it is read. `trash` marks a message in the trash, in either direction. Custom labels share the same list, and a message has at most 20 labels in total.
     * 
     *
     * @var list<string>|null
     */
    protected $labels;
    /**
     * Aggregate delivery status of a sent message:
     * 
     * - `accepted`: Accepted for sending.
     * - `sent`: Handed off to the provider.
     * - `delivered`: All attempted recipients delivered.
     * - `failed`: Terminal failure.
     * 
     * Null for received messages.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Terminal per-recipient delivery outcomes of a sent message, filled in as each one becomes known and kept for the mailbox's full retention tier. Null for received messages and before any recipient reaches a terminal state. Per-recipient event detail lives on the sent-message log (`source`) for 30 days.
     * 
     *
     * @var list<EmailThreadMessageRecipient>|null
     */
    protected $recipients;
    /**
     * Whether the sender of a received message was authenticated.
     * 
     * - `pass`: the sender's identity was verified.
     * - `fail`: it was checked and did not verify.
     * - `unknown`: no verdict could be determined, so do not treat the
     *   sender as verified.
     * 
     * Null for sent messages. This field is readable for the mailbox's full
     * retention tier, so the verdict is still available after the 30-day
     * received-message log has expired.
     * 
     *
     * @var string|null
     */
    protected $authentication;
    /**
     * Whether SPF passed for the sender of a received message. Null for sent messages and when no verdict is available. This field is kept for the mailbox's retention tier.
     * 
     *
     * @var bool|null
     */
    protected $spfPass;
    /**
     * Whether DKIM passed for the sender of a received message. Null for sent messages and when no verdict is available. This field is kept for the mailbox's retention tier.
     * 
     *
     * @var bool|null
     */
    protected $dkimPass;
    /**
     * Whether DMARC passed for the sender of a received message. Null for sent messages and when no verdict is available. This field is kept for the mailbox's retention tier.
     * 
     *
     * @var bool|null
     */
    protected $dmarcPass;
    /**
     * Scheduled permanent-deletion time. This is the end of the mailbox's retention tier, moved to no more than 30 days in the future while the message is in the trash. Restore a trashed message before then with `PATCH {"labels": {"remove": ["trash"]}}`.
     * 
     *
     * @var \DateTime|null
     */
    protected $purgeAt;
    /**
     * Number of attachments on the message.
     *
     * @var int|null
     */
    protected $attachmentCount;
    /**
     * Attachment metadata (filename, content type, size). Both the metadata and the attachment bytes stay available for the mailbox's retention tier.
     * 
     *
     * @var list<EmailThreadMessageAttachment>|null
     */
    protected $attachmentManifest;
    /**
     * RFC 5322 References header entries used to thread the conversation.
     *
     * @var list<string>|null
     */
    protected $referenceIds;
    /**
     * Contact linked to this message, or null when none is linked.
     *
     * @var string|null
     */
    protected $contactId;
    /**
     * Link to the message's entry in the received-message or sent-message log, which has delivery analytics such as per-recipient events. Log entries expire 30 days after the message occurred.
     * 
     *
     * @var EmailThreadMessageSource|null
     */
    protected $source;
    /**
     * When the message was received or accepted for sending.
     *
     * @var \DateTime|null
     */
    protected $occurredAt;
    /**
     * Message ID. Received messages have a `rem_` ID, sent messages an `em_` ID: the same IDs used by the received-message and sent-message logs.
     * 
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Message ID. Received messages have a `rem_` ID, sent messages an `em_` ID: the same IDs used by the received-message and sent-message logs.
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
     * Which way the message went. `inbound` means you received it, `outbound` means you sent it.
     *
     * @return string|null
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }
    /**
     * Which way the message went. `inbound` means you received it, `outbound` means you sent it.
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
     * Channel this message lives on. Always `email`.
     *
     * @return string|null
     */
    public function getChannel(): ?string
    {
        return $this->channel;
    }
    /**
     * Channel this message lives on. Always `email`.
     *
     * @param string|null $channel
     *
     * @return self
     */
    public function setChannel(?string $channel): self
    {
        $this->initialized['channel'] = true;
        $this->channel = $channel;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getThreadId(): ?string
    {
        return $this->threadId;
    }
    /**
     * @param string|null $threadId
     *
     * @return self
     */
    public function setThreadId(?string $threadId): self
    {
        $this->initialized['threadId'] = true;
        $this->threadId = $threadId;
        return $this;
    }
    /**
     * Sender address.
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * Sender address.
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
     * Recipient addresses on the To line.
     *
     * @return list<string>|null
     */
    public function getTo(): ?array
    {
        return $this->to;
    }
    /**
     * Recipient addresses on the To line.
     *
     * @param list<string>|null $to
     *
     * @return self
     */
    public function setTo(?array $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * Recipient addresses on the Cc line. Empty when the message had none.
     *
     * @return list<string>|null
     */
    public function getCc(): ?array
    {
        return $this->cc;
    }
    /**
     * Recipient addresses on the Cc line. Empty when the message had none.
     *
     * @param list<string>|null $cc
     *
     * @return self
     */
    public function setCc(?array $cc): self
    {
        $this->initialized['cc'] = true;
        $this->cc = $cc;
        return $this;
    }
    /**
     * Address the message was actually delivered to, when it differs from the mailbox address (for example mail routed in from another address). Null for sent messages and for mail addressed directly to the mailbox.
     * 
     *
     * @return string|null
     */
    public function getDeliveredTo(): ?string
    {
        return $this->deliveredTo;
    }
    /**
     * Address the message was actually delivered to, when it differs from the mailbox address (for example mail routed in from another address). Null for sent messages and for mail addressed directly to the mailbox.
     *
     * @param string|null $deliveredTo
     *
     * @return self
     */
    public function setDeliveredTo(?string $deliveredTo): self
    {
        $this->initialized['deliveredTo'] = true;
        $this->deliveredTo = $deliveredTo;
        return $this;
    }
    /**
     * Message subject. Null when the message had no subject.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * Message subject. Null when the message had no subject.
     *
     * @param string|null $subject
     *
     * @return self
     */
    public function setSubject(?string $subject): self
    {
        $this->initialized['subject'] = true;
        $this->subject = $subject;
        return $this;
    }
    /**
     * Short plain-text preview of the message body.
     *
     * @return string|null
     */
    public function getPreview(): ?string
    {
        return $this->preview;
    }
    /**
     * Short plain-text preview of the message body.
     *
     * @param string|null $preview
     *
     * @return self
     */
    public function setPreview(?string $preview): self
    {
        $this->initialized['preview'] = true;
        $this->preview = $preview;
        return $this;
    }
    /**
     * Plain-text content of the message with quoted history stripped. Readable for the mailbox's full retention tier, in both directions. Always present when fetching a single message. On list endpoints it is included only when the request sets `include=extracted_text`. Null when no text could be extracted.
     * 
     *
     * @return string|null
     */
    public function getExtractedText(): ?string
    {
        return $this->extractedText;
    }
    /**
     * Plain-text content of the message with quoted history stripped. Readable for the mailbox's full retention tier, in both directions. Always present when fetching a single message. On list endpoints it is included only when the request sets `include=extracted_text`. Null when no text could be extracted.
     *
     * @param string|null $extractedText
     *
     * @return self
     */
    public function setExtractedText(?string $extractedText): self
    {
        $this->initialized['extractedText'] = true;
        $this->extractedText = $extractedText;
        return $this;
    }
    /**
     * Labels on this message. A received message always has exactly one placement label:
     * 
     * - `inbox`: Accepted mail.
     * - `archive`: The message's conversation was filed away.
     * - `spam`: The message failed sender authentication.
     * - `blocked`: The message was rejected by the mailbox's receive policy or rules.
     * 
     * A received message also has `unread` until it is read. `trash` marks a message in the trash, in either direction. Custom labels share the same list, and a message has at most 20 labels in total.
     * 
     *
     * @return list<string>|null
     */
    public function getLabels(): ?array
    {
        return $this->labels;
    }
    /**
    * Labels on this message. A received message always has exactly one placement label:
    
    - `inbox`: Accepted mail.
    - `archive`: The message's conversation was filed away.
    - `spam`: The message failed sender authentication.
    - `blocked`: The message was rejected by the mailbox's receive policy or rules.
    
    A received message also has `unread` until it is read. `trash` marks a message in the trash, in either direction. Custom labels share the same list, and a message has at most 20 labels in total.
    
    *
    * @param list<string>|null $labels
    *
    * @return self
    */
    public function setLabels(?array $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;
        return $this;
    }
    /**
     * Aggregate delivery status of a sent message:
     * 
     * - `accepted`: Accepted for sending.
     * - `sent`: Handed off to the provider.
     * - `delivered`: All attempted recipients delivered.
     * - `failed`: Terminal failure.
     * 
     * Null for received messages.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Aggregate delivery status of a sent message:
    
    - `accepted`: Accepted for sending.
    - `sent`: Handed off to the provider.
    - `delivered`: All attempted recipients delivered.
    - `failed`: Terminal failure.
    
    Null for received messages.
    
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
     * Terminal per-recipient delivery outcomes of a sent message, filled in as each one becomes known and kept for the mailbox's full retention tier. Null for received messages and before any recipient reaches a terminal state. Per-recipient event detail lives on the sent-message log (`source`) for 30 days.
     * 
     *
     * @return list<EmailThreadMessageRecipient>|null
     */
    public function getRecipients(): ?array
    {
        return $this->recipients;
    }
    /**
     * Terminal per-recipient delivery outcomes of a sent message, filled in as each one becomes known and kept for the mailbox's full retention tier. Null for received messages and before any recipient reaches a terminal state. Per-recipient event detail lives on the sent-message log (`source`) for 30 days.
     *
     * @param list<EmailThreadMessageRecipient>|null $recipients
     *
     * @return self
     */
    public function setRecipients(?array $recipients): self
    {
        $this->initialized['recipients'] = true;
        $this->recipients = $recipients;
        return $this;
    }
    /**
     * Whether the sender of a received message was authenticated.
     * 
     * - `pass`: the sender's identity was verified.
     * - `fail`: it was checked and did not verify.
     * - `unknown`: no verdict could be determined, so do not treat the
     *   sender as verified.
     * 
     * Null for sent messages. This field is readable for the mailbox's full
     * retention tier, so the verdict is still available after the 30-day
     * received-message log has expired.
     * 
     *
     * @return string|null
     */
    public function getAuthentication(): ?string
    {
        return $this->authentication;
    }
    /**
    * Whether the sender of a received message was authenticated.
    
    - `pass`: the sender's identity was verified.
    - `fail`: it was checked and did not verify.
    - `unknown`: no verdict could be determined, so do not treat the
     sender as verified.
    
    Null for sent messages. This field is readable for the mailbox's full
    retention tier, so the verdict is still available after the 30-day
    received-message log has expired.
    
    *
    * @param string|null $authentication
    *
    * @return self
    */
    public function setAuthentication(?string $authentication): self
    {
        $this->initialized['authentication'] = true;
        $this->authentication = $authentication;
        return $this;
    }
    /**
     * Whether SPF passed for the sender of a received message. Null for sent messages and when no verdict is available. This field is kept for the mailbox's retention tier.
     * 
     *
     * @return bool|null
     */
    public function getSpfPass(): ?bool
    {
        return $this->spfPass;
    }
    /**
     * Whether SPF passed for the sender of a received message. Null for sent messages and when no verdict is available. This field is kept for the mailbox's retention tier.
     *
     * @param bool|null $spfPass
     *
     * @return self
     */
    public function setSpfPass(?bool $spfPass): self
    {
        $this->initialized['spfPass'] = true;
        $this->spfPass = $spfPass;
        return $this;
    }
    /**
     * Whether DKIM passed for the sender of a received message. Null for sent messages and when no verdict is available. This field is kept for the mailbox's retention tier.
     * 
     *
     * @return bool|null
     */
    public function getDkimPass(): ?bool
    {
        return $this->dkimPass;
    }
    /**
     * Whether DKIM passed for the sender of a received message. Null for sent messages and when no verdict is available. This field is kept for the mailbox's retention tier.
     *
     * @param bool|null $dkimPass
     *
     * @return self
     */
    public function setDkimPass(?bool $dkimPass): self
    {
        $this->initialized['dkimPass'] = true;
        $this->dkimPass = $dkimPass;
        return $this;
    }
    /**
     * Whether DMARC passed for the sender of a received message. Null for sent messages and when no verdict is available. This field is kept for the mailbox's retention tier.
     * 
     *
     * @return bool|null
     */
    public function getDmarcPass(): ?bool
    {
        return $this->dmarcPass;
    }
    /**
     * Whether DMARC passed for the sender of a received message. Null for sent messages and when no verdict is available. This field is kept for the mailbox's retention tier.
     *
     * @param bool|null $dmarcPass
     *
     * @return self
     */
    public function setDmarcPass(?bool $dmarcPass): self
    {
        $this->initialized['dmarcPass'] = true;
        $this->dmarcPass = $dmarcPass;
        return $this;
    }
    /**
     * Scheduled permanent-deletion time. This is the end of the mailbox's retention tier, moved to no more than 30 days in the future while the message is in the trash. Restore a trashed message before then with `PATCH {"labels": {"remove": ["trash"]}}`.
     * 
     *
     * @return \DateTime|null
     */
    public function getPurgeAt(): ?\DateTime
    {
        return $this->purgeAt;
    }
    /**
     * Scheduled permanent-deletion time. This is the end of the mailbox's retention tier, moved to no more than 30 days in the future while the message is in the trash. Restore a trashed message before then with `PATCH {"labels": {"remove": ["trash"]}}`.
     *
     * @param \DateTime|null $purgeAt
     *
     * @return self
     */
    public function setPurgeAt(?\DateTime $purgeAt): self
    {
        $this->initialized['purgeAt'] = true;
        $this->purgeAt = $purgeAt;
        return $this;
    }
    /**
     * Number of attachments on the message.
     *
     * @return int|null
     */
    public function getAttachmentCount(): ?int
    {
        return $this->attachmentCount;
    }
    /**
     * Number of attachments on the message.
     *
     * @param int|null $attachmentCount
     *
     * @return self
     */
    public function setAttachmentCount(?int $attachmentCount): self
    {
        $this->initialized['attachmentCount'] = true;
        $this->attachmentCount = $attachmentCount;
        return $this;
    }
    /**
     * Attachment metadata (filename, content type, size). Both the metadata and the attachment bytes stay available for the mailbox's retention tier.
     * 
     *
     * @return list<EmailThreadMessageAttachment>|null
     */
    public function getAttachmentManifest(): ?array
    {
        return $this->attachmentManifest;
    }
    /**
     * Attachment metadata (filename, content type, size). Both the metadata and the attachment bytes stay available for the mailbox's retention tier.
     *
     * @param list<EmailThreadMessageAttachment>|null $attachmentManifest
     *
     * @return self
     */
    public function setAttachmentManifest(?array $attachmentManifest): self
    {
        $this->initialized['attachmentManifest'] = true;
        $this->attachmentManifest = $attachmentManifest;
        return $this;
    }
    /**
     * RFC 5322 References header entries used to thread the conversation.
     *
     * @return list<string>|null
     */
    public function getReferenceIds(): ?array
    {
        return $this->referenceIds;
    }
    /**
     * RFC 5322 References header entries used to thread the conversation.
     *
     * @param list<string>|null $referenceIds
     *
     * @return self
     */
    public function setReferenceIds(?array $referenceIds): self
    {
        $this->initialized['referenceIds'] = true;
        $this->referenceIds = $referenceIds;
        return $this;
    }
    /**
     * Contact linked to this message, or null when none is linked.
     *
     * @return string|null
     */
    public function getContactId(): ?string
    {
        return $this->contactId;
    }
    /**
     * Contact linked to this message, or null when none is linked.
     *
     * @param string|null $contactId
     *
     * @return self
     */
    public function setContactId(?string $contactId): self
    {
        $this->initialized['contactId'] = true;
        $this->contactId = $contactId;
        return $this;
    }
    /**
     * Link to the message's entry in the received-message or sent-message log, which has delivery analytics such as per-recipient events. Log entries expire 30 days after the message occurred.
     * 
     *
     * @return EmailThreadMessageSource|null
     */
    public function getSource(): ?EmailThreadMessageSource
    {
        return $this->source;
    }
    /**
     * Link to the message's entry in the received-message or sent-message log, which has delivery analytics such as per-recipient events. Log entries expire 30 days after the message occurred.
     *
     * @param EmailThreadMessageSource|null $source
     *
     * @return self
     */
    public function setSource(?EmailThreadMessageSource $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;
        return $this;
    }
    /**
     * When the message was received or accepted for sending.
     *
     * @return \DateTime|null
     */
    public function getOccurredAt(): ?\DateTime
    {
        return $this->occurredAt;
    }
    /**
     * When the message was received or accepted for sending.
     *
     * @param \DateTime|null $occurredAt
     *
     * @return self
     */
    public function setOccurredAt(?\DateTime $occurredAt): self
    {
        $this->initialized['occurredAt'] = true;
        $this->occurredAt = $occurredAt;
        return $this;
    }
}
