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
class EmailBroadcastSendQuotaNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBroadcastSendQuota::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBroadcastSendQuota::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBroadcastSendQuota();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('recipients', $data) && $data['recipients'] !== null) {
            $object->setRecipients($data['recipients']);
        }
        elseif (\array_key_exists('recipients', $data) && $data['recipients'] === null) {
            $object->setRecipients(null);
        }
        if (\array_key_exists('allowed', $data) && $data['allowed'] !== null) {
            $object->setAllowed($data['allowed']);
        }
        elseif (\array_key_exists('allowed', $data) && $data['allowed'] === null) {
            $object->setAllowed(null);
        }
        if (\array_key_exists('limited_by', $data) && $data['limited_by'] !== null) {
            $object->setLimitedBy($data['limited_by']);
        }
        elseif (\array_key_exists('limited_by', $data) && $data['limited_by'] === null) {
            $object->setLimitedBy(null);
        }
        if (\array_key_exists('limit', $data) && $data['limit'] !== null) {
            $object->setLimit($data['limit']);
        }
        elseif (\array_key_exists('limit', $data) && $data['limit'] === null) {
            $object->setLimit(null);
        }
        if (\array_key_exists('remaining', $data) && $data['remaining'] !== null) {
            $object->setRemaining($data['remaining']);
        }
        elseif (\array_key_exists('remaining', $data) && $data['remaining'] === null) {
            $object->setRemaining(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['limited_by'] = $data->getLimitedBy();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailBroadcastSendQuota::class => false];
    }
}
