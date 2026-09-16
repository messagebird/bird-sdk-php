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
class EmailInboxInsightsWindowNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsWindow::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsWindow::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsWindow();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('start', $data) && $data['start'] !== null) {
            $object->setStart(\DateTime::createFromFormat('Y-m-d', $data['start'])->setTime(0, 0, 0));
        }
        elseif (\array_key_exists('start', $data) && $data['start'] === null) {
            $object->setStart(null);
        }
        if (\array_key_exists('end', $data) && $data['end'] !== null) {
            $object->setEnd(\DateTime::createFromFormat('Y-m-d', $data['end'])->setTime(0, 0, 0));
        }
        elseif (\array_key_exists('end', $data) && $data['end'] === null) {
            $object->setEnd(null);
        }
        if (\array_key_exists('group_by', $data) && $data['group_by'] !== null) {
            $object->setGroupBy($data['group_by']);
        }
        elseif (\array_key_exists('group_by', $data) && $data['group_by'] === null) {
            $object->setGroupBy(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('groupBy') && null !== $data->getGroupBy()) {
            $dataArray['group_by'] = $data->getGroupBy();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailInboxInsightsWindow::class => false];
    }
}
