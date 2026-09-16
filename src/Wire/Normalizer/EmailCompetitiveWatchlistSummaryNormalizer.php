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
class EmailCompetitiveWatchlistSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailCompetitiveWatchlistSummary::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailCompetitiveWatchlistSummary::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailCompetitiveWatchlistSummary();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('share_of_volume_percent', $data) && \is_int($data['share_of_volume_percent'])) {
            $data['share_of_volume_percent'] = (float) $data['share_of_volume_percent'];
        }
        if (\array_key_exists('share_of_volume_change_points', $data) && \is_int($data['share_of_volume_change_points'])) {
            $data['share_of_volume_change_points'] = (float) $data['share_of_volume_change_points'];
        }
        if (\array_key_exists('competitor_sends_change_percent', $data) && \is_int($data['competitor_sends_change_percent'])) {
            $data['competitor_sends_change_percent'] = (float) $data['competitor_sends_change_percent'];
        }
        if (\array_key_exists('peer_cadence_median_per_week', $data) && \is_int($data['peer_cadence_median_per_week'])) {
            $data['peer_cadence_median_per_week'] = (float) $data['peer_cadence_median_per_week'];
        }
        if (\array_key_exists('peer_inbox_placement_median_rate', $data) && \is_int($data['peer_inbox_placement_median_rate'])) {
            $data['peer_inbox_placement_median_rate'] = (float) $data['peer_inbox_placement_median_rate'];
        }
        if (\array_key_exists('share_of_volume_percent', $data) && $data['share_of_volume_percent'] !== null) {
            $object->setShareOfVolumePercent($data['share_of_volume_percent']);
        }
        elseif (\array_key_exists('share_of_volume_percent', $data) && $data['share_of_volume_percent'] === null) {
            $object->setShareOfVolumePercent(null);
        }
        if (\array_key_exists('share_of_volume_change_points', $data) && $data['share_of_volume_change_points'] !== null) {
            $object->setShareOfVolumeChangePoints($data['share_of_volume_change_points']);
        }
        elseif (\array_key_exists('share_of_volume_change_points', $data) && $data['share_of_volume_change_points'] === null) {
            $object->setShareOfVolumeChangePoints(null);
        }
        if (\array_key_exists('competitor_sends', $data) && $data['competitor_sends'] !== null) {
            $object->setCompetitorSends($data['competitor_sends']);
        }
        elseif (\array_key_exists('competitor_sends', $data) && $data['competitor_sends'] === null) {
            $object->setCompetitorSends(null);
        }
        if (\array_key_exists('competitor_sends_change_percent', $data) && $data['competitor_sends_change_percent'] !== null) {
            $object->setCompetitorSendsChangePercent($data['competitor_sends_change_percent']);
        }
        elseif (\array_key_exists('competitor_sends_change_percent', $data) && $data['competitor_sends_change_percent'] === null) {
            $object->setCompetitorSendsChangePercent(null);
        }
        if (\array_key_exists('peer_cadence_median_per_week', $data) && $data['peer_cadence_median_per_week'] !== null) {
            $object->setPeerCadenceMedianPerWeek($data['peer_cadence_median_per_week']);
        }
        elseif (\array_key_exists('peer_cadence_median_per_week', $data) && $data['peer_cadence_median_per_week'] === null) {
            $object->setPeerCadenceMedianPerWeek(null);
        }
        if (\array_key_exists('peer_inbox_placement_median_rate', $data) && $data['peer_inbox_placement_median_rate'] !== null) {
            $object->setPeerInboxPlacementMedianRate($data['peer_inbox_placement_median_rate']);
        }
        elseif (\array_key_exists('peer_inbox_placement_median_rate', $data) && $data['peer_inbox_placement_median_rate'] === null) {
            $object->setPeerInboxPlacementMedianRate(null);
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
        return [\MessageBird\Wire\Model\EmailCompetitiveWatchlistSummary::class => false];
    }
}
