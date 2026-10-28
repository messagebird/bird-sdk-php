<?php

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\OrganizationWorkspaceUpdate;
use MessageBird\Wire\Model\WorkspaceCreate;

$bird = new Bird(getenv('BIRD_MASTER_KEY') ?: '');

$workspace = $bird->organization->workspaces->create((new WorkspaceCreate())->setName('Staging'));
echo $workspace->getId() . PHP_EOL;

$workspaces = $bird->organization->workspaces->list(['name' => 'Staging']);
foreach ($workspaces as $workspace) {
    echo $workspace->getId() . ' ' . $workspace->getName() . PHP_EOL;
}

$workspace = $bird->organization->workspaces->get('ws_01krdgeqcxet5s7t44vh8rt9mg');
echo $workspace->getName() . PHP_EOL;

$workspace = $bird->organization->workspaces->update('ws_01krdgeqcxet5s7t44vh8rt9mg', (new OrganizationWorkspaceUpdate())->setName('Production'));
echo $workspace->getName() . PHP_EOL;

$bird->organization->workspaces->delete('ws_01krdgeqcxet5s7t44vh8rt9mg');
