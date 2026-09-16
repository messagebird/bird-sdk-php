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
class EmailCompetitiveWatchlistRowProvenanceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailCompetitiveWatchlistRowProvenance::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailCompetitiveWatchlistRowProvenance::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailCompetitiveWatchlistRowProvenance();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('sends', $data) && $data['sends'] !== null) {
            $object->setSends($data['sends']);
        }
        elseif (\array_key_exists('sends', $data) && $data['sends'] === null) {
            $object->setSends(null);
        }
        if (\array_key_exists('cadence_per_week', $data) && $data['cadence_per_week'] !== null) {
            $object->setCadencePerWeek($data['cadence_per_week']);
        }
        elseif (\array_key_exists('cadence_per_week', $data) && $data['cadence_per_week'] === null) {
            $object->setCadencePerWeek(null);
        }
        if (\array_key_exists('inbox_placement_rate', $data) && $data['inbox_placement_rate'] !== null) {
            $object->setInboxPlacementRate($data['inbox_placement_rate']);
        }
        elseif (\array_key_exists('inbox_placement_rate', $data) && $data['inbox_placement_rate'] === null) {
            $object->setInboxPlacementRate(null);
        }
        if (\array_key_exists('read_rate', $data) && $data['read_rate'] !== null) {
            $object->setReadRate($data['read_rate']);
        }
        elseif (\array_key_exists('read_rate', $data) && $data['read_rate'] === null) {
            $object->setReadRate(null);
        }
        if (\array_key_exists('audience_overlap_rate', $data) && $data['audience_overlap_rate'] !== null) {
            $object->setAudienceOverlapRate($data['audience_overlap_rate']);
        }
        elseif (\array_key_exists('audience_overlap_rate', $data) && $data['audience_overlap_rate'] === null) {
            $object->setAudienceOverlapRate(null);
        }
        if (\array_key_exists('last_campaign', $data) && $data['last_campaign'] !== null) {
            $object->setLastCampaign($data['last_campaign']);
        }
        elseif (\array_key_exists('last_campaign', $data) && $data['last_campaign'] === null) {
            $object->setLastCampaign(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['sends'] = $data->getSends();
        $dataArray['cadence_per_week'] = $data->getCadencePerWeek();
        $dataArray['inbox_placement_rate'] = $data->getInboxPlacementRate();
        $dataArray['read_rate'] = $data->getReadRate();
        $dataArray['audience_overlap_rate'] = $data->getAudienceOverlapRate();
        $dataArray['last_campaign'] = $data->getLastCampaign();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailCompetitiveWatchlistRowProvenance::class => false];
    }
}
