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
class AMBOutboundStatsCountsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBOutboundStatsCounts::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBOutboundStatsCounts::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBOutboundStatsCounts();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('sent_rate', $data) && \is_int($data['sent_rate'])) {
            $data['sent_rate'] = (float) $data['sent_rate'];
        }
        if (\array_key_exists('send_failure_rate', $data) && \is_int($data['send_failure_rate'])) {
            $data['send_failure_rate'] = (float) $data['send_failure_rate'];
        }
        if (\array_key_exists('accepted', $data) && $data['accepted'] !== null) {
            $object->setAccepted($data['accepted']);
        }
        elseif (\array_key_exists('accepted', $data) && $data['accepted'] === null) {
            $object->setAccepted(null);
        }
        if (\array_key_exists('sent', $data) && $data['sent'] !== null) {
            $object->setSent($data['sent']);
        }
        elseif (\array_key_exists('sent', $data) && $data['sent'] === null) {
            $object->setSent(null);
        }
        if (\array_key_exists('send_failed', $data) && $data['send_failed'] !== null) {
            $object->setSendFailed($data['send_failed']);
        }
        elseif (\array_key_exists('send_failed', $data) && $data['send_failed'] === null) {
            $object->setSendFailed(null);
        }
        if (\array_key_exists('rejected', $data) && $data['rejected'] !== null) {
            $object->setRejected($data['rejected']);
        }
        elseif (\array_key_exists('rejected', $data) && $data['rejected'] === null) {
            $object->setRejected(null);
        }
        if (\array_key_exists('sent_rate', $data) && $data['sent_rate'] !== null) {
            $object->setSentRate($data['sent_rate']);
        }
        elseif (\array_key_exists('sent_rate', $data) && $data['sent_rate'] === null) {
            $object->setSentRate(null);
        }
        if (\array_key_exists('send_failure_rate', $data) && $data['send_failure_rate'] !== null) {
            $object->setSendFailureRate($data['send_failure_rate']);
        }
        elseif (\array_key_exists('send_failure_rate', $data) && $data['send_failure_rate'] === null) {
            $object->setSendFailureRate(null);
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
        return [\MessageBird\Wire\Model\AMBOutboundStatsCounts::class => false];
    }
}
