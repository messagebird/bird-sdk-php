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
class VoiceLegRecordingNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceLegRecording::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceLegRecording::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceLegRecording();
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
        if (\array_key_exists('leg_id', $data) && $data['leg_id'] !== null) {
            $object->setLegId($data['leg_id']);
        }
        elseif (\array_key_exists('leg_id', $data) && $data['leg_id'] === null) {
            $object->setLegId(null);
        }
        if (\array_key_exists('call_id', $data) && $data['call_id'] !== null) {
            $object->setCallId($data['call_id']);
        }
        elseif (\array_key_exists('call_id', $data) && $data['call_id'] === null) {
            $object->setCallId(null);
        }
        if (\array_key_exists('number', $data) && $data['number'] !== null) {
            $object->setNumber($data['number']);
        }
        elseif (\array_key_exists('number', $data) && $data['number'] === null) {
            $object->setNumber(null);
        }
        if (\array_key_exists('channel', $data) && $data['channel'] !== null) {
            $object->setChannel($data['channel']);
        }
        elseif (\array_key_exists('channel', $data) && $data['channel'] === null) {
            $object->setChannel(null);
        }
        if (\array_key_exists('media_id', $data) && $data['media_id'] !== null) {
            $object->setMediaId($data['media_id']);
        }
        elseif (\array_key_exists('media_id', $data) && $data['media_id'] === null) {
            $object->setMediaId(null);
        }
        if (\array_key_exists('media_started_at', $data) && $data['media_started_at'] !== null) {
            $object->setMediaStartedAt(new \DateTime($data['media_started_at']));
        }
        elseif (\array_key_exists('media_started_at', $data) && $data['media_started_at'] === null) {
            $object->setMediaStartedAt(null);
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
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('id')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecording.id missing');
        }
        $dataArray['id'] = $data->getId();
        if (!$data->isInitialized('legId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecording.leg_id missing');
        }
        $dataArray['leg_id'] = $data->getLegId();
        if ($data->isInitialized('callId')) {
            $dataArray['call_id'] = $data->getCallId();
        }
        if ($data->isInitialized('number') && null !== $data->getNumber()) {
            $dataArray['number'] = $data->getNumber();
        }
        if (!$data->isInitialized('channel')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecording.channel missing');
        }
        $dataArray['channel'] = $data->getChannel();
        if (!$data->isInitialized('mediaId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecording.media_id missing');
        }
        $dataArray['media_id'] = $data->getMediaId();
        if (!$data->isInitialized('mediaStartedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecording.media_started_at missing');
        }
        $dataArray['media_started_at'] = $data->getMediaStartedAt()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('startedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecording.started_at missing');
        }
        $dataArray['started_at'] = $data->getStartedAt()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('endedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecording.ended_at missing');
        }
        $dataArray['ended_at'] = $data->getEndedAt()?->format('Y-m-d\TH:i:sP');
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceLegRecording::class => false];
    }
}
