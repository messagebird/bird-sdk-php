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
     * The file's bytes, base64-encoded. What you send here counts toward the message's 20 MB limit after encoding and MIME wrapping, not at its raw size.
     *
     * @var string|null
     */
    protected $content;
    /**
     * The file's MIME type. Leave it out and we work it out from the extension on `filename`. This is what we check against the list of executable and script types we refuse.
     *
     * @var string|null
     */
    protected $contentType;
    /**
     * An RFC 2392 Content-ID for the file. Set it and the attachment is shown inline, so your HTML body can point at it with `<img src="cid:{content_id}"/>`. Leave it out and the file arrives as an ordinary attachment the recipient downloads.
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
     * The file's bytes, base64-encoded. What you send here counts toward the message's 20 MB limit after encoding and MIME wrapping, not at its raw size.
     *
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }
    /**
     * The file's bytes, base64-encoded. What you send here counts toward the message's 20 MB limit after encoding and MIME wrapping, not at its raw size.
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
     * The file's MIME type. Leave it out and we work it out from the extension on `filename`. This is what we check against the list of executable and script types we refuse.
     *
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    /**
     * The file's MIME type. Leave it out and we work it out from the extension on `filename`. This is what we check against the list of executable and script types we refuse.
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
     * An RFC 2392 Content-ID for the file. Set it and the attachment is shown inline, so your HTML body can point at it with `<img src="cid:{content_id}"/>`. Leave it out and the file arrives as an ordinary attachment the recipient downloads.
     *
     * @return string|null
     */
    public function getContentId(): ?string
    {
        return $this->contentId;
    }
    /**
     * An RFC 2392 Content-ID for the file. Set it and the attachment is shown inline, so your HTML body can point at it with `<img src="cid:{content_id}"/>`. Leave it out and the file arrives as an ordinary attachment the recipient downloads.
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
