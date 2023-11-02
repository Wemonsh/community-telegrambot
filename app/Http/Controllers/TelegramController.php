<?php

namespace App\Http\Controllers;

use App\Helpers\Localization;
use App\Services\Telegram\Conversations\RegistrationConversation;
use App\Services\Telegram\Conversations\VisitOfficeConversation;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\LaravelCache;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;

class TelegramController extends Controller
{
    public function __invoke()
    {
        $config = [

        ];

        // Load the driver(s) you want to use
        DriverManager::loadDriver(TelegramDriver::class);

        // Create an instance
        $botman = BotManFactory::create($config, new LaravelCache());

        $botman->hears('/profile', 'App\Services\Telegram\Commands\ProfileCommand@handle');

        // Give the bot something to listen for.
        $botman->hears('/visit', function (BotMan $bot) {
            $bot->startConversation(new VisitOfficeConversation());
        });

        // Give the bot something to listen for.
        $botman->hears('/start', function (BotMan $bot) {
            $bot->reply('добро пожаловать');
        });

        // Give the bot something to listen for.
        $botman->hears('/registration', function (BotMan $bot) {
            $bot->startConversation(new RegistrationConversation());
        });

        $botman->fallback(function(BotMan $bot) {
            $bot->reply(Localization::get('botman.not_found_command'));
        });

        // Start listening
        $botman->listen();
    }
}
