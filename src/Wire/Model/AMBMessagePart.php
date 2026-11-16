<?php

namespace MessageBird\Wire\Model;

/**
 * One part of the split an outbound message was sent in. `title`, `image_url` and `layout` record what a card showed, as measured when the part was sent, not what a request chose. They are absent when an earlier attempt of a retried send sent the part.
 */
class AMBMessagePart
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
     * What one part of an outbound message was:
     * 
     * - `text`: Part of the message's text, with the attachments placed in it.
     * - `link_preview`: A link from the text, sent as a preview Bird built from the page.
     * - `rich_link`: The message's own `rich_link`.
     * - `interactive`: The message's own `interactive`.
     * 
     *
     * @var string|null
     */
    protected $kind;
    /**
     * The text this part sent. U+FFFC marks an attachment's place, as in `text.body`.
     *
     * @var string|null
     */
    protected $body;
    /**
     * The message's subject, on the part that had it.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * Positions in `text.attachments` of the attachments this part sent.
     *
     * @var list<int>|null
     */
    protected $attachments;
    /**
     * The link a `link_preview` part previewed, as Bird sent it.
     *
     * @var string|null
     */
    protected $url;
    /**
     * The title a `link_preview` part showed, read from the page when the part was sent. A title longer than 512 bytes is cut to that length. Absent when an earlier attempt of a retried send sent the part.
     *
     * @var string|null
     */
    protected $title;
    /**
     * The page image a `link_preview` part showed, as the address it was fetched from when the part was sent. Absent when the address is longer than 2,048 bytes, and when an earlier attempt of a retried send sent the part.
     *
     * @var string|null
     */
    protected $imageUrl;
    /**
     * How Apple displays a rich link's image. Apple picks the layout from the image's shape and width, so the image is resized or cropped to produce the one you choose:
     * 
     * - `icon` shows a small image beside the title. The image is scaled to under 150 px wide. Use it for logos.
     * - `square` shows a square image. The image is cropped to a square and sized to 240 px, or as small as 150 px when it needs to fit Apple's 200 kB limit.
     * - `large` shows a wide image. A square or portrait image is cropped to a 2:1 rectangle, and a landscape image keeps its shape.
     * 
     * `square` enlarges an image whose shorter side is under 240 px, and `large` one narrower than 240 px, which can blur it. Omit `layout` to keep the image's own shape, so Apple picks the layout from its shape and width.
     * 
     *
     * @var string|null
     */
    protected $layout;
    /**
     * Whether Bird saw Apple accept this part. After a failed send, the part that failed and every part after it are `false`, but a `false` part may still have arrived if Apple's answer was lost, so do not resend it on that alone.
     *
     * @var bool|null
     */
    protected $sent;
    /**
     * What one part of an outbound message was:
     * 
     * - `text`: Part of the message's text, with the attachments placed in it.
     * - `link_preview`: A link from the text, sent as a preview Bird built from the page.
     * - `rich_link`: The message's own `rich_link`.
     * - `interactive`: The message's own `interactive`.
     * 
     *
     * @return string|null
     */
    public function getKind(): ?string
    {
        return $this->kind;
    }
    /**
    * What one part of an outbound message was:
    
    - `text`: Part of the message's text, with the attachments placed in it.
    - `link_preview`: A link from the text, sent as a preview Bird built from the page.
    - `rich_link`: The message's own `rich_link`.
    - `interactive`: The message's own `interactive`.
    
    *
    * @param string|null $kind
    *
    * @return self
    */
    public function setKind(?string $kind): self
    {
        $this->initialized['kind'] = true;
        $this->kind = $kind;
        return $this;
    }
    /**
     * The text this part sent. U+FFFC marks an attachment's place, as in `text.body`.
     *
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }
    /**
     * The text this part sent. U+FFFC marks an attachment's place, as in `text.body`.
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
     * The message's subject, on the part that had it.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * The message's subject, on the part that had it.
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
     * Positions in `text.attachments` of the attachments this part sent.
     *
     * @return list<int>|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }
    /**
     * Positions in `text.attachments` of the attachments this part sent.
     *
     * @param list<int>|null $attachments
     *
     * @return self
     */
    public function setAttachments(?array $attachments): self
    {
        $this->initialized['attachments'] = true;
        $this->attachments = $attachments;
        return $this;
    }
    /**
     * The link a `link_preview` part previewed, as Bird sent it.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * The link a `link_preview` part previewed, as Bird sent it.
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
    /**
     * The title a `link_preview` part showed, read from the page when the part was sent. A title longer than 512 bytes is cut to that length. Absent when an earlier attempt of a retried send sent the part.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * The title a `link_preview` part showed, read from the page when the part was sent. A title longer than 512 bytes is cut to that length. Absent when an earlier attempt of a retried send sent the part.
     *
     * @param string|null $title
     *
     * @return self
     */
    public function setTitle(?string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;
        return $this;
    }
    /**
     * The page image a `link_preview` part showed, as the address it was fetched from when the part was sent. Absent when the address is longer than 2,048 bytes, and when an earlier attempt of a retried send sent the part.
     *
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }
    /**
     * The page image a `link_preview` part showed, as the address it was fetched from when the part was sent. Absent when the address is longer than 2,048 bytes, and when an earlier attempt of a retried send sent the part.
     *
     * @param string|null $imageUrl
     *
     * @return self
     */
    public function setImageUrl(?string $imageUrl): self
    {
        $this->initialized['imageUrl'] = true;
        $this->imageUrl = $imageUrl;
        return $this;
    }
    /**
     * How Apple displays a rich link's image. Apple picks the layout from the image's shape and width, so the image is resized or cropped to produce the one you choose:
     * 
     * - `icon` shows a small image beside the title. The image is scaled to under 150 px wide. Use it for logos.
     * - `square` shows a square image. The image is cropped to a square and sized to 240 px, or as small as 150 px when it needs to fit Apple's 200 kB limit.
     * - `large` shows a wide image. A square or portrait image is cropped to a 2:1 rectangle, and a landscape image keeps its shape.
     * 
     * `square` enlarges an image whose shorter side is under 240 px, and `large` one narrower than 240 px, which can blur it. Omit `layout` to keep the image's own shape, so Apple picks the layout from its shape and width.
     * 
     *
     * @return string|null
     */
    public function getLayout(): ?string
    {
        return $this->layout;
    }
    /**
    * How Apple displays a rich link's image. Apple picks the layout from the image's shape and width, so the image is resized or cropped to produce the one you choose:
    
    - `icon` shows a small image beside the title. The image is scaled to under 150 px wide. Use it for logos.
    - `square` shows a square image. The image is cropped to a square and sized to 240 px, or as small as 150 px when it needs to fit Apple's 200 kB limit.
    - `large` shows a wide image. A square or portrait image is cropped to a 2:1 rectangle, and a landscape image keeps its shape.
    
    `square` enlarges an image whose shorter side is under 240 px, and `large` one narrower than 240 px, which can blur it. Omit `layout` to keep the image's own shape, so Apple picks the layout from its shape and width.
    
    *
    * @param string|null $layout
    *
    * @return self
    */
    public function setLayout(?string $layout): self
    {
        $this->initialized['layout'] = true;
        $this->layout = $layout;
        return $this;
    }
    /**
     * Whether Bird saw Apple accept this part. After a failed send, the part that failed and every part after it are `false`, but a `false` part may still have arrived if Apple's answer was lost, so do not resend it on that alone.
     *
     * @return bool|null
     */
    public function getSent(): ?bool
    {
        return $this->sent;
    }
    /**
     * Whether Bird saw Apple accept this part. After a failed send, the part that failed and every part after it are `false`, but a `false` part may still have arrived if Apple's answer was lost, so do not resend it on that alone.
     *
     * @param bool|null $sent
     *
     * @return self
     */
    public function setSent(?bool $sent): self
    {
        $this->initialized['sent'] = true;
        $this->sent = $sent;
        return $this;
    }
}
