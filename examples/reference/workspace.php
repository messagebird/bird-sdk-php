<?php

// HAND-WRITTEN example source for the GENERATED workspace method. Each
// `bird:snippet` region is the single source of truth for that key: the
// surfacegen PHP writer injects it (unmarked) as the @example on the generated
// method, and the docs pipeline extracts it for the API-reference code tabs.

declare(strict_types=1);

use MessageBird\Bird;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$workspace = $bird->workspace->get();
echo $workspace->getId() . ' ' . $workspace->getName() . PHP_EOL;
