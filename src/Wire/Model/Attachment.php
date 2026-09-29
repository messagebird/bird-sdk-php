<?php

namespace MessageBird\Wire\Model;

class Attachment extends \ArrayObject
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
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @var string|null
     */
    protected $id;
    /**
     * The uploaded file's name.
     *
     * @var string|null
     */
    protected $filename;
    /**
     * The file's content type, determined from its contents.
     *
     * @var string|null
     */
    protected $contentType;
    /**
     * The file's size in bytes.
     *
     * @var int|null
     */
    protected $sizeBytes;
    /**
     * A short note describing what the file shows.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Lifecycle of an attachment. `draft` is a file that has been uploaded but nothing
     * has been registered or submitted with it yet, and it is discarded at its
     * `expires_at`. `attached` means at least one registration has cited it, so it is
     * kept permanently and can no longer be deleted.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Short-lived signed URL for downloading or previewing the attachment. Valid for 24 hours from when the resource was fetched; request a fresh resource to obtain a new URL after expiry. Do not cache beyond `download_url_expires_at`. Registration authorities (10DLC and toll-free carriers) retrieve evidence via a separate, longer-lived token; this URL is not that token.
     *
     * @var string|null
     */
    protected $downloadUrl;
    /**
     * Optional signed URL for inline viewing on an isolated storage origin. Valid for one hour; fetch the attachment again to refresh it.
     *
     * @var string|null
     */
    protected $previewUrl;
    /**
     * When `download_url` expires. Both fields are always present; the server returns an error rather than omitting them.
     *
     * @var \DateTime|null
     */
    protected $downloadUrlExpiresAt;
    /**
     * When this attachment is discarded if nothing is registered or submitted with it. Null once its status is `attached`.
     *
     * @var \DateTime|null
     */
    protected $expiresAt;
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
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
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
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
     * The uploaded file's name.
     *
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }
    /**
     * The uploaded file's name.
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
     * The file's content type, determined from its contents.
     *
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    /**
     * The file's content type, determined from its contents.
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
     * The file's size in bytes.
     *
     * @return int|null
     */
    public function getSizeBytes(): ?int
    {
        return $this->sizeBytes;
    }
    /**
     * The file's size in bytes.
     *
     * @param int|null $sizeBytes
     *
     * @return self
     */
    public function setSizeBytes(?int $sizeBytes): self
    {
        $this->initialized['sizeBytes'] = true;
        $this->sizeBytes = $sizeBytes;
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
    /**
     * Lifecycle of an attachment. `draft` is a file that has been uploaded but nothing
     * has been registered or submitted with it yet, and it is discarded at its
     * `expires_at`. `attached` means at least one registration has cited it, so it is
     * kept permanently and can no longer be deleted.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Lifecycle of an attachment. `draft` is a file that has been uploaded but nothing
    has been registered or submitted with it yet, and it is discarded at its
    `expires_at`. `attached` means at least one registration has cited it, so it is
    kept permanently and can no longer be deleted.
    
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
     * Short-lived signed URL for downloading or previewing the attachment. Valid for 24 hours from when the resource was fetched; request a fresh resource to obtain a new URL after expiry. Do not cache beyond `download_url_expires_at`. Registration authorities (10DLC and toll-free carriers) retrieve evidence via a separate, longer-lived token; this URL is not that token.
     *
     * @return string|null
     */
    public function getDownloadUrl(): ?string
    {
        return $this->downloadUrl;
    }
    /**
     * Short-lived signed URL for downloading or previewing the attachment. Valid for 24 hours from when the resource was fetched; request a fresh resource to obtain a new URL after expiry. Do not cache beyond `download_url_expires_at`. Registration authorities (10DLC and toll-free carriers) retrieve evidence via a separate, longer-lived token; this URL is not that token.
     *
     * @param string|null $downloadUrl
     *
     * @return self
     */
    public function setDownloadUrl(?string $downloadUrl): self
    {
        $this->initialized['downloadUrl'] = true;
        $this->downloadUrl = $downloadUrl;
        return $this;
    }
    /**
     * Optional signed URL for inline viewing on an isolated storage origin. Valid for one hour; fetch the attachment again to refresh it.
     *
     * @return string|null
     */
    public function getPreviewUrl(): ?string
    {
        return $this->previewUrl;
    }
    /**
     * Optional signed URL for inline viewing on an isolated storage origin. Valid for one hour; fetch the attachment again to refresh it.
     *
     * @param string|null $previewUrl
     *
     * @return self
     */
    public function setPreviewUrl(?string $previewUrl): self
    {
        $this->initialized['previewUrl'] = true;
        $this->previewUrl = $previewUrl;
        return $this;
    }
    /**
     * When `download_url` expires. Both fields are always present; the server returns an error rather than omitting them.
     *
     * @return \DateTime|null
     */
    public function getDownloadUrlExpiresAt(): ?\DateTime
    {
        return $this->downloadUrlExpiresAt;
    }
    /**
     * When `download_url` expires. Both fields are always present; the server returns an error rather than omitting them.
     *
     * @param \DateTime|null $downloadUrlExpiresAt
     *
     * @return self
     */
    public function setDownloadUrlExpiresAt(?\DateTime $downloadUrlExpiresAt): self
    {
        $this->initialized['downloadUrlExpiresAt'] = true;
        $this->downloadUrlExpiresAt = $downloadUrlExpiresAt;
        return $this;
    }
    /**
     * When this attachment is discarded if nothing is registered or submitted with it. Null once its status is `attached`.
     *
     * @return \DateTime|null
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }
    /**
     * When this attachment is discarded if nothing is registered or submitted with it. Null once its status is `attached`.
     *
     * @param \DateTime|null $expiresAt
     *
     * @return self
     */
    public function setExpiresAt(?\DateTime $expiresAt): self
    {
        $this->initialized['expiresAt'] = true;
        $this->expiresAt = $expiresAt;
        return $this;
    }
}
