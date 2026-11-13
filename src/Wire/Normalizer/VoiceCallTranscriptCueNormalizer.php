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
class VoiceCallTranscriptCueNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceCallTranscriptCue::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceCallTranscriptCue::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceCallTranscriptCue();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('party', $data) && $data['party'] !== null) {
            $object->setParty($data['party']);
        }
        elseif (\array_key_exists('party', $data) && $data['party'] === null) {
            $object->setParty(null);
        }
        if (\array_key_exists('start_at', $data) && $data['start_at'] !== null) {
            $object->setStartAt(new \DateTime($data['start_at']));
        }
        elseif (\array_key_exists('start_at', $data) && $data['start_at'] === null) {
            $object->setStartAt(null);
        }
        if (\array_key_exists('end_at', $data) && $data['end_at'] !== null) {
            $object->setEndAt(new \DateTime($data['end_at']));
        }
        elseif (\array_key_exists('end_at', $data) && $data['end_at'] === null) {
            $object->setEndAt(null);
        }
        if (\array_key_exists('text', $data) && $data['text'] !== null) {
            $object->setText($data['text']);
        }
        elseif (\array_key_exists('text', $data) && $data['text'] === null) {
            $object->setText(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('party')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceCallTranscriptCue.party missing');
        }
        $dataArray['party'] = $data->getParty();
        if (!$data->isInitialized('startAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceCallTranscriptCue.start_at missing');
        }
        $dataArray['start_at'] = $data->getStartAt()?->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('endAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceCallTranscriptCue.end_at missing');
        }
        $dataArray['end_at'] = $data->getEndAt()?->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('text')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceCallTranscriptCue.text missing');
        }
        $dataArray['text'] = $data->getText();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceCallTranscriptCue::class => false];
    }
}
