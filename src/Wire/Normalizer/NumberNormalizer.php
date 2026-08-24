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
class NumberNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\Number::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\Number::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\Number();
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
        if (\array_key_exists('kind', $data) && $data['kind'] !== null) {
            $object->setKind($data['kind']);
        }
        elseif (\array_key_exists('kind', $data) && $data['kind'] === null) {
            $object->setKind(null);
        }
        if (\array_key_exists('number', $data) && $data['number'] !== null) {
            $object->setNumber($data['number']);
        }
        elseif (\array_key_exists('number', $data) && $data['number'] === null) {
            $object->setNumber(null);
        }
        if (\array_key_exists('country_code', $data) && $data['country_code'] !== null) {
            $object->setCountryCode($data['country_code']);
        }
        elseif (\array_key_exists('country_code', $data) && $data['country_code'] === null) {
            $object->setCountryCode(null);
        }
        if (\array_key_exists('number_type', $data) && $data['number_type'] !== null) {
            $object->setNumberType($data['number_type']);
        }
        elseif (\array_key_exists('number_type', $data) && $data['number_type'] === null) {
            $object->setNumberType(null);
        }
        if (\array_key_exists('capabilities', $data) && $data['capabilities'] !== null) {
            $values = [];
            foreach ($data['capabilities'] as $value) {
                $values[] = $value;
            }
            $object->setCapabilities($values);
        }
        elseif (\array_key_exists('capabilities', $data) && $data['capabilities'] === null) {
            $object->setCapabilities(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('allocated_at', $data) && $data['allocated_at'] !== null) {
            $object->setAllocatedAt(new \DateTime($data['allocated_at']));
        }
        elseif (\array_key_exists('allocated_at', $data) && $data['allocated_at'] === null) {
            $object->setAllocatedAt(null);
        }
        if (\array_key_exists('released_at', $data) && $data['released_at'] !== null) {
            $object->setReleasedAt(new \DateTime($data['released_at']));
        }
        elseif (\array_key_exists('released_at', $data) && $data['released_at'] === null) {
            $object->setReleasedAt(null);
        }
        if (\array_key_exists('ownership', $data) && $data['ownership'] !== null) {
            $object->setOwnership($this->denormalizer->denormalize($data['ownership'], \MessageBird\Wire\Model\NumberOwnership::class, 'json', $context));
        }
        elseif (\array_key_exists('ownership', $data) && $data['ownership'] === null) {
            $object->setOwnership(null);
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
        return [\MessageBird\Wire\Model\Number::class => false];
    }
}
