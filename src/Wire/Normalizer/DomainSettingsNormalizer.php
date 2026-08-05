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
class DomainSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\DomainSettings::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\DomainSettings::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\DomainSettings();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('click_tracking', $data) && \is_int($data['click_tracking'])) {
            $data['click_tracking'] = (bool) $data['click_tracking'];
        }
        if (\array_key_exists('open_tracking', $data) && \is_int($data['open_tracking'])) {
            $data['open_tracking'] = (bool) $data['open_tracking'];
        }
        if (\array_key_exists('click_tracking', $data) && $data['click_tracking'] !== null) {
            $object->setClickTracking($data['click_tracking']);
        }
        elseif (\array_key_exists('click_tracking', $data) && $data['click_tracking'] === null) {
            $object->setClickTracking(null);
        }
        if (\array_key_exists('open_tracking', $data) && $data['open_tracking'] !== null) {
            $object->setOpenTracking($data['open_tracking']);
        }
        elseif (\array_key_exists('open_tracking', $data) && $data['open_tracking'] === null) {
            $object->setOpenTracking(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('clickTracking') && null !== $data->getClickTracking()) {
            $dataArray['click_tracking'] = $data->getClickTracking();
        }
        if ($data->isInitialized('openTracking') && null !== $data->getOpenTracking()) {
            $dataArray['open_tracking'] = $data->getOpenTracking();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\DomainSettings::class => false];
    }
}
