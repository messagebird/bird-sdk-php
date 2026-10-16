<?php

namespace MessageBird\Wire\Model;

/**
 * A broadcast rendered for one contact, with the inputs it used. Preview sends nothing, and its unsubscribe link is a placeholder that unsubscribes no one.
 */
class EmailBroadcastPreviewResult
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
     * The published template version and language a validation or preview checked. It does not fix the version a later send uses.
     *
     * @var EmailBroadcastResolution|null
     */
    protected $resolution;
    /**
     * @var string|null
     */
    protected $contactId;
    /**
     * The rendered subject line.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * The text of the hidden preview block that this render of `html` includes, which inbox clients can show beside the subject. It is empty when the template has no preview text, when the text renders empty, or when the rendered HTML does not include the block. A version published earlier can have preview text whose block its markup leaves out, escapes or removes; publishing the template again places the block. This value describes the rendered HTML and does not show how a provider or inbox displays it. Use it instead of reading the hidden block in `html`.
     * 
     *
     * @var string|null
     */
    protected $preheader;
    /**
     * The rendered HTML body. When `preheader` is not empty, it includes the hidden block that carries that text.
     *
     * @var string|null
     */
    protected $html;
    /**
     * The rendered plain-text body.
     *
     * @var string|null
     */
    protected $text;
    /**
     * The broadcast inputs this render used, by name, each with the string, number, boolean or null value it used. It holds the values taken from `template.parameters` or the selected language's `template.parameter_overrides` entry, and only for names the rendered content or envelope uses. Contact values are never included. A number keeps the digits it was supplied with.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $resolvedParameters;
    /**
     * Problems with the broadcast's inputs found while rendering this preview.
     *
     * @var list<EmailBroadcastParameterProblem>|null
     */
    protected $problems;
    /**
     * An opaque value for this rendered content. It changes when the published version, an input, a contact value, a fallback or the envelope changes. To send this content as a test, repeat the same inputs with this value. Do not parse it.
     *
     * @var string|null
     */
    protected $previewFingerprint;
    /**
     * The published template version and language a validation or preview checked. It does not fix the version a later send uses.
     *
     * @return EmailBroadcastResolution|null
     */
    public function getResolution(): ?EmailBroadcastResolution
    {
        return $this->resolution;
    }
    /**
     * The published template version and language a validation or preview checked. It does not fix the version a later send uses.
     *
     * @param EmailBroadcastResolution|null $resolution
     *
     * @return self
     */
    public function setResolution(?EmailBroadcastResolution $resolution): self
    {
        $this->initialized['resolution'] = true;
        $this->resolution = $resolution;
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
     * The rendered subject line.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * The rendered subject line.
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
     * The text of the hidden preview block that this render of `html` includes, which inbox clients can show beside the subject. It is empty when the template has no preview text, when the text renders empty, or when the rendered HTML does not include the block. A version published earlier can have preview text whose block its markup leaves out, escapes or removes; publishing the template again places the block. This value describes the rendered HTML and does not show how a provider or inbox displays it. Use it instead of reading the hidden block in `html`.
     * 
     *
     * @return string|null
     */
    public function getPreheader(): ?string
    {
        return $this->preheader;
    }
    /**
     * The text of the hidden preview block that this render of `html` includes, which inbox clients can show beside the subject. It is empty when the template has no preview text, when the text renders empty, or when the rendered HTML does not include the block. A version published earlier can have preview text whose block its markup leaves out, escapes or removes; publishing the template again places the block. This value describes the rendered HTML and does not show how a provider or inbox displays it. Use it instead of reading the hidden block in `html`.
     *
     * @param string|null $preheader
     *
     * @return self
     */
    public function setPreheader(?string $preheader): self
    {
        $this->initialized['preheader'] = true;
        $this->preheader = $preheader;
        return $this;
    }
    /**
     * The rendered HTML body. When `preheader` is not empty, it includes the hidden block that carries that text.
     *
     * @return string|null
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }
    /**
     * The rendered HTML body. When `preheader` is not empty, it includes the hidden block that carries that text.
     *
     * @param string|null $html
     *
     * @return self
     */
    public function setHtml(?string $html): self
    {
        $this->initialized['html'] = true;
        $this->html = $html;
        return $this;
    }
    /**
     * The rendered plain-text body.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The rendered plain-text body.
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
     * The broadcast inputs this render used, by name, each with the string, number, boolean or null value it used. It holds the values taken from `template.parameters` or the selected language's `template.parameter_overrides` entry, and only for names the rendered content or envelope uses. Contact values are never included. A number keeps the digits it was supplied with.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getResolvedParameters(): ?iterable
    {
        return $this->resolvedParameters;
    }
    /**
     * The broadcast inputs this render used, by name, each with the string, number, boolean or null value it used. It holds the values taken from `template.parameters` or the selected language's `template.parameter_overrides` entry, and only for names the rendered content or envelope uses. Contact values are never included. A number keeps the digits it was supplied with.
     *
     * @param array<string, mixed>|null $resolvedParameters
     *
     * @return self
     */
    public function setResolvedParameters(?iterable $resolvedParameters): self
    {
        $this->initialized['resolvedParameters'] = true;
        $this->resolvedParameters = $resolvedParameters;
        return $this;
    }
    /**
     * Problems with the broadcast's inputs found while rendering this preview.
     *
     * @return list<EmailBroadcastParameterProblem>|null
     */
    public function getProblems(): ?array
    {
        return $this->problems;
    }
    /**
     * Problems with the broadcast's inputs found while rendering this preview.
     *
     * @param list<EmailBroadcastParameterProblem>|null $problems
     *
     * @return self
     */
    public function setProblems(?array $problems): self
    {
        $this->initialized['problems'] = true;
        $this->problems = $problems;
        return $this;
    }
    /**
     * An opaque value for this rendered content. It changes when the published version, an input, a contact value, a fallback or the envelope changes. To send this content as a test, repeat the same inputs with this value. Do not parse it.
     *
     * @return string|null
     */
    public function getPreviewFingerprint(): ?string
    {
        return $this->previewFingerprint;
    }
    /**
     * An opaque value for this rendered content. It changes when the published version, an input, a contact value, a fallback or the envelope changes. To send this content as a test, repeat the same inputs with this value. Do not parse it.
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
