<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\RequestOptions;
use MessageBird\Tests\Support\RecordingClient;
use MessageBird\Tests\Support\SequencedClient;
use MessageBird\Wire\Model\Contact;
use MessageBird\Wire\Model\ContactUpdateRequest;
use PHPUnit\Framework\TestCase;

/**
 * Exercises the full vertical: facade -> core dispatch -> PSR-18 -> wire
 * request. This is the local mirror of what the cross-surface conformance
 * corpus asserts for every surface.
 */
final class ContactsRequestTest extends TestCase
{
    /**
     * @return array{Bird, RecordingClient}
     */
    private function makeClient(string $body): array
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $response = $responseFactory->createResponse(200)->withBody($streamFactory->createStream($body));
        $recording = new RecordingClient($response);

        return [new Bird('bk_test', 'https://api.example.test', $recording), $recording];
    }

    public function testUpdateBuildsPatchAndClearsViaExplicitNull(): void
    {
        [$bird, $recording] = $this->makeClient('{"id":"c1","email":"new@example.com"}');

        $params = (new ContactUpdateRequest())
            ->setEmail('new@example.com')
            ->setFirstName(null);
        $contact = $bird->contacts->update('c1', $params);

        $request = $recording->lastRequest;
        self::assertNotNull($request);
        self::assertSame('PATCH', $request->getMethod());
        self::assertSame('/v1/contacts/c1', $request->getUri()->getPath());
        self::assertSame('Bearer bk_test', $request->getHeaderLine('Authorization'));
        self::assertSame('sdk-php', $request->getHeaderLine('Bird-Surface'));
        self::assertNotSame('', $request->getHeaderLine('Idempotency-Key'));

        $sent = json_decode((string) $request->getBody(), true);
        self::assertSame('new@example.com', $sent['email']);
        self::assertArrayHasKey('first_name', $sent);
        self::assertNull($sent['first_name']);
        self::assertArrayNotHasKey('last_name', $sent);

        self::assertInstanceOf(Contact::class, $contact);
    }

    public function testCallerHeadersCannotOverrideReservedHeaders(): void
    {
        [$bird, $recording] = $this->makeClient('{"id":"c1","email":"x@example.com"}');

        $options = new RequestOptions(headers: [
            'Authorization' => 'Bearer HACKED',
            'Bird-Surface' => 'spoofed',
            'X-Custom' => 'passes',
        ]);
        $bird->contacts->update('c1', (new ContactUpdateRequest())->setEmail('x@example.com'), $options);

        $request = $recording->lastRequest;
        self::assertNotNull($request);
        // Reserved headers stay SDK-owned; a non-reserved custom header passes through.
        self::assertSame('Bearer bk_test', $request->getHeaderLine('Authorization'));
        self::assertSame('sdk-php', $request->getHeaderLine('Bird-Surface'));
        self::assertSame('passes', $request->getHeaderLine('X-Custom'));
    }

    public function testListAutoPaginatesAcrossPagesFollowingTheCursor(): void
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $page1 = $responseFactory->createResponse(200)
            ->withBody($streamFactory->createStream('{"data":[{"id":"c1"}],"next_cursor":"cur2"}'));
        $page2 = $responseFactory->createResponse(200)
            ->withBody($streamFactory->createStream('{"data":[{"id":"c2"}],"next_cursor":null}'));
        $client = new SequencedClient([$page1, $page2]);
        $bird = new Bird('bk_test', 'https://api.example.test', $client);

        $items = iterator_to_array($bird->contacts->list());

        self::assertCount(2, $items);
        self::assertContainsOnlyInstancesOf(Contact::class, $items);
        // Two pages fetched; the second request carried the forward cursor.
        self::assertCount(2, $client->requests);
        self::assertStringContainsString('starting_after=cur2', (string) $client->requests[1]->getUri());
    }

    public function testDeleteSendsDeleteWithAnIdempotencyKeyAndNoBody(): void
    {
        [$bird, $recording] = $this->makeClient('');

        $bird->contacts->delete('c1');

        $request = $recording->lastRequest;
        self::assertNotNull($request);
        self::assertSame('DELETE', $request->getMethod());
        self::assertSame('/v1/contacts/c1', $request->getUri()->getPath());
        self::assertSame('', (string) $request->getBody());
        self::assertNotSame('', $request->getHeaderLine('Idempotency-Key'));
    }

    public function testGetBuildsPlainGetWithNoIdempotencyKey(): void
    {
        [$bird, $recording] = $this->makeClient('{"id":"c1"}');

        $contact = $bird->contacts->get('c1');

        $request = $recording->lastRequest;
        self::assertNotNull($request);
        self::assertSame('GET', $request->getMethod());
        self::assertSame('/v1/contacts/c1', $request->getUri()->getPath());
        self::assertSame('', $request->getHeaderLine('Idempotency-Key'));
        self::assertInstanceOf(Contact::class, $contact);
    }
}
