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
class EsimOfferNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EsimOffer::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EsimOffer::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EsimOffer();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('stackable', $data) && \is_int($data['stackable'])) {
            $data['stackable'] = (bool) $data['stackable'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('revision', $data) && $data['revision'] !== null) {
            $object->setRevision($data['revision']);
        }
        elseif (\array_key_exists('revision', $data) && $data['revision'] === null) {
            $object->setRevision(null);
        }
        if (\array_key_exists('zone_id', $data) && $data['zone_id'] !== null) {
            $object->setZoneId($data['zone_id']);
        }
        elseif (\array_key_exists('zone_id', $data) && $data['zone_id'] === null) {
            $object->setZoneId(null);
        }
        if (\array_key_exists('zone', $data) && $data['zone'] !== null) {
            $object->setZone($this->denormalizer->denormalize($data['zone'], \MessageBird\Wire\Model\EsimOfferZone::class, 'json', $context));
        }
        elseif (\array_key_exists('zone', $data) && $data['zone'] === null) {
            $object->setZone(null);
        }
        if (\array_key_exists('speed', $data) && $data['speed'] !== null) {
            $object->setSpeed($data['speed']);
        }
        elseif (\array_key_exists('speed', $data) && $data['speed'] === null) {
            $object->setSpeed(null);
        }
        if (\array_key_exists('stackable', $data) && $data['stackable'] !== null) {
            $object->setStackable($data['stackable']);
        }
        elseif (\array_key_exists('stackable', $data) && $data['stackable'] === null) {
            $object->setStackable(null);
        }
        if (\array_key_exists('phone', $data) && $data['phone'] !== null) {
            $object->setPhone($this->denormalizer->denormalize($data['phone'], \MessageBird\Wire\Model\EsimOfferPhone::class, 'json', $context));
        }
        elseif (\array_key_exists('phone', $data) && $data['phone'] === null) {
            $object->setPhone(null);
        }
        if (\array_key_exists('pricing', $data) && $data['pricing'] !== null) {
            $object->setPricing($data['pricing']);
        }
        elseif (\array_key_exists('pricing', $data) && $data['pricing'] === null) {
            $object->setPricing(null);
        }
        if (\array_key_exists('product', $data) && $data['product'] !== null) {
            $object->setProduct($data['product']);
        }
        elseif (\array_key_exists('product', $data) && $data['product'] === null) {
            $object->setProduct(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
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
        return [\MessageBird\Wire\Model\EsimOffer::class => false];
    }
}
