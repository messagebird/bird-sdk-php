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
class EsimCheckoutFundingNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EsimCheckoutFunding::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EsimCheckoutFunding::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EsimCheckoutFunding();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('covered', $data) && \is_int($data['covered'])) {
            $data['covered'] = (bool) $data['covered'];
        }
        if (\array_key_exists('tax_amount', $data) && $data['tax_amount'] !== null) {
            $object->setTaxAmount($this->denormalizer->denormalize($data['tax_amount'], \MessageBird\Wire\Model\Money::class, 'json', $context));
        }
        elseif (\array_key_exists('tax_amount', $data) && $data['tax_amount'] === null) {
            $object->setTaxAmount(null);
        }
        if (\array_key_exists('total', $data) && $data['total'] !== null) {
            $object->setTotal($this->denormalizer->denormalize($data['total'], \MessageBird\Wire\Model\Money::class, 'json', $context));
        }
        elseif (\array_key_exists('total', $data) && $data['total'] === null) {
            $object->setTotal(null);
        }
        if (\array_key_exists('covered', $data) && $data['covered'] !== null) {
            $object->setCovered($data['covered']);
        }
        elseif (\array_key_exists('covered', $data) && $data['covered'] === null) {
            $object->setCovered(null);
        }
        if (\array_key_exists('shortfall', $data) && $data['shortfall'] !== null) {
            $object->setShortfall($this->denormalizer->denormalize($data['shortfall'], \MessageBird\Wire\Model\EsimCheckoutFundingShortfall::class, 'json', $context));
        }
        elseif (\array_key_exists('shortfall', $data) && $data['shortfall'] === null) {
            $object->setShortfall(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['tax_amount'] = $this->normalizer->normalize($data->getTaxAmount(), 'json', $context);
        $dataArray['total'] = $this->normalizer->normalize($data->getTotal(), 'json', $context);
        $dataArray['covered'] = $data->getCovered();
        $dataArray['shortfall'] = $this->normalizer->normalize($data->getShortfall(), 'json', $context);
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EsimCheckoutFunding::class => false];
    }
}
