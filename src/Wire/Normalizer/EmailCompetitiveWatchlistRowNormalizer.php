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
class EmailCompetitiveWatchlistRowNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailCompetitiveWatchlistRow::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailCompetitiveWatchlistRow::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailCompetitiveWatchlistRow();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('sends_change_percent', $data) && \is_int($data['sends_change_percent'])) {
            $data['sends_change_percent'] = (float) $data['sends_change_percent'];
        }
        if (\array_key_exists('cadence_per_week', $data) && \is_int($data['cadence_per_week'])) {
            $data['cadence_per_week'] = (float) $data['cadence_per_week'];
        }
        if (\array_key_exists('inbox_placement_rate', $data) && \is_int($data['inbox_placement_rate'])) {
            $data['inbox_placement_rate'] = (float) $data['inbox_placement_rate'];
        }
        if (\array_key_exists('read_rate', $data) && \is_int($data['read_rate'])) {
            $data['read_rate'] = (float) $data['read_rate'];
        }
        if (\array_key_exists('audience_overlap_rate', $data) && \is_int($data['audience_overlap_rate'])) {
            $data['audience_overlap_rate'] = (float) $data['audience_overlap_rate'];
        }
        if (\array_key_exists('is_workspace', $data) && \is_int($data['is_workspace'])) {
            $data['is_workspace'] = (bool) $data['is_workspace'];
        }
        if (\array_key_exists('watchlist_brand_id', $data) && $data['watchlist_brand_id'] !== null) {
            $object->setWatchlistBrandId($data['watchlist_brand_id']);
        }
        elseif (\array_key_exists('watchlist_brand_id', $data) && $data['watchlist_brand_id'] === null) {
            $object->setWatchlistBrandId(null);
        }
        if (\array_key_exists('is_workspace', $data) && $data['is_workspace'] !== null) {
            $object->setIsWorkspace($data['is_workspace']);
        }
        elseif (\array_key_exists('is_workspace', $data) && $data['is_workspace'] === null) {
            $object->setIsWorkspace(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('industry', $data) && $data['industry'] !== null) {
            $object->setIndustry($data['industry']);
        }
        elseif (\array_key_exists('industry', $data) && $data['industry'] === null) {
            $object->setIndustry(null);
        }
        if (\array_key_exists('sending_domains', $data) && $data['sending_domains'] !== null) {
            $values = [];
            foreach ($data['sending_domains'] as $value) {
                $values[] = $value;
            }
            $object->setSendingDomains($values);
        }
        elseif (\array_key_exists('sending_domains', $data) && $data['sending_domains'] === null) {
            $object->setSendingDomains(null);
        }
        if (\array_key_exists('esp', $data) && $data['esp'] !== null) {
            $object->setEsp($data['esp']);
        }
        elseif (\array_key_exists('esp', $data) && $data['esp'] === null) {
            $object->setEsp(null);
        }
        if (\array_key_exists('list_size', $data) && $data['list_size'] !== null) {
            $object->setListSize($data['list_size']);
        }
        elseif (\array_key_exists('list_size', $data) && $data['list_size'] === null) {
            $object->setListSize(null);
        }
        if (\array_key_exists('panel_status', $data) && $data['panel_status'] !== null) {
            $object->setPanelStatus($data['panel_status']);
        }
        elseif (\array_key_exists('panel_status', $data) && $data['panel_status'] === null) {
            $object->setPanelStatus(null);
        }
        if (\array_key_exists('sends', $data) && $data['sends'] !== null) {
            $object->setSends($data['sends']);
        }
        elseif (\array_key_exists('sends', $data) && $data['sends'] === null) {
            $object->setSends(null);
        }
        if (\array_key_exists('sends_change_percent', $data) && $data['sends_change_percent'] !== null) {
            $object->setSendsChangePercent($data['sends_change_percent']);
        }
        elseif (\array_key_exists('sends_change_percent', $data) && $data['sends_change_percent'] === null) {
            $object->setSendsChangePercent(null);
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
            $object->setLastCampaign($this->denormalizer->denormalize($data['last_campaign'], \MessageBird\Wire\Model\EmailCompetitiveWatchlistRowLastCampaign::class, 'json', $context));
        }
        elseif (\array_key_exists('last_campaign', $data) && $data['last_campaign'] === null) {
            $object->setLastCampaign(null);
        }
        if (\array_key_exists('provenance', $data) && $data['provenance'] !== null) {
            $object->setProvenance($this->denormalizer->denormalize($data['provenance'], \MessageBird\Wire\Model\EmailCompetitiveWatchlistRowProvenance::class, 'json', $context));
        }
        elseif (\array_key_exists('provenance', $data) && $data['provenance'] === null) {
            $object->setProvenance(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('watchlistBrandId') && null !== $data->getWatchlistBrandId()) {
            $dataArray['watchlist_brand_id'] = $data->getWatchlistBrandId();
        }
        $dataArray['panel_status'] = $data->getPanelStatus();
        $dataArray['provenance'] = $this->normalizer->normalize($data->getProvenance(), 'json', $context);
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailCompetitiveWatchlistRow::class => false];
    }
}
