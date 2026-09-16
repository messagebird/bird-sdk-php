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
class EmailInboxInsightsPlacementSummaryRawCountsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsPlacementSummaryRawCounts::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsPlacementSummaryRawCounts::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsPlacementSummaryRawCounts();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('inbox', $data) && $data['inbox'] !== null) {
            $object->setInbox($data['inbox']);
            unset($data['inbox']);
        }
        elseif (\array_key_exists('inbox', $data) && $data['inbox'] === null) {
            $object->setInbox(null);
        }
        if (\array_key_exists('spam', $data) && $data['spam'] !== null) {
            $object->setSpam($data['spam']);
            unset($data['spam']);
        }
        elseif (\array_key_exists('spam', $data) && $data['spam'] === null) {
            $object->setSpam(null);
        }
        if (\array_key_exists('missing', $data) && $data['missing'] !== null) {
            $object->setMissing($data['missing']);
            unset($data['missing']);
        }
        elseif (\array_key_exists('missing', $data) && $data['missing'] === null) {
            $object->setMissing(null);
        }
        if (\array_key_exists('measured', $data) && $data['measured'] !== null) {
            $object->setMeasured($data['measured']);
            unset($data['measured']);
        }
        elseif (\array_key_exists('measured', $data) && $data['measured'] === null) {
            $object->setMeasured(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailInboxInsightsPlacementSummaryRawCounts::class => false];
    }
}
