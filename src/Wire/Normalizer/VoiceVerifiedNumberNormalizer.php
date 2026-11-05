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
class VoiceVerifiedNumberNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceVerifiedNumber::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceVerifiedNumber::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceVerifiedNumber();
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
        if (\array_key_exists('phone_number', $data) && $data['phone_number'] !== null) {
            $object->setPhoneNumber($data['phone_number']);
            unset($data['phone_number']);
        }
        elseif (\array_key_exists('phone_number', $data) && $data['phone_number'] === null) {
            $object->setPhoneNumber(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
            unset($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
            unset($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('outbound_enabled', $data) && $data['outbound_enabled'] !== null) {
            $object->setOutboundEnabled($data['outbound_enabled']);
            unset($data['outbound_enabled']);
        }
        elseif (\array_key_exists('outbound_enabled', $data) && $data['outbound_enabled'] === null) {
            $object->setOutboundEnabled(null);
        }
        if (\array_key_exists('verified_at', $data) && $data['verified_at'] !== null) {
            $object->setVerifiedAt(new \DateTime($data['verified_at']));
            unset($data['verified_at']);
        }
        elseif (\array_key_exists('verified_at', $data) && $data['verified_at'] === null) {
            $object->setVerifiedAt(null);
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
        if (!$data->isInitialized('id')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceVerifiedNumber.id missing');
        }
        $dataArray['id'] = $data->getId();
        if (!$data->isInitialized('workspaceId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceVerifiedNumber.workspace_id missing');
        }
        $dataArray['workspace_id'] = $data->getWorkspaceId();
        if (!$data->isInitialized('phoneNumber')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceVerifiedNumber.phone_number missing');
        }
        $dataArray['phone_number'] = $data->getPhoneNumber();
        if (!$data->isInitialized('name')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceVerifiedNumber.name missing');
        }
        $dataArray['name'] = $data->getName();
        if (!$data->isInitialized('status')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceVerifiedNumber.status missing');
        }
        $dataArray['status'] = $data->getStatus();
        if (!$data->isInitialized('outboundEnabled')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceVerifiedNumber.outbound_enabled missing');
        }
        $dataArray['outbound_enabled'] = $data->getOutboundEnabled();
        if (!$data->isInitialized('verifiedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceVerifiedNumber.verified_at missing');
        }
        $dataArray['verified_at'] = $data->getVerifiedAt()?->format('Y-m-d\TH:i:sP');
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceVerifiedNumber::class => false];
    }
}
