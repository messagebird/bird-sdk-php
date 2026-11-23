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
class EmailBlockSubmissionLanguageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBlockSubmissionLanguage::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBlockSubmissionLanguage::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBlockSubmissionLanguage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('language', $data) && $data['language'] !== null) {
            $object->setLanguage($data['language']);
        }
        elseif (\array_key_exists('language', $data) && $data['language'] === null) {
            $object->setLanguage(null);
        }
        if (\array_key_exists('draft_revision', $data) && $data['draft_revision'] !== null) {
            $object->setDraftRevision($data['draft_revision']);
        }
        elseif (\array_key_exists('draft_revision', $data) && $data['draft_revision'] === null) {
            $object->setDraftRevision(null);
        }
        if (\array_key_exists('candidate_revision_id', $data) && $data['candidate_revision_id'] !== null) {
            $object->setCandidateRevisionId($data['candidate_revision_id']);
        }
        elseif (\array_key_exists('candidate_revision_id', $data) && $data['candidate_revision_id'] === null) {
            $object->setCandidateRevisionId(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('language')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockSubmissionLanguage.language missing');
        }
        $dataArray['language'] = $data->getLanguage();
        if (!$data->isInitialized('draftRevision')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockSubmissionLanguage.draft_revision missing');
        }
        $dataArray['draft_revision'] = $data->getDraftRevision();
        if (!$data->isInitialized('candidateRevisionId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockSubmissionLanguage.candidate_revision_id missing');
        }
        $dataArray['candidate_revision_id'] = $data->getCandidateRevisionId();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailBlockSubmissionLanguage::class => false];
    }
}
