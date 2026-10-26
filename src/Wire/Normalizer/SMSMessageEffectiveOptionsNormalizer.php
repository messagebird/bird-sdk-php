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
class SMSMessageEffectiveOptionsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\SMSMessageEffectiveOptions::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\SMSMessageEffectiveOptions::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\SMSMessageEffectiveOptions();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('smart_encoding', $data) && \is_int($data['smart_encoding'])) {
            $data['smart_encoding'] = (bool) $data['smart_encoding'];
        }
        if (\array_key_exists('ignore_delivery_window', $data) && \is_int($data['ignore_delivery_window'])) {
            $data['ignore_delivery_window'] = (bool) $data['ignore_delivery_window'];
        }
        if (\array_key_exists('ignore_suppression', $data) && \is_int($data['ignore_suppression'])) {
            $data['ignore_suppression'] = (bool) $data['ignore_suppression'];
        }
        if (\array_key_exists('smart_encoding', $data) && $data['smart_encoding'] !== null) {
            $object->setSmartEncoding($data['smart_encoding']);
        }
        elseif (\array_key_exists('smart_encoding', $data) && $data['smart_encoding'] === null) {
            $object->setSmartEncoding(null);
        }
        if (\array_key_exists('ignore_delivery_window', $data) && $data['ignore_delivery_window'] !== null) {
            $object->setIgnoreDeliveryWindow($data['ignore_delivery_window']);
        }
        elseif (\array_key_exists('ignore_delivery_window', $data) && $data['ignore_delivery_window'] === null) {
            $object->setIgnoreDeliveryWindow(null);
        }
        if (\array_key_exists('ignore_suppression', $data) && $data['ignore_suppression'] !== null) {
            $object->setIgnoreSuppression($data['ignore_suppression']);
        }
        elseif (\array_key_exists('ignore_suppression', $data) && $data['ignore_suppression'] === null) {
            $object->setIgnoreSuppression(null);
        }
        if (\array_key_exists('callback_url', $data) && $data['callback_url'] !== null) {
            $object->setCallbackUrl($data['callback_url']);
        }
        elseif (\array_key_exists('callback_url', $data) && $data['callback_url'] === null) {
            $object->setCallbackUrl(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['smart_encoding'] = $data->getSmartEncoding();
        if ($data->isInitialized('ignoreDeliveryWindow') && null !== $data->getIgnoreDeliveryWindow()) {
            $dataArray['ignore_delivery_window'] = $data->getIgnoreDeliveryWindow();
        }
        if ($data->isInitialized('ignoreSuppression') && null !== $data->getIgnoreSuppression()) {
            $dataArray['ignore_suppression'] = $data->getIgnoreSuppression();
        }
        if ($data->isInitialized('callbackUrl') && null !== $data->getCallbackUrl()) {
            $dataArray['callback_url'] = $data->getCallbackUrl();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\SMSMessageEffectiveOptions::class => false];
    }
}
