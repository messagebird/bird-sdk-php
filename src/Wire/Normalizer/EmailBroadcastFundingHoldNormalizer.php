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
class EmailBroadcastFundingHoldNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBroadcastFundingHold::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBroadcastFundingHold::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBroadcastFundingHold();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('reason', $data) && $data['reason'] !== null) {
            $object->setReason($data['reason']);
        }
        elseif (\array_key_exists('reason', $data) && $data['reason'] === null) {
            $object->setReason(null);
        }
        if (\array_key_exists('wait_until', $data) && $data['wait_until'] !== null) {
            $object->setWaitUntil(new \DateTime($data['wait_until']));
        }
        elseif (\array_key_exists('wait_until', $data) && $data['wait_until'] === null) {
            $object->setWaitUntil(null);
        }
        if (\array_key_exists('paused_at', $data) && $data['paused_at'] !== null) {
            $object->setPausedAt(new \DateTime($data['paused_at']));
        }
        elseif (\array_key_exists('paused_at', $data) && $data['paused_at'] === null) {
            $object->setPausedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('reason')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBroadcastFundingHold.reason missing');
        }
        $dataArray['reason'] = $data->getReason();
        if ($data->isInitialized('waitUntil') && null !== $data->getWaitUntil()) {
            $dataArray['wait_until'] = $data->getWaitUntil()->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('pausedAt') && null !== $data->getPausedAt()) {
            $dataArray['paused_at'] = $data->getPausedAt()->format('Y-m-d\TH:i:sP');
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailBroadcastFundingHold::class => false];
    }
}
