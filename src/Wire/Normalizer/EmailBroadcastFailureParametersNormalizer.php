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
class EmailBroadcastFailureParametersNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBroadcastFailureParameters::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBroadcastFailureParameters::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBroadcastFailureParameters();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('code', $data) && $data['code'] !== null) {
            $object->setCode($data['code']);
        }
        elseif (\array_key_exists('code', $data) && $data['code'] === null) {
            $object->setCode(null);
        }
        if (\array_key_exists('phase', $data) && $data['phase'] !== null) {
            $object->setPhase($data['phase']);
        }
        elseif (\array_key_exists('phase', $data) && $data['phase'] === null) {
            $object->setPhase(null);
        }
        if (\array_key_exists('pointer', $data) && $data['pointer'] !== null) {
            $object->setPointer($data['pointer']);
        }
        elseif (\array_key_exists('pointer', $data) && $data['pointer'] === null) {
            $object->setPointer(null);
        }
        if (\array_key_exists('observed_version_id', $data) && $data['observed_version_id'] !== null) {
            $object->setObservedVersionId($data['observed_version_id']);
        }
        elseif (\array_key_exists('observed_version_id', $data) && $data['observed_version_id'] === null) {
            $object->setObservedVersionId(null);
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
        if (\array_key_exists('failure_count', $data) && $data['failure_count'] !== null) {
            $object->setFailureCount($data['failure_count']);
        }
        elseif (\array_key_exists('failure_count', $data) && $data['failure_count'] === null) {
            $object->setFailureCount(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['code'] = $data->getCode();
        $dataArray['phase'] = $data->getPhase();
        if ($data->isInitialized('pointer') && null !== $data->getPointer()) {
            $dataArray['pointer'] = $data->getPointer();
        }
        if ($data->isInitialized('observedVersionId') && null !== $data->getObservedVersionId()) {
            $dataArray['observed_version_id'] = $data->getObservedVersionId();
        }
        if ($data->isInitialized('problems') && null !== $data->getProblems()) {
            $values = [];
            foreach ($data->getProblems() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['problems'] = $values;
        }
        $dataArray['failure_count'] = $data->getFailureCount();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailBroadcastFailureParameters::class => false];
    }
}
