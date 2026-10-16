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
class EmailBroadcastValidationResultNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBroadcastValidationResult::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBroadcastValidationResult::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBroadcastValidationResult();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('ready_for_admission', $data) && \is_int($data['ready_for_admission'])) {
            $data['ready_for_admission'] = (bool) $data['ready_for_admission'];
        }
        if (\array_key_exists('ready_for_admission', $data) && $data['ready_for_admission'] !== null) {
            $object->setReadyForAdmission($data['ready_for_admission']);
        }
        elseif (\array_key_exists('ready_for_admission', $data) && $data['ready_for_admission'] === null) {
            $object->setReadyForAdmission(null);
        }
        if (\array_key_exists('resolution', $data) && $data['resolution'] !== null) {
            $object->setResolution($this->denormalizer->denormalize($data['resolution'], \MessageBird\Wire\Model\EmailBroadcastResolution::class, 'json', $context));
        }
        elseif (\array_key_exists('resolution', $data) && $data['resolution'] === null) {
            $object->setResolution(null);
        }
        if (\array_key_exists('problems', $data) && $data['problems'] !== null) {
            $values = [];
            foreach ($data['problems'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\EmailBroadcastParameterProblem::class, 'json', $context);
            }
            $object->setProblems($values);
        }
        elseif (\array_key_exists('problems', $data) && $data['problems'] === null) {
            $object->setProblems(null);
        }
        if (\array_key_exists('unused_parameters', $data) && $data['unused_parameters'] !== null) {
            $values_1 = [];
            foreach ($data['unused_parameters'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setUnusedParameters($values_1);
        }
        elseif (\array_key_exists('unused_parameters', $data) && $data['unused_parameters'] === null) {
            $object->setUnusedParameters(null);
        }
        if (\array_key_exists('base_parameters', $data) && $data['base_parameters'] !== null) {
            $values_2 = [];
            foreach ($data['base_parameters'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setBaseParameters($values_2);
        }
        elseif (\array_key_exists('base_parameters', $data) && $data['base_parameters'] === null) {
            $object->setBaseParameters(null);
        }
        if (\array_key_exists('override_parameters', $data) && $data['override_parameters'] !== null) {
            $values_3 = [];
            foreach ($data['override_parameters'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setOverrideParameters($values_3);
        }
        elseif (\array_key_exists('override_parameters', $data) && $data['override_parameters'] === null) {
            $object->setOverrideParameters(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['ready_for_admission'] = $data->getReadyForAdmission();
        if ($data->isInitialized('resolution') && null !== $data->getResolution()) {
            $dataArray['resolution'] = $this->normalizer->normalize($data->getResolution(), 'json', $context);
        }
        $values = [];
        foreach ($data->getProblems() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['problems'] = $values;
        $values_1 = [];
        foreach ($data->getUnusedParameters() as $value_1) {
            $values_1[] = $value_1;
        }
        $dataArray['unused_parameters'] = $values_1;
        if ($data->isInitialized('baseParameters') && null !== $data->getBaseParameters()) {
            $values_2 = [];
            foreach ($data->getBaseParameters() as $value_2) {
                $values_2[] = $value_2;
            }
            $dataArray['base_parameters'] = $values_2;
        }
        if ($data->isInitialized('overrideParameters') && null !== $data->getOverrideParameters()) {
            $values_3 = [];
            foreach ($data->getOverrideParameters() as $value_3) {
                $values_3[] = $value_3;
            }
            $dataArray['override_parameters'] = $values_3;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailBroadcastValidationResult::class => false];
    }
}
