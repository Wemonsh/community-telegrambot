<?php

declare(strict_types=1);

namespace App\Services\Telegram\Commands;

use App\Services\Telegram\CommandInterface;
use BotMan\BotMan\BotMan;

final class ProfileCommand implements CommandInterface
{
    public function handle(BotMan $bot): void
    {

        $message = 'Профиль пользователя' . PHP_EOL . 'Добро пожаловать!';

        $bot->reply($message);
    }
}
