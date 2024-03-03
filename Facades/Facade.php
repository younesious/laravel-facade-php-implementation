<?php

namespace Src\Facades;

use Src\App;
use RuntimeException;


abstract class Facade
{
    /**
     * Resolve the facade root instance from the container.
     */
    protected static function resolveFacadeInstance(string $name): mixed
    {
        return App::$container->get(App::$container->get($name));
    }

    /**
     * Get the registered name of the component.
     *
     * @throws RuntimeException
     */
    protected static function getFacadeAccessor(): string
    {
        throw new RuntimeException('Facade does not implement getFacadeAccessor method.');
    }

    public static function __callStatic($method, $args): mixed
    {
        $instance = static::resolveFacadeInstance(static::getFacadeAccessor());

        if (!$instance) {
            throw new RuntimeException('A facade root has not been set.');
        }

        return $instance->$method(...$args);
    }
}
