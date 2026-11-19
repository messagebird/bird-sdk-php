<?php

namespace MessageBird\Wire\Model;

/**
 * The message an authentication request sends: the sign-in request bubble, the bubble that replaces it after sign-in, their images and an optional confirmation text. Only a template holds it. An authentication request renders the template and sends it. A message send does not accept it.
 */
class AMBSignInMessage
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
     * Images the bubbles reference by `image_identifier`.
     *
     * @var list<AMBNativeImage>|null
     */
    protected $images;
    /**
     * Text Bird sends as a message after the customer's device confirms the sign-in. Omit it to send no confirmation. It may contain `{{ }}` placeholders.
     *
     * @var string|null
     */
    protected $confirmationText;
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
     * Images the bubbles reference by `image_identifier`.
     *
     * @return list<AMBNativeImage>|null
     */
    public function getImages(): ?array
    {
        return $this->images;
    }
    /**
     * Images the bubbles reference by `image_identifier`.
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
     * Text Bird sends as a message after the customer's device confirms the sign-in. Omit it to send no confirmation. It may contain `{{ }}` placeholders.
     *
     * @return string|null
     */
    public function getConfirmationText(): ?string
    {
        return $this->confirmationText;
    }
    /**
     * Text Bird sends as a message after the customer's device confirms the sign-in. Omit it to send no confirmation. It may contain `{{ }}` placeholders.
     *
     * @param string|null $confirmationText
     *
     * @return self
     */
    public function setConfirmationText(?string $confirmationText): self
    {
        $this->initialized['confirmationText'] = true;
        $this->confirmationText = $confirmationText;
        return $this;
    }
}
