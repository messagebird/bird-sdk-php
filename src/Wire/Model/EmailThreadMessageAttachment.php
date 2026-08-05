<?php

namespace MessageBird\Wire\Model;

class EmailThreadMessageAttachment
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
     * Attachment ID, used to download the attachment bytes.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Original filename, or null when the attachment had none.
     *
     * @var string|null
     */
    protected $filename;
    /**
     * MIME content type, or null when it could not be determined.
     *
     * @var string|null
     */
    protected $contentType;
    /**
     * Attachment size in bytes.
     *
     * @var int|null
     */
    protected $size;
    /**
     * Attachment ID, used to download the attachment bytes.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Attachment ID, used to download the attachment bytes.
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
     * Original filename, or null when the attachment had none.
     *
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }
    /**
     * Original filename, or null when the attachment had none.
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
     * MIME content type, or null when it could not be determined.
     *
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    /**
     * MIME content type, or null when it could not be determined.
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
     * Attachment size in bytes.
     *
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }
    /**
     * Attachment size in bytes.
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
