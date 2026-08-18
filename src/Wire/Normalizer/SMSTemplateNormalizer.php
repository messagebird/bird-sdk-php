<?php

namespace MessageBird\Wire\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use MessageBird\Wire\Runtime\Normalizer\CheckArray;
use MessageBird\Wire\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class SMSTemplateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\SMSTemplate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\SMSTemplate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\SMSTemplate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('language_source_required', $data) && \is_int($data['language_source_required'])) {
            $data['language_source_required'] = (bool) $data['language_source_required'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('slug', $data) && $data['slug'] !== null) {
            $object->setSlug($data['slug']);
        }
        elseif (\array_key_exists('slug', $data) && $data['slug'] === null) {
            $object->setSlug(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('description', $data) && $data['description'] !== null) {
            $object->setDescription($data['description']);
        }
        elseif (\array_key_exists('description', $data) && $data['description'] === null) {
            $object->setDescription(null);
        }
        if (\array_key_exists('scope', $data) && $data['scope'] !== null) {
            $object->setScope($data['scope']);
        }
        elseif (\array_key_exists('scope', $data) && $data['scope'] === null) {
            $object->setScope(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('category', $data) && $data['category'] !== null) {
            $object->setCategory($data['category']);
        }
        elseif (\array_key_exists('category', $data) && $data['category'] === null) {
            $object->setCategory(null);
        }
        if (\array_key_exists('body', $data) && $data['body'] !== null) {
            $object->setBody($data['body']);
        }
        elseif (\array_key_exists('body', $data) && $data['body'] === null) {
            $object->setBody(null);
        }
        if (\array_key_exists('variables', $data) && $data['variables'] !== null) {
            $values = [];
            foreach ($data['variables'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\TemplateVariable::class, 'json', $context);
            }
            $object->setVariables($values);
        }
        elseif (\array_key_exists('variables', $data) && $data['variables'] === null) {
            $object->setVariables(null);
        }
        if (\array_key_exists('default_language', $data) && $data['default_language'] !== null) {
            $object->setDefaultLanguage($data['default_language']);
        }
        elseif (\array_key_exists('default_language', $data) && $data['default_language'] === null) {
            $object->setDefaultLanguage(null);
        }
        if (\array_key_exists('available_languages', $data) && $data['available_languages'] !== null) {
            $values_1 = [];
            foreach ($data['available_languages'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setAvailableLanguages($values_1);
        }
        elseif (\array_key_exists('available_languages', $data) && $data['available_languages'] === null) {
            $object->setAvailableLanguages(null);
        }
        if (\array_key_exists('languages', $data) && $data['languages'] !== null) {
            $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['languages'] as $key => $value_2) {
                $values_2[$key] = $this->denormalizer->denormalize($value_2, \MessageBird\Wire\Model\SMSTemplateLanguageState::class, 'json', $context);
            }
            $object->setLanguages($values_2);
        }
        elseif (\array_key_exists('languages', $data) && $data['languages'] === null) {
            $object->setLanguages(null);
        }
        if (\array_key_exists('on_missing_language', $data) && $data['on_missing_language'] !== null) {
            $object->setOnMissingLanguage($data['on_missing_language']);
        }
        elseif (\array_key_exists('on_missing_language', $data) && $data['on_missing_language'] === null) {
            $object->setOnMissingLanguage(null);
        }
        if (\array_key_exists('language_source_required', $data) && $data['language_source_required'] !== null) {
            $object->setLanguageSourceRequired($data['language_source_required']);
        }
        elseif (\array_key_exists('language_source_required', $data) && $data['language_source_required'] === null) {
            $object->setLanguageSourceRequired(null);
        }
        if (\array_key_exists('draft_version_id', $data) && $data['draft_version_id'] !== null) {
            $object->setDraftVersionId($data['draft_version_id']);
        }
        elseif (\array_key_exists('draft_version_id', $data) && $data['draft_version_id'] === null) {
            $object->setDraftVersionId(null);
        }
        if (\array_key_exists('live_version_id', $data) && $data['live_version_id'] !== null) {
            $object->setLiveVersionId($data['live_version_id']);
        }
        elseif (\array_key_exists('live_version_id', $data) && $data['live_version_id'] === null) {
            $object->setLiveVersionId(null);
        }
        if (\array_key_exists('published_version_id', $data) && $data['published_version_id'] !== null) {
            $object->setPublishedVersionId($data['published_version_id']);
        }
        elseif (\array_key_exists('published_version_id', $data) && $data['published_version_id'] === null) {
            $object->setPublishedVersionId(null);
        }
        if (\array_key_exists('revision', $data) && $data['revision'] !== null) {
            $object->setRevision($data['revision']);
        }
        elseif (\array_key_exists('revision', $data) && $data['revision'] === null) {
            $object->setRevision(null);
        }
        if (\array_key_exists('last_submitted_at', $data) && $data['last_submitted_at'] !== null) {
            $object->setLastSubmittedAt(new \DateTime($data['last_submitted_at']));
        }
        elseif (\array_key_exists('last_submitted_at', $data) && $data['last_submitted_at'] === null) {
            $object->setLastSubmittedAt(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\SMSTemplate::class => false];
    }
}
