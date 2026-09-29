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
class AMBChannelSettingsUpdateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBChannelSettingsUpdate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBChannelSettingsUpdate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBChannelSettingsUpdate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('entry_points', $data) && $data['entry_points'] !== null) {
            $values = [];
            foreach ($data['entry_points'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\AMBEntryPoint::class, 'json', $context);
            }
            $object->setEntryPoints($values);
        }
        elseif (\array_key_exists('entry_points', $data) && $data['entry_points'] === null) {
            $object->setEntryPoints(null);
        }
        if (\array_key_exists('default_locale', $data) && $data['default_locale'] !== null) {
            $object->setDefaultLocale($data['default_locale']);
        }
        elseif (\array_key_exists('default_locale', $data) && $data['default_locale'] === null) {
            $object->setDefaultLocale(null);
        }
        if (\array_key_exists('brand_name', $data) && $data['brand_name'] !== null) {
            $object->setBrandName($data['brand_name']);
        }
        elseif (\array_key_exists('brand_name', $data) && $data['brand_name'] === null) {
            $object->setBrandName(null);
        }
        if (\array_key_exists('logo_asset_id', $data) && $data['logo_asset_id'] !== null) {
            $object->setLogoAssetId($data['logo_asset_id']);
        }
        elseif (\array_key_exists('logo_asset_id', $data) && $data['logo_asset_id'] === null) {
            $object->setLogoAssetId(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('entryPoints') && null !== $data->getEntryPoints()) {
            $values = [];
            foreach ($data->getEntryPoints() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['entry_points'] = $values;
        }
        if ($data->isInitialized('defaultLocale')) {
            $dataArray['default_locale'] = $data->getDefaultLocale();
        }
        if ($data->isInitialized('brandName') && null !== $data->getBrandName()) {
            $dataArray['brand_name'] = $data->getBrandName();
        }
        if ($data->isInitialized('logoAssetId')) {
            $dataArray['logo_asset_id'] = $data->getLogoAssetId();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBChannelSettingsUpdate::class => false];
    }
}
