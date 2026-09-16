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
class EmailInboxInsightsComplaintRateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsComplaintRate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsComplaintRate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsComplaintRate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('gmail_postmaster_spam_rate_percent', $data) && \is_int($data['gmail_postmaster_spam_rate_percent'])) {
            $data['gmail_postmaster_spam_rate_percent'] = (float) $data['gmail_postmaster_spam_rate_percent'];
        }
        if (\array_key_exists('delta_pts', $data) && \is_int($data['delta_pts'])) {
            $data['delta_pts'] = (float) $data['delta_pts'];
        }
        if (\array_key_exists('gmail_postmaster_spam_rate_percent', $data) && $data['gmail_postmaster_spam_rate_percent'] !== null) {
            $object->setGmailPostmasterSpamRatePercent($data['gmail_postmaster_spam_rate_percent']);
        }
        elseif (\array_key_exists('gmail_postmaster_spam_rate_percent', $data) && $data['gmail_postmaster_spam_rate_percent'] === null) {
            $object->setGmailPostmasterSpamRatePercent(null);
        }
        if (\array_key_exists('delta_pts', $data) && $data['delta_pts'] !== null) {
            $object->setDeltaPts($data['delta_pts']);
        }
        elseif (\array_key_exists('delta_pts', $data) && $data['delta_pts'] === null) {
            $object->setDeltaPts(null);
        }
        if (\array_key_exists('peak', $data) && $data['peak'] !== null) {
            $object->setPeak($this->denormalizer->denormalize($data['peak'], \MessageBird\Wire\Model\EmailInboxInsightsComplaintPeak::class, 'json', $context));
        }
        elseif (\array_key_exists('peak', $data) && $data['peak'] === null) {
            $object->setPeak(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('peak') && null !== $data->getPeak()) {
            $dataArray['peak'] = $this->normalizer->normalize($data->getPeak(), 'json', $context);
        }
        $dataArray['status'] = $data->getStatus();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailInboxInsightsComplaintRate::class => false];
    }
}
