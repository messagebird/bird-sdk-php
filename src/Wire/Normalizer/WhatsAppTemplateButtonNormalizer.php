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
class WhatsAppTemplateButtonNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppTemplateButton::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppTemplateButton::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppTemplateButton();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('zero_tap_terms_accepted', $data) && \is_int($data['zero_tap_terms_accepted'])) {
            $data['zero_tap_terms_accepted'] = (bool) $data['zero_tap_terms_accepted'];
        }
        if (\array_key_exists('type', $data) && $data['type'] !== null) {
            $object->setType($data['type']);
        }
        elseif (\array_key_exists('type', $data) && $data['type'] === null) {
            $object->setType(null);
        }
        if (\array_key_exists('otp_type', $data) && $data['otp_type'] !== null) {
            $object->setOtpType($data['otp_type']);
        }
        elseif (\array_key_exists('otp_type', $data) && $data['otp_type'] === null) {
            $object->setOtpType(null);
        }
        if (\array_key_exists('autofill_text', $data) && $data['autofill_text'] !== null) {
            $object->setAutofillText($data['autofill_text']);
        }
        elseif (\array_key_exists('autofill_text', $data) && $data['autofill_text'] === null) {
            $object->setAutofillText(null);
        }
        if (\array_key_exists('supported_apps', $data) && $data['supported_apps'] !== null) {
            $values = [];
            foreach ($data['supported_apps'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\WhatsAppTemplateSupportedApp::class, 'json', $context);
            }
            $object->setSupportedApps($values);
        }
        elseif (\array_key_exists('supported_apps', $data) && $data['supported_apps'] === null) {
            $object->setSupportedApps(null);
        }
        if (\array_key_exists('zero_tap_terms_accepted', $data) && $data['zero_tap_terms_accepted'] !== null) {
            $object->setZeroTapTermsAccepted($data['zero_tap_terms_accepted']);
        }
        elseif (\array_key_exists('zero_tap_terms_accepted', $data) && $data['zero_tap_terms_accepted'] === null) {
            $object->setZeroTapTermsAccepted(null);
        }
        if (\array_key_exists('text', $data) && $data['text'] !== null) {
            $object->setText($data['text']);
        }
        elseif (\array_key_exists('text', $data) && $data['text'] === null) {
            $object->setText(null);
        }
        if (\array_key_exists('url', $data) && $data['url'] !== null) {
            $object->setUrl($data['url']);
        }
        elseif (\array_key_exists('url', $data) && $data['url'] === null) {
            $object->setUrl(null);
        }
        if (\array_key_exists('phone_number', $data) && $data['phone_number'] !== null) {
            $object->setPhoneNumber($data['phone_number']);
        }
        elseif (\array_key_exists('phone_number', $data) && $data['phone_number'] === null) {
            $object->setPhoneNumber(null);
        }
        if (\array_key_exists('example_parameters', $data) && $data['example_parameters'] !== null) {
            $values_1 = [];
            foreach ($data['example_parameters'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\WhatsAppTemplateExampleParameter::class, 'json', $context);
            }
            $object->setExampleParameters($values_1);
        }
        elseif (\array_key_exists('example_parameters', $data) && $data['example_parameters'] === null) {
            $object->setExampleParameters(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppTemplateButton::class => false];
    }
}
