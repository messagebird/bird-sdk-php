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
class EmailTemplateLanguageSavedNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailTemplateLanguageSaved::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailTemplateLanguageSaved::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailTemplateLanguageSaved();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('language', $data) && $data['language'] !== null) {
            $object->setLanguage($data['language']);
        }
        elseif (\array_key_exists('language', $data) && $data['language'] === null) {
            $object->setLanguage(null);
        }
        if (\array_key_exists('revision', $data) && $data['revision'] !== null) {
            $object->setRevision($data['revision']);
        }
        elseif (\array_key_exists('revision', $data) && $data['revision'] === null) {
            $object->setRevision(null);
        }
        if (\array_key_exists('draft_revision', $data) && $data['draft_revision'] !== null) {
            $object->setDraftRevision($data['draft_revision']);
        }
        elseif (\array_key_exists('draft_revision', $data) && $data['draft_revision'] === null) {
            $object->setDraftRevision(null);
        }
        if (\array_key_exists('content_hash', $data) && $data['content_hash'] !== null) {
            $object->setContentHash($data['content_hash']);
        }
        elseif (\array_key_exists('content_hash', $data) && $data['content_hash'] === null) {
            $object->setContentHash(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        if (\array_key_exists('template_ref', $data) && $data['template_ref'] !== null) {
            $object->setTemplateRef($data['template_ref']);
        }
        elseif (\array_key_exists('template_ref', $data) && $data['template_ref'] === null) {
            $object->setTemplateRef(null);
        }
        if (\array_key_exists('version_id', $data) && $data['version_id'] !== null) {
            $object->setVersionId($data['version_id']);
        }
        elseif (\array_key_exists('version_id', $data) && $data['version_id'] === null) {
            $object->setVersionId(null);
        }
        if (\array_key_exists('compatibility_severity', $data) && $data['compatibility_severity'] !== null) {
            $object->setCompatibilitySeverity($data['compatibility_severity']);
        }
        elseif (\array_key_exists('compatibility_severity', $data) && $data['compatibility_severity'] === null) {
            $object->setCompatibilitySeverity(null);
        }
        if (\array_key_exists('next', $data) && $data['next'] !== null) {
            $values = [];
            foreach ($data['next'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\NextAction::class, 'json', $context);
            }
            $object->setNext($values);
        }
        elseif (\array_key_exists('next', $data) && $data['next'] === null) {
            $object->setNext(null);
        }
        if (\array_key_exists('compatibility', $data) && $data['compatibility'] !== null) {
            $values_1 = [];
            foreach ($data['compatibility'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\EmailCompatibilityFinding::class, 'json', $context);
            }
            $object->setCompatibility($values_1);
        }
        elseif (\array_key_exists('compatibility', $data) && $data['compatibility'] === null) {
            $object->setCompatibility(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['language'] = $data->getLanguage();
        $dataArray['version_id'] = $data->getVersionId();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailTemplateLanguageSaved::class => false];
    }
}
