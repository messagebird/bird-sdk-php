<?php

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\AssetUpdate;
use MessageBird\Wire\Model\AssetFolderCreate;
use MessageBird\Wire\Model\AssetFolderUpdate;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

foreach ($bird->assets->list(['kind' => 'image']) as $asset) {
    echo $asset->getId(), ' ', $asset->getUrl(), PHP_EOL;
}

$asset = $bird->assets->get('ast_01krdgeqcxet5s7t44vh8rt9mg');
echo $asset->getUrl();

$params = (new AssetUpdate())->setName('Summer banner');
$asset = $bird->assets->update('ast_01krdgeqcxet5s7t44vh8rt9mg', $params);
echo $asset->getName();

$bird->assets->delete('ast_01krdgeqcxet5s7t44vh8rt9mg');

$references = $bird->assets->references->list('ast_01krdgeqcxet5s7t44vh8rt9mg');
var_dump($references->getData(), $references->getTruncated());

$params = (new AssetFolderCreate())->setName('Campaign images');
$folder = $bird->assets->folders->create($params);
echo $folder->getId();

foreach ($bird->assets->folders->list() as $folder) {
    echo $folder->getId(), ' ', $folder->getPath(), PHP_EOL;
}

$folder = $bird->assets->folders->get('asf_01krdgeqcxet5s7t44vh8rt9mg');
echo $folder->getPath();

$params = (new AssetFolderUpdate())->setName('Autumn campaign');
$folder = $bird->assets->folders->update('asf_01krdgeqcxet5s7t44vh8rt9mg', $params);
echo $folder->getPath();

$bird->assets->folders->delete('asf_01krdgeqcxet5s7t44vh8rt9mg');
