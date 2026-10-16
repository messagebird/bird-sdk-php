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
class EmailBroadcastResolutionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBroadcastResolution::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBroadcastResolution::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBroadcastResolution();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('template_id', $data) && $data['template_id'] !== null) {
            $object->setTemplateId($data['template_id']);
        }
        elseif (\array_key_exists('template_id', $data) && $data['template_id'] === null) {
            $object->setTemplateId(null);
        }
        if (\array_key_exists('observed_version_id', $data) && $data['observed_version_id'] !== null) {
            $object->setObservedVersionId($data['observed_version_id']);
        }
        elseif (\array_key_exists('observed_version_id', $data) && $data['observed_version_id'] === null) {
            $object->setObservedVersionId(null);
        }
        if (\array_key_exists('requested_language', $data) && $data['requested_language'] !== null) {
            $object->setRequestedLanguage($data['requested_language']);
        }
        elseif (\array_key_exists('requested_language', $data) && $data['requested_language'] === null) {
            $object->setRequestedLanguage(null);
        }
        if (\array_key_exists('effective_language', $data) && $data['effective_language'] !== null) {
            $object->setEffectiveLanguage($data['effective_language']);
        }
        elseif (\array_key_exists('effective_language', $data) && $data['effective_language'] === null) {
            $object->setEffectiveLanguage(null);
        }
        if (\array_key_exists('requirements_fingerprint', $data) && $data['requirements_fingerprint'] !== null) {
            $object->setRequirementsFingerprint($data['requirements_fingerprint']);
        }
        elseif (\array_key_exists('requirements_fingerprint', $data) && $data['requirements_fingerprint'] === null) {
            $object->setRequirementsFingerprint(null);
        }
        if (\array_key_exists('default_language', $data) && $data['default_language'] !== null) {
            $object->setDefaultLanguage($data['default_language']);
        }
        elseif (\array_key_exists('default_language', $data) && $data['default_language'] === null) {
            $object->setDefaultLanguage(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['template_id'] = $data->getTemplateId();
        $dataArray['observed_version_id'] = $data->getObservedVersionId();
        if ($data->isInitialized('requestedLanguage') && null !== $data->getRequestedLanguage()) {
            $dataArray['requested_language'] = $data->getRequestedLanguage();
        }
        $dataArray['effective_language'] = $data->getEffectiveLanguage();
        $dataArray['requirements_fingerprint'] = $data->getRequirementsFingerprint();
        if ($data->isInitialized('defaultLanguage') && null !== $data->getDefaultLanguage()) {
            $dataArray['default_language'] = $data->getDefaultLanguage();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailBroadcastResolution::class => false];
    }
}
