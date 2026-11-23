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
class EmailBlockFragmentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBlockFragment::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBlockFragment::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBlockFragment();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('serializer_version', $data) && $data['serializer_version'] !== null) {
            $object->setSerializerVersion($data['serializer_version']);
        }
        elseif (\array_key_exists('serializer_version', $data) && $data['serializer_version'] === null) {
            $object->setSerializerVersion(null);
        }
        if (\array_key_exists('fragment_html', $data) && $data['fragment_html'] !== null) {
            $object->setFragmentHtml($data['fragment_html']);
        }
        elseif (\array_key_exists('fragment_html', $data) && $data['fragment_html'] === null) {
            $object->setFragmentHtml(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('serializerVersion')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockFragment.serializer_version missing');
        }
        $dataArray['serializer_version'] = $data->getSerializerVersion();
        if (!$data->isInitialized('fragmentHtml')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EmailBlockFragment.fragment_html missing');
        }
        $dataArray['fragment_html'] = $data->getFragmentHtml();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailBlockFragment::class => false];
    }
}
