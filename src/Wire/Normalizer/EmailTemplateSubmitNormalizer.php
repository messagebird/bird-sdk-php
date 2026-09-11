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
class EmailTemplateSubmitNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailTemplateSubmit::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailTemplateSubmit::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailTemplateSubmit();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('validate_only', $data) && \is_int($data['validate_only'])) {
            $data['validate_only'] = (bool) $data['validate_only'];
        }
        if (\array_key_exists('validate_only', $data) && $data['validate_only'] !== null) {
            $object->setValidateOnly($data['validate_only']);
        }
        elseif (\array_key_exists('validate_only', $data) && $data['validate_only'] === null) {
            $object->setValidateOnly(null);
        }
        if (\array_key_exists('expected_revision', $data) && $data['expected_revision'] !== null) {
            $object->setExpectedRevision($data['expected_revision']);
        }
        elseif (\array_key_exists('expected_revision', $data) && $data['expected_revision'] === null) {
            $object->setExpectedRevision(null);
        }
        if (\array_key_exists('languages', $data) && $data['languages'] !== null) {
            $values = [];
            foreach ($data['languages'] as $value) {
                $values[] = $value;
            }
            $object->setLanguages($values);
        }
        elseif (\array_key_exists('languages', $data) && $data['languages'] === null) {
            $object->setLanguages(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('validateOnly') && null !== $data->getValidateOnly()) {
            $dataArray['validate_only'] = $data->getValidateOnly();
        }
        if ($data->isInitialized('expectedRevision') && null !== $data->getExpectedRevision()) {
            $dataArray['expected_revision'] = $data->getExpectedRevision();
        }
        if ($data->isInitialized('languages') && null !== $data->getLanguages()) {
            $values = [];
            foreach ($data->getLanguages() as $value) {
                $values[] = $value;
            }
            $dataArray['languages'] = $values;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailTemplateSubmit::class => false];
    }
}
