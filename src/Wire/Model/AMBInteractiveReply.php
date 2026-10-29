<?php

namespace MessageBird\Wire\Model;

/**
 * What the customer answered on an interactive message: their choice, time slot, form answers, payment result, sign-in result or custom app reply, under the same key as the request. Inbound only; a message that offers something to tap reads as `interactive` instead.
 */
class AMBInteractiveReply
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
     * Apple interaction session identifier.
     *
     * @var string|null
     */
    protected $sessionIdentifier;
    /**
     * Correlation identifier reported by Apple.
     *
     * @var string|null
     */
    protected $requestIdentifier;
    /**
     * Images returned by Apple, with authenticated download URLs.
     *
     * @var list<AMBNativeInboundImage>|null
     */
    protected $images;
    /**
     * @var AMBNativeInboundQuickReply|null
     */
    protected $quickReply;
    /**
     * @var AMBNativeInboundListPicker|null
     */
    protected $listPicker;
    /**
     * @var AMBNativeInboundEvent|null
     */
    protected $event;
    /**
     * @var AMBNativeInboundDynamic|null
     */
    protected $dynamic;
    /**
     * @var AMBNativeInboundPayment|null
     */
    protected $payment;
    /**
     * @var AMBNativeInboundAuthentication|null
     */
    protected $authenticate;
    /**
     * The custom iMessage app a customer replied from.
     *
     * @var AMBInboundIMessageApp|null
     */
    protected $imessageApp;
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
     * Apple interaction session identifier.
     *
     * @return string|null
     */
    public function getSessionIdentifier(): ?string
    {
        return $this->sessionIdentifier;
    }
    /**
     * Apple interaction session identifier.
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
     * Correlation identifier reported by Apple.
     *
     * @return string|null
     */
    public function getRequestIdentifier(): ?string
    {
        return $this->requestIdentifier;
    }
    /**
     * Correlation identifier reported by Apple.
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
     * Images returned by Apple, with authenticated download URLs.
     *
     * @return list<AMBNativeInboundImage>|null
     */
    public function getImages(): ?array
    {
        return $this->images;
    }
    /**
     * Images returned by Apple, with authenticated download URLs.
     *
     * @param list<AMBNativeInboundImage>|null $images
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
     * @return AMBNativeInboundQuickReply|null
     */
    public function getQuickReply(): ?AMBNativeInboundQuickReply
    {
        return $this->quickReply;
    }
    /**
     * @param AMBNativeInboundQuickReply|null $quickReply
     *
     * @return self
     */
    public function setQuickReply(?AMBNativeInboundQuickReply $quickReply): self
    {
        $this->initialized['quickReply'] = true;
        $this->quickReply = $quickReply;
        return $this;
    }
    /**
     * @return AMBNativeInboundListPicker|null
     */
    public function getListPicker(): ?AMBNativeInboundListPicker
    {
        return $this->listPicker;
    }
    /**
     * @param AMBNativeInboundListPicker|null $listPicker
     *
     * @return self
     */
    public function setListPicker(?AMBNativeInboundListPicker $listPicker): self
    {
        $this->initialized['listPicker'] = true;
        $this->listPicker = $listPicker;
        return $this;
    }
    /**
     * @return AMBNativeInboundEvent|null
     */
    public function getEvent(): ?AMBNativeInboundEvent
    {
        return $this->event;
    }
    /**
     * @param AMBNativeInboundEvent|null $event
     *
     * @return self
     */
    public function setEvent(?AMBNativeInboundEvent $event): self
    {
        $this->initialized['event'] = true;
        $this->event = $event;
        return $this;
    }
    /**
     * @return AMBNativeInboundDynamic|null
     */
    public function getDynamic(): ?AMBNativeInboundDynamic
    {
        return $this->dynamic;
    }
    /**
     * @param AMBNativeInboundDynamic|null $dynamic
     *
     * @return self
     */
    public function setDynamic(?AMBNativeInboundDynamic $dynamic): self
    {
        $this->initialized['dynamic'] = true;
        $this->dynamic = $dynamic;
        return $this;
    }
    /**
     * @return AMBNativeInboundPayment|null
     */
    public function getPayment(): ?AMBNativeInboundPayment
    {
        return $this->payment;
    }
    /**
     * @param AMBNativeInboundPayment|null $payment
     *
     * @return self
     */
    public function setPayment(?AMBNativeInboundPayment $payment): self
    {
        $this->initialized['payment'] = true;
        $this->payment = $payment;
        return $this;
    }
    /**
     * @return AMBNativeInboundAuthentication|null
     */
    public function getAuthenticate(): ?AMBNativeInboundAuthentication
    {
        return $this->authenticate;
    }
    /**
     * @param AMBNativeInboundAuthentication|null $authenticate
     *
     * @return self
     */
    public function setAuthenticate(?AMBNativeInboundAuthentication $authenticate): self
    {
        $this->initialized['authenticate'] = true;
        $this->authenticate = $authenticate;
        return $this;
    }
    /**
     * The custom iMessage app a customer replied from.
     *
     * @return AMBInboundIMessageApp|null
     */
    public function getImessageApp(): ?AMBInboundIMessageApp
    {
        return $this->imessageApp;
    }
    /**
     * The custom iMessage app a customer replied from.
     *
     * @param AMBInboundIMessageApp|null $imessageApp
     *
     * @return self
     */
    public function setImessageApp(?AMBInboundIMessageApp $imessageApp): self
    {
        $this->initialized['imessageApp'] = true;
        $this->imessageApp = $imessageApp;
        return $this;
    }
}
