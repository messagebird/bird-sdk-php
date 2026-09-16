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
class EmailCompetitiveCampaignFeedNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailCompetitiveCampaignFeed::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailCompetitiveCampaignFeed::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailCompetitiveCampaignFeed();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('promo_rate', $data) && \is_int($data['promo_rate'])) {
            $data['promo_rate'] = (float) $data['promo_rate'];
        }
        if (\array_key_exists('truncated', $data) && \is_int($data['truncated'])) {
            $data['truncated'] = (bool) $data['truncated'];
        }
        if (\array_key_exists('period', $data) && $data['period'] !== null) {
            $object->setPeriod($this->denormalizer->denormalize($data['period'], \MessageBird\Wire\Model\EmailCompetitivePeriod::class, 'json', $context));
            unset($data['period']);
        }
        elseif (\array_key_exists('period', $data) && $data['period'] === null) {
            $object->setPeriod(null);
        }
        if (\array_key_exists('panel_status', $data) && $data['panel_status'] !== null) {
            $object->setPanelStatus($data['panel_status']);
            unset($data['panel_status']);
        }
        elseif (\array_key_exists('panel_status', $data) && $data['panel_status'] === null) {
            $object->setPanelStatus(null);
        }
        if (\array_key_exists('captured', $data) && $data['captured'] !== null) {
            $object->setCaptured($data['captured']);
            unset($data['captured']);
        }
        elseif (\array_key_exists('captured', $data) && $data['captured'] === null) {
            $object->setCaptured(null);
        }
        if (\array_key_exists('promo_rate', $data) && $data['promo_rate'] !== null) {
            $object->setPromoRate($data['promo_rate']);
            unset($data['promo_rate']);
        }
        elseif (\array_key_exists('promo_rate', $data) && $data['promo_rate'] === null) {
            $object->setPromoRate(null);
        }
        if (\array_key_exists('truncated', $data) && $data['truncated'] !== null) {
            $object->setTruncated($data['truncated']);
            unset($data['truncated']);
        }
        elseif (\array_key_exists('truncated', $data) && $data['truncated'] === null) {
            $object->setTruncated(null);
        }
        if (\array_key_exists('data', $data) && $data['data'] !== null) {
            $values = [];
            foreach ($data['data'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\EmailCompetitiveCampaign::class, 'json', $context);
            }
            $object->setData($values);
            unset($data['data']);
        }
        elseif (\array_key_exists('data', $data) && $data['data'] === null) {
            $object->setData(null);
        }
        if (\array_key_exists('next_cursor', $data) && $data['next_cursor'] !== null) {
            $object->setNextCursor($data['next_cursor']);
            unset($data['next_cursor']);
        }
        elseif (\array_key_exists('next_cursor', $data) && $data['next_cursor'] === null) {
            $object->setNextCursor(null);
        }
        if (\array_key_exists('prev_cursor', $data) && $data['prev_cursor'] !== null) {
            $object->setPrevCursor($data['prev_cursor']);
            unset($data['prev_cursor']);
        }
        elseif (\array_key_exists('prev_cursor', $data) && $data['prev_cursor'] === null) {
            $object->setPrevCursor(null);
        }
        if (\array_key_exists('refresh_cursor', $data) && $data['refresh_cursor'] !== null) {
            $object->setRefreshCursor($data['refresh_cursor']);
            unset($data['refresh_cursor']);
        }
        elseif (\array_key_exists('refresh_cursor', $data) && $data['refresh_cursor'] === null) {
            $object->setRefreshCursor(null);
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
        $dataArray['period'] = $this->normalizer->normalize($data->getPeriod(), 'json', $context);
        $dataArray['panel_status'] = $data->getPanelStatus();
        $dataArray['next_cursor'] = $data->getNextCursor();
        $dataArray['prev_cursor'] = $data->getPrevCursor();
        $dataArray['refresh_cursor'] = $data->getRefreshCursor();
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailCompetitiveCampaignFeed::class => false];
    }
}
