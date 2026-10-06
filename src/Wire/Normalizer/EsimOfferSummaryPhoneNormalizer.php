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
class EsimOfferSummaryPhoneNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EsimOfferSummaryPhone::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EsimOfferSummaryPhone::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EsimOfferSummaryPhone();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('voice_inbound', $data) && \is_int($data['voice_inbound'])) {
            $data['voice_inbound'] = (bool) $data['voice_inbound'];
        }
        if (\array_key_exists('voice_outbound', $data) && \is_int($data['voice_outbound'])) {
            $data['voice_outbound'] = (bool) $data['voice_outbound'];
        }
        if (\array_key_exists('sms_inbound', $data) && \is_int($data['sms_inbound'])) {
            $data['sms_inbound'] = (bool) $data['sms_inbound'];
        }
        if (\array_key_exists('sms_outbound', $data) && \is_int($data['sms_outbound'])) {
            $data['sms_outbound'] = (bool) $data['sms_outbound'];
        }
        if (\array_key_exists('included', $data) && $data['included'] !== null) {
            $object->setIncluded($data['included']);
            unset($data['included']);
        }
        elseif (\array_key_exists('included', $data) && $data['included'] === null) {
            $object->setIncluded(null);
        }
        if (\array_key_exists('voice_inbound', $data) && $data['voice_inbound'] !== null) {
            $object->setVoiceInbound($data['voice_inbound']);
            unset($data['voice_inbound']);
        }
        elseif (\array_key_exists('voice_inbound', $data) && $data['voice_inbound'] === null) {
            $object->setVoiceInbound(null);
        }
        if (\array_key_exists('voice_outbound', $data) && $data['voice_outbound'] !== null) {
            $object->setVoiceOutbound($data['voice_outbound']);
            unset($data['voice_outbound']);
        }
        elseif (\array_key_exists('voice_outbound', $data) && $data['voice_outbound'] === null) {
            $object->setVoiceOutbound(null);
        }
        if (\array_key_exists('sms_inbound', $data) && $data['sms_inbound'] !== null) {
            $object->setSmsInbound($data['sms_inbound']);
            unset($data['sms_inbound']);
        }
        elseif (\array_key_exists('sms_inbound', $data) && $data['sms_inbound'] === null) {
            $object->setSmsInbound(null);
        }
        if (\array_key_exists('sms_outbound', $data) && $data['sms_outbound'] !== null) {
            $object->setSmsOutbound($data['sms_outbound']);
            unset($data['sms_outbound']);
        }
        elseif (\array_key_exists('sms_outbound', $data) && $data['sms_outbound'] === null) {
            $object->setSmsOutbound(null);
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
        $dataArray['included'] = $data->getIncluded();
        $dataArray['voice_inbound'] = $data->getVoiceInbound();
        $dataArray['voice_outbound'] = $data->getVoiceOutbound();
        $dataArray['sms_inbound'] = $data->getSmsInbound();
        $dataArray['sms_outbound'] = $data->getSmsOutbound();
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EsimOfferSummaryPhone::class => false];
    }
}
