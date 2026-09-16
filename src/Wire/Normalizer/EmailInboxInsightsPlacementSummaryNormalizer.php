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
class EmailInboxInsightsPlacementSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsPlacementSummary::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsPlacementSummary::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsPlacementSummary();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('inbox_rate_percent', $data) && \is_int($data['inbox_rate_percent'])) {
            $data['inbox_rate_percent'] = (float) $data['inbox_rate_percent'];
        }
        if (\array_key_exists('spam_rate_percent', $data) && \is_int($data['spam_rate_percent'])) {
            $data['spam_rate_percent'] = (float) $data['spam_rate_percent'];
        }
        if (\array_key_exists('missing_rate_percent', $data) && \is_int($data['missing_rate_percent'])) {
            $data['missing_rate_percent'] = (float) $data['missing_rate_percent'];
        }
        if (\array_key_exists('read_rate_percent', $data) && \is_int($data['read_rate_percent'])) {
            $data['read_rate_percent'] = (float) $data['read_rate_percent'];
        }
        if (\array_key_exists('inbox_rate_percent', $data) && $data['inbox_rate_percent'] !== null) {
            $object->setInboxRatePercent($data['inbox_rate_percent']);
        }
        elseif (\array_key_exists('inbox_rate_percent', $data) && $data['inbox_rate_percent'] === null) {
            $object->setInboxRatePercent(null);
        }
        if (\array_key_exists('spam_rate_percent', $data) && $data['spam_rate_percent'] !== null) {
            $object->setSpamRatePercent($data['spam_rate_percent']);
        }
        elseif (\array_key_exists('spam_rate_percent', $data) && $data['spam_rate_percent'] === null) {
            $object->setSpamRatePercent(null);
        }
        if (\array_key_exists('missing_rate_percent', $data) && $data['missing_rate_percent'] !== null) {
            $object->setMissingRatePercent($data['missing_rate_percent']);
        }
        elseif (\array_key_exists('missing_rate_percent', $data) && $data['missing_rate_percent'] === null) {
            $object->setMissingRatePercent(null);
        }
        if (\array_key_exists('raw_counts', $data) && $data['raw_counts'] !== null) {
            $object->setRawCounts($this->denormalizer->denormalize($data['raw_counts'], \MessageBird\Wire\Model\EmailInboxInsightsPlacementSummaryRawCounts::class, 'json', $context));
        }
        elseif (\array_key_exists('raw_counts', $data) && $data['raw_counts'] === null) {
            $object->setRawCounts(null);
        }
        if (\array_key_exists('read_rate_percent', $data) && $data['read_rate_percent'] !== null) {
            $object->setReadRatePercent($data['read_rate_percent']);
        }
        elseif (\array_key_exists('read_rate_percent', $data) && $data['read_rate_percent'] === null) {
            $object->setReadRatePercent(null);
        }
        if (\array_key_exists('delta_pts', $data) && $data['delta_pts'] !== null) {
            $object->setDeltaPts($this->denormalizer->denormalize($data['delta_pts'], \MessageBird\Wire\Model\EmailInboxInsightsPlacementDeltaPts::class, 'json', $context));
        }
        elseif (\array_key_exists('delta_pts', $data) && $data['delta_pts'] === null) {
            $object->setDeltaPts(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['status'] = $data->getStatus();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailInboxInsightsPlacementSummary::class => false];
    }
}
