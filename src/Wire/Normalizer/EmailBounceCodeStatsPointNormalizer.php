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
class EmailBounceCodeStatsPointNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBounceCodeStatsPoint::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBounceCodeStatsPoint::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBounceCodeStatsPoint();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('smtp_error_code', $data) && $data['smtp_error_code'] !== null) {
            $object->setSmtpErrorCode($data['smtp_error_code']);
        }
        elseif (\array_key_exists('smtp_error_code', $data) && $data['smtp_error_code'] === null) {
            $object->setSmtpErrorCode(null);
        }
        if (\array_key_exists('bounced', $data) && $data['bounced'] !== null) {
            $object->setBounced($data['bounced']);
        }
        elseif (\array_key_exists('bounced', $data) && $data['bounced'] === null) {
            $object->setBounced(null);
        }
        if (\array_key_exists('bounces', $data) && $data['bounces'] !== null) {
            $object->setBounces($this->denormalizer->denormalize($data['bounces'], \MessageBird\Wire\Model\EmailBounceCodeStatsPointBounces::class, 'json', $context));
        }
        elseif (\array_key_exists('bounces', $data) && $data['bounces'] === null) {
            $object->setBounces(null);
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
        return [\MessageBird\Wire\Model\EmailBounceCodeStatsPoint::class => false];
    }
}
