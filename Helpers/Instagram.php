<?php

namespace Src\Helpers;

class Instagram implements Social
{
    public function share(string $url, string $title): void
    {
        echo "$url - $title by Instagram\n";
    }
}
