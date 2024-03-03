<?php

namespace Src\Helpers;

interface Social
{
    public function share(string $url, string $title): void;
}
