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
class EmailInboxInsightsPlacementSeriesPointNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsPlacementSeriesPoint::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsPlacementSeriesPoint::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsPlacementSeriesPoint();
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
        if (\array_key_exists('date', $data) && $data['date'] !== null) {
            $object->setDate(\DateTime::createFromFormat('Y-m-d', $data['date'])->setTime(0, 0, 0));
        }
        elseif (\array_key_exists('date', $data) && $data['date'] === null) {
            $object->setDate(null);
        }
        if (\array_key_exists('mailbox_provider', $data) && $data['mailbox_provider'] !== null) {
            $object->setMailboxProvider($data['mailbox_provider']);
        }
        elseif (\array_key_exists('mailbox_provider', $data) && $data['mailbox_provider'] === null) {
            $object->setMailboxProvider(null);
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
        if (\array_key_exists('inbox_raw_count', $data) && $data['inbox_raw_count'] !== null) {
            $object->setInboxRawCount($data['inbox_raw_count']);
        }
        elseif (\array_key_exists('inbox_raw_count', $data) && $data['inbox_raw_count'] === null) {
            $object->setInboxRawCount(null);
        }
        if (\array_key_exists('spam_raw_count', $data) && $data['spam_raw_count'] !== null) {
            $object->setSpamRawCount($data['spam_raw_count']);
        }
        elseif (\array_key_exists('spam_raw_count', $data) && $data['spam_raw_count'] === null) {
            $object->setSpamRawCount(null);
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
        return [\MessageBird\Wire\Model\EmailInboxInsightsPlacementSeriesPoint::class => false];
    }
}
