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
class EmailInboxInsightsSeedTestCreateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsSeedTestCreate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsSeedTestCreate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsSeedTestCreate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('sending_domain', $data) && $data['sending_domain'] !== null) {
            $object->setSendingDomain($data['sending_domain']);
        }
        elseif (\array_key_exists('sending_domain', $data) && $data['sending_domain'] === null) {
            $object->setSendingDomain(null);
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
        if (\array_key_exists('label', $data) && $data['label'] !== null) {
            $object->setLabel($data['label']);
        }
        elseif (\array_key_exists('label', $data) && $data['label'] === null) {
            $object->setLabel(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['sending_domain'] = $data->getSendingDomain();
        $dataArray['list_type'] = $data->getListType();
        $dataArray['engagement_profile'] = $data->getEngagementProfile();
        $values = [];
        foreach ($data->getRegions() as $value) {
            $values[] = $value;
        }
        $dataArray['regions'] = $values;
        if ($data->isInitialized('label') && null !== $data->getLabel()) {
            $dataArray['label'] = $data->getLabel();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailInboxInsightsSeedTestCreate::class => false];
    }
}
