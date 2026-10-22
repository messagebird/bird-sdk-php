<?php

namespace MessageBird\Wire\Model;

/**
 * One button, as written to a draft.
 */
class WhatsAppTemplateButtonWrite
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
     * A button's behavior.
     * 
     * - `url`: opens a link.
     * - `quick_reply`: sends its own label back to you as an inbound message.
     * - `phone_number`: dials the number it carries.
     * - `otp`: copies a one-time passcode. It belongs only on an authentication
     *   template, and that template takes no other button type.
     * - `copy_code`: copies a coupon code to the recipient's clipboard. It belongs
     *   only on a marketing template, which takes at most one.
     * - `request_contact_info`: asks the recipient to share the phone number their
     *   WhatsApp account carries. It belongs only on a utility or marketing
     *   template, as that template's only button.
     * 
     * Any other value is rejected.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * How the recipient receives the passcode. Send it only on an `otp` button.
     *
     * @var string|null
     */
    protected $otpType;
    /**
     * The button's label, which each button type treats differently.
     * 
     * - `url`, `quick_reply`, `phone_number`: your own label. Required.
     * - `otp`: omit it. WhatsApp writes this label itself and reveals it only
     *   once the language has been submitted.
     * - `copy_code`: omit it. WhatsApp fixes this label and does not let you
     *   change it.
     * - `request_contact_info`: omit it. WhatsApp fixes this label too and
     *   writes `Share Contact Info`, which is also what a submitted button
     *   reads back as, so a read button can be written back unchanged.
     * 
     * A draft takes any label, so this may be empty on a draft and is required
     * only before submission. A label a fixed-label button may not carry is
     * refused rather than silently replaced: the submit comes back as
     * `valid: false` with an `errors` entry naming this field, in every
     * language.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * The address a `url` button opens. An address with a placeholder is personalized per recipient, and one without is the same for everyone. At most one variable, and it must sit at the end of the address, written as `{{1}}`. A button address is numbered this way even on a template whose text uses named variables. A variable needs its example value in `example_parameters`. May be empty on a draft; required before submission.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * The number a `phone_number` button dials, in international format. Some countries publish numbers with a leading zero after the country calling code; WhatsApp strips that zero, so give a number that dials without it. May be empty on a draft; required before submission.
     * 
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * The value that fills the variable in `url`, which WhatsApp reviews in the filled address. Send only the value, so a `{{1}}` standing for an order number takes `A-4192`. Required whenever `url` carries a variable. Also required on a `copy_code` button as one `text` entry. The entry carries a sample coupon code of at most 20 characters for WhatsApp to review. Each recipient copies the code you provide when sending the message.
     * 
     *
     * @var list<WhatsAppTemplateExampleParameterWrite>|null
     */
    protected $exampleParameters;
    /**
     * A button's behavior.
     * 
     * - `url`: opens a link.
     * - `quick_reply`: sends its own label back to you as an inbound message.
     * - `phone_number`: dials the number it carries.
     * - `otp`: copies a one-time passcode. It belongs only on an authentication
     *   template, and that template takes no other button type.
     * - `copy_code`: copies a coupon code to the recipient's clipboard. It belongs
     *   only on a marketing template, which takes at most one.
     * - `request_contact_info`: asks the recipient to share the phone number their
     *   WhatsApp account carries. It belongs only on a utility or marketing
     *   template, as that template's only button.
     * 
     * Any other value is rejected.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
    * A button's behavior.
    
    - `url`: opens a link.
    - `quick_reply`: sends its own label back to you as an inbound message.
    - `phone_number`: dials the number it carries.
    - `otp`: copies a one-time passcode. It belongs only on an authentication
     template, and that template takes no other button type.
    - `copy_code`: copies a coupon code to the recipient's clipboard. It belongs
     only on a marketing template, which takes at most one.
    - `request_contact_info`: asks the recipient to share the phone number their
     WhatsApp account carries. It belongs only on a utility or marketing
     template, as that template's only button.
    
    Any other value is rejected.
    
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
     * How the recipient receives the passcode. Send it only on an `otp` button.
     *
     * @return string|null
     */
    public function getOtpType(): ?string
    {
        return $this->otpType;
    }
    /**
     * How the recipient receives the passcode. Send it only on an `otp` button.
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
     * The button's label, which each button type treats differently.
     * 
     * - `url`, `quick_reply`, `phone_number`: your own label. Required.
     * - `otp`: omit it. WhatsApp writes this label itself and reveals it only
     *   once the language has been submitted.
     * - `copy_code`: omit it. WhatsApp fixes this label and does not let you
     *   change it.
     * - `request_contact_info`: omit it. WhatsApp fixes this label too and
     *   writes `Share Contact Info`, which is also what a submitted button
     *   reads back as, so a read button can be written back unchanged.
     * 
     * A draft takes any label, so this may be empty on a draft and is required
     * only before submission. A label a fixed-label button may not carry is
     * refused rather than silently replaced: the submit comes back as
     * `valid: false` with an `errors` entry naming this field, in every
     * language.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
    * The button's label, which each button type treats differently.
    
    - `url`, `quick_reply`, `phone_number`: your own label. Required.
    - `otp`: omit it. WhatsApp writes this label itself and reveals it only
     once the language has been submitted.
    - `copy_code`: omit it. WhatsApp fixes this label and does not let you
     change it.
    - `request_contact_info`: omit it. WhatsApp fixes this label too and
     writes `Share Contact Info`, which is also what a submitted button
     reads back as, so a read button can be written back unchanged.
    
    A draft takes any label, so this may be empty on a draft and is required
    only before submission. A label a fixed-label button may not carry is
    refused rather than silently replaced: the submit comes back as
    `valid: false` with an `errors` entry naming this field, in every
    language.
    
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
     * The address a `url` button opens. An address with a placeholder is personalized per recipient, and one without is the same for everyone. At most one variable, and it must sit at the end of the address, written as `{{1}}`. A button address is numbered this way even on a template whose text uses named variables. A variable needs its example value in `example_parameters`. May be empty on a draft; required before submission.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * The address a `url` button opens. An address with a placeholder is personalized per recipient, and one without is the same for everyone. At most one variable, and it must sit at the end of the address, written as `{{1}}`. A button address is numbered this way even on a template whose text uses named variables. A variable needs its example value in `example_parameters`. May be empty on a draft; required before submission.
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
     * The number a `phone_number` button dials, in international format. Some countries publish numbers with a leading zero after the country calling code; WhatsApp strips that zero, so give a number that dials without it. May be empty on a draft; required before submission.
     * 
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * The number a `phone_number` button dials, in international format. Some countries publish numbers with a leading zero after the country calling code; WhatsApp strips that zero, so give a number that dials without it. May be empty on a draft; required before submission.
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
     * The value that fills the variable in `url`, which WhatsApp reviews in the filled address. Send only the value, so a `{{1}}` standing for an order number takes `A-4192`. Required whenever `url` carries a variable. Also required on a `copy_code` button as one `text` entry. The entry carries a sample coupon code of at most 20 characters for WhatsApp to review. Each recipient copies the code you provide when sending the message.
     * 
     *
     * @return list<WhatsAppTemplateExampleParameterWrite>|null
     */
    public function getExampleParameters(): ?array
    {
        return $this->exampleParameters;
    }
    /**
     * The value that fills the variable in `url`, which WhatsApp reviews in the filled address. Send only the value, so a `{{1}}` standing for an order number takes `A-4192`. Required whenever `url` carries a variable. Also required on a `copy_code` button as one `text` entry. The entry carries a sample coupon code of at most 20 characters for WhatsApp to review. Each recipient copies the code you provide when sending the message.
     *
     * @param list<WhatsAppTemplateExampleParameterWrite>|null $exampleParameters
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
