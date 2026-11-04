<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use MessageBird\Bird;
use MessageBird\Tests\Support\RecordingClient;
use Nyholm\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class ClientCertificateTest extends TestCase
{
    private static string $dir;

    public static function setUpBeforeClass(): void
    {
        self::$dir = sys_get_temp_dir() . '/bird-sdk-mtls-' . bin2hex(random_bytes(4));
        mkdir(self::$dir);
        $ec = ['-newkey', 'ec', '-pkeyopt', 'ec_paramgen_curve:prime256v1', '-nodes'];
        file_put_contents(self::path('ca.ext'), "basicConstraints=critical,CA:TRUE\nkeyUsage=critical,keyCertSign\nsubjectKeyIdentifier=hash\n");
        self::openssl('req', ...$ec, ...['-keyout', 'ca.key', '-out', 'ca.csr', '-subj', '/CN=test CA']);
        self::openssl('x509', '-req', '-in', 'ca.csr', '-signkey', 'ca.key', '-out', 'ca.pem', '-days', '1', '-extfile', 'ca.ext');
        foreach (['server' => 'serverAuth', 'client' => 'clientAuth'] as $name => $usage) {
            file_put_contents(
                self::path("{$name}.ext"),
                "basicConstraints=CA:FALSE\nauthorityKeyIdentifier=keyid\nsubjectAltName=IP:127.0.0.1\nextendedKeyUsage={$usage}\n",
            );
            self::openssl('req', ...$ec, ...['-keyout', "{$name}.key", '-out', "{$name}.csr", '-subj', "/CN=sdk {$name}"]);
            self::openssl('x509', '-req', '-in', "{$name}.csr", '-CA', 'ca.pem', '-CAkey', 'ca.key', '-CAcreateserial', '-out', "{$name}.pem", '-days', '1', '-extfile', "{$name}.ext");
        }
        self::openssl('genpkey', '-algorithm', 'EC', '-pkeyopt', 'ec_paramgen_curve:prime256v1', '-out', 'other.key');
        self::openssl('pkcs8', '-topk8', '-in', 'client.key', '-out', 'encrypted.key', '-passout', 'pass:secret');
    }

    private static function path(string $name): string
    {
        return self::$dir . '/' . $name;
    }

    private static function openssl(string ...$args): void
    {
        $process = proc_open(['openssl', ...$args], [1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes, self::$dir);
        self::assertIsResource($process);
        $stderr = stream_get_contents($pipes[2]);
        if (proc_close($process) !== 0) {
            self::fail("openssl {$args[0]}: {$stderr}");
        }
    }

    public function testCertificatePresented(): void
    {
        $server = proc_open(
            [PHP_BINARY, __DIR__ . '/Support/mtls-server.php', self::path('ca.pem'), self::path('server.pem'), self::path('server.key')],
            [1 => ['pipe', 'w'], 2 => ['pipe', 'w']],
            $serverPipes,
        );
        self::assertIsResource($server);
        $port = trim((string) fgets($serverPipes[1]));

        $client = proc_open(
            [
                PHP_BINARY, '-d', 'curl.cainfo=' . self::path('ca.pem'), '-d', 'openssl.cafile=' . self::path('ca.pem'),
                __DIR__ . '/Support/mtls-client.php', $port, self::path('client.pem'), self::path('client.key'),
            ],
            [1 => ['pipe', 'w'], 2 => ['pipe', 'w']],
            $clientPipes,
        );
        self::assertIsResource($client);
        $out = stream_get_contents($clientPipes[1]);
        $err = stream_get_contents($clientPipes[2]);
        $exit = proc_close($client);
        proc_close($server);

        self::assertSame(0, $exit, $out . $err);
        self::assertSame(['cn' => 'sdk client'], json_decode((string) $out, true));
    }

    public function testCertificateSelectsMtlsHost(): void
    {
        $bird = new Bird('bk_us1_x', clientCert: self::path('client.pem'), clientKey: self::path('client.key'));
        self::assertSame('https://mtls.us1.platform.bird.com', $bird->baseUrl());

        $explicit = new Bird('bk_us1_x', baseUrl: 'https://custom.example.com', clientCert: self::path('client.pem'), clientKey: self::path('client.key'));
        self::assertSame('https://custom.example.com', $explicit->baseUrl());
    }

    /**
     * @return iterable<string, array{?string, ?string, string}>
     */
    public static function refusals(): iterable
    {
        yield 'key without certificate' => [null, 'client.key', '$clientCert'];
        yield 'certificate without key' => ['client.pem', null, '$clientKey'];
        yield 'missing file' => ['missing.pem', 'client.key', 'missing.pem'];
    }

    #[DataProvider('refusals')]
    public function testRefusesAnIncompletePair(?string $cert, ?string $key, string $named): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage($named);
        new Bird('bk_eu1_x', clientCert: $cert === null ? null : self::path($cert), clientKey: $key === null ? null : self::path($key));
    }

    /**
     * @return iterable<string, array{string}>
     */
    public static function unusableKeys(): iterable
    {
        yield 'mismatched key' => ['other.key'];
        yield 'encrypted key' => ['encrypted.key'];
    }

    #[DataProvider('unusableKeys')]
    public function testRefusesAnUnusableKey(string $key): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(self::path($key));
        new Bird('bk_eu1_x', clientCert: self::path('client.pem'), clientKey: self::path($key));
    }

    public function testRefusesAnInjectedHttpClient(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('$httpClient');
        new Bird('bk_eu1_x', httpClient: new RecordingClient(new Response(200)), clientCert: self::path('client.pem'), clientKey: self::path('client.key'));
    }
}
