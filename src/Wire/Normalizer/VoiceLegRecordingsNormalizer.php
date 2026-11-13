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
class VoiceLegRecordingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceLegRecordings::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceLegRecordings::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceLegRecordings();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('truncated', $data) && \is_int($data['truncated'])) {
            $data['truncated'] = (bool) $data['truncated'];
        }
        if (\array_key_exists('media', $data) && $data['media'] !== null) {
            $values = [];
            foreach ($data['media'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\VoiceLegRecordingMedia::class, 'json', $context);
            }
            $object->setMedia($values);
        }
        elseif (\array_key_exists('media', $data) && $data['media'] === null) {
            $object->setMedia(null);
        }
        if (\array_key_exists('recordings', $data) && $data['recordings'] !== null) {
            $values_1 = [];
            foreach ($data['recordings'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\VoiceLegRecording::class, 'json', $context);
            }
            $object->setRecordings($values_1);
        }
        elseif (\array_key_exists('recordings', $data) && $data['recordings'] === null) {
            $object->setRecordings(null);
        }
        if (\array_key_exists('transcripts', $data) && $data['transcripts'] !== null) {
            $values_2 = [];
            foreach ($data['transcripts'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \MessageBird\Wire\Model\VoiceLegTranscript::class, 'json', $context);
            }
            $object->setTranscripts($values_2);
        }
        elseif (\array_key_exists('transcripts', $data) && $data['transcripts'] === null) {
            $object->setTranscripts(null);
        }
        if (\array_key_exists('truncated', $data) && $data['truncated'] !== null) {
            $object->setTruncated($data['truncated']);
        }
        elseif (\array_key_exists('truncated', $data) && $data['truncated'] === null) {
            $object->setTruncated(null);
        }
        if (\array_key_exists('evaluated_at', $data) && $data['evaluated_at'] !== null) {
            $object->setEvaluatedAt(new \DateTime($data['evaluated_at']));
        }
        elseif (\array_key_exists('evaluated_at', $data) && $data['evaluated_at'] === null) {
            $object->setEvaluatedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('media')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecordings.media missing');
        }
        $values = [];
        foreach ($data->getMedia() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['media'] = $values;
        if (!$data->isInitialized('recordings')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecordings.recordings missing');
        }
        $values_1 = [];
        foreach ($data->getRecordings() as $value_1) {
            $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
        }
        $dataArray['recordings'] = $values_1;
        if (!$data->isInitialized('transcripts')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecordings.transcripts missing');
        }
        $values_2 = [];
        foreach ($data->getTranscripts() as $value_2) {
            $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
        }
        $dataArray['transcripts'] = $values_2;
        if (!$data->isInitialized('truncated')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecordings.truncated missing');
        }
        $dataArray['truncated'] = $data->getTruncated();
        if (!$data->isInitialized('evaluatedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceLegRecordings.evaluated_at missing');
        }
        $dataArray['evaluated_at'] = $data->getEvaluatedAt()->format('Y-m-d\TH:i:sP');
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceLegRecordings::class => false];
    }
}
