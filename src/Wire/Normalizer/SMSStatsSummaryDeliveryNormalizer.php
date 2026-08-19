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
class SMSStatsSummaryDeliveryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\SMSStatsSummaryDelivery::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\SMSStatsSummaryDelivery::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\SMSStatsSummaryDelivery();
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
        if (\array_key_exists('failure_rate', $data) && \is_int($data['failure_rate'])) {
            $data['failure_rate'] = (float) $data['failure_rate'];
        }
        if (\array_key_exists('accepted', $data) && $data['accepted'] !== null) {
            $object->setAccepted($data['accepted']);
            unset($data['accepted']);
        }
        elseif (\array_key_exists('accepted', $data) && $data['accepted'] === null) {
            $object->setAccepted(null);
        }
        if (\array_key_exists('sent', $data) && $data['sent'] !== null) {
            $object->setSent($data['sent']);
            unset($data['sent']);
        }
        elseif (\array_key_exists('sent', $data) && $data['sent'] === null) {
            $object->setSent(null);
        }
        if (\array_key_exists('delivered', $data) && $data['delivered'] !== null) {
            $object->setDelivered($data['delivered']);
            unset($data['delivered']);
        }
        elseif (\array_key_exists('delivered', $data) && $data['delivered'] === null) {
            $object->setDelivered(null);
        }
        if (\array_key_exists('undelivered', $data) && $data['undelivered'] !== null) {
            $object->setUndelivered($data['undelivered']);
            unset($data['undelivered']);
        }
        elseif (\array_key_exists('undelivered', $data) && $data['undelivered'] === null) {
            $object->setUndelivered(null);
        }
        if (\array_key_exists('failed', $data) && $data['failed'] !== null) {
            $object->setFailed($data['failed']);
            unset($data['failed']);
        }
        elseif (\array_key_exists('failed', $data) && $data['failed'] === null) {
            $object->setFailed(null);
        }
        if (\array_key_exists('rejected', $data) && $data['rejected'] !== null) {
            $object->setRejected($data['rejected']);
            unset($data['rejected']);
        }
        elseif (\array_key_exists('rejected', $data) && $data['rejected'] === null) {
            $object->setRejected(null);
        }
        if (\array_key_exists('expired', $data) && $data['expired'] !== null) {
            $object->setExpired($data['expired']);
            unset($data['expired']);
        }
        elseif (\array_key_exists('expired', $data) && $data['expired'] === null) {
            $object->setExpired(null);
        }
        if (\array_key_exists('delivery_rate', $data) && $data['delivery_rate'] !== null) {
            $object->setDeliveryRate($data['delivery_rate']);
            unset($data['delivery_rate']);
        }
        elseif (\array_key_exists('delivery_rate', $data) && $data['delivery_rate'] === null) {
            $object->setDeliveryRate(null);
        }
        if (\array_key_exists('failure_rate', $data) && $data['failure_rate'] !== null) {
            $object->setFailureRate($data['failure_rate']);
            unset($data['failure_rate']);
        }
        elseif (\array_key_exists('failure_rate', $data) && $data['failure_rate'] === null) {
            $object->setFailureRate(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\SMSStatsSummaryDelivery::class => false];
    }
}
