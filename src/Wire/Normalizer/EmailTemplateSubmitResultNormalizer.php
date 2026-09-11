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
class EmailTemplateSubmitResultNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailTemplateSubmitResult::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailTemplateSubmitResult::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailTemplateSubmitResult();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('valid', $data) && \is_int($data['valid'])) {
            $data['valid'] = (bool) $data['valid'];
        }
        if (\array_key_exists('valid', $data) && $data['valid'] !== null) {
            $object->setValid($data['valid']);
        }
        elseif (\array_key_exists('valid', $data) && $data['valid'] === null) {
            $object->setValid(null);
        }
        if (\array_key_exists('errors', $data) && $data['errors'] !== null) {
            $values = [];
            foreach ($data['errors'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\EmailTemplateSubmitProblem::class, 'json', $context);
            }
            $object->setErrors($values);
        }
        elseif (\array_key_exists('errors', $data) && $data['errors'] === null) {
            $object->setErrors(null);
        }
        if (\array_key_exists('version', $data) && $data['version'] !== null) {
            $object->setVersion($this->denormalizer->denormalize($data['version'], \MessageBird\Wire\Model\EmailTemplateSubmitResultVersion::class, 'json', $context));
        }
        elseif (\array_key_exists('version', $data) && $data['version'] === null) {
            $object->setVersion(null);
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
        $dataArray['version_id'] = $data->getVersionId();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailTemplateSubmitResult::class => false];
    }
}
