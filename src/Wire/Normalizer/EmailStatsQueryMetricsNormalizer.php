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
class EmailStatsQueryMetricsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailStatsQueryMetrics::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailStatsQueryMetrics::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailStatsQueryMetrics();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('delivery_rate', $data) && \is_int($data['delivery_rate'])) {
            $data['delivery_rate'] = (float) $data['delivery_rate'];
        }
        if (\array_key_exists('bounce_rate', $data) && \is_int($data['bounce_rate'])) {
            $data['bounce_rate'] = (float) $data['bounce_rate'];
        }
        if (\array_key_exists('complaint_rate', $data) && \is_int($data['complaint_rate'])) {
            $data['complaint_rate'] = (float) $data['complaint_rate'];
        }
        if (\array_key_exists('deferral_rate', $data) && \is_int($data['deferral_rate'])) {
            $data['deferral_rate'] = (float) $data['deferral_rate'];
        }
        if (\array_key_exists('open_rate', $data) && \is_int($data['open_rate'])) {
            $data['open_rate'] = (float) $data['open_rate'];
        }
        if (\array_key_exists('click_rate', $data) && \is_int($data['click_rate'])) {
            $data['click_rate'] = (float) $data['click_rate'];
        }
        if (\array_key_exists('unsubscribe_rate', $data) && \is_int($data['unsubscribe_rate'])) {
            $data['unsubscribe_rate'] = (float) $data['unsubscribe_rate'];
        }
        if (\array_key_exists('oob_rate', $data) && \is_int($data['oob_rate'])) {
            $data['oob_rate'] = (float) $data['oob_rate'];
        }
        if (\array_key_exists('sends_accepted', $data) && $data['sends_accepted'] !== null) {
            $object->setSendsAccepted($data['sends_accepted']);
        }
        elseif (\array_key_exists('sends_accepted', $data) && $data['sends_accepted'] === null) {
            $object->setSendsAccepted(null);
        }
        if (\array_key_exists('accepted', $data) && $data['accepted'] !== null) {
            $object->setAccepted($data['accepted']);
        }
        elseif (\array_key_exists('accepted', $data) && $data['accepted'] === null) {
            $object->setAccepted(null);
        }
        if (\array_key_exists('processed', $data) && $data['processed'] !== null) {
            $object->setProcessed($data['processed']);
        }
        elseif (\array_key_exists('processed', $data) && $data['processed'] === null) {
            $object->setProcessed(null);
        }
        if (\array_key_exists('delivered', $data) && $data['delivered'] !== null) {
            $object->setDelivered($data['delivered']);
        }
        elseif (\array_key_exists('delivered', $data) && $data['delivered'] === null) {
            $object->setDelivered(null);
        }
        if (\array_key_exists('bounced', $data) && $data['bounced'] !== null) {
            $object->setBounced($data['bounced']);
        }
        elseif (\array_key_exists('bounced', $data) && $data['bounced'] === null) {
            $object->setBounced(null);
        }
        if (\array_key_exists('hard_bounced', $data) && $data['hard_bounced'] !== null) {
            $object->setHardBounced($data['hard_bounced']);
        }
        elseif (\array_key_exists('hard_bounced', $data) && $data['hard_bounced'] === null) {
            $object->setHardBounced(null);
        }
        if (\array_key_exists('soft_bounced', $data) && $data['soft_bounced'] !== null) {
            $object->setSoftBounced($data['soft_bounced']);
        }
        elseif (\array_key_exists('soft_bounced', $data) && $data['soft_bounced'] === null) {
            $object->setSoftBounced(null);
        }
        if (\array_key_exists('admin_bounced', $data) && $data['admin_bounced'] !== null) {
            $object->setAdminBounced($data['admin_bounced']);
        }
        elseif (\array_key_exists('admin_bounced', $data) && $data['admin_bounced'] === null) {
            $object->setAdminBounced(null);
        }
        if (\array_key_exists('block_bounced', $data) && $data['block_bounced'] !== null) {
            $object->setBlockBounced($data['block_bounced']);
        }
        elseif (\array_key_exists('block_bounced', $data) && $data['block_bounced'] === null) {
            $object->setBlockBounced(null);
        }
        if (\array_key_exists('undetermined_bounced', $data) && $data['undetermined_bounced'] !== null) {
            $object->setUndeterminedBounced($data['undetermined_bounced']);
        }
        elseif (\array_key_exists('undetermined_bounced', $data) && $data['undetermined_bounced'] === null) {
            $object->setUndeterminedBounced(null);
        }
        if (\array_key_exists('complained', $data) && $data['complained'] !== null) {
            $object->setComplained($data['complained']);
        }
        elseif (\array_key_exists('complained', $data) && $data['complained'] === null) {
            $object->setComplained(null);
        }
        if (\array_key_exists('deferred', $data) && $data['deferred'] !== null) {
            $object->setDeferred($data['deferred']);
        }
        elseif (\array_key_exists('deferred', $data) && $data['deferred'] === null) {
            $object->setDeferred(null);
        }
        if (\array_key_exists('rejected', $data) && $data['rejected'] !== null) {
            $object->setRejected($data['rejected']);
        }
        elseif (\array_key_exists('rejected', $data) && $data['rejected'] === null) {
            $object->setRejected(null);
        }
        if (\array_key_exists('oob_bounces', $data) && $data['oob_bounces'] !== null) {
            $object->setOobBounces($data['oob_bounces']);
        }
        elseif (\array_key_exists('oob_bounces', $data) && $data['oob_bounces'] === null) {
            $object->setOobBounces(null);
        }
        if (\array_key_exists('opens', $data) && $data['opens'] !== null) {
            $object->setOpens($data['opens']);
        }
        elseif (\array_key_exists('opens', $data) && $data['opens'] === null) {
            $object->setOpens(null);
        }
        if (\array_key_exists('opens_non_prefetched', $data) && $data['opens_non_prefetched'] !== null) {
            $object->setOpensNonPrefetched($data['opens_non_prefetched']);
        }
        elseif (\array_key_exists('opens_non_prefetched', $data) && $data['opens_non_prefetched'] === null) {
            $object->setOpensNonPrefetched(null);
        }
        if (\array_key_exists('clicks', $data) && $data['clicks'] !== null) {
            $object->setClicks($data['clicks']);
        }
        elseif (\array_key_exists('clicks', $data) && $data['clicks'] === null) {
            $object->setClicks(null);
        }
        if (\array_key_exists('unsubscribes', $data) && $data['unsubscribes'] !== null) {
            $object->setUnsubscribes($data['unsubscribes']);
        }
        elseif (\array_key_exists('unsubscribes', $data) && $data['unsubscribes'] === null) {
            $object->setUnsubscribes(null);
        }
        if (\array_key_exists('unique_opens', $data) && $data['unique_opens'] !== null) {
            $object->setUniqueOpens($data['unique_opens']);
        }
        elseif (\array_key_exists('unique_opens', $data) && $data['unique_opens'] === null) {
            $object->setUniqueOpens(null);
        }
        if (\array_key_exists('unique_opens_non_prefetched', $data) && $data['unique_opens_non_prefetched'] !== null) {
            $object->setUniqueOpensNonPrefetched($data['unique_opens_non_prefetched']);
        }
        elseif (\array_key_exists('unique_opens_non_prefetched', $data) && $data['unique_opens_non_prefetched'] === null) {
            $object->setUniqueOpensNonPrefetched(null);
        }
        if (\array_key_exists('unique_clicks', $data) && $data['unique_clicks'] !== null) {
            $object->setUniqueClicks($data['unique_clicks']);
        }
        elseif (\array_key_exists('unique_clicks', $data) && $data['unique_clicks'] === null) {
            $object->setUniqueClicks(null);
        }
        if (\array_key_exists('confirmed_unique_opens', $data) && $data['confirmed_unique_opens'] !== null) {
            $object->setConfirmedUniqueOpens($data['confirmed_unique_opens']);
        }
        elseif (\array_key_exists('confirmed_unique_opens', $data) && $data['confirmed_unique_opens'] === null) {
            $object->setConfirmedUniqueOpens(null);
        }
        if (\array_key_exists('confirmed_unique_opens_non_prefetched', $data) && $data['confirmed_unique_opens_non_prefetched'] !== null) {
            $object->setConfirmedUniqueOpensNonPrefetched($data['confirmed_unique_opens_non_prefetched']);
        }
        elseif (\array_key_exists('confirmed_unique_opens_non_prefetched', $data) && $data['confirmed_unique_opens_non_prefetched'] === null) {
            $object->setConfirmedUniqueOpensNonPrefetched(null);
        }
        if (\array_key_exists('effective_delivered', $data) && $data['effective_delivered'] !== null) {
            $object->setEffectiveDelivered($data['effective_delivered']);
        }
        elseif (\array_key_exists('effective_delivered', $data) && $data['effective_delivered'] === null) {
            $object->setEffectiveDelivered(null);
        }
        if (\array_key_exists('all_bounces', $data) && $data['all_bounces'] !== null) {
            $object->setAllBounces($data['all_bounces']);
        }
        elseif (\array_key_exists('all_bounces', $data) && $data['all_bounces'] === null) {
            $object->setAllBounces(null);
        }
        if (\array_key_exists('delivery_rate', $data) && $data['delivery_rate'] !== null) {
            $object->setDeliveryRate($data['delivery_rate']);
        }
        elseif (\array_key_exists('delivery_rate', $data) && $data['delivery_rate'] === null) {
            $object->setDeliveryRate(null);
        }
        if (\array_key_exists('bounce_rate', $data) && $data['bounce_rate'] !== null) {
            $object->setBounceRate($data['bounce_rate']);
        }
        elseif (\array_key_exists('bounce_rate', $data) && $data['bounce_rate'] === null) {
            $object->setBounceRate(null);
        }
        if (\array_key_exists('complaint_rate', $data) && $data['complaint_rate'] !== null) {
            $object->setComplaintRate($data['complaint_rate']);
        }
        elseif (\array_key_exists('complaint_rate', $data) && $data['complaint_rate'] === null) {
            $object->setComplaintRate(null);
        }
        if (\array_key_exists('deferral_rate', $data) && $data['deferral_rate'] !== null) {
            $object->setDeferralRate($data['deferral_rate']);
        }
        elseif (\array_key_exists('deferral_rate', $data) && $data['deferral_rate'] === null) {
            $object->setDeferralRate(null);
        }
        if (\array_key_exists('open_rate', $data) && $data['open_rate'] !== null) {
            $object->setOpenRate($data['open_rate']);
        }
        elseif (\array_key_exists('open_rate', $data) && $data['open_rate'] === null) {
            $object->setOpenRate(null);
        }
        if (\array_key_exists('click_rate', $data) && $data['click_rate'] !== null) {
            $object->setClickRate($data['click_rate']);
        }
        elseif (\array_key_exists('click_rate', $data) && $data['click_rate'] === null) {
            $object->setClickRate(null);
        }
        if (\array_key_exists('unsubscribe_rate', $data) && $data['unsubscribe_rate'] !== null) {
            $object->setUnsubscribeRate($data['unsubscribe_rate']);
        }
        elseif (\array_key_exists('unsubscribe_rate', $data) && $data['unsubscribe_rate'] === null) {
            $object->setUnsubscribeRate(null);
        }
        if (\array_key_exists('oob_rate', $data) && $data['oob_rate'] !== null) {
            $object->setOobRate($data['oob_rate']);
        }
        elseif (\array_key_exists('oob_rate', $data) && $data['oob_rate'] === null) {
            $object->setOobRate(null);
        }
        if (\array_key_exists('processing_p50_ms', $data) && $data['processing_p50_ms'] !== null) {
            $object->setProcessingP50Ms($data['processing_p50_ms']);
        }
        elseif (\array_key_exists('processing_p50_ms', $data) && $data['processing_p50_ms'] === null) {
            $object->setProcessingP50Ms(null);
        }
        if (\array_key_exists('processing_p95_ms', $data) && $data['processing_p95_ms'] !== null) {
            $object->setProcessingP95Ms($data['processing_p95_ms']);
        }
        elseif (\array_key_exists('processing_p95_ms', $data) && $data['processing_p95_ms'] === null) {
            $object->setProcessingP95Ms(null);
        }
        if (\array_key_exists('processing_p99_ms', $data) && $data['processing_p99_ms'] !== null) {
            $object->setProcessingP99Ms($data['processing_p99_ms']);
        }
        elseif (\array_key_exists('processing_p99_ms', $data) && $data['processing_p99_ms'] === null) {
            $object->setProcessingP99Ms(null);
        }
        if (\array_key_exists('total_p50_ms', $data) && $data['total_p50_ms'] !== null) {
            $object->setTotalP50Ms($data['total_p50_ms']);
        }
        elseif (\array_key_exists('total_p50_ms', $data) && $data['total_p50_ms'] === null) {
            $object->setTotalP50Ms(null);
        }
        if (\array_key_exists('total_p95_ms', $data) && $data['total_p95_ms'] !== null) {
            $object->setTotalP95Ms($data['total_p95_ms']);
        }
        elseif (\array_key_exists('total_p95_ms', $data) && $data['total_p95_ms'] === null) {
            $object->setTotalP95Ms(null);
        }
        if (\array_key_exists('total_p99_ms', $data) && $data['total_p99_ms'] !== null) {
            $object->setTotalP99Ms($data['total_p99_ms']);
        }
        elseif (\array_key_exists('total_p99_ms', $data) && $data['total_p99_ms'] === null) {
            $object->setTotalP99Ms(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('sendsAccepted') && null !== $data->getSendsAccepted()) {
            $dataArray['sends_accepted'] = $data->getSendsAccepted();
        }
        if ($data->isInitialized('accepted') && null !== $data->getAccepted()) {
            $dataArray['accepted'] = $data->getAccepted();
        }
        if ($data->isInitialized('processed') && null !== $data->getProcessed()) {
            $dataArray['processed'] = $data->getProcessed();
        }
        if ($data->isInitialized('delivered') && null !== $data->getDelivered()) {
            $dataArray['delivered'] = $data->getDelivered();
        }
        if ($data->isInitialized('bounced') && null !== $data->getBounced()) {
            $dataArray['bounced'] = $data->getBounced();
        }
        if ($data->isInitialized('hardBounced') && null !== $data->getHardBounced()) {
            $dataArray['hard_bounced'] = $data->getHardBounced();
        }
        if ($data->isInitialized('softBounced') && null !== $data->getSoftBounced()) {
            $dataArray['soft_bounced'] = $data->getSoftBounced();
        }
        if ($data->isInitialized('adminBounced') && null !== $data->getAdminBounced()) {
            $dataArray['admin_bounced'] = $data->getAdminBounced();
        }
        if ($data->isInitialized('blockBounced') && null !== $data->getBlockBounced()) {
            $dataArray['block_bounced'] = $data->getBlockBounced();
        }
        if ($data->isInitialized('undeterminedBounced') && null !== $data->getUndeterminedBounced()) {
            $dataArray['undetermined_bounced'] = $data->getUndeterminedBounced();
        }
        if ($data->isInitialized('complained') && null !== $data->getComplained()) {
            $dataArray['complained'] = $data->getComplained();
        }
        if ($data->isInitialized('deferred') && null !== $data->getDeferred()) {
            $dataArray['deferred'] = $data->getDeferred();
        }
        if ($data->isInitialized('rejected') && null !== $data->getRejected()) {
            $dataArray['rejected'] = $data->getRejected();
        }
        if ($data->isInitialized('oobBounces') && null !== $data->getOobBounces()) {
            $dataArray['oob_bounces'] = $data->getOobBounces();
        }
        if ($data->isInitialized('opens') && null !== $data->getOpens()) {
            $dataArray['opens'] = $data->getOpens();
        }
        if ($data->isInitialized('opensNonPrefetched') && null !== $data->getOpensNonPrefetched()) {
            $dataArray['opens_non_prefetched'] = $data->getOpensNonPrefetched();
        }
        if ($data->isInitialized('clicks') && null !== $data->getClicks()) {
            $dataArray['clicks'] = $data->getClicks();
        }
        if ($data->isInitialized('unsubscribes') && null !== $data->getUnsubscribes()) {
            $dataArray['unsubscribes'] = $data->getUnsubscribes();
        }
        if ($data->isInitialized('uniqueOpens') && null !== $data->getUniqueOpens()) {
            $dataArray['unique_opens'] = $data->getUniqueOpens();
        }
        if ($data->isInitialized('uniqueOpensNonPrefetched') && null !== $data->getUniqueOpensNonPrefetched()) {
            $dataArray['unique_opens_non_prefetched'] = $data->getUniqueOpensNonPrefetched();
        }
        if ($data->isInitialized('uniqueClicks') && null !== $data->getUniqueClicks()) {
            $dataArray['unique_clicks'] = $data->getUniqueClicks();
        }
        if ($data->isInitialized('confirmedUniqueOpens') && null !== $data->getConfirmedUniqueOpens()) {
            $dataArray['confirmed_unique_opens'] = $data->getConfirmedUniqueOpens();
        }
        if ($data->isInitialized('confirmedUniqueOpensNonPrefetched') && null !== $data->getConfirmedUniqueOpensNonPrefetched()) {
            $dataArray['confirmed_unique_opens_non_prefetched'] = $data->getConfirmedUniqueOpensNonPrefetched();
        }
        if ($data->isInitialized('effectiveDelivered') && null !== $data->getEffectiveDelivered()) {
            $dataArray['effective_delivered'] = $data->getEffectiveDelivered();
        }
        if ($data->isInitialized('allBounces') && null !== $data->getAllBounces()) {
            $dataArray['all_bounces'] = $data->getAllBounces();
        }
        if ($data->isInitialized('deliveryRate')) {
            $dataArray['delivery_rate'] = $data->getDeliveryRate();
        }
        if ($data->isInitialized('bounceRate')) {
            $dataArray['bounce_rate'] = $data->getBounceRate();
        }
        if ($data->isInitialized('complaintRate')) {
            $dataArray['complaint_rate'] = $data->getComplaintRate();
        }
        if ($data->isInitialized('deferralRate')) {
            $dataArray['deferral_rate'] = $data->getDeferralRate();
        }
        if ($data->isInitialized('openRate')) {
            $dataArray['open_rate'] = $data->getOpenRate();
        }
        if ($data->isInitialized('clickRate')) {
            $dataArray['click_rate'] = $data->getClickRate();
        }
        if ($data->isInitialized('unsubscribeRate')) {
            $dataArray['unsubscribe_rate'] = $data->getUnsubscribeRate();
        }
        if ($data->isInitialized('oobRate')) {
            $dataArray['oob_rate'] = $data->getOobRate();
        }
        if ($data->isInitialized('processingP50Ms')) {
            $dataArray['processing_p50_ms'] = $data->getProcessingP50Ms();
        }
        if ($data->isInitialized('processingP95Ms')) {
            $dataArray['processing_p95_ms'] = $data->getProcessingP95Ms();
        }
        if ($data->isInitialized('processingP99Ms')) {
            $dataArray['processing_p99_ms'] = $data->getProcessingP99Ms();
        }
        if ($data->isInitialized('totalP50Ms')) {
            $dataArray['total_p50_ms'] = $data->getTotalP50Ms();
        }
        if ($data->isInitialized('totalP95Ms')) {
            $dataArray['total_p95_ms'] = $data->getTotalP95Ms();
        }
        if ($data->isInitialized('totalP99Ms')) {
            $dataArray['total_p99_ms'] = $data->getTotalP99Ms();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailStatsQueryMetrics::class => false];
    }
}
