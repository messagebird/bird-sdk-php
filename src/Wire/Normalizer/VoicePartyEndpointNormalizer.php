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
class VoicePartyEndpointNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoicePartyEndpoint::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoicePartyEndpoint::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoicePartyEndpoint();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('type', $data) && $data['type'] !== null) {
            $object->setType($data['type']);
            unset($data['type']);
        }
        elseif (\array_key_exists('type', $data) && $data['type'] === null) {
            $object->setType(null);
        }
        if (\array_key_exists('sip', $data) && $data['sip'] !== null) {
            $object->setSip($this->denormalizer->denormalize($data['sip'], \MessageBird\Wire\Model\VoicePartySIPEndpoint::class, 'json', $context));
            unset($data['sip']);
        }
        elseif (\array_key_exists('sip', $data) && $data['sip'] === null) {
            $object->setSip(null);
        }
        if (\array_key_exists('bridge_pstn', $data) && $data['bridge_pstn'] !== null) {
            $object->setBridgePstn($this->denormalizer->denormalize($data['bridge_pstn'], \MessageBird\Wire\Model\VoicePartyBridgePSTNEndpoint::class, 'json', $context));
            unset($data['bridge_pstn']);
        }
        elseif (\array_key_exists('bridge_pstn', $data) && $data['bridge_pstn'] === null) {
            $object->setBridgePstn(null);
        }
        if (\array_key_exists('bridge_sip', $data) && $data['bridge_sip'] !== null) {
            $object->setBridgeSip($this->denormalizer->denormalize($data['bridge_sip'], \MessageBird\Wire\Model\VoicePartyBridgeSIPEndpoint::class, 'json', $context));
            unset($data['bridge_sip']);
        }
        elseif (\array_key_exists('bridge_sip', $data) && $data['bridge_sip'] === null) {
            $object->setBridgeSip(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['type'] = $data->getType();
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoicePartyEndpoint::class => false];
    }
}
