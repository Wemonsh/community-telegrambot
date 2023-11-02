<?php

namespace App\Services\Telegram\Conversations;

use App\Helpers\Localization;
use App\Models\TelegramUser;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class RegistrationConversation extends Conversation
{
    protected string $name;

    public function run()
    {
        $telegram_user = TelegramUser::where('telegram_id', $this->bot->getUser()->getId())->first();
        if ($telegram_user === null) {
            $this->askName();
        } else {
            $this->say(Localization::get('botman.registration_command.user_exist', ['name' => $telegram_user->name]));
        }
    }

    public function askName()
    {
        $this->ask(Localization::get('botman.registration_command.ask_name.question'), function(Answer $answer) {
            $this->name = $answer->getText();

            $telegramUser = TelegramUser::create([
                'name' => $this->name,
                'telegram_id' => $this->bot->getUser()->getId()
            ]);

            $telegramUser->addPoints(100);

            $this->say(Localization::get('botman.registration_command.ask_name.good_answer', ['name' => $this->name]));
        });
    }
}
