<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Tests\Support\RecordingClient;
use PHPUnit\Framework\TestCase;

/**
 * `languages` is a map of maps on the wire, and PHP cannot tell an empty map
 * from an empty list, so an empty language set or an empty language body would
 * go out as `[]` where the API reads an object.
 */
final class EmailTemplatesRequestTest extends TestCase
{
    /**
     * @return array{Bird, RecordingClient}
     */
    private function makeClient(string $body = '{"id":"emt_01krdgeqcxet5s7t44vh8rt9mg"}'): array
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $response = $responseFactory->createResponse(200)->withBody($streamFactory->createStream($body));
        $recording = new RecordingClient($response);

        return [new Bird('bk_test', 'https://api.example.test', $recording), $recording];
    }

    public function testEmptyLanguageMapSendsAnEmptyObject(): void
    {
        [$bird, $recording] = $this->makeClient();

        $bird->email->templates->create('welcome', 'transactional', 'html', languages: []);

        self::assertSame(
            '{"slug":"welcome","category":"transactional","source":"html","languages":{}}',
            (string) $recording->lastRequest?->getBody(),
        );
    }

    public function testEmptyLanguageBodySendsAnEmptyObject(): void
    {
        [$bird, $recording] = $this->makeClient();

        $bird->email->templates->create('welcome', 'transactional', 'html', languages: ['en' => []]);

        self::assertSame(
            '{"slug":"welcome","category":"transactional","source":"html","languages":{"en":{}}}',
            (string) $recording->lastRequest?->getBody(),
        );
    }

    public function testPopulatedLanguageMapKeepsItsContent(): void
    {
        [$bird, $recording] = $this->makeClient();

        $bird->email->templates->create('welcome', 'transactional', 'html', languages: [
            'en' => ['subject' => 'Hello', 'html' => '<p>Hello</p>'],
        ]);

        self::assertSame(
            '{"slug":"welcome","category":"transactional","source":"html","languages":{"en":{"subject":"Hello","html":"<p>Hello<\/p>"}}}',
            (string) $recording->lastRequest?->getBody(),
        );
    }
}
