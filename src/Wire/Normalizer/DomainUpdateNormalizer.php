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
class DomainUpdateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\DomainUpdate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\DomainUpdate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\DomainUpdate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('settings', $data) && $data['settings'] !== null) {
            $object->setSettings($this->denormalizer->denormalize($data['settings'], \MessageBird\Wire\Model\DomainSettings::class, 'json', $context));
        }
        elseif (\array_key_exists('settings', $data) && $data['settings'] === null) {
            $object->setSettings(null);
        }
        if (\array_key_exists('return_path', $data) && $data['return_path'] !== null) {
            $object->setReturnPath($this->denormalizer->denormalize($data['return_path'], \MessageBird\Wire\Model\DomainReturnPathConfig::class, 'json', $context));
        }
        elseif (\array_key_exists('return_path', $data) && $data['return_path'] === null) {
            $object->setReturnPath(null);
        }
        if (\array_key_exists('tracking', $data) && $data['tracking'] !== null) {
            $object->setTracking($this->denormalizer->denormalize($data['tracking'], \MessageBird\Wire\Model\DomainUpdateTracking::class, 'json', $context));
        }
        elseif (\array_key_exists('tracking', $data) && $data['tracking'] === null) {
            $object->setTracking(null);
        }
        if (\array_key_exists('dkim', $data) && $data['dkim'] !== null) {
            $object->setDkim($this->denormalizer->denormalize($data['dkim'], \MessageBird\Wire\Model\DomainDKIMConfig::class, 'json', $context));
        }
        elseif (\array_key_exists('dkim', $data) && $data['dkim'] === null) {
            $object->setDkim(null);
        }
        if (\array_key_exists('inbound', $data) && $data['inbound'] !== null) {
            $object->setInbound($this->denormalizer->denormalize($data['inbound'], \MessageBird\Wire\Model\DomainInboundConfig::class, 'json', $context));
        }
        elseif (\array_key_exists('inbound', $data) && $data['inbound'] === null) {
            $object->setInbound(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('settings') && null !== $data->getSettings()) {
            $dataArray['settings'] = $this->normalizer->normalize($data->getSettings(), 'json', $context);
        }
        if ($data->isInitialized('returnPath') && null !== $data->getReturnPath()) {
            $dataArray['return_path'] = $this->normalizer->normalize($data->getReturnPath(), 'json', $context);
        }
        if ($data->isInitialized('tracking')) {
            $dataArray['tracking'] = $this->normalizer->normalize($data->getTracking(), 'json', $context);
        }
        if ($data->isInitialized('dkim') && null !== $data->getDkim()) {
            $dataArray['dkim'] = $this->normalizer->normalize($data->getDkim(), 'json', $context);
        }
        if ($data->isInitialized('inbound') && null !== $data->getInbound()) {
            $dataArray['inbound'] = $this->normalizer->normalize($data->getInbound(), 'json', $context);
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\DomainUpdate::class => false];
    }
}
