<?php

namespace MessageBird\Wire\Model;

/**
 * Per-request overrides applied to this verification only.
 */
class VerificationOptions
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
     * Passcode length for this verification. Omit to use the configured length.
     *
     * @var int|null
     */
    protected $codeLength;
    /**
     * Reorder or narrow the delivery channels for this request. List channel names in the order to try them; a channel you omit is not used for this request, and a channel not already enabled for the recipient is ignored. A list that leaves no usable channel fails the request with `422`. Omit the field to use the configured order.
     *
     * @var list<string>|null
     */
    protected $channels;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $language;
    /**
     * The website this verification's passcodes are entered on, such as `https://login.example.com`, replacing the configured origin for this verification only. Write it as `https://` and a lowercase host, with no port, path or trailing slash; an internationalized host uses its `xn--` form. Any other form is rejected with `422`, naming the form to send when there is one. Each SMS passcode then ends with a line such as `@login.example.com #123456`, which browsers read to offer the code on that site and which can add an SMS segment in languages that need Unicode encoding. Each email passcode carries an `OTP-Token` header with the code and this website, unless `autofill_top_level_origin` is set. A retry of a verification still in progress keeps the origin it started with.
     *
     * @var string|null
     */
    protected $autofillOrigin;
    /**
     * For a passcode entered in a cross-origin frame, such as a payment form embedded in a shop's checkout, the website of the top-level page in the browser tab. `autofill_origin` then names the frame. The SMS line names both sites, as in `@shop.example #123456 @pay.example`, and email passcodes carry no `OTP-Token` header, which can name only one site. It uses the same format as `autofill_origin`. The request is rejected with `422` when the value is not in that format, when no `autofill_origin` is set in the request or the configuration, or when it equals that origin. Autofill works only when this page embeds the frame directly.
     *
     * @var string|null
     */
    protected $autofillTopLevelOrigin;
    /**
     * Passcode length for this verification. Omit to use the configured length.
     *
     * @return int|null
     */
    public function getCodeLength(): ?int
    {
        return $this->codeLength;
    }
    /**
     * Passcode length for this verification. Omit to use the configured length.
     *
     * @param int|null $codeLength
     *
     * @return self
     */
    public function setCodeLength(?int $codeLength): self
    {
        $this->initialized['codeLength'] = true;
        $this->codeLength = $codeLength;
        return $this;
    }
    /**
     * Reorder or narrow the delivery channels for this request. List channel names in the order to try them; a channel you omit is not used for this request, and a channel not already enabled for the recipient is ignored. A list that leaves no usable channel fails the request with `422`. Omit the field to use the configured order.
     *
     * @return list<string>|null
     */
    public function getChannels(): ?array
    {
        return $this->channels;
    }
    /**
     * Reorder or narrow the delivery channels for this request. List channel names in the order to try them; a channel you omit is not used for this request, and a channel not already enabled for the recipient is ignored. A list that leaves no usable channel fails the request with `422`. Omit the field to use the configured order.
     *
     * @param list<string>|null $channels
     *
     * @return self
     */
    public function setChannels(?array $channels): self
    {
        $this->initialized['channels'] = true;
        $this->channels = $channels;
        return $this;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @param string|null $language
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->initialized['language'] = true;
        $this->language = $language;
        return $this;
    }
    /**
     * The website this verification's passcodes are entered on, such as `https://login.example.com`, replacing the configured origin for this verification only. Write it as `https://` and a lowercase host, with no port, path or trailing slash; an internationalized host uses its `xn--` form. Any other form is rejected with `422`, naming the form to send when there is one. Each SMS passcode then ends with a line such as `@login.example.com #123456`, which browsers read to offer the code on that site and which can add an SMS segment in languages that need Unicode encoding. Each email passcode carries an `OTP-Token` header with the code and this website, unless `autofill_top_level_origin` is set. A retry of a verification still in progress keeps the origin it started with.
     *
     * @return string|null
     */
    public function getAutofillOrigin(): ?string
    {
        return $this->autofillOrigin;
    }
    /**
     * The website this verification's passcodes are entered on, such as `https://login.example.com`, replacing the configured origin for this verification only. Write it as `https://` and a lowercase host, with no port, path or trailing slash; an internationalized host uses its `xn--` form. Any other form is rejected with `422`, naming the form to send when there is one. Each SMS passcode then ends with a line such as `@login.example.com #123456`, which browsers read to offer the code on that site and which can add an SMS segment in languages that need Unicode encoding. Each email passcode carries an `OTP-Token` header with the code and this website, unless `autofill_top_level_origin` is set. A retry of a verification still in progress keeps the origin it started with.
     *
     * @param string|null $autofillOrigin
     *
     * @return self
     */
    public function setAutofillOrigin(?string $autofillOrigin): self
    {
        $this->initialized['autofillOrigin'] = true;
        $this->autofillOrigin = $autofillOrigin;
        return $this;
    }
    /**
     * For a passcode entered in a cross-origin frame, such as a payment form embedded in a shop's checkout, the website of the top-level page in the browser tab. `autofill_origin` then names the frame. The SMS line names both sites, as in `@shop.example #123456 @pay.example`, and email passcodes carry no `OTP-Token` header, which can name only one site. It uses the same format as `autofill_origin`. The request is rejected with `422` when the value is not in that format, when no `autofill_origin` is set in the request or the configuration, or when it equals that origin. Autofill works only when this page embeds the frame directly.
     *
     * @return string|null
     */
    public function getAutofillTopLevelOrigin(): ?string
    {
        return $this->autofillTopLevelOrigin;
    }
    /**
     * For a passcode entered in a cross-origin frame, such as a payment form embedded in a shop's checkout, the website of the top-level page in the browser tab. `autofill_origin` then names the frame. The SMS line names both sites, as in `@shop.example #123456 @pay.example`, and email passcodes carry no `OTP-Token` header, which can name only one site. It uses the same format as `autofill_origin`. The request is rejected with `422` when the value is not in that format, when no `autofill_origin` is set in the request or the configuration, or when it equals that origin. Autofill works only when this page embeds the frame directly.
     *
     * @param string|null $autofillTopLevelOrigin
     *
     * @return self
     */
    public function setAutofillTopLevelOrigin(?string $autofillTopLevelOrigin): self
    {
        $this->initialized['autofillTopLevelOrigin'] = true;
        $this->autofillTopLevelOrigin = $autofillTopLevelOrigin;
        return $this;
    }
}
