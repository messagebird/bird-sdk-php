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
class AMBBusinessAccountSubmissionCreateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBBusinessAccountSubmissionCreate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBBusinessAccountSubmissionCreate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBBusinessAccountSubmissionCreate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('readiness_attachment_id', $data) && $data['readiness_attachment_id'] !== null) {
            $object->setReadinessAttachmentId($data['readiness_attachment_id']);
        }
        elseif (\array_key_exists('readiness_attachment_id', $data) && $data['readiness_attachment_id'] === null) {
            $object->setReadinessAttachmentId(null);
        }
        if (\array_key_exists('use_cases_attachment_id', $data) && $data['use_cases_attachment_id'] !== null) {
            $object->setUseCasesAttachmentId($data['use_cases_attachment_id']);
        }
        elseif (\array_key_exists('use_cases_attachment_id', $data) && $data['use_cases_attachment_id'] === null) {
            $object->setUseCasesAttachmentId(null);
        }
        if (\array_key_exists('video_attachment_id', $data) && $data['video_attachment_id'] !== null) {
            $object->setVideoAttachmentId($data['video_attachment_id']);
        }
        elseif (\array_key_exists('video_attachment_id', $data) && $data['video_attachment_id'] === null) {
            $object->setVideoAttachmentId(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['readiness_attachment_id'] = $data->getReadinessAttachmentId();
        $dataArray['use_cases_attachment_id'] = $data->getUseCasesAttachmentId();
        $dataArray['video_attachment_id'] = $data->getVideoAttachmentId();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBBusinessAccountSubmissionCreate::class => false];
    }
}
