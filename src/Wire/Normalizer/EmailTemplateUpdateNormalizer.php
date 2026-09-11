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
class EmailTemplateUpdateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailTemplateUpdate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailTemplateUpdate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailTemplateUpdate();
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
        if (\array_key_exists('revision', $data) && $data['revision'] !== null) {
            $object->setRevision($data['revision']);
        }
        elseif (\array_key_exists('revision', $data) && $data['revision'] === null) {
            $object->setRevision(null);
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
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['revision'] = $data->getRevision();
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['name'] = $data->getName();
        }
        if ($data->isInitialized('description')) {
            $dataArray['description'] = $data->getDescription();
        }
        if ($data->isInitialized('defaultLanguage') && null !== $data->getDefaultLanguage()) {
            $dataArray['default_language'] = $data->getDefaultLanguage();
        }
        if ($data->isInitialized('onMissingLanguage') && null !== $data->getOnMissingLanguage()) {
            $dataArray['on_missing_language'] = $data->getOnMissingLanguage();
        }
        if ($data->isInitialized('languageSourceRequired') && null !== $data->getLanguageSourceRequired()) {
            $dataArray['language_source_required'] = $data->getLanguageSourceRequired();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailTemplateUpdate::class => false];
    }
}
