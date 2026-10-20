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
class ComplianceRequirementNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\ComplianceRequirement::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\ComplianceRequirement::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\ComplianceRequirement();
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
        if (\array_key_exists('needs_input', $data) && \is_int($data['needs_input'])) {
            $data['needs_input'] = (bool) $data['needs_input'];
        }
        if (\array_key_exists('review_pending', $data) && \is_int($data['review_pending'])) {
            $data['review_pending'] = (bool) $data['review_pending'];
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
        if (\array_key_exists('satisfied', $data) && $data['satisfied'] !== null) {
            $object->setSatisfied($data['satisfied']);
        }
        elseif (\array_key_exists('satisfied', $data) && $data['satisfied'] === null) {
            $object->setSatisfied(null);
        }
        if (\array_key_exists('needs_input', $data) && $data['needs_input'] !== null) {
            $object->setNeedsInput($data['needs_input']);
        }
        elseif (\array_key_exists('needs_input', $data) && $data['needs_input'] === null) {
            $object->setNeedsInput(null);
        }
        if (\array_key_exists('review_pending', $data) && $data['review_pending'] !== null) {
            $object->setReviewPending($data['review_pending']);
        }
        elseif (\array_key_exists('review_pending', $data) && $data['review_pending'] === null) {
            $object->setReviewPending(null);
        }
        if (\array_key_exists('reason', $data) && $data['reason'] !== null) {
            $object->setReason($data['reason']);
        }
        elseif (\array_key_exists('reason', $data) && $data['reason'] === null) {
            $object->setReason(null);
        }
        if (\array_key_exists('guidance', $data) && $data['guidance'] !== null) {
            $object->setGuidance($data['guidance']);
        }
        elseif (\array_key_exists('guidance', $data) && $data['guidance'] === null) {
            $object->setGuidance(null);
        }
        if (\array_key_exists('submission_id', $data) && $data['submission_id'] !== null) {
            $object->setSubmissionId($data['submission_id']);
        }
        elseif (\array_key_exists('submission_id', $data) && $data['submission_id'] === null) {
            $object->setSubmissionId(null);
        }
        if (\array_key_exists('obligation', $data) && $data['obligation'] !== null) {
            $object->setObligation($this->denormalizer->denormalize($data['obligation'], \MessageBird\Wire\Model\ComplianceRequirementObligation::class, 'json', $context));
        }
        elseif (\array_key_exists('obligation', $data) && $data['obligation'] === null) {
            $object->setObligation(null);
        }
        if (\array_key_exists('general_reasons', $data) && $data['general_reasons'] !== null) {
            $values_1 = [];
            foreach ($data['general_reasons'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setGeneralReasons($values_1);
        }
        elseif (\array_key_exists('general_reasons', $data) && $data['general_reasons'] === null) {
            $object->setGeneralReasons(null);
        }
        if (\array_key_exists('fields', $data) && $data['fields'] !== null) {
            $values_2 = [];
            foreach ($data['fields'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \MessageBird\Wire\Model\ComplianceRequirementField::class, 'json', $context);
            }
            $object->setFields($values_2);
        }
        elseif (\array_key_exists('fields', $data) && $data['fields'] === null) {
            $object->setFields(null);
        }
        if (\array_key_exists('closed_at', $data) && $data['closed_at'] !== null) {
            $object->setClosedAt(new \DateTime($data['closed_at']));
        }
        elseif (\array_key_exists('closed_at', $data) && $data['closed_at'] === null) {
            $object->setClosedAt(null);
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
        return [\MessageBird\Wire\Model\ComplianceRequirement::class => false];
    }
}
