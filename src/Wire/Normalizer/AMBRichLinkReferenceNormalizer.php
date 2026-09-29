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
class AMBRichLinkReferenceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBRichLinkReference::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBRichLinkReference::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBRichLinkReference();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('title', $data) && $data['title'] !== null) {
            $object->setTitle($data['title']);
        }
        elseif (\array_key_exists('title', $data) && $data['title'] === null) {
            $object->setTitle(null);
        }
        if (\array_key_exists('bid', $data) && $data['bid'] !== null) {
            $object->setBid($data['bid']);
        }
        elseif (\array_key_exists('bid', $data) && $data['bid'] === null) {
            $object->setBid(null);
        }
        if (\array_key_exists('data_ref_sig', $data) && $data['data_ref_sig'] !== null) {
            $object->setDataRefSig($data['data_ref_sig']);
        }
        elseif (\array_key_exists('data_ref_sig', $data) && $data['data_ref_sig'] === null) {
            $object->setDataRefSig(null);
        }
        if (\array_key_exists('url', $data) && $data['url'] !== null) {
            $object->setUrl($data['url']);
        }
        elseif (\array_key_exists('url', $data) && $data['url'] === null) {
            $object->setUrl(null);
        }
        if (\array_key_exists('owner', $data) && $data['owner'] !== null) {
            $object->setOwner($data['owner']);
        }
        elseif (\array_key_exists('owner', $data) && $data['owner'] === null) {
            $object->setOwner(null);
        }
        if (\array_key_exists('signature_base64', $data) && $data['signature_base64'] !== null) {
            $object->setSignatureBase64($data['signature_base64']);
        }
        elseif (\array_key_exists('signature_base64', $data) && $data['signature_base64'] === null) {
            $object->setSignatureBase64(null);
        }
        if (\array_key_exists('key', $data) && $data['key'] !== null) {
            $object->setKey($data['key']);
        }
        elseif (\array_key_exists('key', $data) && $data['key'] === null) {
            $object->setKey(null);
        }
        if (\array_key_exists('size', $data) && $data['size'] !== null) {
            $object->setSize($data['size']);
        }
        elseif (\array_key_exists('size', $data) && $data['size'] === null) {
            $object->setSize(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('title') && null !== $data->getTitle()) {
            $dataArray['title'] = $data->getTitle();
        }
        if ($data->isInitialized('bid') && null !== $data->getBid()) {
            $dataArray['bid'] = $data->getBid();
        }
        if ($data->isInitialized('dataRefSig') && null !== $data->getDataRefSig()) {
            $dataArray['data_ref_sig'] = $data->getDataRefSig();
        }
        $dataArray['url'] = $data->getUrl();
        $dataArray['owner'] = $data->getOwner();
        $dataArray['signature_base64'] = $data->getSignatureBase64();
        if ($data->isInitialized('key') && null !== $data->getKey()) {
            $dataArray['key'] = $data->getKey();
        }
        $dataArray['size'] = $data->getSize();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBRichLinkReference::class => false];
    }
}
