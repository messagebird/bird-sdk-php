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
class WhatsAppMessageInteractiveNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppMessageInteractive::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppMessageInteractive::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppMessageInteractive();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('type', $data) && $data['type'] !== null) {
            $object->setType($data['type']);
            unset($data['type']);
        }
        elseif (\array_key_exists('type', $data) && $data['type'] === null) {
            $object->setType(null);
        }
        if (\array_key_exists('header', $data) && $data['header'] !== null) {
            $object->setHeader($this->denormalizer->denormalize($data['header'], \MessageBird\Wire\Model\WhatsAppInteractiveHeader::class, 'json', $context));
            unset($data['header']);
        }
        elseif (\array_key_exists('header', $data) && $data['header'] === null) {
            $object->setHeader(null);
        }
        if (\array_key_exists('body_text', $data) && $data['body_text'] !== null) {
            $object->setBodyText($data['body_text']);
            unset($data['body_text']);
        }
        elseif (\array_key_exists('body_text', $data) && $data['body_text'] === null) {
            $object->setBodyText(null);
        }
        if (\array_key_exists('footer_text', $data) && $data['footer_text'] !== null) {
            $object->setFooterText($data['footer_text']);
            unset($data['footer_text']);
        }
        elseif (\array_key_exists('footer_text', $data) && $data['footer_text'] === null) {
            $object->setFooterText(null);
        }
        if (\array_key_exists('buttons', $data) && $data['buttons'] !== null) {
            $values = [];
            foreach ($data['buttons'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\WhatsAppInteractiveButton::class, 'json', $context);
            }
            $object->setButtons($values);
            unset($data['buttons']);
        }
        elseif (\array_key_exists('buttons', $data) && $data['buttons'] === null) {
            $object->setButtons(null);
        }
        if (\array_key_exists('list', $data) && $data['list'] !== null) {
            $object->setList($this->denormalizer->denormalize($data['list'], \MessageBird\Wire\Model\WhatsAppInteractiveList::class, 'json', $context));
            unset($data['list']);
        }
        elseif (\array_key_exists('list', $data) && $data['list'] === null) {
            $object->setList(null);
        }
        if (\array_key_exists('cta_url', $data) && $data['cta_url'] !== null) {
            $object->setCtaUrl($this->denormalizer->denormalize($data['cta_url'], \MessageBird\Wire\Model\WhatsAppInteractiveCtaUrl::class, 'json', $context));
            unset($data['cta_url']);
        }
        elseif (\array_key_exists('cta_url', $data) && $data['cta_url'] === null) {
            $object->setCtaUrl(null);
        }
        if (\array_key_exists('cards', $data) && $data['cards'] !== null) {
            $values_1 = [];
            foreach ($data['cards'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\WhatsAppInteractiveCard::class, 'json', $context);
            }
            $object->setCards($values_1);
            unset($data['cards']);
        }
        elseif (\array_key_exists('cards', $data) && $data['cards'] === null) {
            $object->setCards(null);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['type'] = $data->getType();
        if ($data->isInitialized('header') && null !== $data->getHeader()) {
            $dataArray['header'] = $this->normalizer->normalize($data->getHeader(), 'json', $context);
        }
        $dataArray['body_text'] = $data->getBodyText();
        if ($data->isInitialized('footerText') && null !== $data->getFooterText()) {
            $dataArray['footer_text'] = $data->getFooterText();
        }
        if ($data->isInitialized('buttons') && null !== $data->getButtons()) {
            $values = [];
            foreach ($data->getButtons() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['buttons'] = $values;
        }
        if ($data->isInitialized('list') && null !== $data->getList()) {
            $dataArray['list'] = $this->normalizer->normalize($data->getList(), 'json', $context);
        }
        if ($data->isInitialized('ctaUrl') && null !== $data->getCtaUrl()) {
            $dataArray['cta_url'] = $this->normalizer->normalize($data->getCtaUrl(), 'json', $context);
        }
        if ($data->isInitialized('cards') && null !== $data->getCards()) {
            $values_1 = [];
            foreach ($data->getCards() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $dataArray['cards'] = $values_1;
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_2;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppMessageInteractive::class => false];
    }
}
