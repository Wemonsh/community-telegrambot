<?php

namespace App\Conversations;

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
            $this->say('Вы уже зарегистрированы');
        }
    }

    public function askName()
    {
        $this->ask('Привет! Расскажи как тебя зовут?', function(Answer $answer) {
            $this->name = $answer->getText();

            TelegramUser::create([
                'name' => $this->name,
                'telegram_id' => $this->bot->getUser()->getId()
            ]);

            $this->say('Отлично тогда продолжим '.$this->name);
        });
    }
}
