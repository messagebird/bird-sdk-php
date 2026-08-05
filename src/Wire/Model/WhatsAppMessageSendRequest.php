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
     * The template to send. Bird selects the sender number from the template's category, so there is no sender field on this request. Templates are the only supported content type today: a request without one is rejected with a `422`.
     * 
     *
     * @var WhatsAppMessageSendRequestTemplate|null
     */
    protected $template;
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
     * The template to send. Bird selects the sender number from the template's category, so there is no sender field on this request. Templates are the only supported content type today: a request without one is rejected with a `422`.
     * 
     *
     * @return WhatsAppMessageSendRequestTemplate|null
     */
    public function getTemplate(): ?WhatsAppMessageSendRequestTemplate
    {
        return $this->template;
    }
    /**
     * The template to send. Bird selects the sender number from the template's category, so there is no sender field on this request. Templates are the only supported content type today: a request without one is rejected with a `422`.
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
