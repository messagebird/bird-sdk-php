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
class VoiceTrunkCreateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceTrunkCreate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceTrunkCreate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceTrunkCreate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('outbound_enabled', $data) && \is_int($data['outbound_enabled'])) {
            $data['outbound_enabled'] = (bool) $data['outbound_enabled'];
        }
        if (\array_key_exists('inbound_enabled', $data) && \is_int($data['inbound_enabled'])) {
            $data['inbound_enabled'] = (bool) $data['inbound_enabled'];
        }
        if (\array_key_exists('media_bypass', $data) && \is_int($data['media_bypass'])) {
            $data['media_bypass'] = (bool) $data['media_bypass'];
        }
        if (\array_key_exists('session_credentials_enabled', $data) && \is_int($data['session_credentials_enabled'])) {
            $data['session_credentials_enabled'] = (bool) $data['session_credentials_enabled'];
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('outbound_enabled', $data) && $data['outbound_enabled'] !== null) {
            $object->setOutboundEnabled($data['outbound_enabled']);
        }
        elseif (\array_key_exists('outbound_enabled', $data) && $data['outbound_enabled'] === null) {
            $object->setOutboundEnabled(null);
        }
        if (\array_key_exists('inbound_enabled', $data) && $data['inbound_enabled'] !== null) {
            $object->setInboundEnabled($data['inbound_enabled']);
        }
        elseif (\array_key_exists('inbound_enabled', $data) && $data['inbound_enabled'] === null) {
            $object->setInboundEnabled(null);
        }
        if (\array_key_exists('media_bypass', $data) && $data['media_bypass'] !== null) {
            $object->setMediaBypass($data['media_bypass']);
        }
        elseif (\array_key_exists('media_bypass', $data) && $data['media_bypass'] === null) {
            $object->setMediaBypass(null);
        }
        if (\array_key_exists('digest_algorithms', $data) && $data['digest_algorithms'] !== null) {
            $values = [];
            foreach ($data['digest_algorithms'] as $value) {
                $values[] = $value;
            }
            $object->setDigestAlgorithms($values);
        }
        elseif (\array_key_exists('digest_algorithms', $data) && $data['digest_algorithms'] === null) {
            $object->setDigestAlgorithms(null);
        }
        if (\array_key_exists('session_credentials_enabled', $data) && $data['session_credentials_enabled'] !== null) {
            $object->setSessionCredentialsEnabled($data['session_credentials_enabled']);
        }
        elseif (\array_key_exists('session_credentials_enabled', $data) && $data['session_credentials_enabled'] === null) {
            $object->setSessionCredentialsEnabled(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['name'] = $data->getName();
        if ($data->isInitialized('outboundEnabled') && null !== $data->getOutboundEnabled()) {
            $dataArray['outbound_enabled'] = $data->getOutboundEnabled();
        }
        if ($data->isInitialized('inboundEnabled') && null !== $data->getInboundEnabled()) {
            $dataArray['inbound_enabled'] = $data->getInboundEnabled();
        }
        if ($data->isInitialized('mediaBypass') && null !== $data->getMediaBypass()) {
            $dataArray['media_bypass'] = $data->getMediaBypass();
        }
        if ($data->isInitialized('digestAlgorithms') && null !== $data->getDigestAlgorithms()) {
            $values = [];
            foreach ($data->getDigestAlgorithms() as $value) {
                $values[] = $value;
            }
            $dataArray['digest_algorithms'] = $values;
        }
        if ($data->isInitialized('sessionCredentialsEnabled') && null !== $data->getSessionCredentialsEnabled()) {
            $dataArray['session_credentials_enabled'] = $data->getSessionCredentialsEnabled();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceTrunkCreate::class => false];
    }
}
