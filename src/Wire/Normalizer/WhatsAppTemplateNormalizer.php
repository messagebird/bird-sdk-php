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
class WhatsAppTemplateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppTemplate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppTemplate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppTemplate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('slug_editable', $data) && \is_int($data['slug_editable'])) {
            $data['slug_editable'] = (bool) $data['slug_editable'];
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
        if (\array_key_exists('slug_editable', $data) && $data['slug_editable'] !== null) {
            $object->setSlugEditable($data['slug_editable']);
        }
        elseif (\array_key_exists('slug_editable', $data) && $data['slug_editable'] === null) {
            $object->setSlugEditable(null);
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
        if (\array_key_exists('waba', $data) && $data['waba'] !== null) {
            $object->setWaba($data['waba']);
        }
        elseif (\array_key_exists('waba', $data) && $data['waba'] === null) {
            $object->setWaba(null);
        }
        if (\array_key_exists('category', $data) && $data['category'] !== null) {
            $object->setCategory($data['category']);
        }
        elseif (\array_key_exists('category', $data) && $data['category'] === null) {
            $object->setCategory(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('default_language', $data) && $data['default_language'] !== null) {
            $object->setDefaultLanguage($data['default_language']);
        }
        elseif (\array_key_exists('default_language', $data) && $data['default_language'] === null) {
            $object->setDefaultLanguage(null);
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
        if (\array_key_exists('available_languages', $data) && $data['available_languages'] !== null) {
            $values = [];
            foreach ($data['available_languages'] as $value) {
                $values[] = $value;
            }
            $object->setAvailableLanguages($values);
        }
        elseif (\array_key_exists('available_languages', $data) && $data['available_languages'] === null) {
            $object->setAvailableLanguages(null);
        }
        if (\array_key_exists('languages', $data) && $data['languages'] !== null) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['languages'] as $key => $value_1) {
                $values_1[$key] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\WhatsAppTemplateLanguageState::class, 'json', $context);
            }
            $object->setLanguages($values_1);
        }
        elseif (\array_key_exists('languages', $data) && $data['languages'] === null) {
            $object->setLanguages(null);
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
        if (\array_key_exists('pending_version_id', $data) && $data['pending_version_id'] !== null) {
            $object->setPendingVersionId($data['pending_version_id']);
        }
        elseif (\array_key_exists('pending_version_id', $data) && $data['pending_version_id'] === null) {
            $object->setPendingVersionId(null);
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
        if (\array_key_exists('next', $data) && $data['next'] !== null) {
            $values_2 = [];
            foreach ($data['next'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \MessageBird\Wire\Model\NextAction::class, 'json', $context);
            }
            $object->setNext($values_2);
        }
        elseif (\array_key_exists('next', $data) && $data['next'] === null) {
            $object->setNext(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['name'] = $data->getName();
        $dataArray['description'] = $data->getDescription();
        $dataArray['category'] = $data->getCategory();
        $dataArray['default_language'] = $data->getDefaultLanguage();
        $dataArray['language_source_required'] = $data->getLanguageSourceRequired();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppTemplate::class => false];
    }
}
