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
class EmailTemplateParametersNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailTemplateParameters::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailTemplateParameters::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailTemplateParameters();
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
        if (\array_key_exists('parameters', $data) && $data['parameters'] !== null) {
            $values = [];
            foreach ($data['parameters'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\EmailTemplateParameter::class, 'json', $context);
            }
            $object->setParameters($values);
        }
        elseif (\array_key_exists('parameters', $data) && $data['parameters'] === null) {
            $object->setParameters(null);
        }
        if (\array_key_exists('variables', $data) && $data['variables'] !== null) {
            $values_1 = [];
            foreach ($data['variables'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\EmailTemplateVariable::class, 'json', $context);
            }
            $object->setVariables($values_1);
        }
        elseif (\array_key_exists('variables', $data) && $data['variables'] === null) {
            $object->setVariables(null);
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
        $values = [];
        foreach ($data->getParameters() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['parameters'] = $values;
        $values_1 = [];
        foreach ($data->getVariables() as $value_1) {
            $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
        }
        $dataArray['variables'] = $values_1;
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailTemplateParameters::class => false];
    }
}
