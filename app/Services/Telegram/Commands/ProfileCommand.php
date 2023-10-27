<?php

declare(strict_types=1);

namespace App\Services\Telegram\Commands;

use App\Helpers\ProgressBar;
use App\Models\TelegramUser;
use App\Repositories\Interfaces\TelegramUserRepositoryInterface;
use App\Repositories\TelegramUserRepository;
use App\Services\Telegram\CommandInterface;
use BotMan\BotMan\BotMan;
use LevelUp\Experience\Models\Level;

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

        $message = sprintf('Привет, %s', $telegramUser->name) . PHP_EOL . PHP_EOL;
        $message .= sprintf('Твой текущий уровень: %s', $telegramUser->getLevel()) . PHP_EOL;
        $message .= sprintf('До следующиего уровня: %s', $telegramUser->nextLevelAt()) . PHP_EOL . PHP_EOL;

        $bot->reply($message);
    }
}
