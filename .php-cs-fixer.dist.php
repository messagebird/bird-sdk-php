<?php

// PSR-12 style for the hand-written layer. The generated wire layer (src/Wire)
// is jane-php output and is not held to our style bar.
$finder = PhpCsFixer\Finder::create()
    ->in([__DIR__ . '/src', __DIR__ . '/tests'])
    ->notPath('Wire');

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        'declare_strict_types' => true,
    ])
    ->setFinder($finder);
