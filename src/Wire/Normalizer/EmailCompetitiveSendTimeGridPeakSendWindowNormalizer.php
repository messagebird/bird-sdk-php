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
class EmailCompetitiveSendTimeGridPeakSendWindowNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailCompetitiveSendTimeGridPeakSendWindow::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailCompetitiveSendTimeGridPeakSendWindow::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailCompetitiveSendTimeGridPeakSendWindow();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('share_percent', $data) && \is_int($data['share_percent'])) {
            $data['share_percent'] = (float) $data['share_percent'];
        }
        if (\array_key_exists('start_hour', $data) && $data['start_hour'] !== null) {
            $object->setStartHour($data['start_hour']);
            unset($data['start_hour']);
        }
        elseif (\array_key_exists('start_hour', $data) && $data['start_hour'] === null) {
            $object->setStartHour(null);
        }
        if (\array_key_exists('end_hour', $data) && $data['end_hour'] !== null) {
            $object->setEndHour($data['end_hour']);
            unset($data['end_hour']);
        }
        elseif (\array_key_exists('end_hour', $data) && $data['end_hour'] === null) {
            $object->setEndHour(null);
        }
        if (\array_key_exists('share_percent', $data) && $data['share_percent'] !== null) {
            $object->setSharePercent($data['share_percent']);
            unset($data['share_percent']);
        }
        elseif (\array_key_exists('share_percent', $data) && $data['share_percent'] === null) {
            $object->setSharePercent(null);
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
        return [\MessageBird\Wire\Model\EmailCompetitiveSendTimeGridPeakSendWindow::class => false];
    }
}
