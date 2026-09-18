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
     * The message recipient: a phone number in E.164 format (for example `+31612345678`), the recipient's business-scoped user ID (for example `US.13491208655302741918`), which addresses a WhatsApp user whose phone number you do not have, or a WhatsApp group ID (for example `wag_01krdgeqcxet5s7t44vh8rt9mg`), which sends to every participant of that group. A value that is none of these returns a `422` `WhatsAppInvalidRecipient`. One-time-passcode templates require a phone number and return a `422` `WhatsAppRecipientNotSupportedForTemplate` when sent to a business-scoped user ID. A group ID naming no group this workspace holds returns a `404` `WhatsAppGroupNotFound`, and one whose group is not active returns a `409` `WhatsAppGroupNotActive`. Content a group cannot take is refused ahead of both, so a group ID paired with interactive content returns the `422` below whether or not the group exists.
     * 
     *
     * @var string|null
     */
    protected $to;
    /**
     * The business phone number to send from, in E.164 format. Omit it for a Bird-managed template, which selects its own number from its category: setting it there returns a `422` `WhatsAppSenderNotAllowed`. Every other send, whether free-form content of any kind or a template your workspace authored, requires it, and the number must be one this workspace owns. Omitting it returns a `422` `WhatsAppSenderRequired`, and naming a number this workspace cannot send from returns a `422` `WhatsAppSenderNotFound`. Naming a number this workspace owns but that sits on a different WhatsApp Business Account than an authored template returns a `422` `WhatsAppSenderWABAMismatch`. A number this workspace holds but has not finished connecting returns a `422` `WhatsAppSenderNotConnected`. Omit it for a group send too: the group sends on its own number, so naming one returns a `422` `WhatsAppSenderNotAllowed`.
     * 
     *
     * @var string|null
     */
    protected $from;
    /**
     * The template to send. A Bird-managed template selects the sender number from the template's category, so `from` must be omitted. A template is the only content deliverable outside a customer service window. A group send takes a template your workspace authored in any category but authentication: WhatsApp does not deliver an authentication template to a group, which returns a `422` `WhatsAppGroupContentNotSupported`. A Bird-managed template sends from a Bird-owned number that no group is scoped to, so addressing one to a group returns a `422` `WhatsAppInvalidRecipient`.
     * 
     *
     * @var WhatsAppMessageSendRequestTemplate|null
     */
    protected $template;
    /**
     * Free-form text to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @var WhatsAppMessageSendRequestText|null
     */
    protected $text;
    /**
     * A free-form image to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @var WhatsAppMessageSendRequestImage|null
     */
    protected $image;
    /**
     * A free-form video to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @var WhatsAppMessageSendRequestVideo|null
     */
    protected $video;
    /**
     * Free-form audio to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @var WhatsAppMessageSendRequestAudio|null
     */
    protected $audio;
    /**
     * A free-form sticker to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @var WhatsAppMessageSendRequestSticker|null
     */
    protected $sticker;
    /**
     * A free-form document to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @var WhatsAppMessageSendRequestDocument|null
     */
    protected $document;
    /**
     * A free-form location to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @var WhatsAppMessageSendRequestLocation|null
     */
    protected $location;
    /**
     * Free-form interactive content to send instead of a template: body text plus reply buttons, a menu, a link button, media cards, or a single button asking the recipient to share their location or their phone number. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`. WhatsApp does not deliver interactive content to a group, so a group recipient returns a `422` `WhatsAppGroupContentNotSupported`.
     * 
     *
     * @var WhatsAppMessageSendRequestInteractive|null
     */
    protected $interactive;
    /**
     * Contact cards to send instead of a template. Up to five: WhatsApp accepts far more, and a message that opens as one name plus a count of the rest is not a card the recipient will read.
     * 
     *
     * @var list<WhatsAppContactCardSend>|null
     */
    protected $contactCards;
    /**
     * Quote a message the contact will see above this one, the way replying in the WhatsApp client does. Name a message from the same conversation: one this workspace sent to this recipient, or received from them. Any content quotes, template or free-form. The quote is resolved before the send is accepted, so a quote WhatsApp cannot render fails this request rather than the message. An id naming no message this workspace holds, or one older than the 15 days we keep provider ids for, answers `404`; a message that never reached WhatsApp, or one from a different conversation than this send's `to` and `from`, answers `422`. Nothing is charged either way.
     * 
     *
     * @var string|null
     */
    protected $inReplyToMessageId;
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
     * The message recipient: a phone number in E.164 format (for example `+31612345678`), the recipient's business-scoped user ID (for example `US.13491208655302741918`), which addresses a WhatsApp user whose phone number you do not have, or a WhatsApp group ID (for example `wag_01krdgeqcxet5s7t44vh8rt9mg`), which sends to every participant of that group. A value that is none of these returns a `422` `WhatsAppInvalidRecipient`. One-time-passcode templates require a phone number and return a `422` `WhatsAppRecipientNotSupportedForTemplate` when sent to a business-scoped user ID. A group ID naming no group this workspace holds returns a `404` `WhatsAppGroupNotFound`, and one whose group is not active returns a `409` `WhatsAppGroupNotActive`. Content a group cannot take is refused ahead of both, so a group ID paired with interactive content returns the `422` below whether or not the group exists.
     * 
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * The message recipient: a phone number in E.164 format (for example `+31612345678`), the recipient's business-scoped user ID (for example `US.13491208655302741918`), which addresses a WhatsApp user whose phone number you do not have, or a WhatsApp group ID (for example `wag_01krdgeqcxet5s7t44vh8rt9mg`), which sends to every participant of that group. A value that is none of these returns a `422` `WhatsAppInvalidRecipient`. One-time-passcode templates require a phone number and return a `422` `WhatsAppRecipientNotSupportedForTemplate` when sent to a business-scoped user ID. A group ID naming no group this workspace holds returns a `404` `WhatsAppGroupNotFound`, and one whose group is not active returns a `409` `WhatsAppGroupNotActive`. Content a group cannot take is refused ahead of both, so a group ID paired with interactive content returns the `422` below whether or not the group exists.
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
     * The business phone number to send from, in E.164 format. Omit it for a Bird-managed template, which selects its own number from its category: setting it there returns a `422` `WhatsAppSenderNotAllowed`. Every other send, whether free-form content of any kind or a template your workspace authored, requires it, and the number must be one this workspace owns. Omitting it returns a `422` `WhatsAppSenderRequired`, and naming a number this workspace cannot send from returns a `422` `WhatsAppSenderNotFound`. Naming a number this workspace owns but that sits on a different WhatsApp Business Account than an authored template returns a `422` `WhatsAppSenderWABAMismatch`. A number this workspace holds but has not finished connecting returns a `422` `WhatsAppSenderNotConnected`. Omit it for a group send too: the group sends on its own number, so naming one returns a `422` `WhatsAppSenderNotAllowed`.
     * 
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * The business phone number to send from, in E.164 format. Omit it for a Bird-managed template, which selects its own number from its category: setting it there returns a `422` `WhatsAppSenderNotAllowed`. Every other send, whether free-form content of any kind or a template your workspace authored, requires it, and the number must be one this workspace owns. Omitting it returns a `422` `WhatsAppSenderRequired`, and naming a number this workspace cannot send from returns a `422` `WhatsAppSenderNotFound`. Naming a number this workspace owns but that sits on a different WhatsApp Business Account than an authored template returns a `422` `WhatsAppSenderWABAMismatch`. A number this workspace holds but has not finished connecting returns a `422` `WhatsAppSenderNotConnected`. Omit it for a group send too: the group sends on its own number, so naming one returns a `422` `WhatsAppSenderNotAllowed`.
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
     * The template to send. A Bird-managed template selects the sender number from the template's category, so `from` must be omitted. A template is the only content deliverable outside a customer service window. A group send takes a template your workspace authored in any category but authentication: WhatsApp does not deliver an authentication template to a group, which returns a `422` `WhatsAppGroupContentNotSupported`. A Bird-managed template sends from a Bird-owned number that no group is scoped to, so addressing one to a group returns a `422` `WhatsAppInvalidRecipient`.
     * 
     *
     * @return WhatsAppMessageSendRequestTemplate|null
     */
    public function getTemplate(): ?WhatsAppMessageSendRequestTemplate
    {
        return $this->template;
    }
    /**
     * The template to send. A Bird-managed template selects the sender number from the template's category, so `from` must be omitted. A template is the only content deliverable outside a customer service window. A group send takes a template your workspace authored in any category but authentication: WhatsApp does not deliver an authentication template to a group, which returns a `422` `WhatsAppGroupContentNotSupported`. A Bird-managed template sends from a Bird-owned number that no group is scoped to, so addressing one to a group returns a `422` `WhatsAppInvalidRecipient`.
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
     * Free-form text to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @return WhatsAppMessageSendRequestText|null
     */
    public function getText(): ?WhatsAppMessageSendRequestText
    {
        return $this->text;
    }
    /**
     * Free-form text to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
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
     * A free-form image to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @return WhatsAppMessageSendRequestImage|null
     */
    public function getImage(): ?WhatsAppMessageSendRequestImage
    {
        return $this->image;
    }
    /**
     * A free-form image to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
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
     * A free-form video to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @return WhatsAppMessageSendRequestVideo|null
     */
    public function getVideo(): ?WhatsAppMessageSendRequestVideo
    {
        return $this->video;
    }
    /**
     * A free-form video to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
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
     * Free-form audio to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @return WhatsAppMessageSendRequestAudio|null
     */
    public function getAudio(): ?WhatsAppMessageSendRequestAudio
    {
        return $this->audio;
    }
    /**
     * Free-form audio to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
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
     * A free-form sticker to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @return WhatsAppMessageSendRequestSticker|null
     */
    public function getSticker(): ?WhatsAppMessageSendRequestSticker
    {
        return $this->sticker;
    }
    /**
     * A free-form sticker to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
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
     * A free-form document to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @return WhatsAppMessageSendRequestDocument|null
     */
    public function getDocument(): ?WhatsAppMessageSendRequestDocument
    {
        return $this->document;
    }
    /**
     * A free-form document to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
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
     * A free-form location to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
     * 
     *
     * @return WhatsAppMessageSendRequestLocation|null
     */
    public function getLocation(): ?WhatsAppMessageSendRequestLocation
    {
        return $this->location;
    }
    /**
     * A free-form location to send instead of a template. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`.
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
     * Free-form interactive content to send instead of a template: body text plus reply buttons, a menu, a link button, media cards, or a single button asking the recipient to share their location or their phone number. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`. WhatsApp does not deliver interactive content to a group, so a group recipient returns a `422` `WhatsAppGroupContentNotSupported`.
     * 
     *
     * @return WhatsAppMessageSendRequestInteractive|null
     */
    public function getInteractive(): ?WhatsAppMessageSendRequestInteractive
    {
        return $this->interactive;
    }
    /**
     * Free-form interactive content to send instead of a template: body text plus reply buttons, a menu, a link button, media cards, or a single button asking the recipient to share their location or their phone number. Deliverable only inside an open 24-hour customer service window, which the contact opens by messaging or calling you and resets each time they do it again. A send into a closed window is refused with a `422` `WhatsAppServiceWindowClosed` before anything is created or charged; one whose window closes between accept and dispatch fails asynchronously, with `service_window_expired` on the message's `last_error`. WhatsApp does not deliver interactive content to a group, so a group recipient returns a `422` `WhatsAppGroupContentNotSupported`.
     *
     * @param WhatsAppMessageSendRequestInteractive|null $interactive
     *
     * @return self
     */
    public function setInteractive(?WhatsAppMessageSendRequestInteractive $interactive): self
    {
        $this->initialized['interactive'] = true;
        $this->interactive = $interactive;
        return $this;
    }
    /**
     * Contact cards to send instead of a template. Up to five: WhatsApp accepts far more, and a message that opens as one name plus a count of the rest is not a card the recipient will read.
     * 
     *
     * @return list<WhatsAppContactCardSend>|null
     */
    public function getContactCards(): ?array
    {
        return $this->contactCards;
    }
    /**
     * Contact cards to send instead of a template. Up to five: WhatsApp accepts far more, and a message that opens as one name plus a count of the rest is not a card the recipient will read.
     *
     * @param list<WhatsAppContactCardSend>|null $contactCards
     *
     * @return self
     */
    public function setContactCards(?array $contactCards): self
    {
        $this->initialized['contactCards'] = true;
        $this->contactCards = $contactCards;
        return $this;
    }
    /**
     * Quote a message the contact will see above this one, the way replying in the WhatsApp client does. Name a message from the same conversation: one this workspace sent to this recipient, or received from them. Any content quotes, template or free-form. The quote is resolved before the send is accepted, so a quote WhatsApp cannot render fails this request rather than the message. An id naming no message this workspace holds, or one older than the 15 days we keep provider ids for, answers `404`; a message that never reached WhatsApp, or one from a different conversation than this send's `to` and `from`, answers `422`. Nothing is charged either way.
     * 
     *
     * @return string|null
     */
    public function getInReplyToMessageId(): ?string
    {
        return $this->inReplyToMessageId;
    }
    /**
     * Quote a message the contact will see above this one, the way replying in the WhatsApp client does. Name a message from the same conversation: one this workspace sent to this recipient, or received from them. Any content quotes, template or free-form. The quote is resolved before the send is accepted, so a quote WhatsApp cannot render fails this request rather than the message. An id naming no message this workspace holds, or one older than the 15 days we keep provider ids for, answers `404`; a message that never reached WhatsApp, or one from a different conversation than this send's `to` and `from`, answers `422`. Nothing is charged either way.
     *
     * @param string|null $inReplyToMessageId
     *
     * @return self
     */
    public function setInReplyToMessageId(?string $inReplyToMessageId): self
    {
        $this->initialized['inReplyToMessageId'] = true;
        $this->inReplyToMessageId = $inReplyToMessageId;
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
