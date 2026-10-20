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
class ComplianceSubmissionCreateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\ComplianceSubmissionCreate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\ComplianceSubmissionCreate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\ComplianceSubmissionCreate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
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
        if (\array_key_exists('identity', $data) && $data['identity'] !== null) {
            $object->setIdentity($this->denormalizer->denormalize($data['identity'], \MessageBird\Wire\Model\ComplianceSubmissionIdentity::class, 'json', $context));
        }
        elseif (\array_key_exists('identity', $data) && $data['identity'] === null) {
            $object->setIdentity(null);
        }
        if (\array_key_exists('answers', $data) && $data['answers'] !== null) {
            $values = [];
            foreach ($data['answers'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\ComplianceAnswer::class, 'json', $context);
            }
            $object->setAnswers($values);
        }
        elseif (\array_key_exists('answers', $data) && $data['answers'] === null) {
            $object->setAnswers(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['subject_kind'] = $data->getSubjectKind();
        $dataArray['subject_id'] = $data->getSubjectId();
        $dataArray['program'] = $data->getProgram();
        $dataArray['country_code'] = $data->getCountryCode();
        if ($data->isInitialized('identityId') && null !== $data->getIdentityId()) {
            $dataArray['identity_id'] = $data->getIdentityId();
        }
        if ($data->isInitialized('identity') && null !== $data->getIdentity()) {
            $dataArray['identity'] = $this->normalizer->normalize($data->getIdentity(), 'json', $context);
        }
        $values = [];
        foreach ($data->getAnswers() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['answers'] = $values;
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\ComplianceSubmissionCreate::class => false];
    }
}
