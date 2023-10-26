<?php

namespace App\Services\Telegram;

use BotMan\BotMan\BotMan;

interface CommandInterface
{
    public function handle(BotMan $bot): void;
}
