<?php

namespace MessageBird\Wire\Model;

/**
 * The template a broadcast sends, the exact version of it the broadcast is fixed to, and which of that version's languages goes out.
 * 
 * `parameters` and `parameter_overrides` are returned on customer detail and mutation responses when the caller has email_management read permission, and omitted without that permission and from list responses. They are also omitted from staff-only responses. Broadcasts created before parameters existed return `parameters` as an empty object. `parameter_overrides` is also omitted for a broadcast that has never sent it; an empty object means language rules apply with no overrides.
 */
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
     * Complete template input map. Each value is a string, number, boolean or null and is used exactly as given, so text containing braces or code-like syntax is never evaluated. Objects and lists are not accepted. Use bird.contact.first_name in the template for contact data. Names must be bare input names outside the bird namespace. Omission retains the map unless the template ID changes, which clears it; an empty object clears it, and null is invalid. The compact map is limited to 16384 UTF-8 bytes and 128 names. Individual email parameters keep their own format.
     *
     * @var array<string, mixed>|null
     */
    protected $parameters;
    /**
     * Complete map of per-language parameter values, keyed by a BCP-47 language tag of at most 35 characters such as `es` or `pt-BR`. Each language holds only the names whose value differs for that language; a name it leaves out uses the value in `parameters`, including later changes to it. A value that is present always applies, even when it is `""`, `0`, `false`, `null` or equal to the `parameters` value. To return a name to the `parameters` value, send the map without it. Sending this map, even as `{}`, applies language rules to the broadcast: `parameters` must hold every input the default language's content, sender name, reply-to or headers use, and an input only the selected language uses may come from that language's entry instead. A broadcast that never sends it keeps the selected-language rules. Values for the default language, or for a language the broadcast does not send, are kept but not used. Omission retains the map unless the template ID changes, which clears it; an empty object removes every override, null is invalid and a language with no names is removed. Tags are stored in canonical BCP-47 form, so two spellings of one tag are refused. The compact map is limited to 16384 UTF-8 bytes, and `parameters` and every language together are limited to 128 distinct names.
     * 
     *
     * @var array<string, array<string, mixed>>|null
     */
    protected $parameterOverrides;
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
    /**
     * Complete template input map. Each value is a string, number, boolean or null and is used exactly as given, so text containing braces or code-like syntax is never evaluated. Objects and lists are not accepted. Use bird.contact.first_name in the template for contact data. Names must be bare input names outside the bird namespace. Omission retains the map unless the template ID changes, which clears it; an empty object clears it, and null is invalid. The compact map is limited to 16384 UTF-8 bytes and 128 names. Individual email parameters keep their own format.
     *
     * @return array<string, mixed>|null
     */
    public function getParameters(): ?iterable
    {
        return $this->parameters;
    }
    /**
     * Complete template input map. Each value is a string, number, boolean or null and is used exactly as given, so text containing braces or code-like syntax is never evaluated. Objects and lists are not accepted. Use bird.contact.first_name in the template for contact data. Names must be bare input names outside the bird namespace. Omission retains the map unless the template ID changes, which clears it; an empty object clears it, and null is invalid. The compact map is limited to 16384 UTF-8 bytes and 128 names. Individual email parameters keep their own format.
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
     * Complete map of per-language parameter values, keyed by a BCP-47 language tag of at most 35 characters such as `es` or `pt-BR`. Each language holds only the names whose value differs for that language; a name it leaves out uses the value in `parameters`, including later changes to it. A value that is present always applies, even when it is `""`, `0`, `false`, `null` or equal to the `parameters` value. To return a name to the `parameters` value, send the map without it. Sending this map, even as `{}`, applies language rules to the broadcast: `parameters` must hold every input the default language's content, sender name, reply-to or headers use, and an input only the selected language uses may come from that language's entry instead. A broadcast that never sends it keeps the selected-language rules. Values for the default language, or for a language the broadcast does not send, are kept but not used. Omission retains the map unless the template ID changes, which clears it; an empty object removes every override, null is invalid and a language with no names is removed. Tags are stored in canonical BCP-47 form, so two spellings of one tag are refused. The compact map is limited to 16384 UTF-8 bytes, and `parameters` and every language together are limited to 128 distinct names.
     * 
     *
     * @return array<string, array<string, mixed>>|null
     */
    public function getParameterOverrides(): ?iterable
    {
        return $this->parameterOverrides;
    }
    /**
     * Complete map of per-language parameter values, keyed by a BCP-47 language tag of at most 35 characters such as `es` or `pt-BR`. Each language holds only the names whose value differs for that language; a name it leaves out uses the value in `parameters`, including later changes to it. A value that is present always applies, even when it is `""`, `0`, `false`, `null` or equal to the `parameters` value. To return a name to the `parameters` value, send the map without it. Sending this map, even as `{}`, applies language rules to the broadcast: `parameters` must hold every input the default language's content, sender name, reply-to or headers use, and an input only the selected language uses may come from that language's entry instead. A broadcast that never sends it keeps the selected-language rules. Values for the default language, or for a language the broadcast does not send, are kept but not used. Omission retains the map unless the template ID changes, which clears it; an empty object removes every override, null is invalid and a language with no names is removed. Tags are stored in canonical BCP-47 form, so two spellings of one tag are refused. The compact map is limited to 16384 UTF-8 bytes, and `parameters` and every language together are limited to 128 distinct names.
     *
     * @param array<string, array<string, mixed>>|null $parameterOverrides
     *
     * @return self
     */
    public function setParameterOverrides(?iterable $parameterOverrides): self
    {
        $this->initialized['parameterOverrides'] = true;
        $this->parameterOverrides = $parameterOverrides;
        return $this;
    }
}
