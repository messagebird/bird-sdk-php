<?php

namespace MessageBird\Wire\Model;

/**
 * One attachment. A send supplies source_url or attachment_id. attachment_id reuses a received, sent or uploaded attachment of the sending business account instead of source_url; supplying both is refused with a `422`. A read returns the attachment's name, media type and, once Apple holds it, its size. It returns attachment_id when Bird stores the attachment: received attachments with an Apple reference, and sent attachments once Apple holds them. Download the bytes with getAMBAttachmentContent by attachment_id, or with getAMBMessageAttachment by message and position.
 */
class AMBNativeAttachment
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
    protected $attachmentId;
    /**
     * HTTPS URL Bird downloads and uploads to Apple. Required on a send unless attachment_id is given. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS. Returned on reads of attachments you sent this way.
     *
     * @var string|null
     */
    protected $sourceUrl;
    /**
     * Display filename.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Media type of the attachment.
     *
     * @var string|null
     */
    protected $mimeType;
    /**
     * Attachment size in bytes. Absent until Apple holds the attachment.
     *
     * @var int|null
     */
    protected $size;
    /**
     * @return string|null
     */
    public function getAttachmentId(): ?string
    {
        return $this->attachmentId;
    }
    /**
     * @param string|null $attachmentId
     *
     * @return self
     */
    public function setAttachmentId(?string $attachmentId): self
    {
        $this->initialized['attachmentId'] = true;
        $this->attachmentId = $attachmentId;
        return $this;
    }
    /**
     * HTTPS URL Bird downloads and uploads to Apple. Required on a send unless attachment_id is given. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS. Returned on reads of attachments you sent this way.
     *
     * @return string|null
     */
    public function getSourceUrl(): ?string
    {
        return $this->sourceUrl;
    }
    /**
     * HTTPS URL Bird downloads and uploads to Apple. Required on a send unless attachment_id is given. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS. Returned on reads of attachments you sent this way.
     *
     * @param string|null $sourceUrl
     *
     * @return self
     */
    public function setSourceUrl(?string $sourceUrl): self
    {
        $this->initialized['sourceUrl'] = true;
        $this->sourceUrl = $sourceUrl;
        return $this;
    }
    /**
     * Display filename.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Display filename.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Media type of the attachment.
     *
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }
    /**
     * Media type of the attachment.
     *
     * @param string|null $mimeType
     *
     * @return self
     */
    public function setMimeType(?string $mimeType): self
    {
        $this->initialized['mimeType'] = true;
        $this->mimeType = $mimeType;
        return $this;
    }
    /**
     * Attachment size in bytes. Absent until Apple holds the attachment.
     *
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }
    /**
     * Attachment size in bytes. Absent until Apple holds the attachment.
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
}
