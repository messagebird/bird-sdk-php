<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use MessageBird\Bird;
use MessageBird\Wire\Model\AssetFolderCreate;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');
$folder = $bird->assets->folders->create((new AssetFolderCreate())->setName('Campaign images'));
echo $folder->getId(), PHP_EOL;
foreach ($bird->assets->list(['kind' => 'image']) as $asset) {
    echo $asset->getId(), ' ', $asset->getUrl(), PHP_EOL;
}
