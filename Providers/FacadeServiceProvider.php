<?php

namespace Src\Providers;

require_once __DIR__ . '/../App.php';

use Src\App;
use Src\Helpers\SocialFacade;
use Src\Facades\SocialFacade as SF;

class FacadeServiceProvider
{
    public function register()
    {
        $container = new App();
        $container::bind(
            'social',
            SocialFacade::class,
            SF::class,
            'Social'
        );
    }
}
