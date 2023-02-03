<?php

declare(strict_types=1);

namespace App\Helper;

class UniqueGenerationHelper
{
    public static function generate(): string
    {
        return substr(sha1((string)time()), 0, 16);
    }
}
