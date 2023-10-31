<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\LaravelCache;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;

class BotManController extends Controller
{
    private BotMan $botMan;

    public function __construct()
    {
        // Load config params
        $config = [
            'telegram' => [
                'token' => config('services.telegram.token')
            ]
        ];

        // Load the driver(s) you want to use
        DriverManager::loadDriver(TelegramDriver::class);

        // Create an instance
        $this->botMan = BotManFactory::create($config, new LaravelCache());
    }

    public function handle(): void
    {
        $this->botMan->fallback(function(BotMan $bot) {
            $bot->reply(__(''));
        });

        $this->botMan->listen();
    }
}
