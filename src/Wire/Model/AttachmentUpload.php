<?php

namespace MessageBird\Wire\Model;

/**
 * The file to upload, sent as a `multipart/form-data` body.
 */
class AttachmentUpload
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
     * The file to attach. PNG, JPEG, or PDF, up to 10 MB. The file's contents determine its type; a declared content type is ignored.
     *
     * @var string|null
     */
    protected $file;
    /**
     * A short note describing what the file shows.
     *
     * @var string|null
     */
    protected $description;
    /**
     * The file to attach. PNG, JPEG, or PDF, up to 10 MB. The file's contents determine its type; a declared content type is ignored.
     *
     * @return string|null
     */
    public function getFile(): ?string
    {
        return $this->file;
    }
    /**
     * The file to attach. PNG, JPEG, or PDF, up to 10 MB. The file's contents determine its type; a declared content type is ignored.
     *
     * @param string|null $file
     *
     * @return self
     */
    public function setFile(?string $file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;
        return $this;
    }
    /**
     * A short note describing what the file shows.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * A short note describing what the file shows.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
}
