<?php

namespace MessageBird\Wire\Model;

/**
 * A number your multi-partner solution onboarded, and the workspace label and storage country it takes. `data_localization_region` cannot be changed once the number is connected, so set it in this call if your customer needs one.
 */
class OrganizationWorkspaceWhatsAppNumberCreate
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
     * The WhatsApp Business Account your Embedded Signup returned, from the session info's `messaging_account_ids`.
     * 
     *
     * @var string|null
     */
    protected $waba;
    /**
     * The phone number your Embedded Signup returned, from the session info's `phone_number_id`.
     * 
     *
     * @var string|null
     */
    protected $metaPhoneNumberId;
    /**
     * The workspace's own label for the number. Leave it out and the number's own phone number stands in. A number already connected in the workspace keeps its label unless you pass one. This has no bearing on what WhatsApp displays to people the number messages.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * A country where WhatsApp can store a business phone number's message content at rest, as its two-letter ISO 3166 code.
     * 
     *
     * @var string|null
     */
    protected $dataLocalizationRegion;
    /**
     * The WhatsApp Business Account your Embedded Signup returned, from the session info's `messaging_account_ids`.
     * 
     *
     * @return string|null
     */
    public function getWaba(): ?string
    {
        return $this->waba;
    }
    /**
     * The WhatsApp Business Account your Embedded Signup returned, from the session info's `messaging_account_ids`.
     *
     * @param string|null $waba
     *
     * @return self
     */
    public function setWaba(?string $waba): self
    {
        $this->initialized['waba'] = true;
        $this->waba = $waba;
        return $this;
    }
    /**
     * The phone number your Embedded Signup returned, from the session info's `phone_number_id`.
     * 
     *
     * @return string|null
     */
    public function getMetaPhoneNumberId(): ?string
    {
        return $this->metaPhoneNumberId;
    }
    /**
     * The phone number your Embedded Signup returned, from the session info's `phone_number_id`.
     *
     * @param string|null $metaPhoneNumberId
     *
     * @return self
     */
    public function setMetaPhoneNumberId(?string $metaPhoneNumberId): self
    {
        $this->initialized['metaPhoneNumberId'] = true;
        $this->metaPhoneNumberId = $metaPhoneNumberId;
        return $this;
    }
    /**
     * The workspace's own label for the number. Leave it out and the number's own phone number stands in. A number already connected in the workspace keeps its label unless you pass one. This has no bearing on what WhatsApp displays to people the number messages.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The workspace's own label for the number. Leave it out and the number's own phone number stands in. A number already connected in the workspace keeps its label unless you pass one. This has no bearing on what WhatsApp displays to people the number messages.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * A country where WhatsApp can store a business phone number's message content at rest, as its two-letter ISO 3166 code.
     * 
     *
     * @return string|null
     */
    public function getDataLocalizationRegion(): ?string
    {
        return $this->dataLocalizationRegion;
    }
    /**
     * A country where WhatsApp can store a business phone number's message content at rest, as its two-letter ISO 3166 code.
     *
     * @param string|null $dataLocalizationRegion
     *
     * @return self
     */
    public function setDataLocalizationRegion(?string $dataLocalizationRegion): self
    {
        $this->initialized['dataLocalizationRegion'] = true;
        $this->dataLocalizationRegion = $dataLocalizationRegion;
        return $this;
    }
}
