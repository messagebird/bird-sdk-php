<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Resources\EmailMailboxesMessages;
use MessageBird\Resources\EmailStats;
use MessageBird\Resources\EmailThreadsMessages;
use MessageBird\Resources\VerifyVerifications;
use MessageBird\Tests\Support\RecordingClient;
use PHPUnit\Framework\TestCase;

/**
 * The client wires every resource, including the nested tree reached through the
 * hand parents (email -> stats / mailboxes -> messages / threads -> messages,
 * verify -> verifications). Proves the accessors resolve and a deep call still
 * runs the full facade -> core -> PSR-18 vertical to the right path.
 */
final class ClientWiringTest extends TestCase
{
    public function testNestedResourceTreeIsWiredAndReachable(): void
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $recording = new RecordingClient(
            $responseFactory->createResponse(200)->withBody($streamFactory->createStream('{}')),
        );
        $bird = new Bird('bk_test', 'https://api.example.test', $recording);

        self::assertInstanceOf(EmailStats::class, $bird->email->stats);
        self::assertInstanceOf(EmailMailboxesMessages::class, $bird->email->mailboxes->messages);
        self::assertInstanceOf(EmailThreadsMessages::class, $bird->email->threads->messages);
        self::assertInstanceOf(VerifyVerifications::class, $bird->verify->verifications);

        $bird->email->stats->summary();

        $request = $recording->lastRequest;
        self::assertNotNull($request);
        self::assertSame('GET', $request->getMethod());
        self::assertSame('/v1/email/stats/summary', $request->getUri()->getPath());
    }
}
