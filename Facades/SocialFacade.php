<?php

namespace Src\Facades;


class SocialFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'social';
    }
}
