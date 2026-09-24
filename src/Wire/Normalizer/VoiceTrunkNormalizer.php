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
class VoiceTrunkNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceTrunk::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceTrunk::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceTrunk();
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
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
            unset($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('workspace_id', $data) && $data['workspace_id'] !== null) {
            $object->setWorkspaceId($data['workspace_id']);
            unset($data['workspace_id']);
        }
        elseif (\array_key_exists('workspace_id', $data) && $data['workspace_id'] === null) {
            $object->setWorkspaceId(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
            unset($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('domain', $data) && $data['domain'] !== null) {
            $object->setDomain($data['domain']);
            unset($data['domain']);
        }
        elseif (\array_key_exists('domain', $data) && $data['domain'] === null) {
            $object->setDomain(null);
        }
        if (\array_key_exists('outbound_enabled', $data) && $data['outbound_enabled'] !== null) {
            $object->setOutboundEnabled($data['outbound_enabled']);
            unset($data['outbound_enabled']);
        }
        elseif (\array_key_exists('outbound_enabled', $data) && $data['outbound_enabled'] === null) {
            $object->setOutboundEnabled(null);
        }
        if (\array_key_exists('inbound_enabled', $data) && $data['inbound_enabled'] !== null) {
            $object->setInboundEnabled($data['inbound_enabled']);
            unset($data['inbound_enabled']);
        }
        elseif (\array_key_exists('inbound_enabled', $data) && $data['inbound_enabled'] === null) {
            $object->setInboundEnabled(null);
        }
        if (\array_key_exists('media_bypass', $data) && $data['media_bypass'] !== null) {
            $object->setMediaBypass($data['media_bypass']);
            unset($data['media_bypass']);
        }
        elseif (\array_key_exists('media_bypass', $data) && $data['media_bypass'] === null) {
            $object->setMediaBypass(null);
        }
        if (\array_key_exists('ip_acls', $data) && $data['ip_acls'] !== null) {
            $values = [];
            foreach ($data['ip_acls'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\VoiceTrunkIPACL::class, 'json', $context);
            }
            $object->setIpAcls($values);
            unset($data['ip_acls']);
        }
        elseif (\array_key_exists('ip_acls', $data) && $data['ip_acls'] === null) {
            $object->setIpAcls(null);
        }
        if (\array_key_exists('allowed_api_key_ids', $data) && $data['allowed_api_key_ids'] !== null) {
            $values_1 = [];
            foreach ($data['allowed_api_key_ids'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setAllowedApiKeyIds($values_1);
            unset($data['allowed_api_key_ids']);
        }
        elseif (\array_key_exists('allowed_api_key_ids', $data) && $data['allowed_api_key_ids'] === null) {
            $object->setAllowedApiKeyIds(null);
        }
        if (\array_key_exists('ineligible_api_key_ids', $data) && $data['ineligible_api_key_ids'] !== null) {
            $values_2 = [];
            foreach ($data['ineligible_api_key_ids'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setIneligibleApiKeyIds($values_2);
            unset($data['ineligible_api_key_ids']);
        }
        elseif (\array_key_exists('ineligible_api_key_ids', $data) && $data['ineligible_api_key_ids'] === null) {
            $object->setIneligibleApiKeyIds(null);
        }
        if (\array_key_exists('digest_algorithms', $data) && $data['digest_algorithms'] !== null) {
            $values_3 = [];
            foreach ($data['digest_algorithms'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setDigestAlgorithms($values_3);
            unset($data['digest_algorithms']);
        }
        elseif (\array_key_exists('digest_algorithms', $data) && $data['digest_algorithms'] === null) {
            $object->setDigestAlgorithms(null);
        }
        if (\array_key_exists('session_credentials_enabled', $data) && $data['session_credentials_enabled'] !== null) {
            $object->setSessionCredentialsEnabled($data['session_credentials_enabled']);
            unset($data['session_credentials_enabled']);
        }
        elseif (\array_key_exists('session_credentials_enabled', $data) && $data['session_credentials_enabled'] === null) {
            $object->setSessionCredentialsEnabled(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
            unset($data['created_at']);
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
            unset($data['updated_at']);
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        foreach ($data as $key => $value_4) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_4;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['workspace_id'] = $data->getWorkspaceId();
        $dataArray['name'] = $data->getName();
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceTrunk::class => false];
    }
}
