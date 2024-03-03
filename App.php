<?php

namespace Src;

use DI\Container;

class App
{
    public static Container $container;

    public function __construct()
    {
        self::$container = new Container();
    }

    public static function bind(string $key, string $className, ?string $aliasClassName = null, ?string $alias = null)
    {
        static::$container->set($key, $className);

        if (!is_null($alias)) {
            class_alias($aliasClassName, $alias);
        }
    }
}
