<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Helpers\Localization;
use App\Services\Telegram\Conversations\RegistrationConversation;
use App\Services\Telegram\Conversations\VisitOfficeConversation;
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
        $this->botMan->hears('/profile', 'App\Services\Telegram\Commands\ProfileCommand@handle');

        // Give the bot something to listen for.
        $this->botMan->hears('/visit', function (BotMan $bot) {
            $bot->startConversation(new VisitOfficeConversation());
        });

        // Give the bot something to listen for.
        $this->botMan->hears('/start', function (BotMan $bot) {
            $bot->startConversation(new RegistrationConversation());
        });

        $this->botMan->fallback(function(BotMan $bot) {
            $bot->reply(Localization::get('botman.not_found_command'));
        });

        $this->botMan->listen();
    }
}
