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
class AutomaticSeedingSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AutomaticSeedingSettings::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AutomaticSeedingSettings::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AutomaticSeedingSettings();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('enabled', $data) && \is_int($data['enabled'])) {
            $data['enabled'] = (bool) $data['enabled'];
        }
        if (\array_key_exists('revision', $data) && $data['revision'] !== null) {
            $object->setRevision($data['revision']);
        }
        elseif (\array_key_exists('revision', $data) && $data['revision'] === null) {
            $object->setRevision(null);
        }
        if (\array_key_exists('trigger_address', $data) && $data['trigger_address'] !== null) {
            $object->setTriggerAddress($data['trigger_address']);
        }
        elseif (\array_key_exists('trigger_address', $data) && $data['trigger_address'] === null) {
            $object->setTriggerAddress(null);
        }
        if (\array_key_exists('enabled', $data) && $data['enabled'] !== null) {
            $object->setEnabled($data['enabled']);
        }
        elseif (\array_key_exists('enabled', $data) && $data['enabled'] === null) {
            $object->setEnabled(null);
        }
        if (\array_key_exists('list_type', $data) && $data['list_type'] !== null) {
            $object->setListType($data['list_type']);
        }
        elseif (\array_key_exists('list_type', $data) && $data['list_type'] === null) {
            $object->setListType(null);
        }
        if (\array_key_exists('engagement_profile', $data) && $data['engagement_profile'] !== null) {
            $object->setEngagementProfile($data['engagement_profile']);
        }
        elseif (\array_key_exists('engagement_profile', $data) && $data['engagement_profile'] === null) {
            $object->setEngagementProfile(null);
        }
        if (\array_key_exists('regions', $data) && $data['regions'] !== null) {
            $values = [];
            foreach ($data['regions'] as $value) {
                $values[] = $value;
            }
            $object->setRegions($values);
        }
        elseif (\array_key_exists('regions', $data) && $data['regions'] === null) {
            $object->setRegions(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('revision')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingSettings.revision missing');
        }
        $dataArray['revision'] = $data->getRevision();
        if ($data->isInitialized('triggerAddress') && null !== $data->getTriggerAddress()) {
            $dataArray['trigger_address'] = $data->getTriggerAddress();
        }
        if (!$data->isInitialized('enabled')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingSettings.enabled missing');
        }
        $dataArray['enabled'] = $data->getEnabled();
        if ($data->isInitialized('listType') && null !== $data->getListType()) {
            $dataArray['list_type'] = $data->getListType();
        }
        if ($data->isInitialized('engagementProfile') && null !== $data->getEngagementProfile()) {
            $dataArray['engagement_profile'] = $data->getEngagementProfile();
        }
        if ($data->isInitialized('regions') && null !== $data->getRegions()) {
            $values = [];
            foreach ($data->getRegions() as $value) {
                $values[] = $value;
            }
            $dataArray['regions'] = $values;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AutomaticSeedingSettings::class => false];
    }
}
