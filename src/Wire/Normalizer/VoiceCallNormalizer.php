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
class VoiceCallNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceCall::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceCall::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceCall();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('session_id', $data) && $data['session_id'] !== null) {
            $object->setSessionId($data['session_id']);
        }
        elseif (\array_key_exists('session_id', $data) && $data['session_id'] === null) {
            $object->setSessionId(null);
        }
        if (\array_key_exists('workspace_id', $data) && $data['workspace_id'] !== null) {
            $object->setWorkspaceId($data['workspace_id']);
        }
        elseif (\array_key_exists('workspace_id', $data) && $data['workspace_id'] === null) {
            $object->setWorkspaceId(null);
        }
        if (\array_key_exists('direction', $data) && $data['direction'] !== null) {
            $object->setDirection($data['direction']);
        }
        elseif (\array_key_exists('direction', $data) && $data['direction'] === null) {
            $object->setDirection(null);
        }
        if (\array_key_exists('from', $data) && $data['from'] !== null) {
            $object->setFrom($data['from']);
        }
        elseif (\array_key_exists('from', $data) && $data['from'] === null) {
            $object->setFrom(null);
        }
        if (\array_key_exists('to', $data) && $data['to'] !== null) {
            $object->setTo($data['to']);
        }
        elseif (\array_key_exists('to', $data) && $data['to'] === null) {
            $object->setTo(null);
        }
        if (\array_key_exists('actor', $data) && $data['actor'] !== null) {
            $object->setActor($this->denormalizer->denormalize($data['actor'], \MessageBird\Wire\Model\VoiceCallActor::class, 'json', $context));
        }
        elseif (\array_key_exists('actor', $data) && $data['actor'] === null) {
            $object->setActor(null);
        }
        if (\array_key_exists('sip_trunk_id', $data) && $data['sip_trunk_id'] !== null) {
            $object->setSipTrunkId($data['sip_trunk_id']);
        }
        elseif (\array_key_exists('sip_trunk_id', $data) && $data['sip_trunk_id'] === null) {
            $object->setSipTrunkId(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('sip_response_code', $data) && $data['sip_response_code'] !== null) {
            $object->setSipResponseCode($data['sip_response_code']);
        }
        elseif (\array_key_exists('sip_response_code', $data) && $data['sip_response_code'] === null) {
            $object->setSipResponseCode(null);
        }
        if (\array_key_exists('rejection_reason', $data) && $data['rejection_reason'] !== null) {
            $object->setRejectionReason($data['rejection_reason']);
        }
        elseif (\array_key_exists('rejection_reason', $data) && $data['rejection_reason'] === null) {
            $object->setRejectionReason(null);
        }
        if (\array_key_exists('started_at', $data) && $data['started_at'] !== null) {
            $object->setStartedAt(new \DateTime($data['started_at']));
        }
        elseif (\array_key_exists('started_at', $data) && $data['started_at'] === null) {
            $object->setStartedAt(null);
        }
        if (\array_key_exists('answered_at', $data) && $data['answered_at'] !== null) {
            $object->setAnsweredAt(new \DateTime($data['answered_at']));
        }
        elseif (\array_key_exists('answered_at', $data) && $data['answered_at'] === null) {
            $object->setAnsweredAt(null);
        }
        if (\array_key_exists('ended_at', $data) && $data['ended_at'] !== null) {
            $object->setEndedAt(new \DateTime($data['ended_at']));
        }
        elseif (\array_key_exists('ended_at', $data) && $data['ended_at'] === null) {
            $object->setEndedAt(null);
        }
        if (\array_key_exists('duration_ms', $data) && $data['duration_ms'] !== null) {
            $object->setDurationMs($data['duration_ms']);
        }
        elseif (\array_key_exists('duration_ms', $data) && $data['duration_ms'] === null) {
            $object->setDurationMs(null);
        }
        if (\array_key_exists('pdd_ms', $data) && $data['pdd_ms'] !== null) {
            $object->setPddMs($data['pdd_ms']);
        }
        elseif (\array_key_exists('pdd_ms', $data) && $data['pdd_ms'] === null) {
            $object->setPddMs(null);
        }
        if (\array_key_exists('billable_ms', $data) && $data['billable_ms'] !== null) {
            $object->setBillableMs($data['billable_ms']);
        }
        elseif (\array_key_exists('billable_ms', $data) && $data['billable_ms'] === null) {
            $object->setBillableMs(null);
        }
        if (\array_key_exists('media_quality', $data) && $data['media_quality'] !== null) {
            $object->setMediaQuality($this->denormalizer->denormalize($data['media_quality'], \MessageBird\Wire\Model\VoiceMediaQuality::class, 'json', $context));
        }
        elseif (\array_key_exists('media_quality', $data) && $data['media_quality'] === null) {
            $object->setMediaQuality(null);
        }
        if (\array_key_exists('cost', $data) && $data['cost'] !== null) {
            $object->setCost($this->denormalizer->denormalize($data['cost'], \MessageBird\Wire\Model\Money::class, 'json', $context));
        }
        elseif (\array_key_exists('cost', $data) && $data['cost'] === null) {
            $object->setCost(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['workspace_id'] = $data->getWorkspaceId();
        if ($data->isInitialized('mediaQuality') && null !== $data->getMediaQuality()) {
            $dataArray['media_quality'] = $this->normalizer->normalize($data->getMediaQuality(), 'json', $context);
        }
        if ($data->isInitialized('cost') && null !== $data->getCost()) {
            $dataArray['cost'] = $this->normalizer->normalize($data->getCost(), 'json', $context);
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceCall::class => false];
    }
}
