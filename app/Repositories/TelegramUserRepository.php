<?php

namespace App\Repositories;

use App\Models\TelegramUser;
use App\Repositories\Interfaces\TelegramUserRepositoryInterface;

class TelegramUserRepository extends EloquentRepository implements TelegramUserRepositoryInterface
{
    public function __construct(TelegramUser $model)
    {
        parent::__construct($model);
    }

    public function getByTelegramId(int $telegramId): TelegramUser
    {
        return $this->model->where('telegram_id', $telegramId)->firstOrFail();
    }
}
