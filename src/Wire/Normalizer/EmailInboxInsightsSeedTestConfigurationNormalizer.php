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
class EmailInboxInsightsSeedTestConfigurationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsSeedTestConfiguration::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsSeedTestConfiguration::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsSeedTestConfiguration();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('resource', $data) && $data['resource'] !== null) {
            $object->setResource($data['resource']);
        }
        elseif (\array_key_exists('resource', $data) && $data['resource'] === null) {
            $object->setResource(null);
        }
        if (\array_key_exists('domain', $data) && $data['domain'] !== null) {
            $object->setDomain($data['domain']);
        }
        elseif (\array_key_exists('domain', $data) && $data['domain'] === null) {
            $object->setDomain(null);
        }
        if (\array_key_exists('list_types', $data) && $data['list_types'] !== null) {
            $values = [];
            foreach ($data['list_types'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\EmailInboxInsightsSeedListTypeOption::class, 'json', $context);
            }
            $object->setListTypes($values);
        }
        elseif (\array_key_exists('list_types', $data) && $data['list_types'] === null) {
            $object->setListTypes(null);
        }
        if (\array_key_exists('regions', $data) && $data['regions'] !== null) {
            $values_1 = [];
            foreach ($data['regions'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\EmailInboxInsightsSeedRegionOption::class, 'json', $context);
            }
            $object->setRegions($values_1);
        }
        elseif (\array_key_exists('regions', $data) && $data['regions'] === null) {
            $object->setRegions(null);
        }
        if (\array_key_exists('engagement_profiles', $data) && $data['engagement_profiles'] !== null) {
            $values_2 = [];
            foreach ($data['engagement_profiles'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \MessageBird\Wire\Model\EmailInboxInsightsSeedEngagementProfileOption::class, 'json', $context);
            }
            $object->setEngagementProfiles($values_2);
        }
        elseif (\array_key_exists('engagement_profiles', $data) && $data['engagement_profiles'] === null) {
            $object->setEngagementProfiles(null);
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
        return [\MessageBird\Wire\Model\EmailInboxInsightsSeedTestConfiguration::class => false];
    }
}
