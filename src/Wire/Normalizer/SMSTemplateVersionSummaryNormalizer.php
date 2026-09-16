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
class SMSTemplateVersionSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\SMSTemplateVersionSummary::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\SMSTemplateVersionSummary::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\SMSTemplateVersionSummary();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('template_id', $data) && $data['template_id'] !== null) {
            $object->setTemplateId($data['template_id']);
        }
        elseif (\array_key_exists('template_id', $data) && $data['template_id'] === null) {
            $object->setTemplateId(null);
        }
        if (\array_key_exists('version_number', $data) && $data['version_number'] !== null) {
            $object->setVersionNumber($data['version_number']);
        }
        elseif (\array_key_exists('version_number', $data) && $data['version_number'] === null) {
            $object->setVersionNumber(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('revision', $data) && $data['revision'] !== null) {
            $object->setRevision($data['revision']);
        }
        elseif (\array_key_exists('revision', $data) && $data['revision'] === null) {
            $object->setRevision(null);
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
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('published_at', $data) && $data['published_at'] !== null) {
            $object->setPublishedAt(new \DateTime($data['published_at']));
        }
        elseif (\array_key_exists('published_at', $data) && $data['published_at'] === null) {
            $object->setPublishedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['template_id'] = $data->getTemplateId();
        $dataArray['default_language'] = $data->getDefaultLanguage();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\SMSTemplateVersionSummary::class => false];
    }
}
