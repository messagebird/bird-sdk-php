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
class EmailLookupNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailLookup::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailLookup::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailLookup();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('valid', $data) && \is_int($data['valid'])) {
            $data['valid'] = (bool) $data['valid'];
        }
        if (\array_key_exists('email', $data) && $data['email'] !== null) {
            $object->setEmail($data['email']);
        }
        elseif (\array_key_exists('email', $data) && $data['email'] === null) {
            $object->setEmail(null);
        }
        if (\array_key_exists('valid', $data) && $data['valid'] !== null) {
            $object->setValid($data['valid']);
        }
        elseif (\array_key_exists('valid', $data) && $data['valid'] === null) {
            $object->setValid(null);
        }
        if (\array_key_exists('result', $data) && $data['result'] !== null) {
            $object->setResult($data['result']);
        }
        elseif (\array_key_exists('result', $data) && $data['result'] === null) {
            $object->setResult(null);
        }
        if (\array_key_exists('delivery_confidence', $data) && $data['delivery_confidence'] !== null) {
            $object->setDeliveryConfidence($data['delivery_confidence']);
        }
        elseif (\array_key_exists('delivery_confidence', $data) && $data['delivery_confidence'] === null) {
            $object->setDeliveryConfidence(null);
        }
        if (\array_key_exists('flags', $data) && $data['flags'] !== null) {
            $values = [];
            foreach ($data['flags'] as $value) {
                $values[] = $value;
            }
            $object->setFlags($values);
        }
        elseif (\array_key_exists('flags', $data) && $data['flags'] === null) {
            $object->setFlags(null);
        }
        if (\array_key_exists('reason', $data) && $data['reason'] !== null) {
            $object->setReason($data['reason']);
        }
        elseif (\array_key_exists('reason', $data) && $data['reason'] === null) {
            $object->setReason(null);
        }
        if (\array_key_exists('did_you_mean', $data) && $data['did_you_mean'] !== null) {
            $object->setDidYouMean($data['did_you_mean']);
        }
        elseif (\array_key_exists('did_you_mean', $data) && $data['did_you_mean'] === null) {
            $object->setDidYouMean(null);
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
        return [\MessageBird\Wire\Model\EmailLookup::class => false];
    }
}
