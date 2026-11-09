<?php

namespace MessageBird\Wire\Model;

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
 */
class AMBLinkPreviews
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
}
