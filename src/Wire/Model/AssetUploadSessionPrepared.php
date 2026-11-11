<?php

namespace MessageBird\Wire\Model;

/**
 * An upload session owned by the workspace and the OAuth connection or API key that created it. Its metadata is frozen. The file identifies the active upload source; a signed-in person can bind their selected file when preparing the browser fallback. Completion validates the bytes against the active source. Sessions expire after one hour; receipts remain available for at least 24 hours after expiry while cleanup finishes.
 */
class AssetUploadSessionPrepared extends \ArrayObject
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
     * The session is awaiting transfer and completion.
     *
     * @var string|null
     */
    protected $state;
    /**
     * Absolute session expiry. Completion must finish before this deadline; starting it or refreshing an upload instruction does not extend it.
     *
     * @var \DateTime|null
     */
    protected $expiresAt;
    /**
     * Frozen display name for a newly published asset.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Frozen alternative text, or null when omitted.
     *
     * @var string|null
     */
    protected $altText;
    /**
     * Frozen destination folder, or null for the library root.
     *
     * @var string|null
     */
    protected $folderId;
    /**
     * Exact properties of the active source file. Calculate size and SHA-256 from its bytes before creating a session or preparing a browser-selected source. Images allow up to 5,242,880 bytes; other supported media allow up to 25,000,000 bytes.
     *
     * @var AssetUploadFile|null
     */
    protected $file;
    /**
     * Saved publication receipt, or null until completed.
     *
     * @var AssetUploadSessionResult|null
     */
    protected $result;
    /**
     * Last completion error, or null when no failure is recorded.
     *
     * @var AssetUploadSessionLastError|null
     */
    protected $lastError;
    /**
     * Available next steps for this session.
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * @var AssetUploadSessionPreparedUpload|null
     */
    protected $upload;
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
     * The session is awaiting transfer and completion.
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * The session is awaiting transfer and completion.
     *
     * @param string|null $state
     *
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
    /**
     * Absolute session expiry. Completion must finish before this deadline; starting it or refreshing an upload instruction does not extend it.
     *
     * @return \DateTime|null
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }
    /**
     * Absolute session expiry. Completion must finish before this deadline; starting it or refreshing an upload instruction does not extend it.
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
    /**
     * Frozen display name for a newly published asset.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Frozen display name for a newly published asset.
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
     * Frozen alternative text, or null when omitted.
     *
     * @return string|null
     */
    public function getAltText(): ?string
    {
        return $this->altText;
    }
    /**
     * Frozen alternative text, or null when omitted.
     *
     * @param string|null $altText
     *
     * @return self
     */
    public function setAltText(?string $altText): self
    {
        $this->initialized['altText'] = true;
        $this->altText = $altText;
        return $this;
    }
    /**
     * Frozen destination folder, or null for the library root.
     *
     * @return string|null
     */
    public function getFolderId(): ?string
    {
        return $this->folderId;
    }
    /**
     * Frozen destination folder, or null for the library root.
     *
     * @param string|null $folderId
     *
     * @return self
     */
    public function setFolderId(?string $folderId): self
    {
        $this->initialized['folderId'] = true;
        $this->folderId = $folderId;
        return $this;
    }
    /**
     * Exact properties of the active source file. Calculate size and SHA-256 from its bytes before creating a session or preparing a browser-selected source. Images allow up to 5,242,880 bytes; other supported media allow up to 25,000,000 bytes.
     *
     * @return AssetUploadFile|null
     */
    public function getFile(): ?AssetUploadFile
    {
        return $this->file;
    }
    /**
     * Exact properties of the active source file. Calculate size and SHA-256 from its bytes before creating a session or preparing a browser-selected source. Images allow up to 5,242,880 bytes; other supported media allow up to 25,000,000 bytes.
     *
     * @param AssetUploadFile|null $file
     *
     * @return self
     */
    public function setFile(?AssetUploadFile $file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;
        return $this;
    }
    /**
     * Saved publication receipt, or null until completed.
     *
     * @return AssetUploadSessionResult|null
     */
    public function getResult(): ?AssetUploadSessionResult
    {
        return $this->result;
    }
    /**
     * Saved publication receipt, or null until completed.
     *
     * @param AssetUploadSessionResult|null $result
     *
     * @return self
     */
    public function setResult(?AssetUploadSessionResult $result): self
    {
        $this->initialized['result'] = true;
        $this->result = $result;
        return $this;
    }
    /**
     * Last completion error, or null when no failure is recorded.
     *
     * @return AssetUploadSessionLastError|null
     */
    public function getLastError(): ?AssetUploadSessionLastError
    {
        return $this->lastError;
    }
    /**
     * Last completion error, or null when no failure is recorded.
     *
     * @param AssetUploadSessionLastError|null $lastError
     *
     * @return self
     */
    public function setLastError(?AssetUploadSessionLastError $lastError): self
    {
        $this->initialized['lastError'] = true;
        $this->lastError = $lastError;
        return $this;
    }
    /**
     * Available next steps for this session.
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
     * Available next steps for this session.
     *
     * @param list<NextAction>|null $next
     *
     * @return self
     */
    public function setNext(?array $next): self
    {
        $this->initialized['next'] = true;
        $this->next = $next;
        return $this;
    }
    /**
     * @return AssetUploadSessionPreparedUpload|null
     */
    public function getUpload(): ?AssetUploadSessionPreparedUpload
    {
        return $this->upload;
    }
    /**
     * @param AssetUploadSessionPreparedUpload|AssetUploadInstruction|array|null $upload
     *
     * @return self
     */
    public function setUpload($upload): self
    {
        $this->initialized['upload'] = true;
        $this->upload = \MessageBird\Core\ModelWrapper::normalize($upload, AssetUploadSessionPreparedUpload::class);
        return $this;
    }
}
