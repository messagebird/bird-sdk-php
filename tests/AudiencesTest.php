<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Core\Serializer as CoreSerializer;
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

    public function testMembershipHistoryRoundTripsDateOnlyFields(): void
    {
        $sent = [
            'period' => ['from' => '2026-10-10', 'to' => '2026-10-12', 'data_as_of' => null],
            'data' => [
                ['bucket' => '2026-10-10', 'total' => 0, 'observed_at' => '2026-10-10T14:05:00+02:00'],
                ['bucket' => '2026-10-11', 'total' => null, 'observed_at' => null],
                ['bucket' => '2026-10-12', 'total' => 1250, 'observed_at' => '2026-10-12T09:41:07+00:00'],
            ],
        ];
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $client = new SequencedClient([
            $responseFactory->createResponse(200)->withBody($streamFactory->createStream(json_encode($sent, JSON_THROW_ON_ERROR))),
        ]);
        $bird = new Bird('bk_test', 'https://api.example.test', $client);

        $history = $bird->audiences->membershipHistory('adn_01krdgeqcxet5s7t44vh8rt201', ['from' => '2026-10-10', 'to' => '2026-10-12']);
        self::assertSame('2026-10-10', $history->getPeriod()?->getFrom()?->format('Y-m-d'));
        self::assertNull($history->getPeriod()?->getDataAsOf());
        $points = $history->getData() ?? [];
        self::assertSame(0, $points[0]->getTotal());
        self::assertSame('2026-10-10T14:05:00+02:00', $points[0]->getObservedAt()?->format('Y-m-d\TH:i:sP'));
        self::assertNull($points[1]->getTotal());
        self::assertNull($points[1]->getObservedAt());

        self::assertSame($sent, json_decode((new CoreSerializer())->encode($history), true, 512, JSON_THROW_ON_ERROR));
    }
}
