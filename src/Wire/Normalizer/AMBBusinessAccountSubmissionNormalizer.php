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
class AMBBusinessAccountSubmissionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBBusinessAccountSubmission::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBBusinessAccountSubmission::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBBusinessAccountSubmission();
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
        if (\array_key_exists('business_account_id', $data) && $data['business_account_id'] !== null) {
            $object->setBusinessAccountId($data['business_account_id']);
        }
        elseif (\array_key_exists('business_account_id', $data) && $data['business_account_id'] === null) {
            $object->setBusinessAccountId(null);
        }
        if (\array_key_exists('apple_business_id', $data) && $data['apple_business_id'] !== null) {
            $object->setAppleBusinessId($data['apple_business_id']);
        }
        elseif (\array_key_exists('apple_business_id', $data) && $data['apple_business_id'] === null) {
            $object->setAppleBusinessId(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('readiness_attachment', $data) && $data['readiness_attachment'] !== null) {
            $object->setReadinessAttachment($this->denormalizer->denormalize($data['readiness_attachment'], \MessageBird\Wire\Model\AMBBusinessAccountSubmissionReadinessAttachment::class, 'json', $context));
        }
        elseif (\array_key_exists('readiness_attachment', $data) && $data['readiness_attachment'] === null) {
            $object->setReadinessAttachment(null);
        }
        if (\array_key_exists('use_cases_attachment', $data) && $data['use_cases_attachment'] !== null) {
            $object->setUseCasesAttachment($this->denormalizer->denormalize($data['use_cases_attachment'], \MessageBird\Wire\Model\AMBBusinessAccountSubmissionUseCasesAttachment::class, 'json', $context));
        }
        elseif (\array_key_exists('use_cases_attachment', $data) && $data['use_cases_attachment'] === null) {
            $object->setUseCasesAttachment(null);
        }
        if (\array_key_exists('video_attachment', $data) && $data['video_attachment'] !== null) {
            $object->setVideoAttachment($this->denormalizer->denormalize($data['video_attachment'], \MessageBird\Wire\Model\AMBBusinessAccountSubmissionVideoAttachment::class, 'json', $context));
        }
        elseif (\array_key_exists('video_attachment', $data) && $data['video_attachment'] === null) {
            $object->setVideoAttachment(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('status_reason', $data) && $data['status_reason'] !== null) {
            $object->setStatusReason($data['status_reason']);
        }
        elseif (\array_key_exists('status_reason', $data) && $data['status_reason'] === null) {
            $object->setStatusReason(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('next', $data) && $data['next'] !== null) {
            $values = [];
            foreach ($data['next'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\NextAction::class, 'json', $context);
            }
            $object->setNext($values);
        }
        elseif (\array_key_exists('next', $data) && $data['next'] === null) {
            $object->setNext(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBBusinessAccountSubmission::class => false];
    }
}
