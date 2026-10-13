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
class VoiceDestinationDailySpendLimitNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceDestinationDailySpendLimit::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceDestinationDailySpendLimit::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceDestinationDailySpendLimit();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('limit', $data) && $data['limit'] !== null) {
            $object->setLimit($this->denormalizer->denormalize($data['limit'], \MessageBird\Wire\Model\VoiceDestinationDailySpendLimitLimit::class, 'json', $context));
            unset($data['limit']);
        }
        elseif (\array_key_exists('limit', $data) && $data['limit'] === null) {
            $object->setLimit(null);
        }
        if (\array_key_exists('used', $data) && $data['used'] !== null) {
            $object->setUsed($this->denormalizer->denormalize($data['used'], \MessageBird\Wire\Model\VoiceDestinationDailySpendLimitUsed::class, 'json', $context));
            unset($data['used']);
        }
        elseif (\array_key_exists('used', $data) && $data['used'] === null) {
            $object->setUsed(null);
        }
        if (\array_key_exists('remaining', $data) && $data['remaining'] !== null) {
            $object->setRemaining($this->denormalizer->denormalize($data['remaining'], \MessageBird\Wire\Model\VoiceDestinationDailySpendLimitRemaining::class, 'json', $context));
            unset($data['remaining']);
        }
        elseif (\array_key_exists('remaining', $data) && $data['remaining'] === null) {
            $object->setRemaining(null);
        }
        if (\array_key_exists('resets_at', $data) && $data['resets_at'] !== null) {
            $object->setResetsAt(new \DateTime($data['resets_at']));
            unset($data['resets_at']);
        }
        elseif (\array_key_exists('resets_at', $data) && $data['resets_at'] === null) {
            $object->setResetsAt(null);
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
        $dataArray['limit'] = $this->normalizer->normalize($data->getLimit(), 'json', $context);
        $dataArray['used'] = $this->normalizer->normalize($data->getUsed(), 'json', $context);
        $dataArray['remaining'] = $this->normalizer->normalize($data->getRemaining(), 'json', $context);
        $dataArray['resets_at'] = $data->getResetsAt()->format('Y-m-d\TH:i:sP');
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceDestinationDailySpendLimit::class => false];
    }
}
