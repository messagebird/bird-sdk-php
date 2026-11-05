<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Core\Serializer;
use MessageBird\Exception\RequestValidationException;
use MessageBird\Tests\Support\RecordingClient;
use MessageBird\Wire\Model\VoiceInboundConfiguration;
use MessageBird\Wire\Model\VoiceInboundConfigurationPut;
use MessageBird\Wire\Model\VoiceLeg;
use MessageBird\Wire\Model\VoiceNumberUpdate;
use MessageBird\Wire\Model\VoiceSettingsInboundConfiguration;
use PHPUnit\Framework\TestCase;

final class VoiceRoutesTest extends TestCase
{
    public function testRingGroupRoutesKeepTheirValue(): void
    {
        $route = ['type' => 'ring_group', 'ring_group_id' => 'vrg_01krdgeqcxet5s7t44vh8rt9mg'];
        $serializer = new Serializer();
        foreach ([VoiceInboundConfiguration::class, VoiceSettingsInboundConfiguration::class, VoiceLeg::class] as $class) {
            $decoded = $serializer->decode(json_encode(['route' => $route]), $class);
            self::assertSame($route, $decoded->getRoute());
        }
    }

    public function testInlineSequenceKeepsEmptyNodeAndTriggerObjects(): void
    {
        $response = Psr17FactoryDiscovery::findResponseFactory()->createResponse(200)
            ->withBody(Psr17FactoryDiscovery::findStreamFactory()->createStream('{}'));
        $recording = new RecordingClient($response);
        $bird = new Bird('bk_test', 'https://api.example.test', $recording);
        $definition = (new \MessageBird\Wire\Model\VoiceSequenceDefinition())
            ->setSchemaVersion(1)
            ->setExpressionEnvironment('bird.cel.v1')
            ->setNodes([[]]);
        $sequence = (new \MessageBird\Wire\Model\CreateVoiceCallSequenceRequest())
            ->setDefinition($definition)
            ->setEntryNodeId('start')
            ->setTriggerData([]);
        $params = (new \MessageBird\Wire\Model\CreateVoiceCallRequest())
            ->setFrom('+12025550100')
            ->setTo('+12025550101')
            ->setSequence($sequence);

        $bird->voice->calls->create($params, new \MessageBird\RequestOptions(idempotencyKey: 'inline-empty-node'));

        self::assertNotNull($recording->lastRequest);
        $sent = json_decode((string) $recording->lastRequest->getBody(), flags: JSON_THROW_ON_ERROR);
        self::assertIsArray($sent->sequence->definition->nodes);
        self::assertInstanceOf(\stdClass::class, $sent->sequence->definition->nodes[0]);
        self::assertInstanceOf(\stdClass::class, $sent->sequence->trigger_data);
    }

    public function testNumberRouteRequiresAnExplicitValueBeforeSending(): void
    {
        $response = Psr17FactoryDiscovery::findResponseFactory()->createResponse(200)
            ->withBody(Psr17FactoryDiscovery::findStreamFactory()->createStream('{}'));
        $recording = new RecordingClient($response);
        $bird = new Bird('bk_test', 'https://api.example.test', $recording);
        $configuration = new VoiceInboundConfigurationPut();
        $params = (new VoiceNumberUpdate())->setInboundConfiguration($configuration);

        try {
            $bird->voice->numbers->update('number-id', $params);
            self::fail('An unset required route must fail before sending.');
        } catch (RequestValidationException $error) {
            self::assertSame('required field VoiceInboundConfigurationPut.route missing', $error->getMessage());
        }
        self::assertNull($recording->lastRequest);

        foreach ([null, ['type' => 'reject']] as $route) {
            $configuration->setRoute($route);
            $bird->voice->numbers->update('number-id', $params);
            self::assertNotNull($recording->lastRequest);
            self::assertSame('PATCH', $recording->lastRequest->getMethod());
            self::assertSame('/v1/voice/numbers/number-id', $recording->lastRequest->getUri()->getPath());
            self::assertSame(
                ['inbound_configuration' => ['route' => $route]],
                json_decode((string) $recording->lastRequest->getBody(), true, flags: JSON_THROW_ON_ERROR),
            );
        }
    }
}
