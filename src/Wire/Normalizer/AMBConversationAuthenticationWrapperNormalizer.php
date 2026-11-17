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
class AMBConversationAuthenticationWrapperNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBConversationAuthenticationWrapper::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBConversationAuthenticationWrapper::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBConversationAuthenticationWrapper();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('latest_attempt', $data) && $data['latest_attempt'] !== null) {
            $object->setLatestAttempt($this->denormalizer->denormalize($data['latest_attempt'], \MessageBird\Wire\Model\AMBAuthentication::class, 'json', $context));
        }
        elseif (\array_key_exists('latest_attempt', $data) && $data['latest_attempt'] === null) {
            $object->setLatestAttempt(null);
        }
        if (\array_key_exists('last_verified', $data) && $data['last_verified'] !== null) {
            $object->setLastVerified($this->denormalizer->denormalize($data['last_verified'], \MessageBird\Wire\Model\AMBConversationVerifiedIdentity::class, 'json', $context));
        }
        elseif (\array_key_exists('last_verified', $data) && $data['last_verified'] === null) {
            $object->setLastVerified(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('latestAttempt') && null !== $data->getLatestAttempt()) {
            $dataArray['latest_attempt'] = $this->normalizer->normalize($data->getLatestAttempt(), 'json', $context);
        }
        if ($data->isInitialized('lastVerified') && null !== $data->getLastVerified()) {
            $dataArray['last_verified'] = $this->normalizer->normalize($data->getLastVerified(), 'json', $context);
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBConversationAuthenticationWrapper::class => false];
    }
}
