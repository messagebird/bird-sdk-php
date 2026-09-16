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
class EmailCompetitiveNotableEvidenceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailCompetitiveNotableEvidence::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailCompetitiveNotableEvidence::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailCompetitiveNotableEvidence();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('ratio_to_median', $data) && \is_int($data['ratio_to_median'])) {
            $data['ratio_to_median'] = (float) $data['ratio_to_median'];
        }
        if (\array_key_exists('mailbox_provider_spam_rate', $data) && \is_int($data['mailbox_provider_spam_rate'])) {
            $data['mailbox_provider_spam_rate'] = (float) $data['mailbox_provider_spam_rate'];
        }
        if (\array_key_exists('ratio_to_median', $data) && $data['ratio_to_median'] !== null) {
            $object->setRatioToMedian($data['ratio_to_median']);
        }
        elseif (\array_key_exists('ratio_to_median', $data) && $data['ratio_to_median'] === null) {
            $object->setRatioToMedian(null);
        }
        if (\array_key_exists('read_rate_observations', $data) && $data['read_rate_observations'] !== null) {
            $object->setReadRateObservations($data['read_rate_observations']);
        }
        elseif (\array_key_exists('read_rate_observations', $data) && $data['read_rate_observations'] === null) {
            $object->setReadRateObservations(null);
        }
        if (\array_key_exists('mailbox_provider_spam_rate', $data) && $data['mailbox_provider_spam_rate'] !== null) {
            $object->setMailboxProviderSpamRate($data['mailbox_provider_spam_rate']);
        }
        elseif (\array_key_exists('mailbox_provider_spam_rate', $data) && $data['mailbox_provider_spam_rate'] === null) {
            $object->setMailboxProviderSpamRate(null);
        }
        if (\array_key_exists('mailbox_provider_observations', $data) && $data['mailbox_provider_observations'] !== null) {
            $object->setMailboxProviderObservations($data['mailbox_provider_observations']);
        }
        elseif (\array_key_exists('mailbox_provider_observations', $data) && $data['mailbox_provider_observations'] === null) {
            $object->setMailboxProviderObservations(null);
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
        return [\MessageBird\Wire\Model\EmailCompetitiveNotableEvidence::class => false];
    }
}
