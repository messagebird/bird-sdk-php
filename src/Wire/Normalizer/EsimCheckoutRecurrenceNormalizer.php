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
class EsimCheckoutRecurrenceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EsimCheckoutRecurrence::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EsimCheckoutRecurrence::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EsimCheckoutRecurrence();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('available', $data) && \is_int($data['available'])) {
            $data['available'] = (bool) $data['available'];
        }
        if (\array_key_exists('available', $data) && $data['available'] !== null) {
            $object->setAvailable($data['available']);
        }
        elseif (\array_key_exists('available', $data) && $data['available'] === null) {
            $object->setAvailable(null);
        }
        if (\array_key_exists('quote', $data) && $data['quote'] !== null) {
            $object->setQuote($this->denormalizer->denormalize($data['quote'], \MessageBird\Wire\Model\EsimCheckoutRecurrenceQuote::class, 'json', $context));
        }
        elseif (\array_key_exists('quote', $data) && $data['quote'] === null) {
            $object->setQuote(null);
        }
        if (\array_key_exists('unavailable_reason', $data) && $data['unavailable_reason'] !== null) {
            $object->setUnavailableReason($data['unavailable_reason']);
        }
        elseif (\array_key_exists('unavailable_reason', $data) && $data['unavailable_reason'] === null) {
            $object->setUnavailableReason(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['available'] = $data->getAvailable();
        $dataArray['quote'] = $this->normalizer->normalize($data->getQuote(), 'json', $context);
        $dataArray['unavailable_reason'] = $data->getUnavailableReason();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EsimCheckoutRecurrence::class => false];
    }
}
