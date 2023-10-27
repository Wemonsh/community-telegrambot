<?php

namespace App\Repositories\Interfaces;

use App\Models\TelegramUser;

interface TelegramUserRepositoryInterface extends EloquentRepositoryInterface
{
    public function getByTelegramId(int $telegramId): TelegramUser;
}
