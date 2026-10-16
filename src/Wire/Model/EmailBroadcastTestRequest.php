<?php

namespace MessageBird\Wire\Model;

/**
 * The inputs of a preview, repeated with its fingerprint, and the member to send its rendered content to. Send the same template, envelope and contact fields the preview used; nothing is saved to the broadcast. A user may send to their own current member email; another destination, or a machine principal, also requires members read permission. The personalization contact and the destination are independent.
 */
class EmailBroadcastTestRequest extends \ArrayObject
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
     * Replaces the template, language or parameters for this request. Null removes the template for this request.
     *
     * @var EmailBroadcastInputOverridesTemplate|null
     */
    protected $template;
    /**
     * A sender or recipient address. Accepts a plain email string (`jane@acme.com`), an RFC 5322 mailbox string with an embedded display name (`Jane Doe <jane@acme.com>`), or an object carrying the address and an optional display name. All forms can be mixed freely within one request. Responses always return the object form.
     * 
     *
     * @var mixed|null
     */
    protected $from;
    /**
     * Replaces the reply-to addresses for this request. Null removes them.
     *
     * @var list<mixed>|null
     */
    protected $replyTo;
    /**
     * Custom email headers as name and value pairs. Up to 25 of them, each value up to 998 characters.
     *
     * @var array<string, string>|null
     */
    protected $headers;
    /**
     * @var string|null
     */
    protected $contactId;
    /**
     * The email address of a current organization member with access to this workspace.
     *
     * @var string|null
     */
    protected $to;
    /**
     * The `preview_fingerprint` returned by the preview whose content you are sending.
     *
     * @var string|null
     */
    protected $previewFingerprint;
    /**
     * Replaces the template, language or parameters for this request. Null removes the template for this request.
     *
     * @return EmailBroadcastInputOverridesTemplate|null
     */
    public function getTemplate(): ?EmailBroadcastInputOverridesTemplate
    {
        return $this->template;
    }
    /**
     * Replaces the template, language or parameters for this request. Null removes the template for this request.
     *
     * @param EmailBroadcastInputOverridesTemplate|null $template
     *
     * @return self
     */
    public function setTemplate(?EmailBroadcastInputOverridesTemplate $template): self
    {
        $this->initialized['template'] = true;
        $this->template = $template;
        return $this;
    }
    /**
     * A sender or recipient address. Accepts a plain email string (`jane@acme.com`), an RFC 5322 mailbox string with an embedded display name (`Jane Doe <jane@acme.com>`), or an object carrying the address and an optional display name. All forms can be mixed freely within one request. Responses always return the object form.
     * 
     *
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }
    /**
     * A sender or recipient address. Accepts a plain email string (`jane@acme.com`), an RFC 5322 mailbox string with an embedded display name (`Jane Doe <jane@acme.com>`), or an object carrying the address and an optional display name. All forms can be mixed freely within one request. Responses always return the object form.
     *
     * @param mixed $from
     *
     * @return self
     */
    public function setFrom($from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * Replaces the reply-to addresses for this request. Null removes them.
     *
     * @return list<mixed>|null
     */
    public function getReplyTo(): ?array
    {
        return $this->replyTo;
    }
    /**
     * Replaces the reply-to addresses for this request. Null removes them.
     *
     * @param list<mixed>|null $replyTo
     *
     * @return self
     */
    public function setReplyTo(?array $replyTo): self
    {
        $this->initialized['replyTo'] = true;
        $this->replyTo = $replyTo;
        return $this;
    }
    /**
     * Custom email headers as name and value pairs. Up to 25 of them, each value up to 998 characters.
     *
     * @return array<string, string>|null
     */
    public function getHeaders(): ?iterable
    {
        return $this->headers;
    }
    /**
     * Custom email headers as name and value pairs. Up to 25 of them, each value up to 998 characters.
     *
     * @param array<string, string>|null $headers
     *
     * @return self
     */
    public function setHeaders(?iterable $headers): self
    {
        $this->initialized['headers'] = true;
        $this->headers = $headers;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getContactId(): ?string
    {
        return $this->contactId;
    }
    /**
     * @param string|null $contactId
     *
     * @return self
     */
    public function setContactId(?string $contactId): self
    {
        $this->initialized['contactId'] = true;
        $this->contactId = $contactId;
        return $this;
    }
    /**
     * The email address of a current organization member with access to this workspace.
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * The email address of a current organization member with access to this workspace.
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
     * The `preview_fingerprint` returned by the preview whose content you are sending.
     *
     * @return string|null
     */
    public function getPreviewFingerprint(): ?string
    {
        return $this->previewFingerprint;
    }
    /**
     * The `preview_fingerprint` returned by the preview whose content you are sending.
     *
     * @param string|null $previewFingerprint
     *
     * @return self
     */
    public function setPreviewFingerprint(?string $previewFingerprint): self
    {
        $this->initialized['previewFingerprint'] = true;
        $this->previewFingerprint = $previewFingerprint;
        return $this;
    }
}
