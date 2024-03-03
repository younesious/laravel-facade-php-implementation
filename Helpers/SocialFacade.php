<?php


namespace Src\Helpers;

class SocialFacade
{
    public function __construct(protected Twitter $twitter, protected Instagram $instagram)
    {
    }

    function share($url, $title)
    {
        $this->twitter->share($url, $title);
        $this->instagram->share($url, $title);
    }
}
