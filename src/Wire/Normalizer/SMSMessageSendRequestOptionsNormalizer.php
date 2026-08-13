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
class SMSMessageSendRequestOptionsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\SMSMessageSendRequestOptions::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\SMSMessageSendRequestOptions::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\SMSMessageSendRequestOptions();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('max_price_per_segment', $data) && \is_int($data['max_price_per_segment'])) {
            $data['max_price_per_segment'] = (float) $data['max_price_per_segment'];
        }
        if (\array_key_exists('smart_encoding', $data) && \is_int($data['smart_encoding'])) {
            $data['smart_encoding'] = (bool) $data['smart_encoding'];
        }
        if (\array_key_exists('track_clicks', $data) && \is_int($data['track_clicks'])) {
            $data['track_clicks'] = (bool) $data['track_clicks'];
        }
        if (\array_key_exists('smart_encoding', $data) && $data['smart_encoding'] !== null) {
            $object->setSmartEncoding($data['smart_encoding']);
            unset($data['smart_encoding']);
        }
        elseif (\array_key_exists('smart_encoding', $data) && $data['smart_encoding'] === null) {
            $object->setSmartEncoding(null);
        }
        if (\array_key_exists('track_clicks', $data) && $data['track_clicks'] !== null) {
            $object->setTrackClicks($data['track_clicks']);
            unset($data['track_clicks']);
        }
        elseif (\array_key_exists('track_clicks', $data) && $data['track_clicks'] === null) {
            $object->setTrackClicks(null);
        }
        if (\array_key_exists('max_price_per_segment', $data) && $data['max_price_per_segment'] !== null) {
            $object->setMaxPricePerSegment($data['max_price_per_segment']);
            unset($data['max_price_per_segment']);
        }
        elseif (\array_key_exists('max_price_per_segment', $data) && $data['max_price_per_segment'] === null) {
            $object->setMaxPricePerSegment(null);
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
        if ($data->isInitialized('smartEncoding') && null !== $data->getSmartEncoding()) {
            $dataArray['smart_encoding'] = $data->getSmartEncoding();
        }
        if ($data->isInitialized('trackClicks') && null !== $data->getTrackClicks()) {
            $dataArray['track_clicks'] = $data->getTrackClicks();
        }
        if ($data->isInitialized('maxPricePerSegment') && null !== $data->getMaxPricePerSegment()) {
            $dataArray['max_price_per_segment'] = $data->getMaxPricePerSegment();
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\SMSMessageSendRequestOptions::class => false];
    }
}
