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
class SMSSenderRequirementNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\SMSSenderRequirement::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\SMSSenderRequirement::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\SMSSenderRequirement();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('destination_enabled', $data) && \is_int($data['destination_enabled'])) {
            $data['destination_enabled'] = (bool) $data['destination_enabled'];
        }
        if (\array_key_exists('has_compliance_requirements', $data) && \is_int($data['has_compliance_requirements'])) {
            $data['has_compliance_requirements'] = (bool) $data['has_compliance_requirements'];
        }
        if (\array_key_exists('sender_id', $data) && $data['sender_id'] !== null) {
            $object->setSenderId($data['sender_id']);
        }
        elseif (\array_key_exists('sender_id', $data) && $data['sender_id'] === null) {
            $object->setSenderId(null);
        }
        if (\array_key_exists('country_code', $data) && $data['country_code'] !== null) {
            $object->setCountryCode($data['country_code']);
        }
        elseif (\array_key_exists('country_code', $data) && $data['country_code'] === null) {
            $object->setCountryCode(null);
        }
        if (\array_key_exists('registration_mode', $data) && $data['registration_mode'] !== null) {
            $object->setRegistrationMode($data['registration_mode']);
        }
        elseif (\array_key_exists('registration_mode', $data) && $data['registration_mode'] === null) {
            $object->setRegistrationMode(null);
        }
        if (\array_key_exists('sender_id_behavior', $data) && $data['sender_id_behavior'] !== null) {
            $object->setSenderIdBehavior($data['sender_id_behavior']);
        }
        elseif (\array_key_exists('sender_id_behavior', $data) && $data['sender_id_behavior'] === null) {
            $object->setSenderIdBehavior(null);
        }
        if (\array_key_exists('program', $data) && $data['program'] !== null) {
            $object->setProgram($data['program']);
        }
        elseif (\array_key_exists('program', $data) && $data['program'] === null) {
            $object->setProgram(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
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
        if (\array_key_exists('destination_enabled', $data) && $data['destination_enabled'] !== null) {
            $object->setDestinationEnabled($data['destination_enabled']);
        }
        elseif (\array_key_exists('destination_enabled', $data) && $data['destination_enabled'] === null) {
            $object->setDestinationEnabled(null);
        }
        if (\array_key_exists('has_compliance_requirements', $data) && $data['has_compliance_requirements'] !== null) {
            $object->setHasComplianceRequirements($data['has_compliance_requirements']);
        }
        elseif (\array_key_exists('has_compliance_requirements', $data) && $data['has_compliance_requirements'] === null) {
            $object->setHasComplianceRequirements(null);
        }
        if (\array_key_exists('category', $data) && $data['category'] !== null) {
            $object->setCategory($data['category']);
        }
        elseif (\array_key_exists('category', $data) && $data['category'] === null) {
            $object->setCategory(null);
        }
        if (\array_key_exists('registration_id', $data) && $data['registration_id'] !== null) {
            $object->setRegistrationId($data['registration_id']);
        }
        elseif (\array_key_exists('registration_id', $data) && $data['registration_id'] === null) {
            $object->setRegistrationId(null);
        }
        if (\array_key_exists('program_entry', $data) && $data['program_entry'] !== null) {
            $object->setProgramEntry($data['program_entry']);
        }
        elseif (\array_key_exists('program_entry', $data) && $data['program_entry'] === null) {
            $object->setProgramEntry(null);
        }
        if (\array_key_exists('program_entry_ref', $data) && $data['program_entry_ref'] !== null) {
            $object->setProgramEntryRef($data['program_entry_ref']);
        }
        elseif (\array_key_exists('program_entry_ref', $data) && $data['program_entry_ref'] === null) {
            $object->setProgramEntryRef(null);
        }
        if (\array_key_exists('rejection_reason', $data) && $data['rejection_reason'] !== null) {
            $object->setRejectionReason($data['rejection_reason']);
        }
        elseif (\array_key_exists('rejection_reason', $data) && $data['rejection_reason'] === null) {
            $object->setRejectionReason(null);
        }
        if (\array_key_exists('obligation_due_at', $data) && $data['obligation_due_at'] !== null) {
            $object->setObligationDueAt(new \DateTime($data['obligation_due_at']));
        }
        elseif (\array_key_exists('obligation_due_at', $data) && $data['obligation_due_at'] === null) {
            $object->setObligationDueAt(null);
        }
        if (\array_key_exists('timeline_min_days', $data) && $data['timeline_min_days'] !== null) {
            $object->setTimelineMinDays($data['timeline_min_days']);
        }
        elseif (\array_key_exists('timeline_min_days', $data) && $data['timeline_min_days'] === null) {
            $object->setTimelineMinDays(null);
        }
        if (\array_key_exists('timeline_max_days', $data) && $data['timeline_max_days'] !== null) {
            $object->setTimelineMaxDays($data['timeline_max_days']);
        }
        elseif (\array_key_exists('timeline_max_days', $data) && $data['timeline_max_days'] === null) {
            $object->setTimelineMaxDays(null);
        }
        if (\array_key_exists('registration_types', $data) && $data['registration_types'] !== null) {
            $values_1 = [];
            foreach ($data['registration_types'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setRegistrationTypes($values_1);
        }
        elseif (\array_key_exists('registration_types', $data) && $data['registration_types'] === null) {
            $object->setRegistrationTypes(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['program_entry'] = $data->getProgramEntry();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\SMSSenderRequirement::class => false];
    }
}
