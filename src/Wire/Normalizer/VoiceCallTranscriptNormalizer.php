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
class VoiceCallTranscriptNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceCallTranscript::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceCallTranscript::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceCallTranscript();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('complete', $data) && \is_int($data['complete'])) {
            $data['complete'] = (bool) $data['complete'];
        }
        if (\array_key_exists('call_id', $data) && $data['call_id'] !== null) {
            $object->setCallId($data['call_id']);
        }
        elseif (\array_key_exists('call_id', $data) && $data['call_id'] === null) {
            $object->setCallId(null);
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
        if (\array_key_exists('cues', $data) && $data['cues'] !== null) {
            $values_1 = [];
            foreach ($data['cues'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\VoiceCallTranscriptCue::class, 'json', $context);
            }
            $object->setCues($values_1);
        }
        elseif (\array_key_exists('cues', $data) && $data['cues'] === null) {
            $object->setCues(null);
        }
        if (\array_key_exists('complete', $data) && $data['complete'] !== null) {
            $object->setComplete($data['complete']);
        }
        elseif (\array_key_exists('complete', $data) && $data['complete'] === null) {
            $object->setComplete(null);
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
        if (!$data->isInitialized('callId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceCallTranscript.call_id missing');
        }
        $dataArray['call_id'] = $data->getCallId();
        if (!$data->isInitialized('parties')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceCallTranscript.parties missing');
        }
        $values = [];
        foreach ($data->getParties() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['parties'] = $values;
        if (!$data->isInitialized('cues')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceCallTranscript.cues missing');
        }
        $values_1 = [];
        foreach ($data->getCues() as $value_1) {
            $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
        }
        $dataArray['cues'] = $values_1;
        if (!$data->isInitialized('complete')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceCallTranscript.complete missing');
        }
        $dataArray['complete'] = $data->getComplete();
        if (!$data->isInitialized('evaluatedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceCallTranscript.evaluated_at missing');
        }
        $dataArray['evaluated_at'] = $data->getEvaluatedAt()->format('Y-m-d\TH:i:sP');
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceCallTranscript::class => false];
    }
}
