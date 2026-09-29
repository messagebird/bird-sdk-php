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
class AMBMessageKindStatsPointNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBMessageKindStatsPoint::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBMessageKindStatsPoint::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBMessageKindStatsPoint();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('message_kind', $data) && $data['message_kind'] !== null) {
            $object->setMessageKind($data['message_kind']);
        }
        elseif (\array_key_exists('message_kind', $data) && $data['message_kind'] === null) {
            $object->setMessageKind(null);
        }
        if (\array_key_exists('counts', $data) && $data['counts'] !== null) {
            $object->setCounts($this->denormalizer->denormalize($data['counts'], \MessageBird\Wire\Model\AMBOutboundStatsCounts::class, 'json', $context));
        }
        elseif (\array_key_exists('counts', $data) && $data['counts'] === null) {
            $object->setCounts(null);
        }
        if (\array_key_exists('latency', $data) && $data['latency'] !== null) {
            $object->setLatency($this->denormalizer->denormalize($data['latency'], \MessageBird\Wire\Model\AMBStatsLatency::class, 'json', $context));
        }
        elseif (\array_key_exists('latency', $data) && $data['latency'] === null) {
            $object->setLatency(null);
        }
        if (\array_key_exists('first_response', $data) && $data['first_response'] !== null) {
            $object->setFirstResponse($this->denormalizer->denormalize($data['first_response'], \MessageBird\Wire\Model\AMBStatsQuantiles::class, 'json', $context));
        }
        elseif (\array_key_exists('first_response', $data) && $data['first_response'] === null) {
            $object->setFirstResponse(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['message_kind'] = $data->getMessageKind();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBMessageKindStatsPoint::class => false];
    }
}
