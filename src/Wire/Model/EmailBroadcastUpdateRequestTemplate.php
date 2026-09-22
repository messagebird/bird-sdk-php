<?php

namespace MessageBird\Wire\Model;

class EmailBroadcastUpdateRequestTemplate extends \ArrayObject
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
     * Move the broadcast to this template. Sending an `id` releases the version the broadcast was fixed to, so the next send fixes on the template's published version at that point; repeating the `id` the broadcast already has does the same thing, which is how you take a newly published version, and keeps the language already selected. Leave it out to keep the template and the version it is fixed to, and send a `language` on its own to change only the language. To take the template off a draft, set `template` itself to null.
     * 
     *
     * @var string|null
     */
    protected $id;
    /**
     * The BCP-47 language tag that goes to the whole audience, such as `en` or `pt-BR`. It must be an exact match for a language on the template's published version, so `fr-CA` does not select `fr`. Leave it out to keep the language already selected. If you change the template `id` in the same request, the old language is cleared with the old template. Set this to `null` to use the published version's default language, unless the template has `language_source_required` set.
     * 
     *
     * @var string|null
     */
    protected $language;
    /**
     * Move the broadcast to this template. Sending an `id` releases the version the broadcast was fixed to, so the next send fixes on the template's published version at that point; repeating the `id` the broadcast already has does the same thing, which is how you take a newly published version, and keeps the language already selected. Leave it out to keep the template and the version it is fixed to, and send a `language` on its own to change only the language. To take the template off a draft, set `template` itself to null.
     * 
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Move the broadcast to this template. Sending an `id` releases the version the broadcast was fixed to, so the next send fixes on the template's published version at that point; repeating the `id` the broadcast already has does the same thing, which is how you take a newly published version, and keeps the language already selected. Leave it out to keep the template and the version it is fixed to, and send a `language` on its own to change only the language. To take the template off a draft, set `template` itself to null.
     *
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
     * The BCP-47 language tag that goes to the whole audience, such as `en` or `pt-BR`. It must be an exact match for a language on the template's published version, so `fr-CA` does not select `fr`. Leave it out to keep the language already selected. If you change the template `id` in the same request, the old language is cleared with the old template. Set this to `null` to use the published version's default language, unless the template has `language_source_required` set.
     * 
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * The BCP-47 language tag that goes to the whole audience, such as `en` or `pt-BR`. It must be an exact match for a language on the template's published version, so `fr-CA` does not select `fr`. Leave it out to keep the language already selected. If you change the template `id` in the same request, the old language is cleared with the old template. Set this to `null` to use the published version's default language, unless the template has `language_source_required` set.
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
