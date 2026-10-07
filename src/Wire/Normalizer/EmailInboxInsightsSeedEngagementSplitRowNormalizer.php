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
class EmailInboxInsightsSeedEngagementSplitRowNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsSeedEngagementSplitRow::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsSeedEngagementSplitRow::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsSeedEngagementSplitRow();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('engaged_inbox_rate_percent', $data) && \is_int($data['engaged_inbox_rate_percent'])) {
            $data['engaged_inbox_rate_percent'] = (float) $data['engaged_inbox_rate_percent'];
        }
        if (\array_key_exists('dormant_inbox_rate_percent', $data) && \is_int($data['dormant_inbox_rate_percent'])) {
            $data['dormant_inbox_rate_percent'] = (float) $data['dormant_inbox_rate_percent'];
        }
        if (\array_key_exists('gap_pts', $data) && \is_int($data['gap_pts'])) {
            $data['gap_pts'] = (float) $data['gap_pts'];
        }
        if (\array_key_exists('mailbox_provider', $data) && $data['mailbox_provider'] !== null) {
            $object->setMailboxProvider($data['mailbox_provider']);
        }
        elseif (\array_key_exists('mailbox_provider', $data) && $data['mailbox_provider'] === null) {
            $object->setMailboxProvider(null);
        }
        if (\array_key_exists('engaged_inbox_rate_percent', $data) && $data['engaged_inbox_rate_percent'] !== null) {
            $object->setEngagedInboxRatePercent($data['engaged_inbox_rate_percent']);
        }
        elseif (\array_key_exists('engaged_inbox_rate_percent', $data) && $data['engaged_inbox_rate_percent'] === null) {
            $object->setEngagedInboxRatePercent(null);
        }
        if (\array_key_exists('dormant_inbox_rate_percent', $data) && $data['dormant_inbox_rate_percent'] !== null) {
            $object->setDormantInboxRatePercent($data['dormant_inbox_rate_percent']);
        }
        elseif (\array_key_exists('dormant_inbox_rate_percent', $data) && $data['dormant_inbox_rate_percent'] === null) {
            $object->setDormantInboxRatePercent(null);
        }
        if (\array_key_exists('gap_pts', $data) && $data['gap_pts'] !== null) {
            $object->setGapPts($data['gap_pts']);
        }
        elseif (\array_key_exists('gap_pts', $data) && $data['gap_pts'] === null) {
            $object->setGapPts(null);
        }
        if (\array_key_exists('engaged_seeds', $data) && $data['engaged_seeds'] !== null) {
            $object->setEngagedSeeds($data['engaged_seeds']);
        }
        elseif (\array_key_exists('engaged_seeds', $data) && $data['engaged_seeds'] === null) {
            $object->setEngagedSeeds(null);
        }
        if (\array_key_exists('dormant_seeds', $data) && $data['dormant_seeds'] !== null) {
            $object->setDormantSeeds($data['dormant_seeds']);
        }
        elseif (\array_key_exists('dormant_seeds', $data) && $data['dormant_seeds'] === null) {
            $object->setDormantSeeds(null);
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
        return [\MessageBird\Wire\Model\EmailInboxInsightsSeedEngagementSplitRow::class => false];
    }
}
