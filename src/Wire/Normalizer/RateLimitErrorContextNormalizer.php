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
class RateLimitErrorContextNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\RateLimitErrorContext::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\RateLimitErrorContext::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\RateLimitErrorContext();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('policy_key', $data) && $data['policy_key'] !== null) {
            $object->setPolicyKey($data['policy_key']);
        }
        elseif (\array_key_exists('policy_key', $data) && $data['policy_key'] === null) {
            $object->setPolicyKey(null);
        }
        if (\array_key_exists('scope', $data) && $data['scope'] !== null) {
            $object->setScope($data['scope']);
        }
        elseif (\array_key_exists('scope', $data) && $data['scope'] === null) {
            $object->setScope(null);
        }
        if (\array_key_exists('window_seconds', $data) && $data['window_seconds'] !== null) {
            $object->setWindowSeconds($data['window_seconds']);
        }
        elseif (\array_key_exists('window_seconds', $data) && $data['window_seconds'] === null) {
            $object->setWindowSeconds(null);
        }
        if (\array_key_exists('limit', $data) && $data['limit'] !== null) {
            $object->setLimit($data['limit']);
        }
        elseif (\array_key_exists('limit', $data) && $data['limit'] === null) {
            $object->setLimit(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('policyKey')) {
            throw new \MessageBird\Exception\RequestValidationException('required field RateLimitErrorContext.policy_key missing');
        }
        $dataArray['policy_key'] = $data->getPolicyKey();
        if (!$data->isInitialized('scope')) {
            throw new \MessageBird\Exception\RequestValidationException('required field RateLimitErrorContext.scope missing');
        }
        $dataArray['scope'] = $data->getScope();
        if (!$data->isInitialized('windowSeconds')) {
            throw new \MessageBird\Exception\RequestValidationException('required field RateLimitErrorContext.window_seconds missing');
        }
        $dataArray['window_seconds'] = $data->getWindowSeconds();
        if (!$data->isInitialized('limit')) {
            throw new \MessageBird\Exception\RequestValidationException('required field RateLimitErrorContext.limit missing');
        }
        $dataArray['limit'] = $data->getLimit();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\RateLimitErrorContext::class => false];
    }
}
