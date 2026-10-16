<?php

namespace MessageBird\Wire\Model;

/**
 * Replacements over the saved broadcast for this validation only. A supplied field replaces the saved value and an omitted field keeps it; nothing is saved. A changed template ID clears the saved language and parameters before supplied replacements apply, and repeating the same ID keeps them.
 */
class EmailBroadcastValidationRequest extends \ArrayObject
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
}
