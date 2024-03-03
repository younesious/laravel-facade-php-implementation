<?php

namespace Src\Helpers;

class Twitter implements Social
{
    public function share(string $url, string $title): void
    {
        echo "$url - $title by Twitter\n";
    }
}
