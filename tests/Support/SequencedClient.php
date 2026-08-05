<?php

declare(strict_types=1);

namespace MessageBird\Tests\Support;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * A PSR-18 client that returns canned responses in order and records every
 * request, so a test can drive multi-request flows like pagination.
 */
final class SequencedClient implements ClientInterface
{
    /** @var list<RequestInterface> */
    public array $requests = [];

    /** @param list<ResponseInterface> $responses */
    public function __construct(private array $responses)
    {
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->requests[] = $request;

        $response = array_shift($this->responses);
        if ($response === null) {
            throw new \RuntimeException('SequencedClient: no more canned responses');
        }

        return $response;
    }
}
