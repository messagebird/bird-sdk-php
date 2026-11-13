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
class VoiceLegRecordingMediaNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceLegRecordingMedia::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceLegRecordingMedia::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceLegRecordingMedia();
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
        if (\array_key_exists('codec', $data) && $data['codec'] !== null) {
            $object->setCodec($data['codec']);
        }
        elseif (\array_key_exists('codec', $data) && $data['codec'] === null) {
            $object->setCodec(null);
        }
        if (\array_key_exists('state', $data) && $data['state'] !== null) {
            $object->setState($data['state']);
        }
        elseif (\array_key_exists('state', $data) && $data['state'] === null) {
            $object->setState(null);
        }
        if (\array_key_exists('offset_ms', $data) && $data['offset_ms'] !== null) {
            $object->setOffsetMs($data['offset_ms']);
        }
        elseif (\array_key_exists('offset_ms', $data) && $data['offset_ms'] === null) {
            $object->setOffsetMs(null);
        }
        if (\array_key_exists('audio_ms', $data) && $data['audio_ms'] !== null) {
            $object->setAudioMs($data['audio_ms']);
        }
        elseif (\array_key_exists('audio_ms', $data) && $data['audio_ms'] === null) {
            $object->setAudioMs(null);
        }
        if (\array_key_exists('source_party', $data) && $data['source_party'] !== null) {
            $object->setSourceParty($this->denormalizer->denormalize($data['source_party'], \MessageBird\Wire\Model\VoiceLegRecordingMediaSourceParty::class, 'json', $context));
        }
        elseif (\array_key_exists('source_party', $data) && $data['source_party'] === null) {
            $object->setSourceParty(null);
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
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecordingMedia.id missing');
        }
        $dataArray['id'] = $data->getId();
        if (!$data->isInitialized('legId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecordingMedia.leg_id missing');
        }
        $dataArray['leg_id'] = $data->getLegId();
        if ($data->isInitialized('callId')) {
            $dataArray['call_id'] = $data->getCallId();
        }
        if (!$data->isInitialized('codec')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecordingMedia.codec missing');
        }
        $dataArray['codec'] = $data->getCodec();
        if (!$data->isInitialized('state')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecordingMedia.state missing');
        }
        $dataArray['state'] = $data->getState();
        if (!$data->isInitialized('offsetMs')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecordingMedia.offset_ms missing');
        }
        $dataArray['offset_ms'] = $data->getOffsetMs();
        if (!$data->isInitialized('audioMs')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecordingMedia.audio_ms missing');
        }
        $dataArray['audio_ms'] = $data->getAudioMs();
        if ($data->isInitialized('sourceParty')) {
            $dataArray['source_party'] = $this->normalizer->normalize($data->getSourceParty(), 'json', $context);
        }
        if (!$data->isInitialized('startedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecordingMedia.started_at missing');
        }
        $dataArray['started_at'] = $data->getStartedAt()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('endedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecordingMedia.ended_at missing');
        }
        $dataArray['ended_at'] = $data->getEndedAt()?->format('Y-m-d\TH:i:sP');
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceLegRecordingMedia::class => false];
    }
}
