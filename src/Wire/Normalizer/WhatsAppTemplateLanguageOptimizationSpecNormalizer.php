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
class WhatsAppTemplateLanguageOptimizationSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppTemplateLanguageOptimizationSpec::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppTemplateLanguageOptimizationSpec::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppTemplateLanguageOptimizationSpec();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('bid_amount', $data) && $data['bid_amount'] !== null) {
            $object->setBidAmount($data['bid_amount']);
            unset($data['bid_amount']);
        }
        elseif (\array_key_exists('bid_amount', $data) && $data['bid_amount'] === null) {
            $object->setBidAmount(null);
        }
        if (\array_key_exists('bid_strategy', $data) && $data['bid_strategy'] !== null) {
            $object->setBidStrategy($data['bid_strategy']);
            unset($data['bid_strategy']);
        }
        elseif (\array_key_exists('bid_strategy', $data) && $data['bid_strategy'] === null) {
            $object->setBidStrategy(null);
        }
        if (\array_key_exists('bid_country_multiplier_overrides', $data) && $data['bid_country_multiplier_overrides'] !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['bid_country_multiplier_overrides'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setBidCountryMultiplierOverrides($values);
            unset($data['bid_country_multiplier_overrides']);
        }
        elseif (\array_key_exists('bid_country_multiplier_overrides', $data) && $data['bid_country_multiplier_overrides'] === null) {
            $object->setBidCountryMultiplierOverrides(null);
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_1;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['bid_amount'] = $data->getBidAmount();
        $dataArray['bid_strategy'] = $data->getBidStrategy();
        $values = [];
        foreach ($data->getBidCountryMultiplierOverrides() as $key => $value) {
            $values[$key] = $value;
        }
        $dataArray['bid_country_multiplier_overrides'] = (object) $values;
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_1;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppTemplateLanguageOptimizationSpec::class => false];
    }
}
