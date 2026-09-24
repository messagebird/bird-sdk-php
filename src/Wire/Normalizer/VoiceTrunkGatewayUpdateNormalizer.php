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
class VoiceTrunkGatewayUpdateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceTrunkGatewayUpdate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceTrunkGatewayUpdate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceTrunkGatewayUpdate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('sip_uri', $data) && $data['sip_uri'] !== null) {
            $object->setSipUri($data['sip_uri']);
        }
        elseif (\array_key_exists('sip_uri', $data) && $data['sip_uri'] === null) {
            $object->setSipUri(null);
        }
        if (\array_key_exists('priority', $data) && $data['priority'] !== null) {
            $object->setPriority($data['priority']);
        }
        elseif (\array_key_exists('priority', $data) && $data['priority'] === null) {
            $object->setPriority(null);
        }
        if (\array_key_exists('origination_format', $data) && $data['origination_format'] !== null) {
            $object->setOriginationFormat($data['origination_format']);
        }
        elseif (\array_key_exists('origination_format', $data) && $data['origination_format'] === null) {
            $object->setOriginationFormat(null);
        }
        if (\array_key_exists('destination_format', $data) && $data['destination_format'] !== null) {
            $object->setDestinationFormat($data['destination_format']);
        }
        elseif (\array_key_exists('destination_format', $data) && $data['destination_format'] === null) {
            $object->setDestinationFormat(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('sipUri') && null !== $data->getSipUri()) {
            $dataArray['sip_uri'] = $data->getSipUri();
        }
        if ($data->isInitialized('priority') && null !== $data->getPriority()) {
            $dataArray['priority'] = $data->getPriority();
        }
        if ($data->isInitialized('originationFormat') && null !== $data->getOriginationFormat()) {
            $dataArray['origination_format'] = $data->getOriginationFormat();
        }
        if ($data->isInitialized('destinationFormat') && null !== $data->getDestinationFormat()) {
            $dataArray['destination_format'] = $data->getDestinationFormat();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceTrunkGatewayUpdate::class => false];
    }
}
