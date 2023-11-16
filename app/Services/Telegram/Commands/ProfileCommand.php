<?php

declare(strict_types=1);

namespace App\Services\Telegram\Commands;

use App\Helpers\Localization;
use App\Models\TelegramUser;
use App\Repositories\Interfaces\TelegramUserRepositoryInterface;
use App\Repositories\TelegramUserRepository;
use App\Services\Telegram\CommandInterface;
use BotMan\BotMan\BotMan;

final class ProfileCommand implements CommandInterface
{
    private TelegramUserRepositoryInterface $telegramRepository;

    public function __construct()
    {
        $this->telegramRepository = new TelegramUserRepository(new TelegramUser());
    }

    public function handle(BotMan $bot): void
    {
        $telegramUser = $this->telegramRepository->getByTelegramId((int)$bot->getUser()->getId());

        $message = Localization::get('botman.profile_command.info', ['name' => $telegramUser->name]) . PHP_EOL . PHP_EOL;
        $message .= Localization::get('botman.profile_command.level', ['level' => $telegramUser->getLevel()]) . PHP_EOL;

        $bot->reply($message);
    }
}
