<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;
use MessageBird\RequestOptions;
use MessageBird\Wire\Model\EmailTemplate;

/**
 * Reusable email templates. The reads plus `update`, `delete`, `duplicate` and
 * `preview` are generated on EmailTemplatesBase; this parent adds the nested
 * `$bird->email->templates->versions` and `$bird->email->templates->broadcasts`
 * and hand-writes `create`, whose body nests the draft's initial content under
 * a language-tag map the facade generator drops.
 */
final class EmailTemplates extends EmailTemplatesBase
{
    public readonly EmailTemplatesVersions $versions;

    public readonly EmailTemplatesBroadcasts $broadcasts;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->versions = new EmailTemplatesVersions($client);
        $this->broadcasts = new EmailTemplatesBroadcasts($client);
    }

    /**
     * Create a template and its first editable draft, optionally with
     * per-language content.
     *
     * The display name defaults to `$slug`, and a slug already used in the
     * workspace is refused with a 409. Submit the draft before sending it.
     *
     * @param array<string, array<string, string>>|null $languages the draft's initial content, keyed by BCP-47 language tag, up to 25 of them
     * @param string|null $defaultLanguage the language a send falls back to; defaults to `en` unless exactly one language is supplied, in which case that one is used, so two or more languages without `en` among them have to name it here
     */
    public function create(
        string $slug,
        string $category,
        string $source,
        ?string $name = null,
        ?string $description = null,
        ?array $languages = null,
        ?string $defaultLanguage = null,
        ?string $onMissingLanguage = null,
        ?bool $languageSourceRequired = null,
        ?RequestOptions $options = null,
    ): EmailTemplate {
        $body = [
            'slug' => $slug,
            'category' => $category,
            'source' => $source,
        ];
        if ($name !== null) {
            $body['name'] = $name;
        }
        if ($description !== null) {
            $body['description'] = $description;
        }
        if ($languages !== null) {
            $body['languages'] = self::objectifyLanguageMap($languages);
        }
        if ($defaultLanguage !== null) {
            $body['default_language'] = $defaultLanguage;
        }
        if ($onMissingLanguage !== null) {
            $body['on_missing_language'] = $onMissingLanguage;
        }
        if ($languageSourceRequired !== null) {
            $body['language_source_required'] = $languageSourceRequired;
        }

        return $this->single('POST', '/v1/email/templates', EmailTemplate::class, $body, null, $options);
    }

    /**
     * `languages` and each language body under it are maps on the wire, and PHP
     * cannot tell an empty map from an empty list, so an empty one would encode
     * as a JSON array the API refuses. Cast every present level rather than only
     * an empty one: a PHP array whose keys happen to be sequential integers
     * ('0' => ...) encodes as a JSON list too.
     *
     * @param array<string, array<string, string>> $languages
     */
    private static function objectifyLanguageMap(array $languages): \stdClass
    {
        $out = new \stdClass();
        foreach ($languages as $tag => $content) {
            $out->{$tag} = (object) $content;
        }

        return $out;
    }
}
