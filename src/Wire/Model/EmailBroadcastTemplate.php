<?php

namespace MessageBird\Wire\Model;

class EmailBroadcastTemplate extends \ArrayObject
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
     * The BCP-47 language tag selected for the whole audience, such as `en` or `pt-BR`. `null` means no language is selected, so the broadcast uses the published version's default language, unless the template has `language_source_required` set. Send `template.language` in an update to change or clear the selection.
     * 
     *
     * @var string|null
     */
    protected $language;
    /**
     * The template version this broadcast is fixed to. It is chosen when the broadcast is prepared for sending, so publishing a new version while the broadcast is going out cannot change what the rest of the recipients get. Null until the broadcast is prepared.
     * 
     *
     * @var string|null
     */
    protected $versionId;
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
     * The BCP-47 language tag selected for the whole audience, such as `en` or `pt-BR`. `null` means no language is selected, so the broadcast uses the published version's default language, unless the template has `language_source_required` set. Send `template.language` in an update to change or clear the selection.
     * 
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * The BCP-47 language tag selected for the whole audience, such as `en` or `pt-BR`. `null` means no language is selected, so the broadcast uses the published version's default language, unless the template has `language_source_required` set. Send `template.language` in an update to change or clear the selection.
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
     * The template version this broadcast is fixed to. It is chosen when the broadcast is prepared for sending, so publishing a new version while the broadcast is going out cannot change what the rest of the recipients get. Null until the broadcast is prepared.
     * 
     *
     * @return string|null
     */
    public function getVersionId(): ?string
    {
        return $this->versionId;
    }
    /**
     * The template version this broadcast is fixed to. It is chosen when the broadcast is prepared for sending, so publishing a new version while the broadcast is going out cannot change what the rest of the recipients get. Null until the broadcast is prepared.
     *
     * @param string|null $versionId
     *
     * @return self
     */
    public function setVersionId(?string $versionId): self
    {
        $this->initialized['versionId'] = true;
        $this->versionId = $versionId;
        return $this;
    }
}
