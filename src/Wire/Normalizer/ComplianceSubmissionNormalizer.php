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
class ComplianceSubmissionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\ComplianceSubmission::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\ComplianceSubmission::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\ComplianceSubmission();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('satisfied', $data) && \is_int($data['satisfied'])) {
            $data['satisfied'] = (bool) $data['satisfied'];
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
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('subject_kind', $data) && $data['subject_kind'] !== null) {
            $object->setSubjectKind($data['subject_kind']);
        }
        elseif (\array_key_exists('subject_kind', $data) && $data['subject_kind'] === null) {
            $object->setSubjectKind(null);
        }
        if (\array_key_exists('subject_id', $data) && $data['subject_id'] !== null) {
            $object->setSubjectId($data['subject_id']);
        }
        elseif (\array_key_exists('subject_id', $data) && $data['subject_id'] === null) {
            $object->setSubjectId(null);
        }
        if (\array_key_exists('program', $data) && $data['program'] !== null) {
            $object->setProgram($data['program']);
        }
        elseif (\array_key_exists('program', $data) && $data['program'] === null) {
            $object->setProgram(null);
        }
        if (\array_key_exists('country_code', $data) && $data['country_code'] !== null) {
            $object->setCountryCode($data['country_code']);
        }
        elseif (\array_key_exists('country_code', $data) && $data['country_code'] === null) {
            $object->setCountryCode(null);
        }
        if (\array_key_exists('identity_id', $data) && $data['identity_id'] !== null) {
            $object->setIdentityId($data['identity_id']);
        }
        elseif (\array_key_exists('identity_id', $data) && $data['identity_id'] === null) {
            $object->setIdentityId(null);
        }
        if (\array_key_exists('satisfied', $data) && $data['satisfied'] !== null) {
            $object->setSatisfied($data['satisfied']);
        }
        elseif (\array_key_exists('satisfied', $data) && $data['satisfied'] === null) {
            $object->setSatisfied(null);
        }
        if (\array_key_exists('items', $data) && $data['items'] !== null) {
            $values_1 = [];
            foreach ($data['items'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\ComplianceSubmissionItem::class, 'json', $context);
            }
            $object->setItems($values_1);
        }
        elseif (\array_key_exists('items', $data) && $data['items'] === null) {
            $object->setItems(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        if (\array_key_exists('closed_at', $data) && $data['closed_at'] !== null) {
            $object->setClosedAt(new \DateTime($data['closed_at']));
        }
        elseif (\array_key_exists('closed_at', $data) && $data['closed_at'] === null) {
            $object->setClosedAt(null);
        }
        if (\array_key_exists('closure_reason', $data) && $data['closure_reason'] !== null) {
            $object->setClosureReason($data['closure_reason']);
        }
        elseif (\array_key_exists('closure_reason', $data) && $data['closure_reason'] === null) {
            $object->setClosureReason(null);
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
        return [\MessageBird\Wire\Model\ComplianceSubmission::class => false];
    }
}
