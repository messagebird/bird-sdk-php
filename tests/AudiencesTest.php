<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Tests\Support\SequencedClient;
use PHPUnit\Framework\TestCase;

// Conformance drivers discard decoded responses.
final class AudiencesTest extends TestCase
{
    public function testMembershipKeepsUnavailableDistinctFromZero(): void
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $client = new SequencedClient([
            $responseFactory->createResponse(200)->withBody($streamFactory->createStream('{}')),
            $responseFactory->createResponse(200)->withBody($streamFactory->createStream(
                '{"membership":{"total":0,"data_as_of":"2026-10-12T09:41:07.512843Z"}}'
            )),
        ]);
        $bird = new Bird('bk_test', 'https://api.example.test', $client);

        $unavailable = $bird->audiences->membership('adn_01krdgeqcxet5s7t44vh8rt201');
        self::assertNull($unavailable->getMembership());
        self::assertFalse($unavailable->isInitialized('membership'));

        $empty = $bird->audiences->membership('adn_01krdgeqcxet5s7t44vh8rt201')->getMembership();
        self::assertNotNull($empty);
        self::assertSame(0, $empty->getTotal());
        self::assertSame('2026-10-12T09:41:07.512843+00:00', $empty->getDataAsOf()?->format('Y-m-d\TH:i:s.uP'));
    }
}
