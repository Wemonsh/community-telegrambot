<?php

namespace App\Providers;

use App\Repositories\Interfaces\TelegramUserRepositoryInterface;
use App\Repositories\TelegramUserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(TelegramUserRepositoryInterface::class, TelegramUserRepository::class);
    }
}
