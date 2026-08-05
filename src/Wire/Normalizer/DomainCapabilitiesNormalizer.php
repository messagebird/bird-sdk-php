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
class DomainCapabilitiesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\DomainCapabilities::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\DomainCapabilities::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\DomainCapabilities();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('sending', $data) && $data['sending'] !== null) {
            $object->setSending($this->denormalizer->denormalize($data['sending'], \MessageBird\Wire\Model\DomainCapability::class, 'json', $context));
        }
        elseif (\array_key_exists('sending', $data) && $data['sending'] === null) {
            $object->setSending(null);
        }
        if (\array_key_exists('return_path', $data) && $data['return_path'] !== null) {
            $object->setReturnPath($this->denormalizer->denormalize($data['return_path'], \MessageBird\Wire\Model\DomainCapability::class, 'json', $context));
        }
        elseif (\array_key_exists('return_path', $data) && $data['return_path'] === null) {
            $object->setReturnPath(null);
        }
        if (\array_key_exists('dmarc', $data) && $data['dmarc'] !== null) {
            $object->setDmarc($this->denormalizer->denormalize($data['dmarc'], \MessageBird\Wire\Model\DomainCapability::class, 'json', $context));
        }
        elseif (\array_key_exists('dmarc', $data) && $data['dmarc'] === null) {
            $object->setDmarc(null);
        }
        if (\array_key_exists('tracking', $data) && $data['tracking'] !== null) {
            $object->setTracking($this->denormalizer->denormalize($data['tracking'], \MessageBird\Wire\Model\DomainCapability::class, 'json', $context));
        }
        elseif (\array_key_exists('tracking', $data) && $data['tracking'] === null) {
            $object->setTracking(null);
        }
        if (\array_key_exists('inbound', $data) && $data['inbound'] !== null) {
            $object->setInbound($this->denormalizer->denormalize($data['inbound'], \MessageBird\Wire\Model\DomainCapability::class, 'json', $context));
        }
        elseif (\array_key_exists('inbound', $data) && $data['inbound'] === null) {
            $object->setInbound(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['sending'] = $this->normalizer->normalize($data->getSending(), 'json', $context);
        $dataArray['return_path'] = $this->normalizer->normalize($data->getReturnPath(), 'json', $context);
        $dataArray['dmarc'] = $this->normalizer->normalize($data->getDmarc(), 'json', $context);
        $dataArray['tracking'] = $this->normalizer->normalize($data->getTracking(), 'json', $context);
        if ($data->isInitialized('inbound') && null !== $data->getInbound()) {
            $dataArray['inbound'] = $this->normalizer->normalize($data->getInbound(), 'json', $context);
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\DomainCapabilities::class => false];
    }
}
