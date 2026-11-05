<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\Tests\Support\RecordingClient;
use MessageBird\Wire\Model\EmailBroadcastUpdateRequest;
use PHPUnit\Framework\TestCase;

final class NullableCollectionsTest extends TestCase
{
    public function testBroadcastReplyToPreservesOmissionNullAndValue(): void
    {
        $response = Psr17FactoryDiscovery::findResponseFactory()->createResponse(200)
            ->withBody(Psr17FactoryDiscovery::findStreamFactory()->createStream('{}'));
        $recording = new RecordingClient($response);
        $bird = new Bird('bk_test', 'https://api.example.test', $recording);
        $params = new EmailBroadcastUpdateRequest();
        $address = ['email' => 'reply@example.com'];
        foreach ([[], ['reply_to' => null], ['reply_to' => [['email' => 'reply@example.com']]]] as $expected) {
            if (array_key_exists('reply_to', $expected)) {
                $params->setReplyTo($expected['reply_to'] === null ? null : [$address]);
            }
            $bird->patch('/v1/email/broadcasts/example', $params);
            self::assertNotNull($recording->lastRequest);
            self::assertSame($expected, json_decode((string) $recording->lastRequest->getBody(), true, flags: JSON_THROW_ON_ERROR));
        }
    }
}
