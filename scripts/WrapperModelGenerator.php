<?php

declare(strict_types=1);

use Jane\Component\JsonSchema\Generator\Naming;
use Jane\Component\JsonSchema\Guesser\Guess\ClassGuess;
use Jane\Component\JsonSchema\Guesser\Guess\Property;
use Jane\Component\OpenApiCommon\Generator\ModelGenerator;
use PhpParser\Comment\Doc;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt;
use PhpParser\Parser;

final class WrapperModelGenerator extends ModelGenerator
{
    public function __construct(Naming $naming, Parser $parser, private readonly array $bases)
    {
        parent::__construct($naming, $parser);
    }

    protected function doCreateModel(ClassGuess $class, array $properties, array $methods): Stmt\Class_
    {
        $base = $this->bases[$class->getName()] ?? null;
        if ($base === null) {
            return parent::doCreateModel($class, $properties, $methods);
        }
        return new Stmt\Class_($this->getNaming()->getClassName($class->getName()), ['extends' => new Name($this->getNaming()->getClassName($base)), 'stmts' => []]);
    }

    protected function createSetter(Property $property, string $namespace, bool $strict, bool $fluent = true): Stmt\ClassMethod
    {
        $method = parent::createSetter($property, $namespace, $strict, $fluent);
        $wrapper = $this->wrapper($property, $namespace);
        if ($wrapper === null) {
            return $method;
        }
        $method->params[0]->type = null;
        foreach ($method->stmts as $statement) {
            if ($statement instanceof Stmt\Expression && $statement->expr instanceof Expr\Assign
                && $statement->expr->var instanceof Expr\PropertyFetch) {
                $statement->expr->expr = new Expr\StaticCall(
                    new Name\FullyQualified('MessageBird\Core\ModelWrapper'),
                    'normalize',
                    [new Arg(new Expr\Variable($property->getPhpName())), new Arg(new Expr\ClassConstFetch(new Name($wrapper), 'class'))],
                );
            }
        }
        return $method;
    }

    protected function createSetterDoc(Property $property, string $namespace, bool $strict, bool $fluent): Doc
    {
        $wrapper = $this->wrapper($property, $namespace);
        if ($wrapper === null) {
            return parent::createSetterDoc($property, $namespace, $strict, $fluent);
        }
        $lines = ['/**'];
        if ($property->getDescription()) {
            $lines[] = ' * ' . $property->getDescription();
            $lines[] = ' *';
        }
        $lines[] = ' * @param ' . $wrapper . '|' . $this->bases[$wrapper] . '|array|null $' . $property->getPhpName();
        if ($property->isDeprecated()) {
            $lines[] = ' *';
            $lines[] = ' * @deprecated';
        }
        if ($fluent) {
            $lines[] = ' *';
            $lines[] = ' * @return self';
        }
        $lines[] = ' */';
        return new Doc(implode("\n", $lines));
    }

    private function wrapper(Property $property, string $namespace): ?string
    {
        $hint = $property->getType()->getTypeHint($namespace);
        if (!$hint instanceof Name) {
            return null;
        }
        $name = $hint->getLast();
        return isset($this->bases[$name]) ? $name : null;
    }
}
