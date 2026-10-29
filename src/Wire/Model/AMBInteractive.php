<?php

namespace MessageBird\Wire\Model;

/**
 * Something for the customer to tap: exactly one of `quick_reply`, `list_picker`, `event` (a time picker), `dynamic` (a form) or `imessage_app`. To introduce it with text or files, send `text` alongside it; that text arrives as its own bubble first. Apple Pay and identity verification requests are created through their conversation endpoints and read back here as `payment` and `authenticate`.
 */
class AMBInteractive
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
     * @var AMBMessageBubble|null
     */
    protected $receivedMessage;
    /**
     * @var AMBMessageBubble|null
     */
    protected $replyMessage;
    /**
     * Session UUID to preserve across interactions. Apple creates one when omitted.
     *
     * @var string|null
     */
    protected $sessionIdentifier;
    /**
     * Correlation identifier for this interaction. Bird generates one when omitted. Use a new value for each message. A reply is linked to its request only when no other sent message in the conversation uses the same identifier.
     *
     * @var string|null
     */
    protected $requestIdentifier;
    /**
     * Images the interaction references by `image_identifier`, such as list picker thumbnails.
     *
     * @var list<AMBNativeImage>|null
     */
    protected $images;
    /**
     * @var AMBNativeQuickReply|null
     */
    protected $quickReply;
    /**
     * @var AMBNativeListPicker|null
     */
    protected $listPicker;
    /**
     * @var AMBNativeEvent|null
     */
    protected $event;
    /**
     * Form content. Bird supplies Apple’s messageForms template and protocol version.
     *
     * @var AMBNativeDynamic|null
     */
    protected $dynamic;
    /**
     * A custom iMessage app interaction. It also requires both `received_message` and `reply_message`.
     *
     * @var AMBIMessageApp|null
     */
    protected $imessageApp;
    /**
     * Apple Pay request created through the conversation payment endpoint. Contains no payment token or provider credentials.
     *
     * @var AMBNativePayment|null
     */
    protected $payment;
    /**
     * Authentication attempt created through the conversation authentication endpoint. Contains no authorization parameters or credentials.
     *
     * @var AMBNativeAuthentication|null
     */
    protected $authenticate;
    /**
     * @return AMBMessageBubble|null
     */
    public function getReceivedMessage(): ?AMBMessageBubble
    {
        return $this->receivedMessage;
    }
    /**
     * @param AMBMessageBubble|null $receivedMessage
     *
     * @return self
     */
    public function setReceivedMessage(?AMBMessageBubble $receivedMessage): self
    {
        $this->initialized['receivedMessage'] = true;
        $this->receivedMessage = $receivedMessage;
        return $this;
    }
    /**
     * @return AMBMessageBubble|null
     */
    public function getReplyMessage(): ?AMBMessageBubble
    {
        return $this->replyMessage;
    }
    /**
     * @param AMBMessageBubble|null $replyMessage
     *
     * @return self
     */
    public function setReplyMessage(?AMBMessageBubble $replyMessage): self
    {
        $this->initialized['replyMessage'] = true;
        $this->replyMessage = $replyMessage;
        return $this;
    }
    /**
     * Session UUID to preserve across interactions. Apple creates one when omitted.
     *
     * @return string|null
     */
    public function getSessionIdentifier(): ?string
    {
        return $this->sessionIdentifier;
    }
    /**
     * Session UUID to preserve across interactions. Apple creates one when omitted.
     *
     * @param string|null $sessionIdentifier
     *
     * @return self
     */
    public function setSessionIdentifier(?string $sessionIdentifier): self
    {
        $this->initialized['sessionIdentifier'] = true;
        $this->sessionIdentifier = $sessionIdentifier;
        return $this;
    }
    /**
     * Correlation identifier for this interaction. Bird generates one when omitted. Use a new value for each message. A reply is linked to its request only when no other sent message in the conversation uses the same identifier.
     *
     * @return string|null
     */
    public function getRequestIdentifier(): ?string
    {
        return $this->requestIdentifier;
    }
    /**
     * Correlation identifier for this interaction. Bird generates one when omitted. Use a new value for each message. A reply is linked to its request only when no other sent message in the conversation uses the same identifier.
     *
     * @param string|null $requestIdentifier
     *
     * @return self
     */
    public function setRequestIdentifier(?string $requestIdentifier): self
    {
        $this->initialized['requestIdentifier'] = true;
        $this->requestIdentifier = $requestIdentifier;
        return $this;
    }
    /**
     * Images the interaction references by `image_identifier`, such as list picker thumbnails.
     *
     * @return list<AMBNativeImage>|null
     */
    public function getImages(): ?array
    {
        return $this->images;
    }
    /**
     * Images the interaction references by `image_identifier`, such as list picker thumbnails.
     *
     * @param list<AMBNativeImage>|null $images
     *
     * @return self
     */
    public function setImages(?array $images): self
    {
        $this->initialized['images'] = true;
        $this->images = $images;
        return $this;
    }
    /**
     * @return AMBNativeQuickReply|null
     */
    public function getQuickReply(): ?AMBNativeQuickReply
    {
        return $this->quickReply;
    }
    /**
     * @param AMBNativeQuickReply|null $quickReply
     *
     * @return self
     */
    public function setQuickReply(?AMBNativeQuickReply $quickReply): self
    {
        $this->initialized['quickReply'] = true;
        $this->quickReply = $quickReply;
        return $this;
    }
    /**
     * @return AMBNativeListPicker|null
     */
    public function getListPicker(): ?AMBNativeListPicker
    {
        return $this->listPicker;
    }
    /**
     * @param AMBNativeListPicker|null $listPicker
     *
     * @return self
     */
    public function setListPicker(?AMBNativeListPicker $listPicker): self
    {
        $this->initialized['listPicker'] = true;
        $this->listPicker = $listPicker;
        return $this;
    }
    /**
     * @return AMBNativeEvent|null
     */
    public function getEvent(): ?AMBNativeEvent
    {
        return $this->event;
    }
    /**
     * @param AMBNativeEvent|null $event
     *
     * @return self
     */
    public function setEvent(?AMBNativeEvent $event): self
    {
        $this->initialized['event'] = true;
        $this->event = $event;
        return $this;
    }
    /**
     * Form content. Bird supplies Apple’s messageForms template and protocol version.
     *
     * @return AMBNativeDynamic|null
     */
    public function getDynamic(): ?AMBNativeDynamic
    {
        return $this->dynamic;
    }
    /**
     * Form content. Bird supplies Apple’s messageForms template and protocol version.
     *
     * @param AMBNativeDynamic|null $dynamic
     *
     * @return self
     */
    public function setDynamic(?AMBNativeDynamic $dynamic): self
    {
        $this->initialized['dynamic'] = true;
        $this->dynamic = $dynamic;
        return $this;
    }
    /**
     * A custom iMessage app interaction. It also requires both `received_message` and `reply_message`.
     *
     * @return AMBIMessageApp|null
     */
    public function getImessageApp(): ?AMBIMessageApp
    {
        return $this->imessageApp;
    }
    /**
     * A custom iMessage app interaction. It also requires both `received_message` and `reply_message`.
     *
     * @param AMBIMessageApp|null $imessageApp
     *
     * @return self
     */
    public function setImessageApp(?AMBIMessageApp $imessageApp): self
    {
        $this->initialized['imessageApp'] = true;
        $this->imessageApp = $imessageApp;
        return $this;
    }
    /**
     * Apple Pay request created through the conversation payment endpoint. Contains no payment token or provider credentials.
     *
     * @return AMBNativePayment|null
     */
    public function getPayment(): ?AMBNativePayment
    {
        return $this->payment;
    }
    /**
     * Apple Pay request created through the conversation payment endpoint. Contains no payment token or provider credentials.
     *
     * @param AMBNativePayment|null $payment
     *
     * @return self
     */
    public function setPayment(?AMBNativePayment $payment): self
    {
        $this->initialized['payment'] = true;
        $this->payment = $payment;
        return $this;
    }
    /**
     * Authentication attempt created through the conversation authentication endpoint. Contains no authorization parameters or credentials.
     *
     * @return AMBNativeAuthentication|null
     */
    public function getAuthenticate(): ?AMBNativeAuthentication
    {
        return $this->authenticate;
    }
    /**
     * Authentication attempt created through the conversation authentication endpoint. Contains no authorization parameters or credentials.
     *
     * @param AMBNativeAuthentication|null $authenticate
     *
     * @return self
     */
    public function setAuthenticate(?AMBNativeAuthentication $authenticate): self
    {
        $this->initialized['authenticate'] = true;
        $this->authenticate = $authenticate;
        return $this;
    }
}
