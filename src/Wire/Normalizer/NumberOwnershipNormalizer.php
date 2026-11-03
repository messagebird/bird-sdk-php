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
class NumberOwnershipNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\NumberOwnership::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\NumberOwnership::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\NumberOwnership();
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
        if (\array_key_exists('submission_id', $data) && $data['submission_id'] !== null) {
            $object->setSubmissionId($data['submission_id']);
            unset($data['submission_id']);
        }
        elseif (\array_key_exists('submission_id', $data) && $data['submission_id'] === null) {
            $object->setSubmissionId(null);
        }
        if (\array_key_exists('satisfied', $data) && $data['satisfied'] !== null) {
            $object->setSatisfied($data['satisfied']);
            unset($data['satisfied']);
        }
        elseif (\array_key_exists('satisfied', $data) && $data['satisfied'] === null) {
            $object->setSatisfied(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
            unset($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('blocked_at', $data) && $data['blocked_at'] !== null) {
            $object->setBlockedAt(new \DateTime($data['blocked_at']));
            unset($data['blocked_at']);
        }
        elseif (\array_key_exists('blocked_at', $data) && $data['blocked_at'] === null) {
            $object->setBlockedAt(null);
        }
        if (\array_key_exists('unavailable_at', $data) && $data['unavailable_at'] !== null) {
            $object->setUnavailableAt(new \DateTime($data['unavailable_at']));
            unset($data['unavailable_at']);
        }
        elseif (\array_key_exists('unavailable_at', $data) && $data['unavailable_at'] === null) {
            $object->setUnavailableAt(null);
        }
        if (\array_key_exists('registration_due_at', $data) && $data['registration_due_at'] !== null) {
            $object->setRegistrationDueAt(new \DateTime($data['registration_due_at']));
            unset($data['registration_due_at']);
        }
        elseif (\array_key_exists('registration_due_at', $data) && $data['registration_due_at'] === null) {
            $object->setRegistrationDueAt(null);
        }
        if (\array_key_exists('next', $data) && $data['next'] !== null) {
            $values = [];
            foreach ($data['next'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\NextAction::class, 'json', $context);
            }
            $object->setNext($values);
            unset($data['next']);
        }
        elseif (\array_key_exists('next', $data) && $data['next'] === null) {
            $object->setNext(null);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['satisfied'] = $data->getSatisfied();
        if ($data->isInitialized('blockedAt')) {
            $dataArray['blocked_at'] = $data->getBlockedAt()?->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('unavailableAt') && null !== $data->getUnavailableAt()) {
            $dataArray['unavailable_at'] = $data->getUnavailableAt()->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('registrationDueAt') && null !== $data->getRegistrationDueAt()) {
            $dataArray['registration_due_at'] = $data->getRegistrationDueAt()->format('Y-m-d\TH:i:sP');
        }
        $values = [];
        foreach ($data->getNext() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['next'] = $values;
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\NumberOwnership::class => false];
    }
}
