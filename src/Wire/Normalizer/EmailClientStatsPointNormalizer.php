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
class EmailClientStatsPointNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailClientStatsPoint::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailClientStatsPoint::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailClientStatsPoint();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('email_client', $data) && $data['email_client'] !== null) {
            $object->setEmailClient($data['email_client']);
        }
        elseif (\array_key_exists('email_client', $data) && $data['email_client'] === null) {
            $object->setEmailClient(null);
        }
        if (\array_key_exists('os', $data) && $data['os'] !== null) {
            $object->setOs($data['os']);
        }
        elseif (\array_key_exists('os', $data) && $data['os'] === null) {
            $object->setOs(null);
        }
        if (\array_key_exists('device_type', $data) && $data['device_type'] !== null) {
            $object->setDeviceType($data['device_type']);
        }
        elseif (\array_key_exists('device_type', $data) && $data['device_type'] === null) {
            $object->setDeviceType(null);
        }
        if (\array_key_exists('engagement', $data) && $data['engagement'] !== null) {
            $object->setEngagement($this->denormalizer->denormalize($data['engagement'], \MessageBird\Wire\Model\EmailClientStatsPointEngagement::class, 'json', $context));
        }
        elseif (\array_key_exists('engagement', $data) && $data['engagement'] === null) {
            $object->setEngagement(null);
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
        return [\MessageBird\Wire\Model\EmailClientStatsPoint::class => false];
    }
}
