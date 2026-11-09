<?php

namespace MessageBird\Wire\Model;

class AMBNativeRichLinkImage
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
     * HTTPS URL of a PNG, JPEG, GIF or WebP preview image of up to 5 MiB and 6 megapixels, or 3 megapixels for a 16-bit PNG. It is fetched when the message is sent, converted to PNG and shrunk to Apple's 200 kB limit. Without `layout`, a PNG of 200 kB or less goes to Apple unchanged, so the pixel limit does not apply to it. An image over these limits, or one that cannot be converted, ends the message `send_failed`. It is checked before the first part and again on a retry, so an image that changes by then fails the message after the earlier parts arrived. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
     *
     * @var string|null
     */
    protected $sourceUrl;
    /**
     * Media type sent to Apple, which accepts only PNG. Defaults to image/png.
     *
     * @var string|null
     */
    protected $mimeType = 'image/png';
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
     * HTTPS URL of a PNG, JPEG, GIF or WebP preview image of up to 5 MiB and 6 megapixels, or 3 megapixels for a 16-bit PNG. It is fetched when the message is sent, converted to PNG and shrunk to Apple's 200 kB limit. Without `layout`, a PNG of 200 kB or less goes to Apple unchanged, so the pixel limit does not apply to it. An image over these limits, or one that cannot be converted, ends the message `send_failed`. It is checked before the first part and again on a retry, so an image that changes by then fails the message after the earlier parts arrived. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
     *
     * @return string|null
     */
    public function getSourceUrl(): ?string
    {
        return $this->sourceUrl;
    }
    /**
     * HTTPS URL of a PNG, JPEG, GIF or WebP preview image of up to 5 MiB and 6 megapixels, or 3 megapixels for a 16-bit PNG. It is fetched when the message is sent, converted to PNG and shrunk to Apple's 200 kB limit. Without `layout`, a PNG of 200 kB or less goes to Apple unchanged, so the pixel limit does not apply to it. An image over these limits, or one that cannot be converted, ends the message `send_failed`. It is checked before the first part and again on a retry, so an image that changes by then fails the message after the earlier parts arrived. A non-HTTPS URL is refused with a `422` `AMBEndpointNotHTTPS`. In a template it may contain `{{ }}` placeholders; the rendered value must be HTTPS.
     *
     * @param string|null $sourceUrl
     *
     * @return self
     */
    public function setSourceUrl(?string $sourceUrl): self
    {
        $this->initialized['sourceUrl'] = true;
        $this->sourceUrl = $sourceUrl;
        return $this;
    }
    /**
     * Media type sent to Apple, which accepts only PNG. Defaults to image/png.
     *
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }
    /**
     * Media type sent to Apple, which accepts only PNG. Defaults to image/png.
     *
     * @param string|null $mimeType
     *
     * @return self
     */
    public function setMimeType(?string $mimeType): self
    {
        $this->initialized['mimeType'] = true;
        $this->mimeType = $mimeType;
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
}
