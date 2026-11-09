<?php

namespace MessageBird\Wire\Model;

/**
 * A text message: a body, an optional subject, and files placed in the body. Next to `interactive`, it is sent first as its own text bubble. Next to `rich_link`, the card takes the place of the first copy of its URL in `body`, splitting the text around it, or follows the text when `body` does not contain that URL. Later copies of that URL are removed.
 */
class AMBText
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
     * Text displayed in the message. Use one U+FFFC object replacement character per attachment to control placement.
     *
     * @var string|null
     */
    protected $body;
    /**
     * Subject displayed above the message body.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * Ordered attachments. A send supplies each one by source_url or attachment_id.
     *
     * @var list<AMBNativeAttachment>|null
     */
    protected $attachments;
    /**
     * How the links in `body` of a message you send are previewed. Each `https://`, `http://` or `www.` link is sent as its own rich link, built from the linked page's title and image. Punctuation that ends a link's sentence is dropped, so it does not arrive on its own after the card.
     * 
     * For the image, the page's `og:image` is tried first, then its largest `apple-touch-icon` or icon, then the largest image in the page. `layout` applies to every preview in the message: `icon` and `square` try the icon first, and `large` tries the images in the page before the icon.
     * 
     * Only a `text` sent on its own can set `link_previews`. A request that sets it beside `rich_link` or `interactive` is refused with `422`. Leave it out there, and links in that text become previews in the default layout.
     * 
     * A message is accepted and then ends `send_failed` when:
     * 
     * - It has more than 20 links.
     * - A page does not load over HTTPS, or has no title or usable image. Every page is fetched over HTTPS, upgrading `http://` and `www.` links.
     * 
     * Every link is checked before the first part is sent, so the customer receives none of the message. A retry after some parts were delivered checks only the parts still to send, so a link that stops loading by then fails the message after those parts arrived.
     * 
     *
     * @var AMBLinkPreviews|null
     */
    protected $linkPreviews;
    /**
     * Text displayed in the message. Use one U+FFFC object replacement character per attachment to control placement.
     *
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }
    /**
     * Text displayed in the message. Use one U+FFFC object replacement character per attachment to control placement.
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
     * Subject displayed above the message body.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * Subject displayed above the message body.
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
     * Ordered attachments. A send supplies each one by source_url or attachment_id.
     *
     * @return list<AMBNativeAttachment>|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }
    /**
     * Ordered attachments. A send supplies each one by source_url or attachment_id.
     *
     * @param list<AMBNativeAttachment>|null $attachments
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
     * How the links in `body` of a message you send are previewed. Each `https://`, `http://` or `www.` link is sent as its own rich link, built from the linked page's title and image. Punctuation that ends a link's sentence is dropped, so it does not arrive on its own after the card.
     * 
     * For the image, the page's `og:image` is tried first, then its largest `apple-touch-icon` or icon, then the largest image in the page. `layout` applies to every preview in the message: `icon` and `square` try the icon first, and `large` tries the images in the page before the icon.
     * 
     * Only a `text` sent on its own can set `link_previews`. A request that sets it beside `rich_link` or `interactive` is refused with `422`. Leave it out there, and links in that text become previews in the default layout.
     * 
     * A message is accepted and then ends `send_failed` when:
     * 
     * - It has more than 20 links.
     * - A page does not load over HTTPS, or has no title or usable image. Every page is fetched over HTTPS, upgrading `http://` and `www.` links.
     * 
     * Every link is checked before the first part is sent, so the customer receives none of the message. A retry after some parts were delivered checks only the parts still to send, so a link that stops loading by then fails the message after those parts arrived.
     * 
     *
     * @return AMBLinkPreviews|null
     */
    public function getLinkPreviews(): ?AMBLinkPreviews
    {
        return $this->linkPreviews;
    }
    /**
    * How the links in `body` of a message you send are previewed. Each `https://`, `http://` or `www.` link is sent as its own rich link, built from the linked page's title and image. Punctuation that ends a link's sentence is dropped, so it does not arrive on its own after the card.
    
    For the image, the page's `og:image` is tried first, then its largest `apple-touch-icon` or icon, then the largest image in the page. `layout` applies to every preview in the message: `icon` and `square` try the icon first, and `large` tries the images in the page before the icon.
    
    Only a `text` sent on its own can set `link_previews`. A request that sets it beside `rich_link` or `interactive` is refused with `422`. Leave it out there, and links in that text become previews in the default layout.
    
    A message is accepted and then ends `send_failed` when:
    
    - It has more than 20 links.
    - A page does not load over HTTPS, or has no title or usable image. Every page is fetched over HTTPS, upgrading `http://` and `www.` links.
    
    Every link is checked before the first part is sent, so the customer receives none of the message. A retry after some parts were delivered checks only the parts still to send, so a link that stops loading by then fails the message after those parts arrived.
    
    *
    * @param AMBLinkPreviews|null $linkPreviews
    *
    * @return self
    */
    public function setLinkPreviews(?AMBLinkPreviews $linkPreviews): self
    {
        $this->initialized['linkPreviews'] = true;
        $this->linkPreviews = $linkPreviews;
        return $this;
    }
}
