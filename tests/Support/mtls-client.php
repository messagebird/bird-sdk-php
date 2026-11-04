<?php

declare(strict_types=1);

// Runs in its own process so the test can trust its CA through
// curl.cainfo / openssl.cafile, which PHP only accepts at start-up.
require __DIR__ . '/../../vendor/autoload.php';

[, $port, $cert, $key] = $argv;

$bird = new MessageBird\Bird('bk_eu1_x', baseUrl: "https://127.0.0.1:{$port}", clientCert: $cert, clientKey: $key);
echo json_encode($bird->get('/v1/workspace'));
