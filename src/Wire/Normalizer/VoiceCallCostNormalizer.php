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
class VoiceCallCostNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceCallCost::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceCallCost::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceCallCost();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('amount', $data) && $data['amount'] !== null) {
            $object->setAmount($data['amount']);
        }
        elseif (\array_key_exists('amount', $data) && $data['amount'] === null) {
            $object->setAmount(null);
        }
        if (\array_key_exists('currency_code', $data) && $data['currency_code'] !== null) {
            $object->setCurrencyCode($data['currency_code']);
        }
        elseif (\array_key_exists('currency_code', $data) && $data['currency_code'] === null) {
            $object->setCurrencyCode(null);
        }
        if (\array_key_exists('outbound_amount', $data) && $data['outbound_amount'] !== null) {
            $object->setOutboundAmount($data['outbound_amount']);
        }
        elseif (\array_key_exists('outbound_amount', $data) && $data['outbound_amount'] === null) {
            $object->setOutboundAmount(null);
        }
        if (\array_key_exists('inbound_amount', $data) && $data['inbound_amount'] !== null) {
            $object->setInboundAmount($data['inbound_amount']);
        }
        elseif (\array_key_exists('inbound_amount', $data) && $data['inbound_amount'] === null) {
            $object->setInboundAmount(null);
        }
        if (\array_key_exists('call_handling_amount', $data) && $data['call_handling_amount'] !== null) {
            $object->setCallHandlingAmount($data['call_handling_amount']);
        }
        elseif (\array_key_exists('call_handling_amount', $data) && $data['call_handling_amount'] === null) {
            $object->setCallHandlingAmount(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['currency_code'] = $data->getCurrencyCode();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceCallCost::class => false];
    }
}
