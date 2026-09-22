<?php

namespace MessageBird\Wire\Model;

class EmailBroadcastTemplateCreate
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
     * @var string|null
     */
    protected $id;
    /**
     * The BCP-47 language tag that goes to the whole audience, such as `en` or `pt-BR`. It must be an exact match for a language on the template's published version, so `fr-CA` does not select `fr`. If you leave it out, the broadcast uses the version's default language, unless the template has `language_source_required` set, in which case sending fails until you select a language. Send `template.language` in an update to change or clear it later.
     * 
     *
     * @var string|null
     */
    protected $language;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The BCP-47 language tag that goes to the whole audience, such as `en` or `pt-BR`. It must be an exact match for a language on the template's published version, so `fr-CA` does not select `fr`. If you leave it out, the broadcast uses the version's default language, unless the template has `language_source_required` set, in which case sending fails until you select a language. Send `template.language` in an update to change or clear it later.
     * 
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * The BCP-47 language tag that goes to the whole audience, such as `en` or `pt-BR`. It must be an exact match for a language on the template's published version, so `fr-CA` does not select `fr`. If you leave it out, the broadcast uses the version's default language, unless the template has `language_source_required` set, in which case sending fails until you select a language. Send `template.language` in an update to change or clear it later.
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
}
