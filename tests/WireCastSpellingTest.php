<?php

declare(strict_types=1);

namespace MessageBird\Tests;

use PHPUnit\Framework\TestCase;

/**
 * jane spells every float cast `(double)`, which PHP 8.5 deprecates, so
 * scripts/generate.sh canonicalizes the wire layer as its last step. Nothing in
 * CI runs that script (it needs the OpenAPI bundle, which is not built there),
 * so a regen that skipped the step would otherwise land 125 deprecation notices
 * in the logs of every customer on 8.5. This is what fails instead.
 */
final class WireCastSpellingTest extends TestCase
{
    public function testGeneratedWireLayerAvoidsCastSpellingsDeprecatedIn85(): void
    {
        $offenders = [];
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(__DIR__ . '/../src/Wire', \FilesystemIterator::SKIP_DOTS),
        );
        foreach ($files as $file) {
            if (!$file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }
            $source = (string) file_get_contents($file->getPathname());
            if (preg_match('/\((?:double|integer|boolean|binary)\)\s*\$/', $source) === 1) {
                $offenders[] = $file->getFilename();
            }
        }

        self::assertSame(
            [],
            $offenders,
            'non-canonical casts in the generated wire layer — re-run clients/sdk-php/scripts/generate.sh, which canonicalizes them',
        );
    }
}
