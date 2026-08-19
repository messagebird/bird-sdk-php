<?php

namespace MessageBird\Wire\Model;

class EmailAttachment
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
     * The name the recipient sees on the attachment.
     *
     * @var string|null
     */
    protected $filename;
    /**
     * Base64-encoded file bytes. The encoded value and MIME wrapping count toward the 20 MB message limit.
     *
     * @var string|null
     */
    protected $content;
    /**
     * The file's MIME type. If omitted, the API infers it from the extension in `filename`. The API rejects executable and script types based on this value.
     *
     * @var string|null
     */
    protected $contentType;
    /**
     * An RFC 2392 Content-ID for an inline file. Reference it from the HTML body with `<img src="cid:{content_id}"/>`. Omit it to send a downloadable attachment.
     *
     * @var string|null
     */
    protected $contentId;
    /**
     * The name the recipient sees on the attachment.
     *
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }
    /**
     * The name the recipient sees on the attachment.
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
     * Base64-encoded file bytes. The encoded value and MIME wrapping count toward the 20 MB message limit.
     *
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }
    /**
     * Base64-encoded file bytes. The encoded value and MIME wrapping count toward the 20 MB message limit.
     *
     * @param string|null $content
     *
     * @return self
     */
    public function setContent(?string $content): self
    {
        $this->initialized['content'] = true;
        $this->content = $content;
        return $this;
    }
    /**
     * The file's MIME type. If omitted, the API infers it from the extension in `filename`. The API rejects executable and script types based on this value.
     *
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    /**
     * The file's MIME type. If omitted, the API infers it from the extension in `filename`. The API rejects executable and script types based on this value.
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
     * An RFC 2392 Content-ID for an inline file. Reference it from the HTML body with `<img src="cid:{content_id}"/>`. Omit it to send a downloadable attachment.
     *
     * @return string|null
     */
    public function getContentId(): ?string
    {
        return $this->contentId;
    }
    /**
     * An RFC 2392 Content-ID for an inline file. Reference it from the HTML body with `<img src="cid:{content_id}"/>`. Omit it to send a downloadable attachment.
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
