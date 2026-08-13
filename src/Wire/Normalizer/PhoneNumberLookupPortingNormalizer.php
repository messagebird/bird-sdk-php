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
class PhoneNumberLookupPortingNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\PhoneNumberLookupPorting::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\PhoneNumberLookupPorting::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\PhoneNumberLookupPorting();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('ported', $data) && \is_int($data['ported'])) {
            $data['ported'] = (bool) $data['ported'];
        }
        if (\array_key_exists('last_ported_at_is_approximate', $data) && \is_int($data['last_ported_at_is_approximate'])) {
            $data['last_ported_at_is_approximate'] = (bool) $data['last_ported_at_is_approximate'];
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
            unset($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('ported', $data) && $data['ported'] !== null) {
            $object->setPorted($data['ported']);
            unset($data['ported']);
        }
        elseif (\array_key_exists('ported', $data) && $data['ported'] === null) {
            $object->setPorted(null);
        }
        if (\array_key_exists('last_ported_at', $data) && $data['last_ported_at'] !== null) {
            $object->setLastPortedAt(new \DateTime($data['last_ported_at']));
            unset($data['last_ported_at']);
        }
        elseif (\array_key_exists('last_ported_at', $data) && $data['last_ported_at'] === null) {
            $object->setLastPortedAt(null);
        }
        if (\array_key_exists('last_ported_at_is_approximate', $data) && $data['last_ported_at_is_approximate'] !== null) {
            $object->setLastPortedAtIsApproximate($data['last_ported_at_is_approximate']);
            unset($data['last_ported_at_is_approximate']);
        }
        elseif (\array_key_exists('last_ported_at_is_approximate', $data) && $data['last_ported_at_is_approximate'] === null) {
            $object->setLastPortedAtIsApproximate(null);
        }
        if (\array_key_exists('history', $data) && $data['history'] !== null) {
            $values = [];
            foreach ($data['history'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\LookupPortingEvent::class, 'json', $context);
            }
            $object->setHistory($values);
            unset($data['history']);
        }
        elseif (\array_key_exists('history', $data) && $data['history'] === null) {
            $object->setHistory(null);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\PhoneNumberLookupPorting::class => false];
    }
}
