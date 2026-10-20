<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use Http\Discovery\Psr17FactoryDiscovery;
use MessageBird\Bird;
use MessageBird\ComplianceFile;
use MessageBird\Exception\ApiException;
use MessageBird\Tests\Support\BodyRecordingClient;
use MessageBird\Tests\Support\SequenceClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class ComplianceAttachmentsTest extends TestCase
{
    private const PDF = "%PDF-1.4\n1 0 obj\n<<>>\nendobj\n";
    private const ATTACHMENT = '{"id":"tca_01krdgeqcxet5s7t44vh8rt9mg","filename":"proof.pdf","content_type":"application/pdf","size_bytes":30,"download_url":"https://files.example/proof.pdf","download_url_expires_at":"2026-10-08T00:00:00Z","status":"draft","expires_at":null,"created_at":"2026-10-07T00:00:00Z","updated_at":"2026-10-07T00:00:00Z"}';

    /**
     * @param array<string, string> $headers
     */
    private function response(int $status, string $body = '', array $headers = []): ResponseInterface
    {
        $response = Psr17FactoryDiscovery::findResponseFactory()->createResponse($status)
            ->withBody(Psr17FactoryDiscovery::findStreamFactory()->createStream($body));
        foreach ($headers as $name => $value) {
            $response = $response->withHeader($name, $value);
        }

        return $response;
    }

    /**
     * @return array{Bird, SequenceClient}
     */
    private function bird(int $maxRetries, ResponseInterface ...$responses): array
    {
        $client = new SequenceClient(...$responses);

        return [new Bird('bk_test', 'https://api.example.test', $client, maxRetries: $maxRetries), $client];
    }

    /**
     * Each part by form name, as [filename, contents].
     *
     * @return array<string, array{?string, string}>
     */
    private static function parts(RequestInterface $request): array
    {
        self::assertSame(1, preg_match('/^multipart\/form-data; boundary=(\S+)$/', $request->getHeaderLine('Content-Type'), $m));
        $request->getBody()->rewind();
        $body = (string) $request->getBody();
        $parts = [];
        foreach (\array_slice(explode('--' . $m[1], $body), 1, -1) as $chunk) {
            [$head, $contents] = explode("\r\n\r\n", substr($chunk, 2), 2);
            preg_match('/name="([^"]*)"/', $head, $name);
            $filename = preg_match('/filename="([^"]*)"/', $head, $file) === 1 ? $file[1] : null;
            $parts[$name[1]] = [$filename, substr($contents, 0, -2)];
        }

        return $parts;
    }

    public function testCreateSendsTheFileAndDescriptionAsMultipart(): void
    {
        [$bird, $client] = $this->bird(0, $this->response(201, self::ATTACHMENT, ['Content-Type' => 'application/json']));

        $attachment = $bird->complianceAttachments->create(self::PDF, 'proof.pdf', 'Utility bill');

        $request = $client->requests[0];
        self::assertSame('POST', $request->getMethod());
        self::assertSame('/v1/compliance/attachments', $request->getUri()->getPath());
        self::assertNotSame('', $request->getHeaderLine('Idempotency-Key'));
        self::assertSame(['file' => ['proof.pdf', self::PDF], 'description' => [null, 'Utility bill']], self::parts($request));
        self::assertSame('tca_01krdgeqcxet5s7t44vh8rt9mg', $attachment->getId());
    }

    public function testCreateOmitsAnUnsetDescription(): void
    {
        [$bird, $client] = $this->bird(0, $this->response(200, self::ATTACHMENT, ['Content-Type' => 'application/json']));

        $bird->complianceAttachments->create(self::PDF, 'proof.pdf');

        self::assertSame(['file'], array_keys(self::parts($client->requests[0])));
    }

    // The server dedupes a retried upload by its key; a fresh key per attempt
    // would turn an ambiguous failure into a second write.
    public function testCreateRetriesWithTheSameBodyAndKey(): void
    {
        $client = new BodyRecordingClient(
            $this->response(408, '{"error":{"type":"request_timeout_error","code":"E00408","message":"try again"}}'),
            $this->response(201, self::ATTACHMENT, ['Content-Type' => 'application/json']),
        );
        $bird = new Bird('bk_test', 'https://api.example.test', $client, maxRetries: 1);

        $bird->complianceAttachments->create(self::PDF, 'proof.pdf');

        self::assertCount(2, $client->bodies);
        self::assertSame($client->requests[0]->getHeaderLine('Idempotency-Key'), $client->requests[1]->getHeaderLine('Idempotency-Key'));
        self::assertStringContainsString(self::PDF, $client->bodies[0]);
        self::assertSame($client->bodies[0], $client->bodies[1]);
    }

    public function testAQuoteInTheFilenameCannotEndTheHeaderParameter(): void
    {
        [$bird, $client] = $this->bird(0, $this->response(201, self::ATTACHMENT, ['Content-Type' => 'application/json']));

        $bird->complianceAttachments->create(self::PDF, "a\"b\r\n.pdf");

        $client->requests[0]->getBody()->rewind();
        self::assertStringContainsString('filename="a\\"b.pdf"', (string) $client->requests[0]->getBody());
    }

    public function testGetReturnsTheBytesTypeAndRfc5987Filename(): void
    {
        [$bird, $client] = $this->bird(0, $this->response(200, self::PDF, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "attachment; filename=\"_rbol.pdf\"; filename*=UTF-8''%C3%A1rbol.pdf",
        ]));

        $file = $bird->complianceAttachments->get('tca_01krdgeqcxet5s7t44vh8rt9mg');

        self::assertSame('/v1/compliance/attachments/tca_01krdgeqcxet5s7t44vh8rt9mg', $client->requests[0]->getUri()->getPath());
        self::assertEquals(new ComplianceFile(self::PDF, 'application/pdf', 'árbol.pdf'), $file);
    }

    public function testDocumentTemplateGetReadsAWordForm(): void
    {
        $docx = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
        [$bird, $client] = $this->bird(0, $this->response(200, "PK\x03\x04", [
            'Content-Type' => $docx,
            'Content-Disposition' => 'attachment; filename="form.docx"',
        ]));

        $form = $bird->complianceDocumentTemplates->get('cmt_01krdgeqcxet5s7t44vh8rt9mg');

        self::assertSame('/v1/compliance/document-templates/cmt_01krdgeqcxet5s7t44vh8rt9mg', $client->requests[0]->getUri()->getPath());
        self::assertEquals(new ComplianceFile("PK\x03\x04", $docx, 'form.docx'), $form);
    }

    public function testGetMapsA404ToTheApiError(): void
    {
        [$bird] = $this->bird(0, $this->response(404, '{"error":{"type":"not_found_error","code":"E12044","message":"attachment not found"}}'));

        $this->expectException(ApiException::class);
        $bird->complianceAttachments->get('tca_01krdgeqcxet5s7t44vh8rt9mg');
    }
}
