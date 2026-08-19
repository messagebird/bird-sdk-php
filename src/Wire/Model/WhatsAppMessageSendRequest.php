<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageSendRequest
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
     * The message recipient: a phone number in E.164 format (for example `+31612345678`), or the recipient's business-scoped user ID (for example `US.13491208655302741918`), which addresses a WhatsApp user whose phone number you do not have. A value that is neither returns a `422` `WhatsAppInvalidRecipient`. One-time-passcode templates require a phone number and return a `422` `WhatsAppRecipientNotSupportedForTemplate` when sent to a business-scoped user ID.
     * 
     *
     * @var string|null
     */
    protected $to;
    /**
     * The business phone number to send from, in E.164 format. Omit it for a Bird-managed template, which selects its own number from its category: setting it there returns a `422` `WhatsAppSenderNotAllowed`. Every other send, whether free-form content of any kind or a template your workspace authored, requires it, and the number must be one this workspace owns. Omitting it returns a `422` `WhatsAppSenderRequired`, and naming a number this workspace cannot send from returns a `422` `WhatsAppSenderNotFound`. Naming a number this workspace owns but that sits on a different WhatsApp Business Account than an authored template returns a `422` `WhatsAppSenderWABAMismatch`.
     * 
     *
     * @var string|null
     */
    protected $from;
    /**
     * The template to send. A Bird-managed template selects the sender number from the template's category, so `from` must be omitted. A template is the only content deliverable outside a customer service window.
     * 
     *
     * @var WhatsAppMessageSendRequestTemplate|null
     */
    protected $template;
    /**
     * Free-form text to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @var WhatsAppMessageSendRequestText|null
     */
    protected $text;
    /**
     * A free-form image to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @var WhatsAppMessageSendRequestImage|null
     */
    protected $image;
    /**
     * A free-form video to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @var WhatsAppMessageSendRequestVideo|null
     */
    protected $video;
    /**
     * Free-form audio to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @var WhatsAppMessageSendRequestAudio|null
     */
    protected $audio;
    /**
     * A free-form sticker to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @var WhatsAppMessageSendRequestSticker|null
     */
    protected $sticker;
    /**
     * A free-form document to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @var WhatsAppMessageSendRequestDocument|null
     */
    protected $document;
    /**
     * A free-form location to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @var WhatsAppMessageSendRequestLocation|null
     */
    protected $location;
    /**
     * Structured `{name, value}` labels for filtering. Tags become first-class query dimensions: filter the list endpoint by tag name. Maximum 20 tags per send. Use tags for low-cardinality dimensions (`category`, `experiment_variant`). For arbitrary structured context you do not need as a filter dimension, use `metadata` instead.
     * 
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Arbitrary JSON object stored on the message and returned on API reads. Maximum 2 KB serialized. Use metadata for per-send context like internal IDs and foreign keys. For low-cardinality filterable labels, use `tags` instead.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * The message recipient: a phone number in E.164 format (for example `+31612345678`), or the recipient's business-scoped user ID (for example `US.13491208655302741918`), which addresses a WhatsApp user whose phone number you do not have. A value that is neither returns a `422` `WhatsAppInvalidRecipient`. One-time-passcode templates require a phone number and return a `422` `WhatsAppRecipientNotSupportedForTemplate` when sent to a business-scoped user ID.
     * 
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * The message recipient: a phone number in E.164 format (for example `+31612345678`), or the recipient's business-scoped user ID (for example `US.13491208655302741918`), which addresses a WhatsApp user whose phone number you do not have. A value that is neither returns a `422` `WhatsAppInvalidRecipient`. One-time-passcode templates require a phone number and return a `422` `WhatsAppRecipientNotSupportedForTemplate` when sent to a business-scoped user ID.
     *
     * @param string|null $to
     *
     * @return self
     */
    public function setTo(?string $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * The business phone number to send from, in E.164 format. Omit it for a Bird-managed template, which selects its own number from its category: setting it there returns a `422` `WhatsAppSenderNotAllowed`. Every other send, whether free-form content of any kind or a template your workspace authored, requires it, and the number must be one this workspace owns. Omitting it returns a `422` `WhatsAppSenderRequired`, and naming a number this workspace cannot send from returns a `422` `WhatsAppSenderNotFound`. Naming a number this workspace owns but that sits on a different WhatsApp Business Account than an authored template returns a `422` `WhatsAppSenderWABAMismatch`.
     * 
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * The business phone number to send from, in E.164 format. Omit it for a Bird-managed template, which selects its own number from its category: setting it there returns a `422` `WhatsAppSenderNotAllowed`. Every other send, whether free-form content of any kind or a template your workspace authored, requires it, and the number must be one this workspace owns. Omitting it returns a `422` `WhatsAppSenderRequired`, and naming a number this workspace cannot send from returns a `422` `WhatsAppSenderNotFound`. Naming a number this workspace owns but that sits on a different WhatsApp Business Account than an authored template returns a `422` `WhatsAppSenderWABAMismatch`.
     *
     * @param string|null $from
     *
     * @return self
     */
    public function setFrom(?string $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * The template to send. A Bird-managed template selects the sender number from the template's category, so `from` must be omitted. A template is the only content deliverable outside a customer service window.
     * 
     *
     * @return WhatsAppMessageSendRequestTemplate|null
     */
    public function getTemplate(): ?WhatsAppMessageSendRequestTemplate
    {
        return $this->template;
    }
    /**
     * The template to send. A Bird-managed template selects the sender number from the template's category, so `from` must be omitted. A template is the only content deliverable outside a customer service window.
     *
     * @param WhatsAppMessageSendRequestTemplate|null $template
     *
     * @return self
     */
    public function setTemplate(?WhatsAppMessageSendRequestTemplate $template): self
    {
        $this->initialized['template'] = true;
        $this->template = $template;
        return $this;
    }
    /**
     * Free-form text to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @return WhatsAppMessageSendRequestText|null
     */
    public function getText(): ?WhatsAppMessageSendRequestText
    {
        return $this->text;
    }
    /**
     * Free-form text to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     *
     * @param WhatsAppMessageSendRequestText|null $text
     *
     * @return self
     */
    public function setText(?WhatsAppMessageSendRequestText $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
    /**
     * A free-form image to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @return WhatsAppMessageSendRequestImage|null
     */
    public function getImage(): ?WhatsAppMessageSendRequestImage
    {
        return $this->image;
    }
    /**
     * A free-form image to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     *
     * @param WhatsAppMessageSendRequestImage|null $image
     *
     * @return self
     */
    public function setImage(?WhatsAppMessageSendRequestImage $image): self
    {
        $this->initialized['image'] = true;
        $this->image = $image;
        return $this;
    }
    /**
     * A free-form video to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @return WhatsAppMessageSendRequestVideo|null
     */
    public function getVideo(): ?WhatsAppMessageSendRequestVideo
    {
        return $this->video;
    }
    /**
     * A free-form video to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     *
     * @param WhatsAppMessageSendRequestVideo|null $video
     *
     * @return self
     */
    public function setVideo(?WhatsAppMessageSendRequestVideo $video): self
    {
        $this->initialized['video'] = true;
        $this->video = $video;
        return $this;
    }
    /**
     * Free-form audio to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @return WhatsAppMessageSendRequestAudio|null
     */
    public function getAudio(): ?WhatsAppMessageSendRequestAudio
    {
        return $this->audio;
    }
    /**
     * Free-form audio to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     *
     * @param WhatsAppMessageSendRequestAudio|null $audio
     *
     * @return self
     */
    public function setAudio(?WhatsAppMessageSendRequestAudio $audio): self
    {
        $this->initialized['audio'] = true;
        $this->audio = $audio;
        return $this;
    }
    /**
     * A free-form sticker to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @return WhatsAppMessageSendRequestSticker|null
     */
    public function getSticker(): ?WhatsAppMessageSendRequestSticker
    {
        return $this->sticker;
    }
    /**
     * A free-form sticker to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     *
     * @param WhatsAppMessageSendRequestSticker|null $sticker
     *
     * @return self
     */
    public function setSticker(?WhatsAppMessageSendRequestSticker $sticker): self
    {
        $this->initialized['sticker'] = true;
        $this->sticker = $sticker;
        return $this;
    }
    /**
     * A free-form document to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @return WhatsAppMessageSendRequestDocument|null
     */
    public function getDocument(): ?WhatsAppMessageSendRequestDocument
    {
        return $this->document;
    }
    /**
     * A free-form document to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     *
     * @param WhatsAppMessageSendRequestDocument|null $document
     *
     * @return self
     */
    public function setDocument(?WhatsAppMessageSendRequestDocument $document): self
    {
        $this->initialized['document'] = true;
        $this->document = $document;
        return $this;
    }
    /**
     * A free-form location to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @return WhatsAppMessageSendRequestLocation|null
     */
    public function getLocation(): ?WhatsAppMessageSendRequestLocation
    {
        return $this->location;
    }
    /**
     * A free-form location to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. We do not track the window, so a send outside one is accepted and then fails, with `service_window_expired` on the message's `last_error`.
     *
     * @param WhatsAppMessageSendRequestLocation|null $location
     *
     * @return self
     */
    public function setLocation(?WhatsAppMessageSendRequestLocation $location): self
    {
        $this->initialized['location'] = true;
        $this->location = $location;
        return $this;
    }
    /**
     * Structured `{name, value}` labels for filtering. Tags become first-class query dimensions: filter the list endpoint by tag name. Maximum 20 tags per send. Use tags for low-cardinality dimensions (`category`, `experiment_variant`). For arbitrary structured context you do not need as a filter dimension, use `metadata` instead.
     * 
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Structured `{name, value}` labels for filtering. Tags become first-class query dimensions: filter the list endpoint by tag name. Maximum 20 tags per send. Use tags for low-cardinality dimensions (`category`, `experiment_variant`). For arbitrary structured context you do not need as a filter dimension, use `metadata` instead.
     *
     * @param list<Tag>|null $tags
     *
     * @return self
     */
    public function setTags(?array $tags): self
    {
        $this->initialized['tags'] = true;
        $this->tags = $tags;
        return $this;
    }
    /**
     * Arbitrary JSON object stored on the message and returned on API reads. Maximum 2 KB serialized. Use metadata for per-send context like internal IDs and foreign keys. For low-cardinality filterable labels, use `tags` instead.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Arbitrary JSON object stored on the message and returned on API reads. Maximum 2 KB serialized. Use metadata for per-send context like internal IDs and foreign keys. For low-cardinality filterable labels, use `tags` instead.
     *
     * @param array<string, mixed>|null $metadata
     *
     * @return self
     */
    public function setMetadata(?iterable $metadata): self
    {
        $this->initialized['metadata'] = true;
        $this->metadata = $metadata;
        return $this;
    }
}
