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
class VoiceLegTranscriptNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceLegTranscript::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceLegTranscript::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceLegTranscript();
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
        if (\array_key_exists('state', $data) && $data['state'] !== null) {
            $object->setState($data['state']);
        }
        elseif (\array_key_exists('state', $data) && $data['state'] === null) {
            $object->setState(null);
        }
        if (\array_key_exists('source', $data) && $data['source'] !== null) {
            $object->setSource($data['source']);
        }
        elseif (\array_key_exists('source', $data) && $data['source'] === null) {
            $object->setSource(null);
        }
        if (\array_key_exists('model', $data) && $data['model'] !== null) {
            $object->setModel($data['model']);
        }
        elseif (\array_key_exists('model', $data) && $data['model'] === null) {
            $object->setModel(null);
        }
        if (\array_key_exists('channel', $data) && $data['channel'] !== null) {
            $object->setChannel($data['channel']);
        }
        elseif (\array_key_exists('channel', $data) && $data['channel'] === null) {
            $object->setChannel(null);
        }
        if (\array_key_exists('cues', $data) && $data['cues'] !== null) {
            $values = [];
            foreach ($data['cues'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\VoiceLegTranscriptCue::class, 'json', $context);
            }
            $object->setCues($values);
        }
        elseif (\array_key_exists('cues', $data) && $data['cues'] === null) {
            $object->setCues(null);
        }
        if (\array_key_exists('source_party', $data) && $data['source_party'] !== null) {
            $object->setSourceParty($this->denormalizer->denormalize($data['source_party'], \MessageBird\Wire\Model\VoiceLegTranscriptSourceParty::class, 'json', $context));
        }
        elseif (\array_key_exists('source_party', $data) && $data['source_party'] === null) {
            $object->setSourceParty(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('id')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegTranscript.id missing');
        }
        $dataArray['id'] = $data->getId();
        if (!$data->isInitialized('legId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegTranscript.leg_id missing');
        }
        $dataArray['leg_id'] = $data->getLegId();
        if ($data->isInitialized('callId')) {
            $dataArray['call_id'] = $data->getCallId();
        }
        if (!$data->isInitialized('mediaId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegTranscript.media_id missing');
        }
        $dataArray['media_id'] = $data->getMediaId();
        if (!$data->isInitialized('mediaStartedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegTranscript.media_started_at missing');
        }
        $dataArray['media_started_at'] = $data->getMediaStartedAt()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('state')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegTranscript.state missing');
        }
        $dataArray['state'] = $data->getState();
        if (!$data->isInitialized('source')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegTranscript.source missing');
        }
        $dataArray['source'] = $data->getSource();
        if ($data->isInitialized('model') && null !== $data->getModel()) {
            $dataArray['model'] = $data->getModel();
        }
        if (!$data->isInitialized('channel')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegTranscript.channel missing');
        }
        $dataArray['channel'] = $data->getChannel();
        if (!$data->isInitialized('cues')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegTranscript.cues missing');
        }
        $values = [];
        foreach ($data->getCues() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['cues'] = $values;
        if ($data->isInitialized('sourceParty')) {
            $dataArray['source_party'] = $this->normalizer->normalize($data->getSourceParty(), 'json', $context);
        }
        if (!$data->isInitialized('createdAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegTranscript.created_at missing');
        }
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceLegTranscript::class => false];
    }
}
