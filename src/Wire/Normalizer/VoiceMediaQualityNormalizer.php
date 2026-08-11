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
class VoiceMediaQualityNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceMediaQuality::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceMediaQuality::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceMediaQuality();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('mos', $data) && \is_int($data['mos'])) {
            $data['mos'] = (float) $data['mos'];
        }
        if (\array_key_exists('packet_loss_pct', $data) && \is_int($data['packet_loss_pct'])) {
            $data['packet_loss_pct'] = (float) $data['packet_loss_pct'];
        }
        if (\array_key_exists('mos', $data) && $data['mos'] !== null) {
            $object->setMos($data['mos']);
        }
        elseif (\array_key_exists('mos', $data) && $data['mos'] === null) {
            $object->setMos(null);
        }
        if (\array_key_exists('jitter_ms', $data) && $data['jitter_ms'] !== null) {
            $object->setJitterMs($data['jitter_ms']);
        }
        elseif (\array_key_exists('jitter_ms', $data) && $data['jitter_ms'] === null) {
            $object->setJitterMs(null);
        }
        if (\array_key_exists('packet_loss_pct', $data) && $data['packet_loss_pct'] !== null) {
            $object->setPacketLossPct($data['packet_loss_pct']);
        }
        elseif (\array_key_exists('packet_loss_pct', $data) && $data['packet_loss_pct'] === null) {
            $object->setPacketLossPct(null);
        }
        if (\array_key_exists('round_trip_time_ms', $data) && $data['round_trip_time_ms'] !== null) {
            $object->setRoundTripTimeMs($data['round_trip_time_ms']);
        }
        elseif (\array_key_exists('round_trip_time_ms', $data) && $data['round_trip_time_ms'] === null) {
            $object->setRoundTripTimeMs(null);
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
        return [\MessageBird\Wire\Model\VoiceMediaQuality::class => false];
    }
}
