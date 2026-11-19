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
class AutomaticSeedingRunNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AutomaticSeedingRun::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AutomaticSeedingRun::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AutomaticSeedingRun();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
            unset($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('state', $data) && $data['state'] !== null) {
            $object->setState($data['state']);
            unset($data['state']);
        }
        elseif (\array_key_exists('state', $data) && $data['state'] === null) {
            $object->setState(null);
        }
        if (\array_key_exists('source', $data) && $data['source'] !== null) {
            $object->setSource($data['source']);
            unset($data['source']);
        }
        elseif (\array_key_exists('source', $data) && $data['source'] === null) {
            $object->setSource(null);
        }
        if (\array_key_exists('label', $data) && $data['label'] !== null) {
            $object->setLabel($data['label']);
            unset($data['label']);
        }
        elseif (\array_key_exists('label', $data) && $data['label'] === null) {
            $object->setLabel(null);
        }
        if (\array_key_exists('source_created_at', $data) && $data['source_created_at'] !== null) {
            $object->setSourceCreatedAt(new \DateTime($data['source_created_at']));
            unset($data['source_created_at']);
        }
        elseif (\array_key_exists('source_created_at', $data) && $data['source_created_at'] === null) {
            $object->setSourceCreatedAt(null);
        }
        if (\array_key_exists('retain_until', $data) && $data['retain_until'] !== null) {
            $object->setRetainUntil(new \DateTime($data['retain_until']));
            unset($data['retain_until']);
        }
        elseif (\array_key_exists('retain_until', $data) && $data['retain_until'] === null) {
            $object->setRetainUntil(null);
        }
        if (\array_key_exists('progress', $data) && $data['progress'] !== null) {
            $object->setProgress($this->denormalizer->denormalize($data['progress'], \MessageBird\Wire\Model\AutomaticSeedingProgress::class, 'json', $context));
            unset($data['progress']);
        }
        elseif (\array_key_exists('progress', $data) && $data['progress'] === null) {
            $object->setProgress(null);
        }
        if (\array_key_exists('sending_domain', $data) && $data['sending_domain'] !== null) {
            $object->setSendingDomain($data['sending_domain']);
            unset($data['sending_domain']);
        }
        elseif (\array_key_exists('sending_domain', $data) && $data['sending_domain'] === null) {
            $object->setSendingDomain(null);
        }
        if (\array_key_exists('list_type', $data) && $data['list_type'] !== null) {
            $object->setListType($data['list_type']);
            unset($data['list_type']);
        }
        elseif (\array_key_exists('list_type', $data) && $data['list_type'] === null) {
            $object->setListType(null);
        }
        if (\array_key_exists('engagement_profile', $data) && $data['engagement_profile'] !== null) {
            $object->setEngagementProfile($data['engagement_profile']);
            unset($data['engagement_profile']);
        }
        elseif (\array_key_exists('engagement_profile', $data) && $data['engagement_profile'] === null) {
            $object->setEngagementProfile(null);
        }
        if (\array_key_exists('regions', $data) && $data['regions'] !== null) {
            $values = [];
            foreach ($data['regions'] as $value) {
                $values[] = $value;
            }
            $object->setRegions($values);
            unset($data['regions']);
        }
        elseif (\array_key_exists('regions', $data) && $data['regions'] === null) {
            $object->setRegions(null);
        }
        if (\array_key_exists('registration_started_at', $data) && $data['registration_started_at'] !== null) {
            $object->setRegistrationStartedAt(new \DateTime($data['registration_started_at']));
            unset($data['registration_started_at']);
        }
        elseif (\array_key_exists('registration_started_at', $data) && $data['registration_started_at'] === null) {
            $object->setRegistrationStartedAt(null);
        }
        if (\array_key_exists('registration_finished_at', $data) && $data['registration_finished_at'] !== null) {
            $object->setRegistrationFinishedAt(new \DateTime($data['registration_finished_at']));
            unset($data['registration_finished_at']);
        }
        elseif (\array_key_exists('registration_finished_at', $data) && $data['registration_finished_at'] === null) {
            $object->setRegistrationFinishedAt(null);
        }
        if (\array_key_exists('dispatch_deadline', $data) && $data['dispatch_deadline'] !== null) {
            $object->setDispatchDeadline(new \DateTime($data['dispatch_deadline']));
            unset($data['dispatch_deadline']);
        }
        elseif (\array_key_exists('dispatch_deadline', $data) && $data['dispatch_deadline'] === null) {
            $object->setDispatchDeadline(null);
        }
        if (\array_key_exists('dispatch_finished_at', $data) && $data['dispatch_finished_at'] !== null) {
            $object->setDispatchFinishedAt(new \DateTime($data['dispatch_finished_at']));
            unset($data['dispatch_finished_at']);
        }
        elseif (\array_key_exists('dispatch_finished_at', $data) && $data['dispatch_finished_at'] === null) {
            $object->setDispatchFinishedAt(null);
        }
        if (\array_key_exists('stop_requested_at', $data) && $data['stop_requested_at'] !== null) {
            $object->setStopRequestedAt(new \DateTime($data['stop_requested_at']));
            unset($data['stop_requested_at']);
        }
        elseif (\array_key_exists('stop_requested_at', $data) && $data['stop_requested_at'] === null) {
            $object->setStopRequestedAt(null);
        }
        if (\array_key_exists('reason', $data) && $data['reason'] !== null) {
            $object->setReason($data['reason']);
            unset($data['reason']);
        }
        elseif (\array_key_exists('reason', $data) && $data['reason'] === null) {
            $object->setReason(null);
        }
        if (\array_key_exists('issues', $data) && $data['issues'] !== null) {
            $values_1 = [];
            foreach ($data['issues'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\AutomaticSeedingIssue::class, 'json', $context);
            }
            $object->setIssues($values_1);
            unset($data['issues']);
        }
        elseif (\array_key_exists('issues', $data) && $data['issues'] === null) {
            $object->setIssues(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
            unset($data['created_at']);
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
            unset($data['updated_at']);
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
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
        if (!$data->isInitialized('id')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingRun.id missing');
        }
        $dataArray['id'] = $data->getId();
        if (!$data->isInitialized('state')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingRun.state missing');
        }
        $dataArray['state'] = $data->getState();
        if (!$data->isInitialized('source')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingRun.source missing');
        }
        $dataArray['source'] = $data->getSource();
        if ($data->isInitialized('label') && null !== $data->getLabel()) {
            $dataArray['label'] = $data->getLabel();
        }
        if (!$data->isInitialized('sourceCreatedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingRun.source_created_at missing');
        }
        $dataArray['source_created_at'] = $data->getSourceCreatedAt()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('retainUntil')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingRun.retain_until missing');
        }
        $dataArray['retain_until'] = $data->getRetainUntil()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('progress')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingRun.progress missing');
        }
        $dataArray['progress'] = $this->normalizer->normalize($data->getProgress(), 'json', $context);
        if ($data->isInitialized('sendingDomain') && null !== $data->getSendingDomain()) {
            $dataArray['sending_domain'] = $data->getSendingDomain();
        }
        if ($data->isInitialized('listType') && null !== $data->getListType()) {
            $dataArray['list_type'] = $data->getListType();
        }
        if ($data->isInitialized('engagementProfile') && null !== $data->getEngagementProfile()) {
            $dataArray['engagement_profile'] = $data->getEngagementProfile();
        }
        if ($data->isInitialized('regions') && null !== $data->getRegions()) {
            $values = [];
            foreach ($data->getRegions() as $value) {
                $values[] = $value;
            }
            $dataArray['regions'] = $values;
        }
        if ($data->isInitialized('registrationStartedAt') && null !== $data->getRegistrationStartedAt()) {
            $dataArray['registration_started_at'] = $data->getRegistrationStartedAt()->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('registrationFinishedAt') && null !== $data->getRegistrationFinishedAt()) {
            $dataArray['registration_finished_at'] = $data->getRegistrationFinishedAt()->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('dispatchDeadline') && null !== $data->getDispatchDeadline()) {
            $dataArray['dispatch_deadline'] = $data->getDispatchDeadline()->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('dispatchFinishedAt') && null !== $data->getDispatchFinishedAt()) {
            $dataArray['dispatch_finished_at'] = $data->getDispatchFinishedAt()->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('stopRequestedAt') && null !== $data->getStopRequestedAt()) {
            $dataArray['stop_requested_at'] = $data->getStopRequestedAt()->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('reason') && null !== $data->getReason()) {
            $dataArray['reason'] = $data->getReason();
        }
        if (!$data->isInitialized('issues')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AutomaticSeedingRun.issues missing');
        }
        $values_1 = [];
        foreach ($data->getIssues() as $value_1) {
            $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
        }
        $dataArray['issues'] = $values_1;
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_2;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AutomaticSeedingRun::class => false];
    }
}
