<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class GenerateCodeCommand extends Command
{
    protected $signature = 'generate:code';

    protected $description = 'Command description';

    public function handle()
    {
        Cache::set('code', random_int('100000', 999999), 300);
    }
}
