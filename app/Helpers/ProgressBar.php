<?php

namespace App\Helpers;

class ProgressBar
{
    public static function init(int $done, int $total, int $width = 10): string
    {
        $percent = round(($done * 100) / $total);
        $bar = round(($width * $percent) / 100);

        return sprintf("%s%% %s%s\r", $percent, str_repeat("⬛", $bar), str_repeat("⬜", $width-$bar));
    }
}
