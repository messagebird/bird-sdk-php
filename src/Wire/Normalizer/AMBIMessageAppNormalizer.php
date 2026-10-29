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
class AMBIMessageAppNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBIMessageApp::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBIMessageApp::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBIMessageApp();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('use_live_layout', $data) && \is_int($data['use_live_layout'])) {
            $data['use_live_layout'] = (bool) $data['use_live_layout'];
        }
        if (\array_key_exists('app_id', $data) && $data['app_id'] !== null) {
            $object->setAppId($data['app_id']);
        }
        elseif (\array_key_exists('app_id', $data) && $data['app_id'] === null) {
            $object->setAppId(null);
        }
        if (\array_key_exists('app_name', $data) && $data['app_name'] !== null) {
            $object->setAppName($data['app_name']);
        }
        elseif (\array_key_exists('app_name', $data) && $data['app_name'] === null) {
            $object->setAppName(null);
        }
        if (\array_key_exists('bid', $data) && $data['bid'] !== null) {
            $object->setBid($data['bid']);
        }
        elseif (\array_key_exists('bid', $data) && $data['bid'] === null) {
            $object->setBid(null);
        }
        if (\array_key_exists('url', $data) && $data['url'] !== null) {
            $object->setUrl($data['url']);
        }
        elseif (\array_key_exists('url', $data) && $data['url'] === null) {
            $object->setUrl(null);
        }
        if (\array_key_exists('app_icon_source_url', $data) && $data['app_icon_source_url'] !== null) {
            $object->setAppIconSourceUrl($data['app_icon_source_url']);
        }
        elseif (\array_key_exists('app_icon_source_url', $data) && $data['app_icon_source_url'] === null) {
            $object->setAppIconSourceUrl(null);
        }
        if (\array_key_exists('use_live_layout', $data) && $data['use_live_layout'] !== null) {
            $object->setUseLiveLayout($data['use_live_layout']);
        }
        elseif (\array_key_exists('use_live_layout', $data) && $data['use_live_layout'] === null) {
            $object->setUseLiveLayout(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['app_id'] = $data->getAppId();
        $dataArray['app_name'] = $data->getAppName();
        $dataArray['bid'] = $data->getBid();
        $dataArray['url'] = $data->getUrl();
        $dataArray['app_icon_source_url'] = $data->getAppIconSourceUrl();
        $dataArray['use_live_layout'] = $data->getUseLiveLayout();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBIMessageApp::class => false];
    }
}
