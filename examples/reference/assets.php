<?php

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\AssetUploadFile;
use MessageBird\Wire\Model\AssetUploadSessionCreate;
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

$data = file_get_contents('invoice.pdf');
if ($data === false) {
    throw new RuntimeException('Cannot read invoice.pdf');
}
$file = new AssetUploadFile();
$file->setFilename('invoice.pdf');
$file->setContentType('application/pdf');
$file->setSizeBytes(strlen($data));
$file->setSha256(hash('sha256', $data));
$params = new AssetUploadSessionCreate();
$params->setClientReference('4ca4145c-782a-4d03-bc80-a27e3e431780');
$params->setFile($file);
$upload = $bird->assets->uploads->create($params);
echo $upload->getId();

$upload = $bird->assets->uploads->get('aus_01krdgeqcxet5s7t44vh8rt9mg');
echo $upload->getState();

$upload = $bird->assets->uploads->prepare('aus_01krdgeqcxet5s7t44vh8rt9mg');
echo $upload->getState();

$upload = $bird->assets->uploads->complete('aus_01krdgeqcxet5s7t44vh8rt9mg');
echo $upload->getState();

$upload = $bird->assets->uploads->cancel('aus_01krdgeqcxet5s7t44vh8rt9mg');
echo $upload->getState();

$handoff = $bird->assets->uploads->handoff('aus_01krdgeqcxet5s7t44vh8rt9mg');
if ($handoff->getBrowserUrl() !== null) {
    echo $handoff->getBrowserUrl();
}
