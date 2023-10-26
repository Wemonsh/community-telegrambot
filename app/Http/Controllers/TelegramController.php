<?php

namespace App\Http\Controllers;

use App\Conversations\RegistrationConversation;
use App\Conversations\VisitOfficeConversation;
use App\Services\Telegram\Commands\ProfileCommand;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\LaravelCache;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function __invoke()
    {
        $config = [
             "telegram" => [
                "token" => config('services.telegram.token')
             ]
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
            $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
        });

        // Start listening
        $botman->listen();
    }
}

// https://api.telegram.org/bot5375693593:AAFG-XEAJXm3Uqy0Y0DI_Gau3LG92rbkKSY/setWebhook?url=https://ae12-217-25-95-112.ngrok-free.app
