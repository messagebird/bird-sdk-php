<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use MessageBird\Core\Serializer;
use MessageBird\Wire\Model\VoiceInboundConfiguration;
use MessageBird\Wire\Model\VoiceLeg;
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
}
