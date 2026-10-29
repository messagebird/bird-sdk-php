<?php

namespace MessageBird\Wire\Model;

/**
 * A text message: a body, an optional subject, and files placed in the body. Next to `rich_link` or `interactive`, it is sent first as its own text bubble.
 */
class AMBText
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
     * Text displayed in the message. Use one U+FFFC object replacement character per attachment to control placement.
     *
     * @var string|null
     */
    protected $body;
    /**
     * Subject displayed above the message body.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * Ordered attachments. A send supplies each one by source_url or attachment_id.
     *
     * @var list<AMBNativeAttachment>|null
     */
    protected $attachments;
    /**
     * Text displayed in the message. Use one U+FFFC object replacement character per attachment to control placement.
     *
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }
    /**
     * Text displayed in the message. Use one U+FFFC object replacement character per attachment to control placement.
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
    /**
     * Subject displayed above the message body.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * Subject displayed above the message body.
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
     * Ordered attachments. A send supplies each one by source_url or attachment_id.
     *
     * @return list<AMBNativeAttachment>|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }
    /**
     * Ordered attachments. A send supplies each one by source_url or attachment_id.
     *
     * @param list<AMBNativeAttachment>|null $attachments
     *
     * @return self
     */
    public function setAttachments(?array $attachments): self
    {
        $this->initialized['attachments'] = true;
        $this->attachments = $attachments;
        return $this;
    }
}
