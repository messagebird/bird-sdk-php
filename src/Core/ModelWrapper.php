<?php

declare(strict_types=1);

namespace MessageBird\Core;

final class ModelWrapper
{
    /**
     * @template T of object
     *
     * @param object|array<mixed>|null $value
     * @param class-string<T> $class
     *
     * @return T|null
     */
    public static function normalize(object|array|null $value, string $class): ?object
    {
        if ($value === null || $value instanceof $class) {
            return $value;
        }
        if (is_array($value)) {
            return (new Serializer())->denormalize($value, $class);
        }
        $base = get_parent_class($class);
        if ($base === false || !$value instanceof $base || !method_exists($value, 'isInitialized')) {
            throw new \InvalidArgumentException('Expected the wrapper base model or an array');
        }

        $wrapper = new $class();
        if ($value instanceof \ArrayObject && $wrapper instanceof \ArrayObject) {
            $wrapper->exchangeArray($value->getArrayCopy());
        }
        foreach ((new \ReflectionClass($base))->getProperties() as $property) {
            $name = $property->getName();
            if ($name === 'initialized' || !$value->isInitialized($name)) {
                continue;
            }
            $suffix = ucfirst($name);
            $wrapper->{'set' . $suffix}($value->{'get' . $suffix}());
        }

        return $wrapper;
    }
}
