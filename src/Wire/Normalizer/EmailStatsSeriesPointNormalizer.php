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
class EmailStatsSeriesPointNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailStatsSeriesPoint::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailStatsSeriesPoint::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailStatsSeriesPoint();
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
        if (\array_key_exists('open_rate', $data) && \is_int($data['open_rate'])) {
            $data['open_rate'] = (float) $data['open_rate'];
        }
        if (\array_key_exists('click_rate', $data) && \is_int($data['click_rate'])) {
            $data['click_rate'] = (float) $data['click_rate'];
        }
        if (\array_key_exists('bucket', $data) && $data['bucket'] !== null) {
            $object->setBucket($data['bucket']);
        }
        elseif (\array_key_exists('bucket', $data) && $data['bucket'] === null) {
            $object->setBucket(null);
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
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailStatsSeriesPoint::class => false];
    }
}
