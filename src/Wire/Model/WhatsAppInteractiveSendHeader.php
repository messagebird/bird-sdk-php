<?php

namespace MessageBird\Wire\Model;

class WhatsAppInteractiveSendHeader extends \ArrayObject
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
     * Which kind of header this is, and which field carries it.
     *
     * @var string|null
     */
    protected $type;
    /**
     * A single line of text above the body. Send it on a `text` header.
     *
     * @var string|null
     */
    protected $text;
    /**
     * Public `https` URL of the file to show. Send it on an `image`, `video` or `document` header. An image must be JPEG or PNG, up to 5 MB; a video, MP4 with H.264 video and AAC audio, up to 16 MB; a document, up to 100 MB, and PDF, Word, Excel, PowerPoint and plain text render reliably in the WhatsApp client while other file types are transmitted but unsupported. WhatsApp fetches it at send time, so it must still be reachable then: a signed URL has to outlive the send. We do not store or proxy the file. WhatsApp caches a fetched URL for 10 minutes and re-serves that copy for an identical URL sent again within the window; vary the URL to force a re-fetch.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * Which kind of header this is, and which field carries it.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Which kind of header this is, and which field carries it.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * A single line of text above the body. Send it on a `text` header.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * A single line of text above the body. Send it on a `text` header.
     *
     * @param string|null $text
     *
     * @return self
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
    /**
     * Public `https` URL of the file to show. Send it on an `image`, `video` or `document` header. An image must be JPEG or PNG, up to 5 MB; a video, MP4 with H.264 video and AAC audio, up to 16 MB; a document, up to 100 MB, and PDF, Word, Excel, PowerPoint and plain text render reliably in the WhatsApp client while other file types are transmitted but unsupported. WhatsApp fetches it at send time, so it must still be reachable then: a signed URL has to outlive the send. We do not store or proxy the file. WhatsApp caches a fetched URL for 10 minutes and re-serves that copy for an identical URL sent again within the window; vary the URL to force a re-fetch.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Public `https` URL of the file to show. Send it on an `image`, `video` or `document` header. An image must be JPEG or PNG, up to 5 MB; a video, MP4 with H.264 video and AAC audio, up to 16 MB; a document, up to 100 MB, and PDF, Word, Excel, PowerPoint and plain text render reliably in the WhatsApp client while other file types are transmitted but unsupported. WhatsApp fetches it at send time, so it must still be reachable then: a signed URL has to outlive the send. We do not store or proxy the file. WhatsApp caches a fetched URL for 10 minutes and re-serves that copy for an identical URL sent again within the window; vary the URL to force a re-fetch.
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
}
