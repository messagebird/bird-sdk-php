<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/WrapperModelGenerator.php';

use Jane\Component\JsonSchema\Generator\Naming;
use Jane\Component\JsonSchema\Printer;
use Jane\Component\JsonSchema\Registry\Registry;
use Jane\Component\OpenApi3\Guesser\OpenApiSchema\GuesserFactory;
use Jane\Component\OpenApi3\JaneOpenApi;
use Jane\Component\OpenApi3\SchemaParser\SchemaParser;
use Jane\Component\OpenApiCommon\Console\Loader\ConfigLoader;
use Jane\Component\OpenApiCommon\Console\Loader\SchemaLoader;
use Jane\Component\OpenApiCommon\Generator\ModelGenerator;
use Jane\Component\OpenApiCommon\JaneOpenApi as CommonJaneOpenApi;
use Jane\Component\OpenApiCommon\Registry\Registry as OpenApiRegistry;
use Jane\Component\OpenApiCommon\Registry\Schema;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class WrapperJaneOracle extends JaneOpenApi
{
    private array $bases = [];

    protected static function create(array $options = []): CommonJaneOpenApi
    {
        $oracle = new self(SchemaParser::class, GuesserFactory::create(self::buildSerializer(), $options), $options['strict']);
        $oracle->bases = $options['wrapper-bases'];
        return $oracle;
    }

    protected static function generators(DenormalizerInterface $denormalizer, array $options = []): \Generator
    {
        foreach (parent::generators($denormalizer, $options) as $generator) {
            yield $generator instanceof ModelGenerator
                ? new WrapperModelGenerator(new Naming(), (new ParserFactory())->createForHostVersion(), $options['wrapper-bases'])
                : $generator;
        }
    }

    protected function whitelistFetch(Schema $schema, Registry $registry): void
    {
        foreach ($this->bases as $wrapper => $base) {
            $schema->addRelation($wrapper, $base);
        }
        parent::whitelistFetch($schema, $registry);
    }
}

$options = (new ConfigLoader())->load(__DIR__ . '/../.jane-openapi');
$input = json_decode(file_get_contents($options['openapi-file']), true, flags: JSON_THROW_ON_ERROR);
$registry = new OpenApiRegistry();
$registry->setWhitelistedPaths($options['whitelisted-paths']);
$registry->setThrowUnexpectedStatusCode($options['throw-unexpected-status-code']);
$registry->setCustomQueryResolver($options['custom-query-resolver']);
$registry->addSchema((new SchemaLoader())->resolve($options['openapi-file'], $options));
$registry->addOutputDirectory($options['directory']);
$options['wrapper-bases'] = $input['x-sdk-wrapper-bases'] ?? [];
WrapperJaneOracle::build($options)->generate($registry);
$printer = new Printer(new Standard(['shortArraySyntax' => true]));
$printer->setUseFixer($options['use-fixer']);
$printer->output($registry);
