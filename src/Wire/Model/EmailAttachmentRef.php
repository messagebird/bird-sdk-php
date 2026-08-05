<?php

namespace MessageBird\Wire\Model;

class EmailAttachmentRef
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
     * Filename as shown to the recipient.
     *
     * @var string|null
     */
    protected $filename;
    /**
     * Resolved MIME type at send time.
     *
     * @var string|null
     */
    protected $contentType;
    /**
     * Decoded size in bytes.
     *
     * @var int|null
     */
    protected $size;
    /**
     * True when the attachment was sent inline via a `content_id` reference in the HTML body, false for regular file attachments.
     * 
     *
     * @var bool|null
     */
    protected $inline;
    /**
     * The Content-ID set at send time, when the attachment was inline.
     *
     * @var string|null
     */
    protected $contentId;
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
     * Filename as shown to the recipient.
     *
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }
    /**
     * Filename as shown to the recipient.
     *
     * @param string|null $filename
     *
     * @return self
     */
    public function setFilename(?string $filename): self
    {
        $this->initialized['filename'] = true;
        $this->filename = $filename;
        return $this;
    }
    /**
     * Resolved MIME type at send time.
     *
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    /**
     * Resolved MIME type at send time.
     *
     * @param string|null $contentType
     *
     * @return self
     */
    public function setContentType(?string $contentType): self
    {
        $this->initialized['contentType'] = true;
        $this->contentType = $contentType;
        return $this;
    }
    /**
     * Decoded size in bytes.
     *
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }
    /**
     * Decoded size in bytes.
     *
     * @param int|null $size
     *
     * @return self
     */
    public function setSize(?int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;
        return $this;
    }
    /**
     * True when the attachment was sent inline via a `content_id` reference in the HTML body, false for regular file attachments.
     * 
     *
     * @return bool|null
     */
    public function getInline(): ?bool
    {
        return $this->inline;
    }
    /**
     * True when the attachment was sent inline via a `content_id` reference in the HTML body, false for regular file attachments.
     *
     * @param bool|null $inline
     *
     * @return self
     */
    public function setInline(?bool $inline): self
    {
        $this->initialized['inline'] = true;
        $this->inline = $inline;
        return $this;
    }
    /**
     * The Content-ID set at send time, when the attachment was inline.
     *
     * @return string|null
     */
    public function getContentId(): ?string
    {
        return $this->contentId;
    }
    /**
     * The Content-ID set at send time, when the attachment was inline.
     *
     * @param string|null $contentId
     *
     * @return self
     */
    public function setContentId(?string $contentId): self
    {
        $this->initialized['contentId'] = true;
        $this->contentId = $contentId;
        return $this;
    }
}
