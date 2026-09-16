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
class EmailCompetitiveSendTimeGridNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailCompetitiveSendTimeGrid::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailCompetitiveSendTimeGrid::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailCompetitiveSendTimeGrid();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('period', $data) && $data['period'] !== null) {
            $object->setPeriod($this->denormalizer->denormalize($data['period'], \MessageBird\Wire\Model\EmailCompetitivePeriod::class, 'json', $context));
        }
        elseif (\array_key_exists('period', $data) && $data['period'] === null) {
            $object->setPeriod(null);
        }
        if (\array_key_exists('timezone', $data) && $data['timezone'] !== null) {
            $object->setTimezone($data['timezone']);
        }
        elseif (\array_key_exists('timezone', $data) && $data['timezone'] === null) {
            $object->setTimezone(null);
        }
        if (\array_key_exists('panel_status', $data) && $data['panel_status'] !== null) {
            $object->setPanelStatus($data['panel_status']);
        }
        elseif (\array_key_exists('panel_status', $data) && $data['panel_status'] === null) {
            $object->setPanelStatus(null);
        }
        if (\array_key_exists('cells', $data) && $data['cells'] !== null) {
            $values = [];
            foreach ($data['cells'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\EmailCompetitiveSendTimeCell::class, 'json', $context);
            }
            $object->setCells($values);
        }
        elseif (\array_key_exists('cells', $data) && $data['cells'] === null) {
            $object->setCells(null);
        }
        if (\array_key_exists('peak_send_window', $data) && $data['peak_send_window'] !== null) {
            $object->setPeakSendWindow($this->denormalizer->denormalize($data['peak_send_window'], \MessageBird\Wire\Model\EmailCompetitiveSendTimeGridPeakSendWindow::class, 'json', $context));
        }
        elseif (\array_key_exists('peak_send_window', $data) && $data['peak_send_window'] === null) {
            $object->setPeakSendWindow(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['period'] = $this->normalizer->normalize($data->getPeriod(), 'json', $context);
        $dataArray['timezone'] = $data->getTimezone();
        $dataArray['panel_status'] = $data->getPanelStatus();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailCompetitiveSendTimeGrid::class => false];
    }
}
