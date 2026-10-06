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
class EsimPackageBalanceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EsimPackageBalance::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EsimPackageBalance::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EsimPackageBalance();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('used_percent', $data) && \is_int($data['used_percent'])) {
            $data['used_percent'] = (float) $data['used_percent'];
        }
        if (\array_key_exists('total_bytes', $data) && $data['total_bytes'] !== null) {
            $object->setTotalBytes($data['total_bytes']);
        }
        elseif (\array_key_exists('total_bytes', $data) && $data['total_bytes'] === null) {
            $object->setTotalBytes(null);
        }
        if (\array_key_exists('used_bytes', $data) && $data['used_bytes'] !== null) {
            $object->setUsedBytes($data['used_bytes']);
        }
        elseif (\array_key_exists('used_bytes', $data) && $data['used_bytes'] === null) {
            $object->setUsedBytes(null);
        }
        if (\array_key_exists('remaining_bytes', $data) && $data['remaining_bytes'] !== null) {
            $object->setRemainingBytes($data['remaining_bytes']);
        }
        elseif (\array_key_exists('remaining_bytes', $data) && $data['remaining_bytes'] === null) {
            $object->setRemainingBytes(null);
        }
        if (\array_key_exists('used_percent', $data) && $data['used_percent'] !== null) {
            $object->setUsedPercent($data['used_percent']);
        }
        elseif (\array_key_exists('used_percent', $data) && $data['used_percent'] === null) {
            $object->setUsedPercent(null);
        }
        if (\array_key_exists('as_of', $data) && $data['as_of'] !== null) {
            $object->setAsOf(new \DateTime($data['as_of']));
        }
        elseif (\array_key_exists('as_of', $data) && $data['as_of'] === null) {
            $object->setAsOf(null);
        }
        if (\array_key_exists('observed_at', $data) && $data['observed_at'] !== null) {
            $object->setObservedAt(new \DateTime($data['observed_at']));
        }
        elseif (\array_key_exists('observed_at', $data) && $data['observed_at'] === null) {
            $object->setObservedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EsimPackageBalance::class => false];
    }
}
