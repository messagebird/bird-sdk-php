<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Tests\Support\RecordingClient;
use MessageBird\Wire\Model\EmailMessage;
use PHPUnit\Framework\TestCase;

/**
 * The flagship email send is hand-written on the Email parent with ergonomic
 * named arguments. This pins that it builds the right wire request: the flat
 * args land in the body, an address string passes through verbatim, and an
 * unset optional argument is omitted (not sent as null).
 */
final class EmailSendTest extends TestCase
{
    public function testSendBuildsPostFromFlatNamedArgs(): void
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $recording = new RecordingClient(
            $responseFactory->createResponse(200)->withBody($streamFactory->createStream('{"id":"eml_1","status":"accepted"}')),
        );
        $bird = new Bird('bk_test', 'https://api.example.test', $recording);

        $message = $bird->email->send(
            from: 'Bird <onboarding@bird.com>',
            to: ['jane@example.com'],
            subject: 'Hello from Bird',
            html: '<p>Hi.</p>',
        );

        $request = $recording->lastRequest;
        self::assertNotNull($request);
        self::assertSame('POST', $request->getMethod());
        self::assertSame('/v1/email/messages', $request->getUri()->getPath());
        self::assertNotSame('', $request->getHeaderLine('Idempotency-Key'));

        $body = json_decode((string) $request->getBody(), true);
        self::assertSame('Bird <onboarding@bird.com>', $body['from']);
        self::assertSame(['jane@example.com'], $body['to']);
        self::assertSame('Hello from Bird', $body['subject']);
        self::assertSame('<p>Hi.</p>', $body['html']);
        self::assertArrayNotHasKey('text', $body);
        self::assertArrayNotHasKey('cc', $body);

        self::assertInstanceOf(EmailMessage::class, $message);
    }
}
