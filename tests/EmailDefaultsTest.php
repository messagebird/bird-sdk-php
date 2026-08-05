<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\EmailDefaults;
use MessageBird\Tests\Support\RecordingClient;
use PHPUnit\Framework\TestCase;

/**
 * Channel-level EmailDefaults set on the client fill any field the per-send call
 * omits; a value passed to send() always wins. Mirrors the Go/TS SDK behaviour.
 */
final class EmailDefaultsTest extends TestCase
{
    private function bird(RecordingClient $recording, ?EmailDefaults $email): Bird
    {
        return new Bird('bk_test', 'https://api.example.test', $recording, email: $email);
    }

    private function recording(): RecordingClient
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();

        return new RecordingClient(
            $responseFactory->createResponse(200)->withBody($streamFactory->createStream('{"id":"eml_1","status":"accepted"}')),
        );
    }

    /**
     * @return array<string, mixed>
     */
    private function sentBody(RecordingClient $recording): array
    {
        $request = $recording->lastRequest;
        self::assertNotNull($request);

        return json_decode((string) $request->getBody(), true);
    }

    public function testDefaultsFillOmittedFields(): void
    {
        $recording = $this->recording();
        $bird = $this->bird($recording, new EmailDefaults(
            from: 'Bird <onboarding@bird.com>',
            replyTo: ['support@bird.com'],
            category: 'transactional',
            trackOpens: true,
            headers: ['X-Env' => 'prod'],
            metadata: ['team' => 'growth'],
        ));

        $bird->email->send(to: ['jane@example.com'], subject: 'Hi', html: '<p>Hi.</p>');

        $body = $this->sentBody($recording);
        self::assertSame('Bird <onboarding@bird.com>', $body['from']);
        self::assertSame(['support@bird.com'], $body['reply_to']);
        self::assertSame('transactional', $body['category']);
        self::assertTrue($body['track_opens']);
        self::assertSame(['X-Env' => 'prod'], $body['headers']);
        self::assertSame(['team' => 'growth'], $body['metadata']);
    }

    public function testPerSendValueWinsOverDefault(): void
    {
        $recording = $this->recording();
        $bird = $this->bird($recording, new EmailDefaults(
            from: 'default@bird.com',
            category: 'transactional',
        ));

        $bird->email->send(
            from: 'override@bird.com',
            to: ['jane@example.com'],
            subject: 'Hi',
            html: '<p>Hi.</p>',
            category: 'marketing',
        );

        $body = $this->sentBody($recording);
        self::assertSame('override@bird.com', $body['from']);
        self::assertSame('marketing', $body['category']);
    }

    public function testNoDefaultLeavesFieldOmitted(): void
    {
        $recording = $this->recording();
        $bird = $this->bird($recording, new EmailDefaults(from: 'default@bird.com'));

        $bird->email->send(to: ['jane@example.com'], subject: 'Hi', html: '<p>Hi.</p>');

        $body = $this->sentBody($recording);
        self::assertArrayNotHasKey('category', $body);
        self::assertArrayNotHasKey('reply_to', $body);
    }

    public function testMissingFromWithNoDefaultThrows(): void
    {
        $recording = $this->recording();
        $bird = $this->bird($recording, null);

        $this->expectException(\InvalidArgumentException::class);
        $bird->email->send(to: ['jane@example.com'], subject: 'Hi', html: '<p>Hi.</p>');
    }

    public function testMissingToThrows(): void
    {
        $recording = $this->recording();
        $bird = $this->bird($recording, new EmailDefaults(from: 'default@bird.com'));

        $this->expectException(\InvalidArgumentException::class);
        $bird->email->send(subject: 'Hi', html: '<p>Hi.</p>');
    }
}
