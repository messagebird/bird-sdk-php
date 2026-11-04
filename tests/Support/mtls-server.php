<?php

declare(strict_types=1);

// Serves one HTTPS request that must present a client certificate signed by the
// test CA, and answers with that certificate's common name. Prints its port first.
[, $ca, $cert, $key] = $argv;

$server = stream_socket_server('tls://127.0.0.1:0', $errno, $errstr, STREAM_SERVER_BIND | STREAM_SERVER_LISTEN, stream_context_create(['ssl' => [
    'local_cert' => $cert,
    'local_pk' => $key,
    'cafile' => $ca,
    'verify_peer' => true,
    'verify_peer_name' => false,
    'allow_self_signed' => false,
    'capture_peer_cert' => true,
]]));
if ($server === false) {
    fwrite(STDERR, "listen: {$errstr}\n");
    exit(1);
}
echo parse_url('tcp://' . stream_socket_get_name($server, false), PHP_URL_PORT), "\n";

$conn = @stream_socket_accept($server, 30);
if ($conn === false) {
    fwrite(STDERR, "handshake refused\n");
    exit(1);
}
while (($line = fgets($conn)) !== false && trim($line) !== '') {
}
$peer = openssl_x509_parse(stream_context_get_params($conn)['options']['ssl']['peer_certificate']);
$body = json_encode(['cn' => $peer['subject']['CN']]);
fwrite($conn, "HTTP/1.1 200 OK\r\nContent-Type: application/json\r\nContent-Length: " . strlen($body) . "\r\nConnection: close\r\n\r\n" . $body);
fclose($conn);
