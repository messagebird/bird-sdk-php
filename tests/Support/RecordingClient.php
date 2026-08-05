<?php

declare(strict_types=1);

namespace MessageBird\Tests\Support;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * A PSR-18 client that records the outbound request and returns a canned
 * response, so a test can assert the exact wire request the SDK built.
 */
final class RecordingClient implements ClientInterface
{
    public ?RequestInterface $lastRequest = null;

    public function __construct(private readonly ResponseInterface $response)
    {
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->lastRequest = $request;

        return $this->response;
    }
}
