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
        if (\array_key_exists('live', $data) && \is_int($data['live'])) {
            $data['live'] = (bool) $data['live'];
        }
        if (\array_key_exists('has_recording', $data) && \is_int($data['has_recording'])) {
            $data['has_recording'] = (bool) $data['has_recording'];
        }
        if (\array_key_exists('has_transcript', $data) && \is_int($data['has_transcript'])) {
            $data['has_transcript'] = (bool) $data['has_transcript'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('workspace_id', $data) && $data['workspace_id'] !== null) {
            $object->setWorkspaceId($data['workspace_id']);
        }
        elseif (\array_key_exists('workspace_id', $data) && $data['workspace_id'] === null) {
            $object->setWorkspaceId(null);
        }
        if (\array_key_exists('initial_leg_id', $data) && $data['initial_leg_id'] !== null) {
            $object->setInitialLegId($data['initial_leg_id']);
        }
        elseif (\array_key_exists('initial_leg_id', $data) && $data['initial_leg_id'] === null) {
            $object->setInitialLegId(null);
        }
        if (\array_key_exists('direction', $data) && $data['direction'] !== null) {
            $object->setDirection($data['direction']);
        }
        elseif (\array_key_exists('direction', $data) && $data['direction'] === null) {
            $object->setDirection(null);
        }
        if (\array_key_exists('started_at', $data) && $data['started_at'] !== null) {
            $object->setStartedAt(new \DateTime($data['started_at']));
        }
        elseif (\array_key_exists('started_at', $data) && $data['started_at'] === null) {
            $object->setStartedAt(null);
        }
        if (\array_key_exists('ended_at', $data) && $data['ended_at'] !== null) {
            $object->setEndedAt(new \DateTime($data['ended_at']));
        }
        elseif (\array_key_exists('ended_at', $data) && $data['ended_at'] === null) {
            $object->setEndedAt(null);
        }
        if (\array_key_exists('live', $data) && $data['live'] !== null) {
            $object->setLive($data['live']);
        }
        elseif (\array_key_exists('live', $data) && $data['live'] === null) {
            $object->setLive(null);
        }
        if (\array_key_exists('has_recording', $data) && $data['has_recording'] !== null) {
            $object->setHasRecording($data['has_recording']);
        }
        elseif (\array_key_exists('has_recording', $data) && $data['has_recording'] === null) {
            $object->setHasRecording(null);
        }
        if (\array_key_exists('has_transcript', $data) && $data['has_transcript'] !== null) {
            $object->setHasTranscript($data['has_transcript']);
        }
        elseif (\array_key_exists('has_transcript', $data) && $data['has_transcript'] === null) {
            $object->setHasTranscript(null);
        }
        if (\array_key_exists('parties', $data) && $data['parties'] !== null) {
            $values = [];
            foreach ($data['parties'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\VoiceParty::class, 'json', $context);
            }
            $object->setParties($values);
        }
        elseif (\array_key_exists('parties', $data) && $data['parties'] === null) {
            $object->setParties(null);
        }
        if (\array_key_exists('sequence', $data) && $data['sequence'] !== null) {
            $object->setSequence($this->denormalizer->denormalize($data['sequence'], \MessageBird\Wire\Model\VoiceCallSequence::class, 'json', $context));
        }
        elseif (\array_key_exists('sequence', $data) && $data['sequence'] === null) {
            $object->setSequence(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['workspace_id'] = $data->getWorkspaceId();
        $dataArray['initial_leg_id'] = $data->getInitialLegId();
        if ($data->isInitialized('sequence') && null !== $data->getSequence()) {
            $dataArray['sequence'] = $this->normalizer->normalize($data->getSequence(), 'json', $context);
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceCall::class => false];
    }
}
