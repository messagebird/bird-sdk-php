<?php

namespace MessageBird\Wire\Model;

class EmailTemplatePreviewRequest
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
     * Render this content rather than the template's stored draft. It is what an editor uses to show a change as it is made, since nothing has to be saved first.
     * 
     * The content is treated exactly as a draft would be: personalization is filled in the same way, a plain-text body is derived from the HTML when you omit it, and content that could not be published is refused with the same error. `version` asks for a published version's own content, so the two cannot be combined.
     * 
     *
     * @var EmailTemplatePreviewRequestContent|null
     */
    protected $content;
    /**
     * Sample values for the variables the template uses, for this one preview only. A variable takes its value under its own name. A `bird.` value nests to match the token, so `{"bird": {"contact": {"first_name": "Ada"}}}` fills `{{ bird.contact.first_name }}`.
     * 
     * A preview is more forgiving than a send: a parameter you leave out renders as empty here rather than being rejected. `parameters` is capped at 16 KB once serialized.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $parameters;
    /**
     * Render the template the way this contact would receive it. Every `{{ bird.contact.… }}` token takes its value from the contact's record, narrowed to the attributes the template reads and filled from each property's `fallback_value` where the contact holds no value: the same values a broadcast to this contact would send.
     * 
     * Values are read as the contact stands right now, so a preview reflects an edit to their record as soon as you make it. A `bird.contact.…` value you also pass in `parameters` wins for that one attribute, so you can preview a contact with one field changed without editing them.
     * 
     *
     * @var string|null
     */
    protected $contact;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $language;
    /**
     * Preview a specific published version by its id, instead of the current draft.
     * 
     *
     * @var string|null
     */
    protected $version;
    /**
     * Render this content rather than the template's stored draft. It is what an editor uses to show a change as it is made, since nothing has to be saved first.
     * 
     * The content is treated exactly as a draft would be: personalization is filled in the same way, a plain-text body is derived from the HTML when you omit it, and content that could not be published is refused with the same error. `version` asks for a published version's own content, so the two cannot be combined.
     * 
     *
     * @return EmailTemplatePreviewRequestContent|null
     */
    public function getContent(): ?EmailTemplatePreviewRequestContent
    {
        return $this->content;
    }
    /**
    * Render this content rather than the template's stored draft. It is what an editor uses to show a change as it is made, since nothing has to be saved first.
    
    The content is treated exactly as a draft would be: personalization is filled in the same way, a plain-text body is derived from the HTML when you omit it, and content that could not be published is refused with the same error. `version` asks for a published version's own content, so the two cannot be combined.
    
    *
    * @param EmailTemplatePreviewRequestContent|null $content
    *
    * @return self
    */
    public function setContent(?EmailTemplatePreviewRequestContent $content): self
    {
        $this->initialized['content'] = true;
        $this->content = $content;
        return $this;
    }
    /**
     * Sample values for the variables the template uses, for this one preview only. A variable takes its value under its own name. A `bird.` value nests to match the token, so `{"bird": {"contact": {"first_name": "Ada"}}}` fills `{{ bird.contact.first_name }}`.
     * 
     * A preview is more forgiving than a send: a parameter you leave out renders as empty here rather than being rejected. `parameters` is capped at 16 KB once serialized.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getParameters(): ?iterable
    {
        return $this->parameters;
    }
    /**
    * Sample values for the variables the template uses, for this one preview only. A variable takes its value under its own name. A `bird.` value nests to match the token, so `{"bird": {"contact": {"first_name": "Ada"}}}` fills `{{ bird.contact.first_name }}`.
    
    A preview is more forgiving than a send: a parameter you leave out renders as empty here rather than being rejected. `parameters` is capped at 16 KB once serialized.
    
    *
    * @param array<string, mixed>|null $parameters
    *
    * @return self
    */
    public function setParameters(?iterable $parameters): self
    {
        $this->initialized['parameters'] = true;
        $this->parameters = $parameters;
        return $this;
    }
    /**
     * Render the template the way this contact would receive it. Every `{{ bird.contact.… }}` token takes its value from the contact's record, narrowed to the attributes the template reads and filled from each property's `fallback_value` where the contact holds no value: the same values a broadcast to this contact would send.
     * 
     * Values are read as the contact stands right now, so a preview reflects an edit to their record as soon as you make it. A `bird.contact.…` value you also pass in `parameters` wins for that one attribute, so you can preview a contact with one field changed without editing them.
     * 
     *
     * @return string|null
     */
    public function getContact(): ?string
    {
        return $this->contact;
    }
    /**
    * Render the template the way this contact would receive it. Every `{{ bird.contact.… }}` token takes its value from the contact's record, narrowed to the attributes the template reads and filled from each property's `fallback_value` where the contact holds no value: the same values a broadcast to this contact would send.
    
    Values are read as the contact stands right now, so a preview reflects an edit to their record as soon as you make it. A `bird.contact.…` value you also pass in `parameters` wins for that one attribute, so you can preview a contact with one field changed without editing them.
    
    *
    * @param string|null $contact
    *
    * @return self
    */
    public function setContact(?string $contact): self
    {
        $this->initialized['contact'] = true;
        $this->contact = $contact;
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
     * Preview a specific published version by its id, instead of the current draft.
     * 
     *
     * @return string|null
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }
    /**
     * Preview a specific published version by its id, instead of the current draft.
     *
     * @param string|null $version
     *
     * @return self
     */
    public function setVersion(?string $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;
        return $this;
    }
}
