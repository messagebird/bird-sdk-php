<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateButton
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
     * The button's behavior.
     * 
     * - `url`: opens a link.
     * - `quick_reply`: sends its own label back to you as an inbound message.
     * - `phone_number`: dials the number it carries.
     * - `otp`: delivers a one-time passcode, in the way its `otp_type` names.
     *   It belongs only on an authentication template, and that template
     *   takes no other button type. Once the language is submitted, WhatsApp
     *   returns this button as a `url` button whose address names the
     *   delivery type, so a submitted language reads back with `url`. It
     *   also adds a `quick_reply` button labeled `I didn't request a code`,
     *   which the preview shows too.
     * - `copy_code`: copies a coupon code to the recipient's clipboard. It
     *   belongs only on a marketing template, which takes at most one.
     * - `request_contact_info`: asks the recipient to share the phone number
     *   their WhatsApp account carries. It belongs only on a utility or
     *   marketing template, as that template's only button.
     * 
     * This is an open enum. Accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * How the recipient receives the one-time passcode: `copy_code`, `one_tap` or `zero_tap`. Present on an `otp` button.
     * This is an open enum. Accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $otpType;
    /**
     * The label WhatsApp writes on the autofill button. Present on a `one_tap` or `zero_tap` preview.
     * 
     *
     * @var string|null
     */
    protected $autofillText;
    /**
     * The Android apps that receive the passcode. Present on a `one_tap` or `zero_tap` button in a draft. Once the language is submitted, the apps appear only in the button's `url`.
     * 
     *
     * @var list<WhatsAppTemplateSupportedApp>|null
     */
    protected $supportedApps;
    /**
     * Whether you accepted WhatsApp's zero-tap terms. Present on a `zero_tap` button in a draft. WhatsApp does not return it, so a submitted language reads back without it.
     * 
     *
     * @var bool|null
     */
    protected $zeroTapTermsAccepted;
    /**
     * The button's label. Absent on an authentication template's passcode button until the language has been submitted, since WhatsApp writes that label itself. Absent on a `request_contact_info` draft for a related reason: WhatsApp fixes that label, so a draft that carried it reads back without it. Once the language is submitted, this carries the label WhatsApp wrote, which is `Share Contact Info` in every language today.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * The address the button opens, with any variable placeholder shown inline. Present on link buttons.
     *
     * @var string|null
     */
    protected $url;
    /**
     * The number the button dials. Present on dial buttons.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * Example values for this button's variables, in placeholder order. Present when the button address has variables, and on a `copy_code` button, where the single value is the sample coupon code WhatsApp reviewed.
     * 
     *
     * @var list<WhatsAppTemplateExampleParameter>|null
     */
    protected $exampleParameters;
    /**
     * The button's behavior.
     * 
     * - `url`: opens a link.
     * - `quick_reply`: sends its own label back to you as an inbound message.
     * - `phone_number`: dials the number it carries.
     * - `otp`: delivers a one-time passcode, in the way its `otp_type` names.
     *   It belongs only on an authentication template, and that template
     *   takes no other button type. Once the language is submitted, WhatsApp
     *   returns this button as a `url` button whose address names the
     *   delivery type, so a submitted language reads back with `url`. It
     *   also adds a `quick_reply` button labeled `I didn't request a code`,
     *   which the preview shows too.
     * - `copy_code`: copies a coupon code to the recipient's clipboard. It
     *   belongs only on a marketing template, which takes at most one.
     * - `request_contact_info`: asks the recipient to share the phone number
     *   their WhatsApp account carries. It belongs only on a utility or
     *   marketing template, as that template's only button.
     * 
     * This is an open enum. Accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
    * The button's behavior.
    
    - `url`: opens a link.
    - `quick_reply`: sends its own label back to you as an inbound message.
    - `phone_number`: dials the number it carries.
    - `otp`: delivers a one-time passcode, in the way its `otp_type` names.
     It belongs only on an authentication template, and that template
     takes no other button type. Once the language is submitted, WhatsApp
     returns this button as a `url` button whose address names the
     delivery type, so a submitted language reads back with `url`. It
     also adds a `quick_reply` button labeled `I didn't request a code`,
     which the preview shows too.
    - `copy_code`: copies a coupon code to the recipient's clipboard. It
     belongs only on a marketing template, which takes at most one.
    - `request_contact_info`: asks the recipient to share the phone number
     their WhatsApp account carries. It belongs only on a utility or
     marketing template, as that template's only button.
    
    This is an open enum. Accept unrecognized values.
    
    *
    * @param string|null $type
    *
    * @return self
    */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * How the recipient receives the one-time passcode: `copy_code`, `one_tap` or `zero_tap`. Present on an `otp` button.
     * This is an open enum. Accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getOtpType(): ?string
    {
        return $this->otpType;
    }
    /**
    * How the recipient receives the one-time passcode: `copy_code`, `one_tap` or `zero_tap`. Present on an `otp` button.
    This is an open enum. Accept unrecognized values.
    
    *
    * @param string|null $otpType
    *
    * @return self
    */
    public function setOtpType(?string $otpType): self
    {
        $this->initialized['otpType'] = true;
        $this->otpType = $otpType;
        return $this;
    }
    /**
     * The label WhatsApp writes on the autofill button. Present on a `one_tap` or `zero_tap` preview.
     * 
     *
     * @return string|null
     */
    public function getAutofillText(): ?string
    {
        return $this->autofillText;
    }
    /**
     * The label WhatsApp writes on the autofill button. Present on a `one_tap` or `zero_tap` preview.
     *
     * @param string|null $autofillText
     *
     * @return self
     */
    public function setAutofillText(?string $autofillText): self
    {
        $this->initialized['autofillText'] = true;
        $this->autofillText = $autofillText;
        return $this;
    }
    /**
     * The Android apps that receive the passcode. Present on a `one_tap` or `zero_tap` button in a draft. Once the language is submitted, the apps appear only in the button's `url`.
     * 
     *
     * @return list<WhatsAppTemplateSupportedApp>|null
     */
    public function getSupportedApps(): ?array
    {
        return $this->supportedApps;
    }
    /**
     * The Android apps that receive the passcode. Present on a `one_tap` or `zero_tap` button in a draft. Once the language is submitted, the apps appear only in the button's `url`.
     *
     * @param list<WhatsAppTemplateSupportedApp>|null $supportedApps
     *
     * @return self
     */
    public function setSupportedApps(?array $supportedApps): self
    {
        $this->initialized['supportedApps'] = true;
        $this->supportedApps = $supportedApps;
        return $this;
    }
    /**
     * Whether you accepted WhatsApp's zero-tap terms. Present on a `zero_tap` button in a draft. WhatsApp does not return it, so a submitted language reads back without it.
     * 
     *
     * @return bool|null
     */
    public function getZeroTapTermsAccepted(): ?bool
    {
        return $this->zeroTapTermsAccepted;
    }
    /**
     * Whether you accepted WhatsApp's zero-tap terms. Present on a `zero_tap` button in a draft. WhatsApp does not return it, so a submitted language reads back without it.
     *
     * @param bool|null $zeroTapTermsAccepted
     *
     * @return self
     */
    public function setZeroTapTermsAccepted(?bool $zeroTapTermsAccepted): self
    {
        $this->initialized['zeroTapTermsAccepted'] = true;
        $this->zeroTapTermsAccepted = $zeroTapTermsAccepted;
        return $this;
    }
    /**
     * The button's label. Absent on an authentication template's passcode button until the language has been submitted, since WhatsApp writes that label itself. Absent on a `request_contact_info` draft for a related reason: WhatsApp fixes that label, so a draft that carried it reads back without it. Once the language is submitted, this carries the label WhatsApp wrote, which is `Share Contact Info` in every language today.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The button's label. Absent on an authentication template's passcode button until the language has been submitted, since WhatsApp writes that label itself. Absent on a `request_contact_info` draft for a related reason: WhatsApp fixes that label, so a draft that carried it reads back without it. Once the language is submitted, this carries the label WhatsApp wrote, which is `Share Contact Info` in every language today.
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
     * The address the button opens, with any variable placeholder shown inline. Present on link buttons.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * The address the button opens, with any variable placeholder shown inline. Present on link buttons.
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
    /**
     * The number the button dials. Present on dial buttons.
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * The number the button dials. Present on dial buttons.
     *
     * @param string|null $phoneNumber
     *
     * @return self
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->initialized['phoneNumber'] = true;
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
    /**
     * Example values for this button's variables, in placeholder order. Present when the button address has variables, and on a `copy_code` button, where the single value is the sample coupon code WhatsApp reviewed.
     * 
     *
     * @return list<WhatsAppTemplateExampleParameter>|null
     */
    public function getExampleParameters(): ?array
    {
        return $this->exampleParameters;
    }
    /**
     * Example values for this button's variables, in placeholder order. Present when the button address has variables, and on a `copy_code` button, where the single value is the sample coupon code WhatsApp reviewed.
     *
     * @param list<WhatsAppTemplateExampleParameter>|null $exampleParameters
     *
     * @return self
     */
    public function setExampleParameters(?array $exampleParameters): self
    {
        $this->initialized['exampleParameters'] = true;
        $this->exampleParameters = $exampleParameters;
        return $this;
    }
}
