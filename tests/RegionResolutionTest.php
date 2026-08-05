<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Tests\Support\RecordingClient;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * The base URL is resolved from the API-key region prefix (ADR-0036), matching
 * the Go/Python cores: a `bk_{region}_` key infers the endpoint, an explicit
 * region or base URL overrides it, and a key that resolves to neither is an
 * error rather than a silent default.
 */
final class RegionResolutionTest extends TestCase
{
    private function client(): RecordingClient
    {
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();

        return new RecordingClient($responseFactory->createResponse(200));
    }

    /**
     * @return iterable<string, array{string, string}>
     */
    public static function keyPrefixes(): iterable
    {
        yield 'eu1' => ['bk_eu1_secret', 'https://eu1.platform.bird.com'];
        yield 'us3' => ['bk_us3_secret', 'https://us3.platform.bird.com'];
        yield 'ap10' => ['bk_ap10_secret', 'https://ap10.platform.bird.com'];
    }

    #[DataProvider('keyPrefixes')]
    public function testInfersBaseUrlFromKeyPrefix(string $apiKey, string $expected): void
    {
        self::assertSame($expected, (new Bird($apiKey, null, $this->client()))->baseUrl());
    }

    public function testExplicitRegionResolvesWhenTheKeyCannot(): void
    {
        $bird = new Bird('rawkey', null, $this->client(), region: 'ap2');

        self::assertSame('https://ap2.platform.bird.com', $bird->baseUrl());
    }

    public function testEmptyRegionFallsBackToTheKeyPrefix(): void
    {
        $bird = new Bird('bk_eu1_secret', null, $this->client(), region: '');

        self::assertSame('https://eu1.platform.bird.com', $bird->baseUrl());
    }

    public function testExplicitBaseUrlWinsOverTheKeyRegion(): void
    {
        $bird = new Bird('bk_eu1_secret', 'https://custom.example.test/api', $this->client());

        self::assertSame('https://custom.example.test/api', $bird->baseUrl());
    }

    public function testUnresolvableRegionIsAnError(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Bird('rawkey', null, $this->client());
    }
}
