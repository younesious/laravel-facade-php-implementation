<?php

namespace Src\test;

use PHPUnit\Framework\TestCase;

use Src\App;
use Src\Helpers\Instagram;
use Src\Helpers\SocialFacade;
use Src\Helpers\Twitter;
use Src\Helpers\Social;
use Src\Facades\SocialFacade as SF;
use Src\Facades\Facade;
use ReflectionClass;
use Src\Providers\FacadeServiceProvider;

class Test extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once __DIR__ . '/../Helpers/Instagram.php';
        require_once __DIR__ . '/../Helpers/Twitter.php';
        require_once __DIR__ . '/../Helpers/SocialFacade.php';
        require_once __DIR__ . '/../Helpers/Social.php';
        require_once __DIR__ . '/../Facades/SocialFacade.php';
        require_once __DIR__ . '/../Facades/Facade.php';
        require_once __DIR__ . '/../App.php';
        require_once __DIR__ . '/../Providers/FacadeServiceProvider.php';
    }

    public function testSocialFacadeHasGetFacadeAccessor()
    {
        $socialFacade = new ReflectionClass(SF::class);
        self::assertTrue($socialFacade->hasMethod('getFacadeAccessor'));
    }

    public function testFacadeCallStatic()
    {
        $socialFacade = new ReflectionClass(Facade::class);
        self::assertTrue($socialFacade->hasMethod('__callStatic'));
    }

    public function testInstagramImplementSocial()
    {
        $social = new ReflectionClass(Instagram::class);
        self::assertTrue($social->implementsInterface(Social::class));
    }

    public function testTwitterImplementSocial()
    {
        $social = new ReflectionClass(Twitter::class);
        self::assertTrue($social->implementsInterface(Social::class));
    }

    public function testSocialHasShare()
    {
        $social = new ReflectionClass(Social::class);
        self::assertTrue($social->hasMethod('share'));
    }

    public function testFacadeHelper()
    {
        $twitter = new Twitter();
        $instagram = new Instagram();

        new SocialFacade($twitter, $instagram);

        $this->assertTrue(True);
    }

    public function testBind()
    {
        $container = new App();
        $container::bind('social', SocialFacade::class);

        $resolved = $container::$container->get('social');

        $this->assertEquals(SocialFacade::class, $resolved);
    }

    public function testAliasFacadeServiceProvider()
    {
        $this->facadeServiceProvider();

        $this->assertEquals(new ReflectionClass(SF::class)
            , new ReflectionClass(\Social::class));
    }

    public function testShare()
    {

        \Social::share('https://quera.org', 'New College');

        $this->expectOutputString("https://quera.org - New College by Twitter\nhttps://quera.org - New College by Instagram\n");
    }

    public function testCustomShare()
    {
        \Social::share('amoooo moien nima matin', 'raul gonzalez');

        $this->expectOutputString("amoooo moien nima matin - raul gonzalez by Twitter\namoooo moien nima matin - raul gonzalez by Instagram\n");
    }

    protected function facadeServiceProvider(): void
    {
        $facadeServiceProvider = new FacadeServiceProvider();
        $facadeServiceProvider->register();

    }
}