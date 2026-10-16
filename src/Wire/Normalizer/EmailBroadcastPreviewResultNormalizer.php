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
class EmailBroadcastPreviewResultNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailBroadcastPreviewResult::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailBroadcastPreviewResult::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailBroadcastPreviewResult();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('resolution', $data) && $data['resolution'] !== null) {
            $object->setResolution($this->denormalizer->denormalize($data['resolution'], \MessageBird\Wire\Model\EmailBroadcastResolution::class, 'json', $context));
        }
        elseif (\array_key_exists('resolution', $data) && $data['resolution'] === null) {
            $object->setResolution(null);
        }
        if (\array_key_exists('contact_id', $data) && $data['contact_id'] !== null) {
            $object->setContactId($data['contact_id']);
        }
        elseif (\array_key_exists('contact_id', $data) && $data['contact_id'] === null) {
            $object->setContactId(null);
        }
        if (\array_key_exists('subject', $data) && $data['subject'] !== null) {
            $object->setSubject($data['subject']);
        }
        elseif (\array_key_exists('subject', $data) && $data['subject'] === null) {
            $object->setSubject(null);
        }
        if (\array_key_exists('preheader', $data) && $data['preheader'] !== null) {
            $object->setPreheader($data['preheader']);
        }
        elseif (\array_key_exists('preheader', $data) && $data['preheader'] === null) {
            $object->setPreheader(null);
        }
        if (\array_key_exists('html', $data) && $data['html'] !== null) {
            $object->setHtml($data['html']);
        }
        elseif (\array_key_exists('html', $data) && $data['html'] === null) {
            $object->setHtml(null);
        }
        if (\array_key_exists('text', $data) && $data['text'] !== null) {
            $object->setText($data['text']);
        }
        elseif (\array_key_exists('text', $data) && $data['text'] === null) {
            $object->setText(null);
        }
        if (\array_key_exists('resolved_parameters', $data) && $data['resolved_parameters'] !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['resolved_parameters'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setResolvedParameters($values);
        }
        elseif (\array_key_exists('resolved_parameters', $data) && $data['resolved_parameters'] === null) {
            $object->setResolvedParameters(null);
        }
        if (\array_key_exists('problems', $data) && $data['problems'] !== null) {
            $values_1 = [];
            foreach ($data['problems'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\EmailBroadcastParameterProblem::class, 'json', $context);
            }
            $object->setProblems($values_1);
        }
        elseif (\array_key_exists('problems', $data) && $data['problems'] === null) {
            $object->setProblems(null);
        }
        if (\array_key_exists('preview_fingerprint', $data) && $data['preview_fingerprint'] !== null) {
            $object->setPreviewFingerprint($data['preview_fingerprint']);
        }
        elseif (\array_key_exists('preview_fingerprint', $data) && $data['preview_fingerprint'] === null) {
            $object->setPreviewFingerprint(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['resolution'] = $this->normalizer->normalize($data->getResolution(), 'json', $context);
        if ($data->isInitialized('contactId') && null !== $data->getContactId()) {
            $dataArray['contact_id'] = $data->getContactId();
        }
        $dataArray['subject'] = $data->getSubject();
        $dataArray['preheader'] = $data->getPreheader();
        $dataArray['html'] = $data->getHtml();
        $dataArray['text'] = $data->getText();
        $values = [];
        foreach ($data->getResolvedParameters() as $key => $value) {
            $values[$key] = $value;
        }
        $dataArray['resolved_parameters'] = (object) $values;
        $values_1 = [];
        foreach ($data->getProblems() as $value_1) {
            $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
        }
        $dataArray['problems'] = $values_1;
        $dataArray['preview_fingerprint'] = $data->getPreviewFingerprint();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailBroadcastPreviewResult::class => false];
    }
}
