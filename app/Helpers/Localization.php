<?php

namespace App\Helpers;

class Localization
{
    public static function get(string $key): ?string
    {
        if (__($key) !== null && is_array(__($key)))
        {
            $rand_key = array_rand(__($key));
            return __($key)[$rand_key];
        }

        return __($key);
    }
}
